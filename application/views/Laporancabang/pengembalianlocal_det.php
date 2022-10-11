Purchaseorder<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL LAPORAN PENGEMBALIAN LOCAL</h3>
    </div>
    <div class="box-body">
        <div class="panel-body">
            <table id="tableDetail" class="table table-bordered table-hover" style="width: 100%;">
                <thead class="bg-primary">
                    <tr role="row">
                        <th>No</th>
                        <th>Item</th>
                        <th>No SN</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach($detail as $pemlokdet){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $pemlokdet->nama_barang ?></td>
                    <td></td>
                    <td><?php echo $pemlokdet->keterangan ?></td>
                </tr>
                <?php $no++;?>
                <?php } ?></tbody>
            </table>
        </div>
    </div>
</div>
<script>
    
</script>