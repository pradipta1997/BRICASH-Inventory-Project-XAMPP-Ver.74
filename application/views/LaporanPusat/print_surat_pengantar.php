<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
    <td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><center><b><u>SURAT PENGANTAR</u></b><br>
        <small>No.<?php echo $po->no_pengiriman; ?></small></center>
    </td>
    <td>Tanggal : <?php echo date("d/m/Y"); ?> </td>
</tr>
</table>

<table border="0" style="width:30%;border-collapse:separate;border-radius:6px;">
    <tr>
        <td><b>Kepada Yth.</b></td>
    </tr>
    <tr>
        <td>Nama Uker : <b><?= $po->nama_uker ?></b></td>
    </tr>
    <tr>
        <td>Alamat Uker : <?= $po->alamat_uker ?></td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>

<table border="1" style="float:right;margin-bottom:10px;width:200px;height:100px;">
    <tr align="center" valign="middle">
        <td><?= $po->nama_delivery_type ?></td>
    </tr>
</table>
<hr style="margin-top:110px;"> Bersama ini kami kirimkan barang / Sparepart sebagai berikut :
<table style="width:100%;margin-top:10px;border-collapse:collapse;" border="1">
    <thead style="background-color:cyan;">
        <th>No.</th>
        <th>Nama Barang</th>
        <th>Kirim</th>
        <th>Pending</th>
        <th>Ket.</th>
        <th>No Surat</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_pengiriman_barang_detail", ['id_pengiriman' => $po->id_pengiriman]);
        $no = 1;
        $total = 0;
        foreach($dodetail as $value){ ?>
        <tr align="center">
            <td><?= $no ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td>1</td>
            <td>-</td>
            <td><?= $value->keterangan; ?></td>
            <td><?= $po->no_pengiriman; ?></td>
        </tr>
        <?php $no++;$total+=$value->harga_barang;} ?>
    </tbody>
    <tfoot>
        <tr align="center">
            <td colspan="5">Total : </td>
            <td><?= $po->jumlah_koli ?> Dus / Koli</td>
            <td></td>
        </tr>
    </tfoot>
</table>

<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="0">
    <tr>
        <td align="left"><b>Diterima Oleh : </b></td>
        <td align="center"></td>
        <td align="center"><b>PT. BRINGIN GIGANTARA</b></td>
    </tr>
    <tr>
    <td><b><?= $po->nama_uker ?></b></td>
    <td></td>
    <td align="center">Bagian Pengadaan & Distribusi</td>
    </tr>
    <tr style="height:100px;">
        <td align="center"></td>
        <td align="center"></td>
        <td align="center"></td>
    </tr>
    <tr>
        <td align="center"><hr></td>
        <td align="center"></td>
        <td align="center"><b><u>TEGUH PRABOWO</b></u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>M LUTFI</b></u></td>
    </tr>
    <tr>
        <td colspan="2">Nama : </td>
        <td align="center">Supervisor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Staf Pelaksana</td>
    </tr>
    <tr>
        <td colspan="3">Jabatan : </td>
    </tr>
    <tr>
        <td colspan="3">Tanggal : </td>
    </tr>
    <tr>
        <td colspan="3">No HP : </td>
    </tr>
</table>
<script>
    // window.onload = window.print();
    // function printPage(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print();
    // }
</script>