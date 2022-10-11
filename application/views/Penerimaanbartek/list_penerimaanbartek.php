<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENERIMAAN BARANG YANG BELUM DI KEMBALIKAN TEKNISI</h3>
    </div>
    <div class="box-body">
        <table id="tablePenbartek" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>No Serial Number</th>
                    <th>No SN Lama</th>
                    <th>Nama Teknisi</th>
                    <th>TID Project</th>
                    <th>Kondisi Barang</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="terimaBarang">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Verifikasi Barang Balikan</h4>
                    <input type="hidden" name="id_pertek_det" id="id_pertek_det">
                </div>
                <div class="modal-body" id="modal-budi">
                    <div class='form-group'>
                        <label for='tgl_terima_barang' class='control-label'>Tanggal Terima Barang</label>
                        <input type='date' value="<?= date('Y-m-d') ?>" name="tgl_terima_barang" required class='form-control' id='tgl_terima_barang' />
                    </div>
                    <div class='form-group'>
                        <label>No SN</label>
                        <select id="no_sn" onchange="cariStock(this.value)"  class="form-control input-xlarge no_sn" name="no_sn" style="width: 100%;" title="Pilih Item Barang">
                            <option value="">--Pilih Item--</option>
                            <?php foreach ($Viper as $value) {  ?>
                                <option value="<?= $value->id_stock ?>"><?= $value->no_sn ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='id_gbarang' class='control-label'>Group Barang</label>
                                <input type='text' readonly name="nama_gbarang" required class='form-control nama_gbarang' id='nama_gbarang' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='id_sgbarang' class='control-label'>Subgroup Barang</label>
                                <input type='text' readonly name="nama_sgbarang" required class='form-control nama_sgbarang' id='nama_sgbarang' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='id_merek' class='control-label'>Merek Barang</label>
                                <input type='text' readonly name="nama_merek" required class='form-control nama_merek' id='nama_merek' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='id_tipe_barang' class='control-label'>Tipe Barang</label>
                                <input type='text' readonly name="tipe_barang" required class='form-control tipe_barang' id='tipe_barang' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='kode_barang' class='control-label'>Kode Barang</label>
                                <input type='text' readonly name="kode_barang" required class='form-control kode_barang' id='kode_barang' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='nama_barang' class='control-label'>Nama Barang</label>
                                <input type='text' readonly name="nama_barang" required class='form-control perbar_namabarang' id='nama_barang' />
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='harga_barang' class='control-label'>Harga Barang</label>
                        <input type='text' readonly name="harga_barang" required class='form-control perbar_hargabarang' id='harga_barang' />
                    </div>
                    <div class="form-group">
                        <label for="flag_barang">Kondisi Barang</label>
                        <select name="flag_barang" id="flag_barang" class="form-control select2" style="width: 100%;">
                            <option value="1">Bagus</option>
                            <option value="0">Rusak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" required class="form-control" name="keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const urlPenerimaanbartek = '<?= site_url("Penerimaanbartek/") ?>';
    const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;


    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenbartek')) {
            table = $('#tablePenbartek').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbartek + "listPenerimaanbartek",
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

    function cariStock(value) {
        $.ajax({
            type: "POST",
            url: urlCustomfunction + "cariStock",
            data: {
                id_stock: value
            },
            dataType: "JSON",
            success: function(response) {
                $('#nama_gbarang').val(response.nama_gbarang);
                $('#nama_sgbarang').val(response.nama_sgbarang);
                $('#nama_merek').val(response.nama_merek);
                $('#tipe_barang').val(response.tipe_barang);
                $('#kode_barang').val(response.kode_barang);
                $('#nama_barang').val(response.nama_barang);
                $('#harga_barang').val(response.harga_barang);
                // $('#nama_bank').val(response.nama_bank);
                // $('#nama_rekening').val(response.nama_rekening);
            }
        });
    }

    function showModalPenerimaan($id_pemenuhan) {
        $.ajax({
            url: urlPenerimaanbartek + 'showModalPenerimaan/' + $id_pemenuhan,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                // $('#id_gbarang').val(response[0].nama_gbarang);
                $('#id_pertek_det').val(response[0].id_pertek_det);
                // $('#no_sn').val(response[0].no_sn);
                // $('#id_sgbarang').val(response[0].nama_sgbarang);
                // $('#id_merek').val(response[0].nama_merek);
                // $('#id_tipe_barang').val(response[0].tipe_barang);
                // $('#kode_barang').val(response[0].kode_barang);
                // $('#nama_barang').val(response[0].nama_barang);
                // $('#flag_barang').val(response[0].flag_barang);
                // $('#harga_barang').val(response[0].harga_satuan);
                // $('#keterangan').val(response[0].keterangan);
                // $('#tanggal_perbaikan').val(response[0].tanggal_perbaikan);
                $('#terimaBarang').modal('show');
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlPenerimaanbartek + 'updatePenerimaan',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#terimaBarang').modal('hide');
                });
            },
        });
    });
</script>