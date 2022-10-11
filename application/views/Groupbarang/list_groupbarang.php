<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST GROUP BARANG
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addGroupbarang' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableGroupbarang" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Group Barang</th>
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
<div class="modal fade" id="formGroupbarang" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Group Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gbarang" id="id_gbarang">
                    <div class='form-group'>
                        <label class='control-label'>Nama Group Barang</label>
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
    const urlGroupbarang = '<?= site_url("Groupbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableGroupbarang')) {
            table = $('#tableGroupbarang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlGroupbarang + "listGroupbarang",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addGroupbarang').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_gbarang').val("");
            $('#formGroupbarang').modal('show');
        });

    });

    function VGroupbarang(id_gbarang) {
        $.ajax({
            url: urlGroupbarang + 'viewGroupbarang/' + id_gbarang,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_gbarang').val(response[0].id_gbarang);
                $('#nama').val(response[0].nama_gbarang);
                $('#formGroupbarang').modal('show');
            }
        });
    }

    function deleteGroupbarang(id_gbarang) {
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
                        id_gbarang: id_gbarang
                    },
                    url: urlGroupbarang + "deleteGroupbarang",
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
            url: urlGroupbarang + 'formGroupbarang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formGroupbarang').modal('hide');
                });
            },
        });
    });
</script>