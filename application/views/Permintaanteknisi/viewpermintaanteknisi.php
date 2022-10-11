<form action="<?= base_url('Permintaanteknisi/approvPertek/' . $pertek->id_pertek) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PERMINTAAN BARANG TEKNISI
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Data Permintaan</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Permintaan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->nomor_pertek ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Permintaan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->tanggal_pertek ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->keterangan ?></td>
                        </tr>
                        <tr>
                            <td>Approvel Pinca</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->pinca_appovel == 1 ? labelWarna('success', 'Pinca Approv') : labelWarna('danger', 'Pinca Non Approv') ?></td>
                        </tr>
                        <tr>
                            <td>Approvel Leader</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->leader_approvel == 1 ? labelWarna('success', 'Leader Approv') : labelWarna('danger', 'Leader Non Approv') ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <legend>Data Teknisi</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Nama Teknisi</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->username ?></td>
                        </tr>
                        <tr>
                            <td>TID Poject</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pertek->tid ?> | <?= $pertek->nama_project ?></td>
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
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $no = 1;
                                $detPertek = $this->General->fetch_records("v_pertekdet", ['id_pertek' => $pertek->id_pertek]);
                                foreach ($detPertek as $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->kode_barang ?> | <?= $value->nama_barang ?></td>
                                        <td><?= $value->qty ?></td>
                                        <td><?= $value->keterangan ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center" colspan="5">
                                        <?php
                                        if ($pertek->pinca_appovel == 1) {
                                            $disablePinca = 'disabled';
                                        } else {
                                            $disablePinca = '';
                                        }

                                        if ($pertek->leader_approvel == 1) {
                                            $disableLeader = 'disabled';
                                        } else {
                                            $disableLeader = '';
                                        }

                                        if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                                        ?>
                                            <input type="submit" <?= $disablePinca ?> class="btn btn-primary btn-sm" value="Approv Permintaan Teknisi">
                                        <?php } else if ($this->session->userdata('user_login')['id_sgroup'] == 23) { ?>
                                            <input type="submit" <?= $disableLeader ?> class="btn btn-primary btn-sm" value="Approv Permintaan Teknisi">
                                        <?php } ?>
                                        <a href="<?= base_url('Permintaanteknisi') ?>" class="btn btn-warning btn-sm">Kembali</a>
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