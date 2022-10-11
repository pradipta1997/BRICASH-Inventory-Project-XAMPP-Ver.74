<form action="<?= base_url('Pembelianlocal/approvPembelianlocal' . $pembelian->id_pembelian) ?>" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PEMBELIAN LOCAL
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Detail Pembelian Local</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Nomor Pembelian</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->nomor_pembelian ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pembelian</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->tanggal_pembelian ?></td>
                        </tr>
                        <tr>
                            <td>Unit Kerja</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->nama_uker ?></td>
                        </tr>
                        <tr>
                            <td>Nama Vendor</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->nama_vendor ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->jenis_pembayaran ?></td>
                        </tr>
                        <tr>
                            <td>Tempo Pembayaran</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->tempo_pembayaran ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->sub_total ?></td>
                        </tr>
                        <tr>
                            <td>Subtotal PPN</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->nilai_pajak ?></td>
                        </tr>
                        <tr>
                            <td>Grand Total</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->total ?></td>
                        </tr>
                        <tr>
                            <td>Approvel</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pembelian->approvel == 1 ? labelWarna('success', 'Approv') : labelWarna('danger', 'Non-Approv') ?></td>
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
                    <h4 class="panel-title">DAFTAR BARANG DIMINTA</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $no = 1;
                                $detPemloc = $this->General->fetch_records("v_pembelian_local_det", ['id_pembelian' => $pembelian->id_pembelian]);
                                foreach ($detPemloc as $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_barang ?></td>
                                        <td><?= $value->keterangan ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="">
                                        <?php
                                        if ($pembelian->approvel == 1) {
                                            $disablePinca = 'disabled';
                                        } else {
                                            $disablePinca = '';
                                        }

                                        if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                                        ?>
                                            <input type="submit" <?= $disablePinca ?> class="btn btn-primary btn-sm" value="Approv Pembelian Local">
                                        <?php } ?>

                                        <a href="<?= base_url('Pembelianlocal') ?>" class="btn btn-warning btn-sm">Kembali</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>