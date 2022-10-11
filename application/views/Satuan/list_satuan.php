<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST SATUAN
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addSatuan' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <?php if ($this->session->flashdata('msg'))
                echo $this->session->flashdata('msg');
            ?>
            <div class="panel-body">
                <table id="tableSatuan" class="table  table-hover table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Satuan</th>
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
<div class="modal fade" id="formSatuan" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Satuan</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_satuan" id="id_satuan">
                    <div class='form-group'>
                        <label class='control-label'>Nama Satuan</label>
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
    const urlSatuan = '<?= site_url("Satuan/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableSatuan')) {
            table = $('#tableSatuan').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlSatuan + "listSatuan",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addSatuan').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_satuan').val("");
            $('#formSatuan').modal('show');
        });

    });

    function VSatuan(id_satuan) {
        $.ajax({
            url: urlSatuan + 'viewSatuan/' + id_satuan,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_satuan').val(response[0].id_satuan);
                $('#nama').val(response[0].nama_satuan);
                $('#formSatuan').modal('show');
            }
        });
    }

    function deleteSatuan(id_satuan) {
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
                        id_satuan: id_satuan
                    },
                    url: urlSatuan + "deleteSatuan",
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
            url: urlSatuan + 'formSatuan',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formSatuan').modal('hide');
                });
            },
        });
    });
</script>