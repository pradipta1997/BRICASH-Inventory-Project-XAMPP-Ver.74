<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST Pengelolaan Mesin
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addPengmesin' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tablePengmesin" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Uker</th>
                            <th>Nama Project</th>
                            <th>TID</th>
                            <th>Lokasi</th>
                            <th>DB</th>
                            <th>Merek</th>
                            <th>Tipe</th>
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
<div class="modal fade" id="formPengmesin" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Mesin</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_det_project" id="id_det_project">
                    <div class="form-group">
                        <label class="control-label">Nama Uker</label>
                        <select class="form-control select2" style="width: 100%;" required name="id_uker" id="id_uker">
                            <option value="">Select Uker</option>
                            <?php foreach ($uker as $uk) : ?>
                                <option value="<?php echo $uk->id_uker; ?>"><?php echo $uk->kode_uker . " | " . $uk->nama_uker; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Project</label>
                        <select class="form-control select2" style="width: 100%;" name="id_project" id="id_project">
                            <option value=""> Select Nama Project</option>
                            <?php foreach ($project as $pj) : ?>
                                <option value="<?php echo $pj->id_project; ?>"><?php echo $pj->tid . " | " .  $pj->nama_project; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>Lokasi</label>
                        <input type='text' name="lokasi" id="lokasi" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>DB</label>
                        <input type='text' name="db" id="db" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Merek</label>
                        <input type='text' name="merek" id="merek" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tipe</label>
                        <input type='text' name="tipe" id="tipe" required class='form-control' />
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
    const urlPengmesin = '<?= site_url("Pengmesin/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePengmesin')) {
            table = $('#tablePengmesin').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPengmesin + "listPengmesin",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1, ],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $(".select2").select2({
            dropdownParent: $('#formPengmesin'),
        });

        $('#addPengmesin').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_det_project').val("");
            $('#id_uker').val("").trigger('change');
            $('#id_project').val("").trigger('change');
            $('#formPengmesin').modal('show');
        });

    });

    function VPengmesin(id_det_project) {
        $.ajax({
            url: urlPengmesin + 'viewPengmesin/' + id_det_project,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_det_project').val(response[0].id_det_project);
                $('#id_uker').val(response[0].id_uker).trigger('change');
                $('#id_project').val(response[0].id_project).trigger('change');
                $('#lokasi').val(response[0].lokasi);
                $('#db').val(response[0].db);
                $('#merek').val(response[0].merek);
                $('#tipe').val(response[0].tipe);
                $('#formPengmesin').modal('show');
            }
        });
    }

    function deletePengmesin(id_det_project) {
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
                        id_det_project: id_det_project
                    },
                    url: urlPengmesin + "deletePengmesin",
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
            url: urlPengmesin + 'formPengmesin',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_uker').val(0).trigger('change');
                    $('#formPengmesin').modal('hide');
                });
            },
        });
    });
</script>