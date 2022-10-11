<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST SUBGROUP BARANG
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addSubgroupbarang' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableSubgroupbarang" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Group Barang</th>
                            <th>Nama Subgroup Barang</th>
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
<div class="modal fade" id="formSubgroupbarang" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Subgroup Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_sgbarang" id="id_sgbarang">
                    <div class="form-group">
                        <label class="control-label">Group Barang</label>
                        <select class="form-control select2" required name="id_gbarang" id="id_gbarang" style="width: 100%;">
                            <option value="">Select Group Barang</option>
                            <?php foreach ($groupbarang as $gb) : ?>
                                <option value="<?php echo $gb->id_gbarang; ?>"><?php echo $gb->nama_gbarang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Subgroup Barang</label>
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
    const urlSubgroupbarang = '<?= site_url("Subgroupbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableSubgroupbarang')) {
            table = $('#tableSubgroupbarang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlSubgroupbarang + "listSubgroupbarang",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addSubgroupbarang').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_sgbarang').val("");
            $('#id_gbarang').val("");
            $('#formSubgroupbarang').modal('show');
        });

        $(".select2").select2({
            dropdownParent: $('#formSubgroupbarang'),
        });
    });

    function VSubgroupbarang(id_sgbarang) {
        $.ajax({
            url: urlSubgroupbarang + 'viewSubgroupbarang/' + id_sgbarang,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_sgbarang').val(response[0].id_sgbarang);
                $('#id_gbarang').val(response[0].id_gbarang).trigger('change');
                $('#nama').val(response[0].nama_sgbarang);
                $('#formSubgroupbarang').modal('show');
            }
        });
    }

    function deleteSubgroupbarang(id_sgbarang) {
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
                        id_sgbarang: id_sgbarang
                    },
                    url: urlSubgroupbarang + "deleteSubgroupbarang",
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
            url: urlSubgroupbarang + 'formSubgroupbarang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formSubgroupbarang').modal('hide');
                });
            },
        });
    });
</script>