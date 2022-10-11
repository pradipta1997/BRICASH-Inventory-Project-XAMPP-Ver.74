<form action="<?= base_url('Monpembayaran/updateBuku') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            DETAIL MONITORING PERMOHONAN PEMBAYARAN
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Data Purchase Order</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <input type="hidden" value="<?php echo $pembayaran[0]->id_permohonan_pem; ?>" name="id_permohonan_pem" id="id_permohonan_pem">
                            <td>No. Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->no_po; ?> <input type="hidden" value="<?php echo $pembayaran[0]->id_po; ?>" name="id_po" id="id_po"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->tanggal_po; ?></td>
                        </tr>
                        <tr>
                            <td>File Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td>
                                <small><li><?php echo $pembayaran[0]->file_po; ?></li></small>
                            </td>
                        </tr>
                        <tr>
                            <td>Catatan PO</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->catatan_po; ?></td>
                        </tr>
                        <tr>
                            <td>Term & Condition</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->term_condition; ?></td>
                        </tr>
                        <tr>
                            <td>Ship To Unit Kerja</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->kode_uker; ?> | <?php echo $pembayaran[0]->nama_uker; ?></td>
                        </tr>
                        <tr>
                            <td>To Vendor</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->nama_vendor; ?></td>
                        </tr>
                        <tr>
                            <td>Project</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->tid; ?> | <?php echo $pembayaran[0]->nama_project; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->jenis_pembayaran; ?></td>
                        </tr>
                        <tr>
                            <td>Jatuh Tempo Bayar</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $pembayaran[0]->jtempo_pembayaran." Hari"; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <legend>Verifikasi Kelengkapan Dokumen</legend>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <input type="hidden" value="<?php echo $pembayaran[0]->id_invoice; ?>" name="id_invoice" id="id_invoice">
                                <td style="width: 40%;">Asli Invoice/Kwitansi</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" name="inv" disabled <?php echo ($pembayaran[0]->asli_invoice==1 ? 'checked' : '');?> value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Asli Faktur Pajak</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->asli_pajak==1 ? 'checked' : '');?> name="fakpaj" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Asli Tanda Terima/Surat Jalan/DO</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->asli_tandaterima==1 ? 'checked' : '');?> name="ttsjdo" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Copy PO</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->copy_po==1 ? 'checked' : '');?> name="cpo" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Copy IP</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->copy_ip==1 ? 'checked' : '');?> name="cip" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Asli Berita Acara</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->asli_ba==1 ? 'checked' : '');?> name="berac" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Dokumen Pendukung</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->dokumen==1 ? 'checked' : '');?> name="dokpen" value="1"></td>
                            </tr>
                            <tr>
                                <td style="width: 40%;">Lain - Lain</td>
                                <td class="text-center" style="width: 5%;">:</td>
                                <td class="text-center"><input type="checkbox" disabled <?php echo ($pembayaran[0]->lain_lain==1 ? 'checked' : '');?> name="ll" value="1"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Currency</th>
                                    <th>Quantity</th>
                                    <th>Harga Satuan</th>
                                    <th>Have PPN</th>
                                    <th>Total PPN</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                    $no = 1;
                                    $poDet = $this->General->fetch_records('v_podet', ['id_po' => $pembayaran[0]->id_po]);
                                    foreach ($poDet as $pDet) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td class="product-list"><?= $pDet->nama_barang  ?></td>
                                            <td class="product-list"><?= $pDet->kode_currency . " | " . $pDet->tgl_kurs . " | " . rupiah($pDet->rupiah) ?></td>
                                            <td><?= $pDet->qty ?></td>
                                            <td><?= $pDet->harga_satuan ?></td>
                                            <td class="text-center"><input disabled type="checkbox" <?= $pDet->total_ppn > 0 ? 'checked' : '' ?>></td>
                                            <td><?= rupiah($pDet->total_ppn) ?></td>
                                            <td class="text-center"><?= rupiah($pDet->total) ?></td>
                                            <td><?= $pDet->keterangan ?></td>
                                        </tr>
                                    <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="text-align:right;" colspan="7">
                                        <strong style="color: inherit;">Subtotal:</strong>
                                    </td>
                                    <td class="text-center"><?php echo rupiah($pembayaran[0]->subtotal); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align:right;">
                                        <strong style="color: inherit;">Subtotal PPN:</strong>
                                    </td>
                                    <td class="text-center"><?php echo rupiah($pembayaran[0]->subtotal_ppn); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="text-align:right;">
                                        <strong style="color: inherit;">Grand Total:</strong>
                                    </td>
                                    <td class="text-center"><?php echo rupiah($pembayaran[0]->grand_total); ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">UPLOAD BUKTI VOUCHER & TANGGAL TRANSAKSI</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class='form-group'>
                                <label class='control-label'>No Voucher Pembukuan</label>
                                <input type='text' name="no_pembayaran" id="no_pembayaran" required class='form-control' />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class='form-group'>
                                <label class='control-label'>Tanggal Transaksi</label>
                                <input type='date' name="tgl_transaksi" id="tgl_transaksi" value="<?= date('Y-m-d') ?>" required class='form-control' />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class='form-group'>
                                <label class='control-label'>Voucher Pembukuan</label>
                                <input type='file' name="file_voucher[]" id="file_voucher" required multiple class='form-control' />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <input type="submit" value="Update" class="btn btn-primary btn-sm">
                            <a href="<?= base_url("Monpembayaran") ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>