<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST DETAIL CURRENCY
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addDetcurrency' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableDetcurrency" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Currency</th>
                            <th>Tanggal Kurs</th>
                            <th>Rupiah</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div class="modal fade" id="formDetcurrency" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Detail Currency</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_det_currency" id="id_det_currency">
                    <div class='form-group'>
                        <label class='control-label'>Kode Currency</label>
                        <select name="id_currency" id="id_currency" class="form-control select2" style="width: 100%;">
                            <option value="">Pilih Currency</option>
                            <?php foreach ($currency as $cr) {  ?>
                                <option value="<?= $cr->id_currency ?>"><?= $cr->kode_currency . " | " . $cr->nama_currency ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tanggal Kurs</label>
                        <input type='date' name="tgl_kurs" id="tgl_kurs" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Rupiah</label>
                        <input type='number' name="rupiah" id="rupiah" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for ADD ends-->

<script>
    const urlDetcurrency = '<?= site_url("Detcurrency/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableDetcurrency')) {
            table = $('#tableDetcurrency').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlDetcurrency + "listDetcurrency",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addDetcurrency').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_det_currency').val("");
            $('#id_currency').val("").trigger("change");
            $('#formDetcurrency').modal('show');
        });

    });

    function VDetcurrency(id_det_currency) {
        $.ajax({
            url: urlDetcurrency + 'viewDetcurrency/' + id_det_currency,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_det_currency').val(response[0].id_det_currency);
                $('#id_currency').val(response[0].id_currency).trigger("change");
                $('#tgl_kurs').val(response[0].tgl_kurs);
                $('#rupiah').val(response[0].rupiah);
                $('#keterangan').val(response[0].keterangan);
                $('#formDetcurrency').modal('show');
            }
        });
    }

    function deleteDetcurrency(id_det_currency) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: {
                        id_det_currency: id_det_currency
                    },
                    url: urlDetcurrency + "deleteDetcurrency",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire("Data gagal di delete!", "", "error");
                        }
                    },
                });
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlDetcurrency + 'formDetcurrency',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formDetcurrency').modal('hide');
                });
            },
        });
    });
</script>