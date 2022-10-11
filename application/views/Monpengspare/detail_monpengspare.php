<!-- <style>
    table,
    th,
    td {
        border-color: black !important;
    }
</style> -->

<div class="box">
    <div class="box-header">
        <h3 class="box-title">MONITRONG PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="tableMonpengspare" class="table table-bordered" width="100%">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <th>Group Barang</th>
                        <th>Subgroup Barang</th>
                        <th>Nama Barang</th>
                        <th>Merek Barang</th>
                        <th>Tipe Barang</th>
                        <th>No SN</th>
                        <th>Harga Barang</th>
                        <th class="text-center">Status Pembukuan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $ditel = $this->General->fetch_records("v_barangbalikteknisi", ['id_pertek' => $gen->id_pertek]);
                    $no = 1;
                    if($ditel){
                        foreach ($ditel as $value) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $value->nama_gbarang; ?></td>
                    <td><?php echo $value->nama_sgbarang; ?></td>
                    <td><?php echo $value->nama_barang; ?></td>
                    <td><?php echo $value->nama_merek; ?></td>
                    <td><?php echo $value->tipe_barang; ?></td>
                    <td><?php echo $value->no_sn_new; ?></td>
                    <td><?php echo rupiah($value->harga_satuan); ?></td>
                    <td><?php echo $value->flag_pembukuan == 0 ? labelWarna("danger", "Belum dibuku") : labelWarna("success", "Sudah dibuku"); ?></td>
                </tr>
                <?php $no++; }
                } ?>
                    <!-- <tr>
                        <th>1</th>
                        <td>Sparepart</td>
                        <td>CRM</td>
                        <td>AD BOARD ATAS</td>
                        <td>Hyousung</td>
                        <td>MONIMAX 8000A</td>
                        <td>SN2075</td>
                        <td><?= rupiah(15000) ?></td>
                        <td>BAIK</td>
                        <td class="text-center"><?= labelWarna("danger", "Belum dipenuhi") ?></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <hr>
        <div class="text-center">
            <a href="<?= base_url("Monpengspare") ?>" class="btn btn-warning btn-sm">Kembali</a>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#tableMonpengspare').dataTable();
    })
</script>