<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;" border="0">
<tr>
    <td style="width:40%;"><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td><b>PENGELUARAN BARANG</b><br>
        <small style="margin-left:20px;">No.<?php echo $detailDo[0]->no_po; ?></small>
    </td>
    <td>Tanggal : <?php echo date("d/m/Y"); ?></td>
</tr>
</table>

<table border="1" style="width:30%;border-collapse:separate;border-radius:6px;border:solid black 1px;">
    <tr>
        <td>Diberikan Ke</td>
    </tr>
    <tr>
        <td>Workshop</td>
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
        <th>No. DO</th>
        <th>Vendor</th>
        <th>Keterangan</th>
    </thead>
    <tbody>
        <?php $dodetail = $this->General->fetch_records("v_dodet", ['id_do' => $detailDo[0]->id_do]);
        $no = 1;
        foreach($dodetail as $value){ ?>
        <tr>
            <td><?= $no ?></td>
            <td></td>
            <td><?= $value->kode_barang." | ".$value->nama_barang ?></td>
            <td><?= $value->qty ?></td>
            <td><?= $detailDo[0]->no_do; ?></td>
            <td><?= $detailDo[0]->nama_pengirim; ?></td>
            <td><?= $value->keterangan; ?></td>
        </tr>
        <?php $no++;} ?>
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
<script>
    window.onload = window.print();
    // function printPage(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print();
    // }
</script>