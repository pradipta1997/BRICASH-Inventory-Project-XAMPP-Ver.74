<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
    <td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><b><u>PENERIMAAN BARANG</u></b><br>
    </td>
    <td align="right">Tanggal : <?php echo date("d/m/Y"); ?></td>
</tr>
</table>

<table border="1" style="width:30%;border-collapse:separate;border-radius:6px;border:solid black 1px;">
    <tr>
        <td>Terima Dari : <?= $detailDo[0]->nama_pengirim ?></td>
    </tr>
    <tr>
        <td>Attn : PT. BRINGIN GIGANTARA</td>
    </tr>
    <tr>
        <td>No. PO : <?= $detailDo[0]->no_po ?></td>
    </tr>
    <tr>
        <td>No. DO : <?= $detailDo[0]->no_do ?></td>
    </tr>
</table>

<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <thead>
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Valuta</th>
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
            <td><?= $no ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td><?= $value->qty ?></td>
            <td><?= $value->harga_satuan; ?></td>
            <td><?= $value->kode_currency." ".$value->rupiah; ?></td>
            <td><?= $value->qty*$value->harga_satuan; ?></td>
            <?php $totalparuh += $value->qty*$value->harga_satuan ?>
        </tr>
        <?php $no++;}} ?>
        <tr>
            <td colspan="4" align="right">TOTAL : </td>
            <td align="center">IDR</td>
            <td><?= $totalparuh ?></td>
        </tr>
    </tbody>
</table>

<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <tr>
        <td align="center"><b>Mengetahui</b></td>
        <td align="center"><b>Diberikan Oleh</b></td>
        <td align="center"><b>Diterima Oleh</b></td>
    </tr>
    <tr>
    <td><br><br><br><br><br><br></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
        <td align="center"><b>Supervisor Gudang</b></td>
        <td align="center"><b>Asisten Gudang</b></td>
        <td align="center"><b>Tanda Tangan / Nama Jelas</b></td>
    </tr>
</table>

<table style="width:100%;border-collapse:collapse;margin-top:20px;" border="1">
    <tr>
        <td>Catatan : <?=$detailDo[0]->keterangan; ?></td>
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