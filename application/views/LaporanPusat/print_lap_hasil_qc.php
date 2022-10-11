<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
    <td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><b>HASIL QUALITY CONTROL</b><br>
        <small style="margin-left:10px;">No. PO :<?php echo $detailDo[0]->no_po; ?></small>
    </td>
    <td>Tanggal : <?php echo date("d/m/Y"); ?></td>
</tr>
</table>

<table border="1" style="width:30%;border-collapse:separate;border-radius:6px;border:solid black 1px;">
    <tr align="center">
        <td>Supervisor Workshop</td>
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
        <th>Cek Fisik</th>
        <th>Kelengkapan</th>
        <th>Hasil QC</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_hasilqc", ['id_do' => $detailDo[0]->id_do, 'flag_qc' => 2]);
        $no = 1;
        foreach($dodetail as $value){ ?>
        <tr align="center">
            <td><?= $no ?></td>
            <td><?= $value->no_sn ?></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td><?= $value->flag_fisik = 1 ? "OK" : "Rusak" ?></td>
            <td><?= $value->flag_fisik = 1 ? "✓" : "X" ?></td>
            <td><?= $value->flag_qc = 1 ? "OK" : "Retur" ?></td>
            <td><?= $value->ket; ?></td>
        </tr>
        <?php $no++;} ?>
    </tbody>
</table>

<div class="col-md-12" style="margin-top:30px;">
    <div class="row">
        <div class="left-ttd" style="width:200px;float:left;border:2px solid black;border-radius:5px;margin-left:10px;">
            <center>Mengetahui</center>
            <hr><br>
            <div style="height:50px;" class="ttd-sign-left">
                
            </div>
            <hr>
                <center>Supervisor Workshop</center>
        </div>
        <div class="left-ttd" style="width:200px;float:right;border:2px solid black;border-radius:5px;margin-left:10px;">
            <center>DiQC Oleh</center>
            <hr><br>
            <div style="height:50px;" class="ttd-sign-left">
                
            </div>
            <hr>
                <center>Tanda Tangan / Nama Jelas</center>
        </div>
    </div>
</div>
<table style="width:100%;border-collapse:collapse;margin-top:200px;" border="1">
    <tr>
        <td><b>Catatan : </td>
    </tr>
    <tr style="height:100px;" valign="top">
        <td><?= $detailDo[0]->catatan_po ?></td>
    </tr>
</table>
<!-- 
<table style="width:100%;margin-top:20px;border-collapse:collapse;" border="1">
    <tr>
        <td style="width:20%;" align="center"><b>Mengetahui</b></td>
        <td style="width:60%;" align="center"><b></b></td>
        <td align="center"><b>Diterima Oleh</b></td>
    </tr>
    <tr>
    <td><br><br><br><br><br><br></td>
    <td style="width:60%;border:none !important;"></td>
    <td></td>
    </tr>
    <tr>
        <td align="center"><b>Supervisor Gudang</b></td>
        <td align="center" style="width:60%;border:none !important;"></td>
        <td align="center"><b>Tanda Tangan / Nama Jelas</b></td>
    </tr>
</table> -->
<script>
    // window.onload = window.print();
    // function printPage(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print();
    // }
</script>