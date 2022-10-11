<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST MENU
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button id="addMenu" class='btn btn-info btn-sm'> Add New <i class="fa fa-plus"></i></a>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableMenu" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Url Menu</th>
                            <th>Sort Order</th>
                            <th>Parent Menu</th>
                            <th>Show Menu?</th>
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
<div class="modal fade" id="formMenu" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Menu</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_menu" id="id_menu">
                    <div class='form-group'>
                        <label class='control-label'>Nama Menu</label>
                        <input type='text' name="nama" id="nama" required class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Url Menu</label>
                        <input type='text' name="url" id="url" required class='form-control' />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Parent Menu </label>
                        <select class="form-control select2" required name="parent" id="parent" style="width: 100%;">
                            <option value="0">Select Parent Menu</option>
                            <?php foreach ($pmenu as $mnu) : ?>
                                <option value="<?php echo $mnu->id_menu; ?>"><?php echo $mnu->nama_menu; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Sort Order</label>
                        <input type='number' name="sort" required class='form-control' id="sortOrder" />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Show Menu?</label>
                        <input type="checkbox" style="margin-left:10px;" name="show_menu" id="show_menu" value="1">
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
    const urlMenu = '<?= site_url("Menu/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableMenu')) {
            table = $('#tableMenu').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                ajax: {
                    url: urlMenu + "listMenu",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addMenu').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_menu').val("");
            $('#parent').val(0).trigger('change');
            $('#formMenu').modal('show');
        });

        $(".select2").select2({
            dropdownParent: $('#formMenu'),
        });
    });

    function Vmenu(id_menu) {
        $.ajax({
            url: urlMenu + 'viewMenu/' + id_menu,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_menu').val(response[0].id_menu);
                $('#nama').val(response[0].nama_menu);
                $('#url').val(response[0].url_menu);
                $('#parent').val(response[0].parent_id).trigger('change');
                $('#sortOrder').val(response[0].sort_order);
                response[0].show_in_menu == 1 ? $('#show_menu').prop('checked', true) : $('#show_menu').prop('checked', false);
                $('#formMenu').modal('show');
            }
        });
    }

    function deleteMenu(id_menu) {
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
                        id_menu: id_menu
                    },
                    url: urlMenu + "deleteMenu",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire(response, "", "error").then((result) => {
                                table.ajax.reload(null, false);
                            });
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
            url: urlMenu + 'formMenu',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#parent').val(0).trigger('change');
                    $('#formMenu').modal('hide');
                });
            },
        });
    });
</script>