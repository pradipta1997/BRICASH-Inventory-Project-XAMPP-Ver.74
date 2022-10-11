<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENERIMAAN BARANG KP/KC</h3>
        <span <?php echo $My_Controller->savePermission; ?>></span>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="tablePengbarkp" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Resi</th>
                    <th>Uker Pengirim</th>
                    <th>Uker Tujuan</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Tanggal Diterima</th>
                    <th>Nama Pengirim</th>
                    <!-- <th>Keterangan</th> -->
                    <th>Total Harga</th>
                    <th>Berat Barang</th>
                    <th>Ekpedisi</th>
                    <th>Status Pengiriman</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody></tbody>

            <tfoot>
                <th class="text-center" style="float: left;" colspan="9">Grand Total: </th>
                <th class="text-center" style="float: left;"><?= rupiah($totalHarga[0]->GrandTotalHarga) ?></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</div>

<!-- <div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENERIMAAN BARANG KP/KC</h3>
        <span <?php echo $My_Controller->savePermission; ?>></span>
    </div>
    <div class="box-body">
        <table id="tablePenerimaanBarang" class="table table-bordered table-hover" style="width:100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No Resi</th>
                    <!-- <th>Dari Uker</th>
                    <th>Ke Uker</th>
                    <th>Tgl Dikirim</th>
                    <th>Tgl Diterima</th>
                    <th>Nama Petugas</th>
                    <th>Keterangan</th>
                    <th>Harga Pengeluaran</th>
                    <th>Jumlah Kg</th>
                    <th>Ekspedisi</th>
                    <th>Status Penerimaan</th> -->
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <!-- <td colspan="8">Total :</td>
                    <td>Rp.1.574.293</td> -->
                </tr>
            </tfoot>
        </table>
    </div>
</div> -->

<div class="modal fade" id="ijinPrinsip">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Bukti Penerimaan Barang</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="file_penbar">Upload Bukti Penerimaan</label>
                    <input type="file" class="form-control" id="file_penbar" name="file_penbar">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    const urlPengbarkp = '<?= site_url("Penbarcab/") ?>';
    let table;

    $(document).ready(function(){
        if (!$.fn.DataTable.isDataTable('#tablePengbarkp')) {
            table = $('#tablePengbarkp').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPengbarkp + "listPenerimaanBarang",
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

    function Modalperbaikanbarang() {
        $.ajax({
            success: function(response){
                $('#ijinPrinsip').modal('show');
            }
            // url: urlPerbaikanbarang + 'showModalPerbaikan/' + $id_perbaikanbarang,
            // type: "GET",
            // dataType: "JSON",
            // success: function(response) {
            //     $('#id_perbaikanbarang').val(response[0].id_perbaikanbarang);
            //     $('#id_gbarang').val(response[0].id_gbarang);
            //     $('#id_sgbarang').val(response[0].id_sgbarang);
            //     $('#no_urut').val(response[0].no_urut);
            //     $('#id_merek').val(response[0].id_merek);
            //     $('#id_tipe_barang').val(response[0].id_tipe_barang);
            //     $('#catatan_perbaikan').val(response[0].catatan_perbaikan);
            //     $('#stat_perbaikan').val(response[0].stat_perbaikan);
            //     $('#tanggal_perbaikan').val(response[0].tanggal_perbaikan);
            //     $('#editPerbaikanBarang').modal('show');
            // }
        });
    }
</script>