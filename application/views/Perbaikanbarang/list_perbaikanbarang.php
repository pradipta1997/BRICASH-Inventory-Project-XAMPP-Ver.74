<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PERBAIKAN BARANG</h3>
        <!-- <span <?php echo $My_Controller->savePermission; ?>>
            | <a href='#editPerbaikanBarang' data-toggle="modal" class='btn btn-info btn-sm'>
                Add New <i class="fa fa-plus"></i>
            </a>
        </span> -->
    </div>
    <div class="box-body">
        <table id="tablePerbaikanbar" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>No. SN</th>
                    <th>Catatan Perbaikan</th>
                    <th>Status Perbaikan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="editPerbaikanBarang">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tambah Perbaikan Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal Perbaikan</label>
                                <input type="date" name="tanggal_perbaikan" id="tanggal_perbaikan" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>No Serial Number</label>
                                <input type="text" id="no_sn" name="no_sn" class="form-control" readonly required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Group Barang</label>
                                <select disabled id="id_gbarang" class="form-control input-xlarge Perbar_barang" name="nama_gbarang" style="width: 100%;" title="Pilih Item Barang">
                                    <option>--Pilih Items--</option>
                                    <?php foreach ($GBarang as $value) { ?>
                                        <option value="<?= $value->id_gbarang ?>"><?= $value->nama_gbarang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sub-Group Barang</label>
                                <select disabled id="id_sgbarang" class="form-control input-xlarge Perbar_barang" name="nama_sgbarang" style="width: 100%;" title="Pilih Item Barang">
                                    <option>--Pilih Items--</option>
                                    <?php foreach ($SGBarang as $value) { ?>
                                        <option value="<?= $value->id_sgbarang ?>"><?= $value->nama_sgbarang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select disabled id="no_urut" class="form-control input-xlarge Perbar_barang" name="no_urut" style="width: 100%;" title="Pilih Item Barang">
                                    <option>--Pilih Items--</option>
                                    <?php foreach ($namaBarang as $value) { ?>
                                        <option value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Merek Barang</label>
                                <select disabled id="id_merek" class="form-control input-xlarge Perbar_barang" name="id_merek" style="width: 100%;" title="Pilih Item Barang">
                                    <option>--Pilih Items--</option>
                                    <?php foreach ($MerkBarang as $value) { ?>
                                        <option value="<?= $value->id_merek ?>"><?= $value->nama_merek ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tipe Barang</label>
                                <select disabled id="id_tipe_barang" class="form-control input-xlarge Perbar_barang" name="id_tipe_barang" style="width: 100%;" title="Pilih Item Barang">
                                    <option>--Pilih Items--</option>
                                    <?php foreach ($TipeBarang as $value) { ?>
                                        <option value="<?= $value->id_tipe_barang ?>"><?= $value->tipe_barang ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Catatan Perbaikan</label>
                                <textarea id="catatan_perbaikan" name="catatan_perbaikan" id="catatan_perbaikan" class="form-control" required></textarea>
                                <input type="hidden" name="id_perbaikanbarang" id="id_perbaikanbarang" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status Perbaikan</label>
                                <select id="stat_perbaikan" name="stat_perbaikan" class="form-control" required>
                                    <option value="0">--Pilih Status--</option>
                                    <option value="2">Tidak Bisa Diperbaiki</option>
                                    <option value="1">Bisa Diperbaiki</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const urlPerbaikanbarang = '<?= site_url("Perbaikanbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePerbaikanbar')) {
            table = $('#tablePerbaikanbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPerbaikanbarang + "listperbaikanbarang",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }
    });

    function Modalperbaikanbarang($id_perbaikanbarang) {
        $.ajax({
            url: urlPerbaikanbarang + 'showModalPerbaikan/' + $id_perbaikanbarang,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_perbaikanbarang').val(response[0].id_pengkekp_det);
                $('#no_sn').val(response[0].no_sn);
                $('#id_gbarang').val(response[0].id_gbarang);
                $('#id_sgbarang').val(response[0].id_sgbarang);
                $('#no_urut').val(response[0].no_urut);
                $('#id_merek').val(response[0].id_merek);
                $('#id_tipe_barang').val(response[0].id_tipe_barang);
                $('#catatan_perbaikan').val(response[0].catatan_perbaikan);
                $('#stat_perbaikan').val(response[0].status_perbaikan);
                $('#tanggal_perbaikan').val(response[0].tanggal_perbaikan);
                $('#editPerbaikanBarang').modal('show');
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlPerbaikanbarang + 'editPerbaikanBarang',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#editPerbaikanBarang').modal('hide');
                });
            },
        });
    });
</script>