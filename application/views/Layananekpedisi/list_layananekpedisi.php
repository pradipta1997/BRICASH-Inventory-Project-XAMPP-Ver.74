<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST LAYANAN EKPEDISI
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addLayananekpedisi' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableLayananekpedisi" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Ekpedisi</th>
                            <th>Layanan Ekpedisi</th>
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
<div class="modal fade" id="formLayananekpedisi" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Layanan Ekpedisi</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_layanan_ekspedisi" id="id_layanan_ekspedisi">
                    <div class="form-group">
                        <label for="id_ekspedisi" class="control-label">Nama Ekpedisi</label>
                        <select name="id_ekspedisi" id="id_ekspedisi" class="form-control">
                            <option value="">Pilih Ekpedisi</option>
                            <?php foreach ($ekpedisi as $value) { ?>
                                <option value="<?= $value->id_ekpedisi ?>"><?= $value->nama_ekpedisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Layanan Ekpedisi</label>
                        <input type='text' name="layanan_ekspedisi" id="layanan_ekspedisi" required class='form-control' />
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
    const urlLayananekpedisi = '<?= site_url("Layananekpedisi/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableLayananekpedisi')) {
            table = $('#tableLayananekpedisi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLayananekpedisi + "listLayananekpedisi",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addLayananekpedisi').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_layanan_ekspedisi').val("");
            $('#id_ekspedisi').val("").trigger("change");
            $('#formLayananekpedisi').modal('show');
        });

    });

    function VLayananekpedisi(id_layanan_ekspedisi) {
        $.ajax({
            url: urlLayananekpedisi + 'viewLayananekpedisi/' + id_layanan_ekspedisi,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_layanan_ekspedisi').val(response[0].id_layanan_ekspedisi);
                $('#id_ekspedisi').val(response[0].id_ekspedisi).trigger("change");
                $('#layanan_ekspedisi').val(response[0].layanan_ekspedisi);
                $('#formLayananekpedisi').modal('show');
            }
        });
    }

    function deleteLayananekpedisi(id_layanan_ekspedisi) {
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
                        id_layanan_ekspedisi: id_layanan_ekspedisi
                    },
                    url: urlLayananekpedisi + "deleteLayananekpedisi",
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
            url: urlLayananekpedisi + 'formLayananekpedisi',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formLayananekpedisi').modal('hide');
                });
            },
        });
    });
</script>