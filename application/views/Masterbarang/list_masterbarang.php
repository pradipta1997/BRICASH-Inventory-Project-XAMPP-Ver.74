<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST MASTER BARANG
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addBarang' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table id="tableBarang" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Group Barang</th>
                            <th>Subgroup Barang</th>
                            <th>Merek Barang</th>
                            <th>Tipe Barang</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Nama Satuan</th>
                            <th>Min Stock</th>
                            <th>Max Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!-- -------------------------------------------------------------------------------------------------------------------- -->

<!--Modal for ADD -->
<div class="modal fade" id="formBarang" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Master Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="no_urut" id="no_urut">
                    <div class="form-group">
                        <label class="control-label">Tipe Barang</label>
                        <select class="form-control select2" style="width: 100%;" required name="id_tipe_barang" id="id_tipe_barang">
                            <option value="">--Select Tipe Barang--</option>
                            <?php foreach ($tipeBarang as $tb) : ?>
                                <option value="<?php echo $tb->id_tipe_barang; ?>"><?php echo $tb->nama_gbarang . " | " . $tb->nama_sgbarang . " | " . $tb->nama_merek . " | " . $tb->tipe_barang . " | " . $tb->tipe_barang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Satuan</label>
                        <select class="form-control select2" style="width: 100%;" required name="id_satuan" id="id_satuan">
                            <option value="">--Select Nama Satuan--</option>
                            <?php foreach ($satuan as $s) : ?>
                                <option value="<?php echo $s->id_satuan; ?>"><?php echo $s->nama_satuan; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Kode Barang</label>
                        <input type='text' name="kode_barang" id='kode_barang' class='form-control' required />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Barang</label>
                        <input type='text' name="nama_barang" id='nama_barang' class='form-control' required />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Min Stock</label>
                        <input type='number' name="min_stock" id='min_stock' class='form-control' required />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Max Stock</label>
                        <input type='number' name="max_stock" id='max_stock' class='form-control' required />
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

<!-- -------------------------------------------------------------------------------------------------------------------- -->

<script>
    const urlBarang = '<?= site_url("Masterbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableBarang')) {
            table = $('#tableBarang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlBarang + "listMasterbarang",
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
            dropdownParent: $('#formBarang'),
        });

        $('#addBarang').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#no_urut').val("");
            $('#id_tipe_barang').val("").trigger('change');
            $('#id_satuan').val("").trigger('change');
            $('#formBarang').modal('show');
        });

    });

    function VBarang($no_urut) {
        $.ajax({
            url: urlBarang + 'viewBarang/' + $no_urut,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#no_urut').val(response[0].no_urut);
                $('#id_tipe_barang').val(response[0].id_tipe_barang).trigger('change');
                $('#id_satuan').val(response[0].id_satuan).trigger('change');
                $('#kode_barang').val(response[0].kode_barang);
                $('#nama_barang').val(response[0].nama_barang);
                $('#min_stock').val(response[0].min_stock);
                $('#max_stock').val(response[0].max_stock);
                $('#formBarang').modal('show');
            }
        });
    }

    function activeBarang(no_urut) {
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
                        no_urut: no_urut
                    },
                    url: urlBarang + "deleteMbarang",
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
            url: urlBarang + 'formBarang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_tipe_barang').val(0).trigger('change');
                    $('#id_satuan').val(0).trigger('change');
                    $('#formBarang').modal('hide');
                });
            },
        });
    });
</script>