<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;">
<tr>
    <td style="width:10%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td style="padding-left:0%;"><b><u><h1>Permohonan Pembayaran</h1></u></b></td>
    <!-- <td align="left" valign="bottom"><b><u>Permohonan Pembayaran</u></b></td> -->
</tr>
<tr>
    <td><b><small style="font-size:12px;">Integrated Cash Management Solution</small></b></td>
    <td style="padding-left:6%;"><b>No. <?= $inv[0]->no_po ?></b></td>
    <!-- <td align="left"><?php echo "No : ".$po->no_po; ?></td> -->
</tr>
<tr>
    <td>Graha Simatupang Tower 2 A&D Lt.4-5<br>Jl.TB Simatupang No.Kav. 38<br>Jakarta Selatan 12540</td>
    <td style="width:45%;"></td>
    <!-- <td align="left" valign="top">Date : <?php echo $po->tanggal_po; ?></td> -->
</tr>
<tr style="height:20px;"><td></td></tr>
<tr>
    <td>Kepada  : Divisi Keuangan PT. BRINGIN GIGANTARA</td>
</tr><tr>
    <td>Dari    : Divisi Cash Management</td></tr><tr>
    <td>Perihal : Pembayaran Tagih Invoice</td></tr>
</tr>
<tr>
</tr>
</table>
<hr>
Bersama ini kami sampaikan Invoice/Kwitansi tagihan berikut lampiran dokumen terkait untuk segera dapat ditindaklanjuti dan dibayarkan -<br>
sesuai dengan ketentuan – ketentuan yang ada, kepada :<br><br>
Nama Perusahaan : <b><?= $inv[0]->nama_vendor ?></b><br>
No. Invoice/Kwitansi : <b><?= $inv[0]->no_invoice ?></b>

<table style="width:100%;" border="1">
    <thead>
        <th>No.</th>
        <th>Beban</th>
        <th>Penggunaan</th>
        <th>Besar Tagihan</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        <tr align="center">
            <td>1</td>
            <td><b><?= $inv[0]->tid ?></b></td>
            <td><b><?= $inv[0]->nama_project ?></b></td>
            <td><b><?= rupiah($inv[0]->nilai_invoice) ?></b></td>
            <td><b><?= $inv[0]->no_po ?></b></td>
        </tr>
        <tr>
            <td align="center">Beban</td>
            <td align="center"><?php if($inv[0]->beban=="overhead"){ ?><input type="checkbox" checked readonly> <?php echo "Overhead";}else{?><input type="checkbox"> <?php echo "Overhead";} ?></td>
            <td colspan="2" align="center"><?php if($inv[0]->beban=="project"){ ?><input type="checkbox" checked readonly> <?php echo "Project";}else{?><input type="checkbox"> <?php echo "Project";} ?></td>
            <td rowspan="11" valign="top">Dibayarkan Ke<br><br>
                                            <b>Nama Bank : <?= $inv[0]->nama_bank ?><br><br>
                                            No. Rekening :<?= $inv[0]->no_rekening ?><br><br>
                                            Atas Nama : <?= $inv[0]->nama_rekening ?></b><br><br>
                                            <b style="color:red;">Jatuh Tempo : <?= date('Y-m-d', strtotime($inv[0]->tanggal_po. ' + '.$inv[0]->jtempo_pembayaran.' days')) ?></b><br><br>
                                            Nilai Tagihan : <?= rupiah($inv[0]->subtotal) ?><br><br>
                                            PPN (10%) : <?= rupiah($inv[0]->subtotal_ppn) ?><br><br>
                                            <b style="color:blue;">Total Dibayarkan : <?= rupiah($inv[0]->grand_total) ?></b><br><br>
                                            Tanggal Dibayarkan : </td>
        </tr>
        <tr align="center">
            <td>Tahap Tagihan</td>
            <td><?php if($inv[0]->tahap_tagihan=="persen"){ ?><input type="checkbox" checked readonly> <?php echo "..........%";}else{?><input type="checkbox"> <?php echo "..........%";} ?></td>
            <td><?php if($inv[0]->tahap_tagihan=="btb"){ ?><input type="checkbox" checked readonly> <?php echo "Back to Back";}else{?><input type="checkbox"> <?php echo "Back to Back";} ?></td>
            <td><?php if($inv[0]->tahap_tagihan=="lunas"){ ?><input type="checkbox" checked readonly> <?php echo "Lunas";}else{?><input type="checkbox"> <?php echo "Lunas";} ?></td>
        </tr>
        <tr align="center">
            <td></td>
            <td>Maker</td>
            <td>Checker</td>
        </tr>
        <tr align="center">
            <td>1.Asli Invoice : </td>
            <td><?php if($inv[0]->asli_invoice=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>2.Asli Faktur Pajak : </td>
            <td><?php if($inv[0]->asli_pajak=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>3.Asli Tanda Terima : </td>
            <td><?php if($inv[0]->asli_tandaterima=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>4.Copy PO : </td>
            <td><?php if($inv[0]->copy_po=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>5.Copy IP : </td>
            <td><?php if($inv[0]->copy_ip=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>6.Asli Berita Acara : </td>
            <td><?php if($inv[0]->asli_ba=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>7.Dokumen Pendukung : </td>
            <td><?php if($inv[0]->dokumen=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
        <tr align="center">
            <td>8.Lain-lain : </td>
            <td><?php if($inv[0]->lain_lain=="1"){ ?><input type="checkbox" checked readonly> <?php }else{ ?><input type="checkbox"> <?php } ?></td>
            <td><input type="checkbox"></td>
        </tr>
    </tbody>
</table><br>
Demikian permohonan kami sampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.
<div style="margin-left:75%;margin-top:20px;" class="tanggal">
    Jakarta, . . . . . . . . . 20
</div>
<div style="margin-left:70%;" class="tanggal">
    <b>PT. BRINGIN GIGANTARA</b>
</div>
<div style="margin-left:70%;" class="tanggal">
    <b>DIVISI CASH MANAGEMENT</b>
</div>
<div style="margin-left:79%;margin-top:100px;" class="tanggal">
    <b><u>SUPARMAN</u></b>
</div>
<div style="margin-left:79%;" class="tanggal">
    Kepala Divisi
</div>


<script>
    window.onload = window.print();
    // function printPage(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print();
    // }
</script>