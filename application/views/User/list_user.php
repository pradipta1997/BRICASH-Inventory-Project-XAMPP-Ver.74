<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST USER
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button id='addUser' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table class="table table-bordered table-hover" id="tableUser" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Unit Kerja</th>
                            <th>Nama Group</th>
                            <th>Nama Subgroup</th>
                            <th>Username</th>
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
<div class="modal fade" id="formUser" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add User</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_user" id="id_user">
                    <div class='form-group'>
                        <label for='id_uker' class='control-label'>Unit Kerja</label>
                        <select name="id_uker" id="id_uker" class="form-control" required>
                            <option value="">Select Unit Kerja</option>
                            <?php foreach ($uker as $uk) { ?>
                                <option value="<?= $uk->id_uker ?>"><?= $uk->kode_uker . " | " . $uk->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_sgroup" class="control-label">Subgroup User</label>
                        <select style="width: 100%;" class="form-control select2" required name="id_sgroup" id="id_sgroup">
                            <option value="">Select Subgroup User</option>
                            <?php foreach ($usersgroup as $sgu) : ?>
                                <option value="<?php echo $sgu->id_subgroup; ?>"><?php echo $sgu->nama_group . " | " . $sgu->nama_subgroup; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='username' class='control-label'>Username</label>
                        <input type='text' name="username" required class='form-control' id='username' />
                    </div>
                    <div class='form-group'>
                        <label for='password' class='control-label'>Password</label>
                        <input type='text' name="password" class='form-control' id='password' />
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
    const urlUser = '<?= site_url("User/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableUser')) {
            table = $('#tableUser').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlUser + "listUser",
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
            dropdownParent: $('#formUser'),
        });

        $('#addUser').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_user').val("");
            $('#id_sgroup').val("").trigger('change');
            $('#id_uker').val("").trigger('change');
            $('#formUser').modal('show');
        });

    });

    function VUser(id_user) {
        $.ajax({
            url: urlUser + 'viewUser/' + id_user,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_user').val(response[0].id_user);
                $('#id_sgroup').val(response[0].id_sgroup).trigger('change');
                $('#id_uker').val(response[0].id_uker).trigger('change');
                $('#username').val(response[0].username);
                $('#formUser').modal('show');
            }
        });
    }

    function deleteUser(id_user) {
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
                        id_user: id_user
                    },
                    url: urlUser + "deleteUser",
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
            url: urlUser + 'formUser',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_group').val("").trigger('change');
                    $('#id_sgroup').val("").trigger('change');
                    $('#formUser').modal('hide');
                });
            },
        });
    });
</script>