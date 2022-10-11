<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST EKPEDISI
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addEkpedisi' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableEkpedisi" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Ekpedisi</th>
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
<div class="modal fade" id="formEkpedisi" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Ekpedisi</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_ekpedisi" id="id_ekpedisi">
                    <div class='form-group'>
                        <label class='control-label'>Nama Ekpedisi</label>
                        <input type='text' name="nama" id="nama" required class='form-control' />
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
    const urlEkpedisi = '<?= site_url("Ekpedisi/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableEkpedisi')) {
            table = $('#tableEkpedisi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlEkpedisi + "listEkpedisi",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addEkpedisi').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_ekpedisi').val("");
            $('#formEkpedisi').modal('show');
        });

    });

    function VEkpedisi(id_ekpedisi) {
        $.ajax({
            url: urlEkpedisi + 'viewEkpedisi/' + id_ekpedisi,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_ekpedisi').val(response[0].id_ekpedisi);
                $('#nama').val(response[0].nama_ekpedisi);
                $('#keterangan').val(response[0].keterangan);
                $('#formEkpedisi').modal('show');
            }
        });
    }

    function deleteEkpedisi(id_ekpedisi) {
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
                        id_ekpedisi: id_ekpedisi
                    },
                    url: urlEkpedisi + "deleteEkpedisi",
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
            url: urlEkpedisi + 'formEkpedisi',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formEkpedisi').modal('hide');
                });
            },
        });
    });
</script>