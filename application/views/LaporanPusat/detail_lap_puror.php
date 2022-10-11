<section class="panel">
    <header class="panel-heading" style="background-color: black; color: white;">
        PURCHASING ORDER
    </header>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                <legend>Data Purchase Order</legend>
                <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->no_po ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->tanggal_po ?></td>
                        </tr>
                        <tr>
                            <td>Kontak Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->kontak_person_po ?></td>
                        </tr>
                        <tr>
                            <td>Nama Kontak Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->nama_kontak_po ?></td>
                        </tr>
                        <tr>
                            <td>Catatan PO</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->catatan_po ?></td>
                        </tr>
                        <tr>
                            <td>Term & Condition</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->term_condition ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <legend>Other Detail</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Ship To Unit Kerja</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->kode_uker . " | " . $po->nama_uker ?></td>
                        </tr>
                        <tr>
                            <td>To Vendor</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->nama_vendor ?></td>
                        </tr>
                        <tr>
                            <td>Project</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->tid . " | " . $po->nama_project ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->jenis_pembayaran ?></td>
                        </tr>
                        <tr>
                            <td>Jatuh Tempo Bayar</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->jtempo_pembayaran ?> Hari</td>
                        </tr>
                        <tr>
                            <td>Tempo Pemenuhan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $mpo->jtempo_pemenuhan ?> Hari</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="col-md-12 ui-sortable">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">DAFTAR BARANG PURCHASING ORDER</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
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
                                $poDet = $this->General->fetch_records('v_podet', ['id_po' => $po->id_po]);
                                foreach ($poDet as $pDet) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="product-list"><?= $pDet->nama_barang  ?></td>
                                        <td><?= $pDet->qty ?></td>
                                        <td><?= rupiah($pDet->harga_satuan) ?></td>
                                        <td class="text-center"><input type="checkbox" <?= $pDet->total_ppn > 0 ? 'checked' : '' ?>></td>
                                        <td><?= rupiah($pDet->total_ppn) ?></td>
                                        <td class="text-center"><?= rupiah($pDet->total) ?></td>
                                        <td><?= $pDet->keterangan ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style="text-align:right;" colspan="6">
                                        <strong style="color: inherit;">Subtotal:</strong>
                                    </td>
                                    <td class="text-center"><?= rupiah($mpo->subtotal) ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Subtotal PPN:</strong>
                                    </td>
                                    <td class="text-center"><?= rupiah($mpo->subtotal_ppn) ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Grand Total:</strong>
                                    </td>
                                    <td class="text-center"><?= rupiah($mpo->grand_total) ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center">
    <a id="printPageButton" href="<?= base_url('Laporanpusat/Purchaseorder') ?>" class="btn btn-warning btn-sm">Kembali</a>
    <a id="printPageButton" onclick="printPO()" class="btn btn-primary btn-sm">Print</a>
</div>

<script>
    function printPO(){
        content = document.getElementsByName('row');
        console.log(content);
        window.print(content);
    }
</script>