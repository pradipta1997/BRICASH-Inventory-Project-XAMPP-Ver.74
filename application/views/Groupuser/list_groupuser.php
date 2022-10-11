<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST GROUP USER
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addGroupuser' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableGroupuser" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Group</th>
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
<div class="modal fade" id="formGroupuser" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Group User</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_group" id="id_group">
                    <div class='form-group'>
                        <label class='control-label'>Nama Group User</label>
                        <input type='text' name="nama" id="nama" required class='form-control' />
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
    const urlGroupuser = '<?= site_url("Groupuser/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableGroupuser')) {
            table = $('#tableGroupuser').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlGroupuser + "listGroupuser",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addGroupuser').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_group').val("");
            $('#formGroupuser').modal('show');
        });

    });

    function VGroupuser(id_group) {
        $.ajax({
            url: urlGroupuser + 'viewGroupuser/' + id_group,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_group').val(response[0].id_group);
                $('#nama').val(response[0].nama_group);
                $('#formGroupuser').modal('show');
            }
        });
    }

    function deleteGroupuser(id_group) {
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
                        id_group: id_group
                    },
                    url: urlGroupuser + "deleteGroupuser",
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
            url: urlGroupuser + 'formGroupuser',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formGroupuser').modal('hide');
                });
            },
        });
    });
</script>