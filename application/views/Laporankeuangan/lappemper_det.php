<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL LAPORAN PEMBUKUAN PERSEDIAAN</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="lappemsedi" class="table table-bordered" width="100%">
                <thead class="bg-primary">
                    <tr>
                        <th>Item</th>
                        <th>Merk Barang</th>
                        <th>Tipe Barang</th>
                        <th>Quantity</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="rows-list">
                    <?php
                        $pengbarDet = $this->General->fetch_records("v_laporanlemper", ['id_pengiriman' => $pengiriman->id_pengiriman]);
                        foreach ($pengbarDet as $pbd) {
                        ?>
                            <tr>
                                <td class="product-list">
                                    <?php echo $pbd->nama_barang; ?>
                                </td>
                                <td>
                                    <?php echo $pbd->nama_merek; ?>
                                </td>
                                <td>
                                    <?php echo $pbd->tipe_barang; ?>
                                </td>
                                <td>
                                    <?php echo "1"; ?>
                                </td>
                                <td align="center">
                                    <?php echo $pbd->keterangan; ?>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#lappemsedi').dataTable();
    })
</script>