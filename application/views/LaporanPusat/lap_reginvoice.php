<form action="" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            LAPORAN INVOICE PEMBELIAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->no_po ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->jenis_pembayaran ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Invoice</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->tanggal_invoice ?></td>
                        </tr>
                        <tr>
                            <td>No Invoice</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->no_invoice ?></td>
                        </tr>
                        <tr>
                            <td>Nilai Invoice</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td>Rp.<?= $do[0]->nilai_invoice ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%">
                    <tr>
                            <td>Nama Vendor</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->nama_vendor ?></td>
                        </tr>
                        <tr>
                            <td>No Rekening</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->no_rekening ?></td>
                        </tr>
                        <tr>
                            <td>Nama Bank</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->nama_bank ?></td>
                        </tr>
                        <tr>
                            <td>Nama Rekening</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do[0]->nama_rekening ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                    <td style="vertical-align : middle;text-align:left;">Beban</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td><input type="radio" name="beban2" id="bb_overhead" <?php if ($do[0]->beban=="overhead") echo "checked";?> value="overhead" required> Overhead</td>
                                    <td><input type="radio" name="beban2" id="bb_project" <?php if ($do[0]->beban=="project") echo "checked";?> value="project" required> Project</td>
                                </tr>
                                <tr>
                                    <td rowspan="2" style="vertical-align : middle;text-align:left;">Tahap Tagihan</td>
                                    <td rowspan="2" style="vertical-align : middle;text-align:center;">:</td>
                                    <td><input type="radio" name="tahap_tagihan2" id="tt_persen" <?php if ($do[0]->tahap_tagihan=="persen") echo "checked";?> value="persen" required> ......%</td>
                                    <td><input type="radio" name="tahap_tagihan2" id="tt_btb" <?php if ($do[0]->tahap_tagihan=="btb") echo "checked";?> value="btb" required> Back to Back</td>
                                
                                </tr>
                                <tr>
                                    <td><input type="radio" name="tahap_tagihan2" id="tt_lunas" <?php if ($do[0]->tahap_tagihan=="lunas") echo "checked";?> value="lunas" required> Lunas</td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Asli Invoice/Kwitansi</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->asli_invoice=="1") echo "checked";?> name="inv2" id="inv2" value="1" required></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Asli Faktur Pajak</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->asli_pajak=="1") echo "checked";?> name="fakpaj2" id="fakpaj2" value="1"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Asli Tanda Terima/Surat Jalan/DO</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->asli_tandaterima=="1") echo "checked";?> name="ttsjdo2" id="ttsjdo2" value="1" required></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Copy PO</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->copy_po=="1") echo "checked";?> name="cpo2" id="cpo2" value="1" required></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Copy IP</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->copy_ip=="1") echo "checked";?> name="cip2" id="cip2" value="1" required></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Asli Berita Acara</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->asli_ba=="1") echo "checked";?> name="berac2" id="berac2" value="1" required></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Dokumen Pendukung</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->dokumen=="1") echo "checked";?> name="dokpen2" id="dokpen2" value="1"></td>
                                </tr>
                                <tr>
                                    <td style="vertical-align : middle;text-align:left;">Lain - Lain</td>
                                    <td style="vertical-align : middle;text-align:center;">:</td>
                                    <td class="text-center"><input type="checkbox" <?php if ($do[0]->lain_lain=="1") echo "checked";?> name="ll2" id="ll2" value="1"></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center">
                            <a id="printPageButton" href="<?= base_url('Laporanpusat/Pempembar') ?>" class="btn btn-warning btn-sm">Kembali</a>
                            <a id="printPageButton" href="<?= base_url('Laporanpusat/print_lap_reginvoice/'.$do[0]->id_invoice) ?>" class="btn btn-primary btn-sm">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#kethead').summernote({
                height: 200,
            });
        })
    });

    // function printPO(){
    //     content = document.getElementsByName('row');
    //     console.log(content);
    //     window.print(content);
    // }
</script>