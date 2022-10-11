<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST SUBGROUP USER
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addSubgroupuser' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableSubgroup" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Group</th>
                            <th>Nama Subgroup</th>
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
<div class="modal fade" id="formSubgroupuser" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Subgroup User</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_subgroup" id="id_subgroup">
                    <div class="form-group">
                        <label class="control-label">Group User</label>
                        <select class="form-control select2" style="width: 100%;" required name="id_group" id="id_group">
                            <option value="">Select Group User</option>
                            <?php foreach ($groupuser as $gu) : ?>
                                <option value="<?php echo $gu->id_group; ?>"><?php echo $gu->nama_group; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Subgroup User</label>
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
    const urlSubgroupuser = '<?= site_url("Subgroupuser/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableSubgroup')) {
            table = $('#tableSubgroup').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlSubgroupuser + "listSubgroupuser",
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
            dropdownParent: $('#formSubgroupuser'),
        });

        $('#addSubgroupuser').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_subgroup').val("");
            $('#id_group').val("").trigger('change');
            $('#formSubgroupuser').modal('show');
        });

    });

    function VSubgroupuser(id_subgroup) {
        $.ajax({
            url: urlSubgroupuser + 'viewSubgroupuser/' + id_subgroup,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_subgroup').val(response[0].id_subgroup);
                $('#id_group').val(response[0].id_group).trigger('change');
                $('#nama').val(response[0].nama_subgroup);
                $('#formSubgroupuser').modal('show');
            }
        });
    }

    function deleteSubgroupuser(id_subgroup) {
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
                        id_subgroup: id_subgroup
                    },
                    url: urlSubgroupuser + "deleteSubgroupuser",
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
            url: urlSubgroupuser + 'formSubgroupuser',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_group').val(0).trigger('change');
                    $('#formSubgroupuser').modal('hide');
                });
            },
        });
    });
</script>