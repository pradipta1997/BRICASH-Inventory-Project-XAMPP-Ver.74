<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
    <td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><b><u>Permintaan Pengadaan Barang / Jasa</u></b><br>
    </td>
    <td>Tanggal : <?php echo date("d/m/Y"); ?> </td>
</tr>
</table>

<table border="0" style="width:30%;border-collapse:separate;border-radius:6px;">
    <tr>
        <td><b>Kepada</b></td>
    </tr>
    <tr>
        <td>Yth. Kepala Divisi Cash Management</td>
    </tr>
    <tr>
        <td>di Tempat</td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>

Dengan hormat,<br>
Mohon segera dapat diberikan barang-barang dengan rincian sebagai berikut :
<table style="width:100%;margin-top:10px;border-collapse:collapse;" border="1">
    <thead>
        <th>No.</th>
        <th>Merk</th>
        <th>Nama Barang</th>
        <th>Jumlah Permintaan</th>
        <th>Stock Gudang</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_print_pbj", ['id_pbj' => $po->id_pbj]);
        $no = 1;
        $total = 0;
        foreach($dodetail as $value){ ?>
        <tr align="center">
            <td><?= $no ?></td>
            <td><?= $value->nama_merek ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td><?= $value->qty ?></td>
            <td>0</td>
            <td><?= $value->keterangan; ?></td>
        </tr>
        <?php $no++;} ?>
    </tbody>
    <tfoot>
        <tr><td colspan="6"><b><u>Term & Condition</u></b></td></tr>
        <tr><td colspan="6"><?= $po->terms ?></td></tr>
    </tfoot>
</table><br>
Demikianlah, atas perhatian dan kerjasama yang baik kami ucapkan terima kasih.
<table style="float:right;margin-right:10%;margin-top:50px;">
<tr align="center">
    <td>Jakarta, <?php echo date("d/m/Y"); ?></td>
</tr>
<tr>
    <td>DIVISI CASH MANAGEMENT</td>
</tr>
<tr>
    <td>Bagian Pengadaan dan Distribusi</td>
</tr>
<tr align="center" style="height:100px;">
    <td></td>
</tr>
<tr align="center">
    <td><b><u>Wawan Partiswana</u></b></td>
</tr>
<tr align="center">
    <td>Pj. Kepala Bagian</td>
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