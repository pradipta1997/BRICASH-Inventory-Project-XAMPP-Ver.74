<form action="<?= base_url('Penbarcab/updatePenerimaan/' . $detailPbarang[0]->id_pengiriman) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            DETAIL PENERIMAAN BARANG KP/KC
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Data Penerimaan Barang KP/KC</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Resi</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->no_resi; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Dikirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->tanggal_pengiriman; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Diterima</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" value="<?php echo $detailPbarang[0]->tanggal_penerimaan; ?>" class="form-control" required></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <legend>Data Penerimaan Barang KP/KC</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Nama Petugas</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->nama_pengirim; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Pengeluaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo rupiah($detailPbarang[0]->total_harga); ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Kg</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->berat_barang; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Tipe</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->nama_delivery_type; ?></td>
                        </tr>
                        <tr>
                            <td>Ekpedisi</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?php echo $detailPbarang[0]->nama_ekpedisi; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
    </section>

    <!-- ------------------------------------------------------------------------------------------------------------------------------ -->

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Group Barang</th>
                                    <th>Subgroup Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th>Kondisi Barang</th>
                                    <th class="text-center">Terima/Tidak Terima</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $penerimaanDet = $this->General->fetch_records("v_detail_penerimaan_barang", ['id_pengiriman' => $detailPbarang[0]->id_pengiriman]);
                                $no = 0;
                                if ($penerimaanDet) {
                                    foreach ($penerimaanDet as $value) {
                                        $no += 1;
                                ?>
                                        <tr>
                                            <td><input type="hidden" id="id_pengiriman_det[]" class="id_pengiriman_det" name="id_pengiriman_det[]" value="<?php echo $value->id_pengiriman_det; ?>"><?php echo $no; ?></td>
                                            <td><?php echo $value->nama_gbarang; ?></td>
                                            <td><?php echo $value->nama_sgbarang; ?></td>
                                            <td><?php echo $value->nama_barang; ?></td>
                                            <td><?php echo $value->nama_merek; ?></td>
                                            <td><?php echo $value->tipe_barang; ?></td>
                                            <td><input type="hidden" id="no_sn[]" name="no_sn[]" value="<?php echo $value->no_sn; ?>"><?php echo $value->no_sn; ?></td>
                                            <td><?php echo $value->harga_barang; ?></td>
                                            <td align="center"><?php echo $value->kondisi_barang == 0 ? labelWarna("danger", "Rusak") : labelWarna("success", "Baik"); ?></td>
                                            <td align="center"><select class="form-control status_pemenuhan" name="status_pemenuhan[]" style="width: 100%;" id="status_pemenuhan[]" required>
                                                    <option <?= $value->status_pemenuhan == "0" ? 'selected' : '' ?> value="0">Tidak Terima</option>
                                                    <option <?= $value->status_pemenuhan == "1" ? 'selected' : '' ?> value="1">Terima</option>
                                                </select></td>
                                            <td><?php echo $value->keterangan; ?></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="col-lg-12 text-center">
                        <input type="submit" id="add-invoice" class="btn btn-primary btn-sm" name="add-invoice" value="Proceed">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>