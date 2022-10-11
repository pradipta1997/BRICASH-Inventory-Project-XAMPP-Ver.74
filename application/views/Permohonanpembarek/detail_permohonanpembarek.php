<form action="<?= base_url('Permohonanpembarek/updatePermohonanPembayaranEks/' . $detailPerPemEks[0]->id_pengiriman) ?>" method="post">
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DETAIL PERMOHONAN PEMBAYARAN EKPEDISI</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>No. Pengiriman</th>
                                    <th>Tanggal Pengiriman (SP)</th>
                                    <th>Tujuan (Uker)</th>
                                    <th>No. Resi</th>
                                    <th>Jumlah Koli</th>
                                    <th>Berat Barang</th>
                                    <th>Ekspedisi</th>
                                    <th>Layanan</th>
                                    <th>Nama Pengirim</th>
                                    <th>Total Harga</th>
                                    <th class="text-center">Status Cek</th>
                                </tr>
                                </thead>
                            <tbody>
                                <?php $permohonanDet = $this->General->fetch_records("v_permohonan_pembayaran_eks", ['id_pengiriman' => $detailPerPemEks[0]->id_pengiriman]);
                                $no = 0;
                                if ($permohonanDet) {
                                    foreach ($permohonanDet as $value) {
                                        $no += 1;
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $value->no_pengiriman; ?></td>
                                            <td><?php echo $value->tanggal_pengiriman; ?></td>
                                            <td><?php echo $value->nama_uker; ?></td>
                                            <td><?php echo $value->no_resi; ?></td>
                                            <td><?php echo $value->jumlah_koli; ?></td>
                                            <td><?php echo $value->berat_barang; ?></td>
                                            <td><?php echo $value->nama_ekpedisi; ?></td>
                                            <td><?php echo $value->layanan_ekspedisi; ?></td>
                                            <td><?php echo $value->nama_pengirim; ?></td>
                                            <td><?php echo $value->total_harga; ?></td>
                                            <td align="center"><input type="checkbox" name="status_cek[]" <?= $value->status_cek > 0 ? 'checked' : '' ?> class="status_cek" value="1"></td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="col-lg-12 text-center">
                        <input type="submit" id="status_cek" class="btn btn-primary btn-sm" name="status_cek" value="Proceed">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>