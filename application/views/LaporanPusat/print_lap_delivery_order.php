<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<div class="col-md-3">
    <div class="row">
        <h1><u>Laporan Penerimaan Delivery Order</u></h1>
    </div>
    <div class="row">
        <span>Vendor : <?= $detailDo[0]->nama_pengirim ?></span>
    </div>
    <div class="row">
        <span>Tanggal Delivery Order : <?= $detailDo[0]->tgl_do ?></span>
    </div>
</div>

<table style="width:100%;" border="0">
<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <thead>
        <th>No. PO</th>
        <th>No. DO</th>
        <th>Tanggal Terima</th>
        <th>Nama Barang</th>
        <th>Vendor</th>
        <th>Qty</th>
        <th>Kurs</th>
        <th>Valuta</th>
        <th>Harga Satuan</th>
        <th>Total Harga</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_print_penerimaan", ['id_do' => $detailDo[0]->id_do]);
        $no = 1;
        $totalparuh= 0;
        foreach($dodetail as $value){ 
            if($value->qty==0){
                continue;}
                else{?>
        <tr>
            <td><?= $detailDo[0]->no_po ?></td>
            <td><?= $detailDo[0]->no_do ?></td>
            <td><?= $detailDo[0]->tgl_terima ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td><?= $detailDo[0]->nama_pengirim ?></td>
            <td><?= $value->qty." pcs" ?></td>
            <td><?= $value->kode_currency ?></td>
            <td><?= $value->rupiah ?></td>
            <td><?= $value->harga_satuan ?></td>
            <td><?= $value->harga_satuan*$value->qty ?></td>
            <?php $totalparuh += $value->qty*$value->harga_satuan ?>
        </tr>
        <?php $no++;}} ?>
        <tr>
            <td colspan="9" align="right">TOTAL : </td>
            <td><?= $totalparuh ?></td>
        </tr>
    </tbody>
</table>
<table style="width:100%; border-collapse:collapse;margin-top:50px;">
<tr align="right">
    <td></td>
    <td></td>
    <td colspan="2"><div class="tes" style="margin-right:5%;"><b>PT BRINGIN GIGANTARA</b></div></td>
</tr>
<tr align="right">
    <td></td>
    <td></td>
    <td colspan="2"><div class="tes" style="margin-right:5%;">Bagian Pengadaan & Distribusi</div></td>
</tr>
<tr align="right" style="height:150px;" valign="bottom">
    <td></td>
    <td></td>
    <td><div class="tes" style="margin-right:5%;"><u>TEGUH PRABOWO</u></div></td>
    <td style="white-space:nowrap;"><div class="tes" style="margin-right:20%;"><u>IRFAN FAUZI</u></div></td>
</tr>
<tr align="right" valign="bottom">
    <td></td>
    <td></td>
    <td><div class="tes" style="margin-right:8%;">Supervisor</div></td>
    <td style="white-space:nowrap;width:1%;margin-right:25%;"><div class="tes" style="margin-right:25%;">Pelaksana Admin</div></td>
</tr>
</table>
<script>
    window.onload = window.print();
    // function printPage(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print();
    // }
</script>