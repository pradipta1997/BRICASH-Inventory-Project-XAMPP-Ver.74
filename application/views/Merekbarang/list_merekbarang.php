<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST MEREK BARANG
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addMerekbarang' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableMerekbarang" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Nama Group Barang</th>
                            <th>Nama Subgroup Barang</th>
                            <th>Nama Merek Barang</th>
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
<div class="modal fade" id="formMerekbarang" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Merek Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_merek" id="id_merek">
                    <div class="form-group">
                        <label for="id_sgbarang" class="control-label">Subgroup Barang</label>
                        <select class="form-control select2" required name="id_sgbarang" id="id_sgbarang" style="width: 100%;">
                            <option value="">Select Subgroup Barang</option>
                            <?php foreach ($sgbarang as $sgb) : ?>
                                <option value="<?php echo $sgb->id_sgbarang; ?>"><?php echo $sgb->nama_gbarang . " | " . $sgb->nama_sgbarang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label for='nama' class='control-label'>Nama Merek Barang</label>
                        <input type='text' name="nama" required class='form-control' id='nama' />
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
    const urlMerekbarang = '<?= site_url("Merekbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableMerekbarang')) {
            table = $('#tableMerekbarang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlMerekbarang + "listMerekbarang",
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
            dropdownParent: $('#formMerekbarang'),
        });

        $('#addMerekbarang').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_merek').val("");
            $('#id_sgbarang').val("").trigger('change');
            $('#formMerekbarang').modal('show');
        });

    });

    function VMerekbarang(id_merek) {
        $.ajax({
            url: urlMerekbarang + 'viewMerekbarang/' + id_merek,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_merek').val(response[0].id_merek);
                $('#id_sgbarang').val(response[0].id_sgbarang).trigger('change');
                $('#nama').val(response[0].nama_merek);
                $('#formMerekbarang').modal('show');
            }
        });
    }

    function deleteMerekbarang(id_merek) {
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
                        id_merek: id_merek
                    },
                    url: urlMerekbarang + "deleteMerekbarang",
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
            url: urlMerekbarang + 'formMerekbarang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_group').val("").trigger('change');
                    $('#id_sgbarang').val("").trigger('change');
                    $('#formMerekbarang').modal('hide');
                });
            },
        });
    });
</script>