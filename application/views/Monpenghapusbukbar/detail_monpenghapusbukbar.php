<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL PENGHAPUS BUKUAN BARANG</h3>
    </div>
    <div class="box-body">

        <table class="table table-bordered " id="stockCabang">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>No SN</th>
                    <th>Harga Barang</th>
                    <th>Kondisi Barang</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><?php echo $pengbarang->tanggal_perbaikan; ?></td>
                    <td><?php echo $pengbarang->nama_gbarang; ?></td>
                    <td><?php echo $pengbarang->nama_sgbarang; ?></td>
                    <td><?php echo $pengbarang->nama_barang; ?></td>
                    <td><?php echo $pengbarang->nama_merek; ?></td>
                    <td><?php echo $pengbarang->tipe_barang; ?></td>
                    <td><?php echo $pengbarang->no_sn; ?></td>
                    <td><?php echo rupiah($pengbarang->harga_barang); ?></td>
                    <td><?php echo $pengbarang->kondisi_barang == "0"? labelWarna("danger", "Rusak") : labelWarna("success", "Bagus"); ?></td>
                    <td><?php echo $pengbarang->catatan_perbaikan; ?></td>
                </tr>
        </table>
    </div>
</div>

<script>
    $(function() {
        $('#stockCabang').dataTable();
    })
</script>