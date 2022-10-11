<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>
<table style="width:100%;">
<tr>
    <td><img style="width:200px;" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></td>
    <td style="width:45%;"></td>
    <td align="left" valign="bottom"><b><u>PURCHASE ORDER</u></b></td>
</tr>
<tr>
    <td><b><small style="font-size:12px;">Integrated Cash Management Solution</small></b></td>
    <td style="width:45%;"></td>
    <td align="left"><?php echo "No : ".$po->no_po; ?></td>
</tr>
<tr>
    <td>Graha Simatupang Tower 2 A&D Lt.4-5<br>Jl.TB Simatupang No.Kav. 38<br>Jakarta Selatan 12540</td>
    <td style="width:45%;"></td>
    <td align="left" valign="top">Date : <?php echo $po->tanggal_po; ?></td>
</tr>
<tr style="height:50px;"><td></td></tr>
<tr>
    <td><b>To   : <hr></b></td>
    <td></td>
    <td><b>Ship To : <hr></b></td>
</tr>
<tr>
    <td><?php echo strtoupper($mpo->nama_vendor)."<br>".$mpo->alamat_vendor."<br>Telp:".$mpo->telp_vendor; ?></td>
    <td></td>
    <?php if($mpo->nama_uker == "Pengadaan"){
            $nama_uker = "Kantor Pusat"; 
         }else{ 
            $nama_uker = "Kantor Cabang ".$mpo->nama_uker;
         }?>
    <td valign="top"><div style="font-size:15px;">PT. BRINGIN GIGANTARA</div><?php echo $nama_uker."<br>".$mpo->alamat_uker; ?></td>
</tr>
</table>

<table class="table table-bordered" border="1" width="100%" style="margin-top:30px;">
    <thead class="bg-primary">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Quantity</th>
            <th>Harga Satuan</th>
            <th>Total PPN</th>
            <th>Total</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody id="rows-list">
        <?php
        $no = 1;
        $poDet = $this->General->fetch_records('v_podet', ['id_po' => $po->id_po]);
        foreach ($poDet as $pDet) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td class="product-list"><?= $pDet->nama_barang  ?></td>
                <td><?= $pDet->qty ?></td>
                <td><?= rupiah($pDet->harga_satuan) ?></td>
                <td><?= rupiah($pDet->total_ppn) ?></td>
                <td class="text-center"><?= rupiah($pDet->total) ?></td>
                <td><?= $pDet->keterangan ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="8" style="padding-left:50px;"><u>Term & Condition</u><br><?= $po->term_condition ?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" rowspan="3" valign="top">
                <b>Terbilang : <?php $f = new NumberFormatter("id", NumberFormatter::SPELLOUT);
                echo ucwords($f->format($mpo->grand_total))." Rupiah"; ?></b> 
            </td>
            <td style="text-align:right;">
                <strong style="color: inherit;">Subtotal:</strong>
            </td>
            <td class="text-center"><?= rupiah($mpo->subtotal) ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">
                <strong style="color: inherit;">Subtotal PPN:</strong>
            </td>
            <td class="text-center"><?= rupiah($mpo->subtotal_ppn) ?></td>
        </tr>
        <tr>
            <td style="text-align:right;">
                <strong style="color: inherit;">Grand Total:</strong>
            </td>
            <td class="text-center"><?= rupiah($mpo->grand_total) ?></td>
        </tr>
    </tfoot>
</table>

<table border="0" style="margin-top:20px;">
    <tr>
        <th style="width:400px;" align="left">Note : </td>
        <th style="width:400px;"></td>
        <th style="width:400px;"><u>Proposed By</u></td>
        <th style="width:400px;"><u>Approved By</u></td>
    </tr>
    <tr style="height:200px;">
        <td valign="top"><table border="1" style="width:100%;">
            <tr>
                <td><?= $po->catatan_po ?></td>
            </tr>
        </table></td>
        <td></td>
        <td align="center">____________________</td>
        <td align="center">____________________</td>
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