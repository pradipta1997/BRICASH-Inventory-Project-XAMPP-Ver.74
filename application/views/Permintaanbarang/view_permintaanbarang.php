<form action="<?= base_url('Permintaanbarang/approvPermintaanbarang/' . $permintaan->id_permintaan) ?>" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PERMINTAAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Detail Permintaan Barang</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Tanggal Diminta</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $permintaan->tgl_permintaan ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Permintaan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $permintaan->no_permintaan ?></td>
                        </tr>
                        <tr>
                            <td>Alasan Permintaan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $permintaan->alasan_permintaan ?></td>
                        </tr>
                        <tr>
                            <td>Catatan Permintaan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $permintaan->catatan_permintaan ?></td>
                        </tr>
                        <tr>
                            <td>Tempo Barang</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $permintaan->tempo_barang ?></td>
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
                    <h4 class="panel-title">DAFTAR BARANG PERMINTAAN BARANG</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $no = 1;
                                $permintaandet = $this->General->fetch_records('v_permintaan_barang_det', ['id_permintaan' => $permintaan->id_permintaan]);
                                foreach ($permintaandet as $result) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="product-list"><?= $result->nama_barang  ?></td>
                                        <td><?= $result->nama_merek ?></td>
                                        <td><?= $result->tipe_barang ?></td>
                                        <td><?= $result->qty ?></td>
                                        <td><?= $result->keterangan ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center">
                            <?php
                            if ($permintaan->pinca_approv == 1) {
                                $disablePinca = 'disabled';
                            } else {
                                $disablePinca = '';
                            }

                            if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                            ?>
                                <input type="submit" <?= $disablePinca ?> class="btn btn-primary btn-sm" value="Approv Permintaan Barang">
                            <?php } ?>
                            
                            <a href="<?= base_url('Permintaanbarang/tolakPermintaanbarang/'.$permintaan->id_permintaan) ?>" class="btn btn-danger btn-sm">Tolak Permintaan Barang</a>
                            <a href="<?= base_url('Permintaanbarang') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>