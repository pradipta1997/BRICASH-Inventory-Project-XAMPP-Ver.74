<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST RAK
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addRak' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableRak" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Unit Kerja</th>
                            <th>Nama Gudang</th>
                            <th>Nama Rak</th>
                            <th>Keterangan</th>
                            <th>Rak QC</th>
                            <th>Rak Junk</th>
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
<div class="modal fade" id="formRak" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Rak</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_rak" id="id_rak">
                    <div class="form-group">
                        <label for="id_gudang" class="control-label">Nama Gudang</label>
                        <select class="form-control select2" required name="id_gudang" id="id_gudang" style="width: 100%;">
                            <option value="">Select Gudang</option>
                            <?php foreach ($gudang as $gd) : ?>
                                <option value="<?php echo $gd->id_gudang; ?>"><?php echo $gd->nama_uker . " | " . $gd->nama_gudang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='nama' class='control-label'>Nama Rak</label>
                        <input type='text' name="nama" required class='form-control' id='nama' />
                    </div>
                    <div class='form-group'>
                        <label for='keterangan' class='control-label'>Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="form-check">
                        <input id="rak_qc" class="form-check-input" type="checkbox" name="rak_qc">
                        <label for="rak_qc" style="margin-right: 20px;" class="form-check-label">Rak Qc</label>
                        <input id="rak_junk" class="form-check-input" type="checkbox" name="rak_junk">
                        <label for="rak_junk" class="form-check-label">Rak Junk</label>
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
    const urlRak = '<?= site_url("Rak/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableRak')) {
            table = $('#tableRak').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlRak + "listRak",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $(".select2").select2({
            dropdownParent: $('#formRak'),
        });

        $('#addRak').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_rak').val("");
            $('#id_gudang').val("").trigger('change');
            $('#formRak').modal('show');
        });

    });

    function VRak(id_rak) {
        $.ajax({
            url: urlRak + 'viewRak/' + id_rak,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_rak').val(response[0].id_rak);
                $('#id_gudang').val(response[0].id_gudang).trigger('change');
                $('#nama').val(response[0].nama_rak);
                $('#keterangan').val(response[0].ket_rak);
                response[0].flag_rakqc == 1 ? $('#rak_qc').prop('checked', true) : $('#rak_qc').prop('checked', false);
                response[0].flag_rakjunk == 1 ? $('#rak_junk').prop('checked', true) : $('#rak_junk').prop('checked', false);
                $('#formRak').modal('show');
            }
        });
    }

    function deleteRak(id_rak) {
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
                        id_rak: id_rak
                    },
                    url: urlRak + "deleteRak",
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
            url: urlRak + 'formRak',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_group').val("").trigger('change');
                    $('#id_gudang').val("").trigger('change');
                    $('#formRak').modal('hide');
                });
            },
        });
    });
</script>