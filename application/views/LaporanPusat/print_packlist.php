<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
<td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><center><b>PACK LIST</b><br>
        <small>No.<?php echo $po->no_pengiriman; ?></small></center>
    </td>
    <td>Tanggal : <?php echo date("d/m/Y"); ?></td>
</tr>
</table>

<table border="1" style="width:30%;border-collapse:separate;border-radius:6px;border:solid black 1px;">
    <tr>
        <td>Diberikan Ke</td>
    </tr>
    <tr>
        <td><?= $po->nama_uker ?></td>
    </tr>
    <tr>
        <td><br><br></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
</table>

<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <thead>
        <th>No.</th>
        <th>Serial No.</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_pengiriman_barang_detail", ['id_pengiriman' => $po->id_pengiriman]);
        $no = 1;
        $total = 0;
        foreach($dodetail as $value){ ?>
        <tr align="center">
            <td><?= $no ?></td>
            <td><?= $value->no_sn ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td>1</td>
            <td><?= rupiah($value->harga_barang); ?></td>
        </tr>
        <?php $no++; $total+=$value->harga_barang;} ?>
    </tbody>
    <tfoot>
        <tr align="center">
            <td colspan="4">Jumlah : </td>
            <td><?= rupiah($total); ?></td>
        </tr>
    </tfoot>
</table>

<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <tr>
        <td >Catatan : </td>
    </tr>
    <tr style="height:100px;">
        <td><?= $po->keterangan ?></td>
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