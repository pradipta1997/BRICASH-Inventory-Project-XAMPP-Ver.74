<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST SATUAN
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addProject' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableProject" class="table  table-hover table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>TID</th>
                            <th>Tanggal SPK</th>
                            <th>No. SPK</th>
                            <th>Nama Project</th>
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
<div class="modal fade" id="formProject" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Project</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_project" id="id_project">
                    <div class='form-group'>
                        <label class='control-label'>TID</label>
                        <input type='text' name="tid" id="tid" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tanggal SPK</label>
                        <input type='date' name="tgl_spk" id="tgl_spk" value="<?= date("Y-m-d") ?>" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>No. SPK</label>
                        <input type='text' name="no_spk" id="no_spk" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Project</label>
                        <input type='text' name="nama_project" id="nama_project" required class='form-control' />
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
    const urlProject = '<?= site_url("Project/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableProject')) {
            table = $('#tableProject').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlProject + "listProject",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addProject').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_project').val("");
            $('#formProject').modal('show');
        });

    });

    function VProject(id_project) {
        $.ajax({
            url: urlProject + 'viewProject/' + id_project,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_project').val(response[0].id_project);
                $('#tid').val(response[0].tid);
                $('#tgl_spk').val(response[0].tgl_spk);
                $('#no_spk').val(response[0].no_spk);
                $('#nama_project').val(response[0].nama_project);
                $('#keterangan').val(response[0].keterangan);
                $('#formProject').modal('show');
            }
        });
    }

    function deleteProject(id_project) {
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
                        id_project: id_project
                    },
                    url: urlProject + "deleteProject",
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
            url: urlProject + 'formProject',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formProject').modal('hide');
                });
            },
        });
    });
</script>