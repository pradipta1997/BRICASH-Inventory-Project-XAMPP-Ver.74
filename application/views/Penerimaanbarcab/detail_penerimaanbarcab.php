<form action="<?= base_url('Penerimaanbarcab/updatePenerimaan/' . $penerimaan->id_pengirimankekp) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            DETAIL PENERIMAAN BARANG CABANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_penerimaan">Tanggal Penerimaan</label>
                        <input required type="date" name="tgl_penerimaan" id="tgl_penerimaan" value="<?php echo $penerimaan->tanggal_penerimaan; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_dikirim">Tanggal Dikirim</label>
                        <input readonly type="date" name="tgl_dikirim" id="tgl_dikirim" value="<?php echo $penerimaan->tanggal_pengiriman; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="uk_send">Uker Pengirim</label>
                        <select readonly class="form-control id_uker" name="id_uker" style="width: 100%;" id="id_uker" required>
                            <option value="">-- Pilih Unit Kerja --</option>
                            <?php foreach ($nama_uker as $val) { ?>
                                <option <?= $penerimaan->pengiriman_created_by == $val->id_uker ? 'selected' : '' ?> value="<?php echo $val->id_uker ?>"><?= $val->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="ekspedisi">Ekspedisi</label>
                        <select readonly class="form-control id_ekpedisi" name="id_ekpedisi" style="width: 100%;" id="id_ekpedisi" required>
                            <option value="">-- Pilih Unit Kerja --</option>
                            <?php foreach ($nama_ekpedisi as $val) { ?>
                                <option <?= $penerimaan->id_ekpedisi == $val->id_ekpedisi ? 'selected' : '' ?> value="<?php echo $val->id_ekpedisi ?>"><?= $val->nama_ekpedisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
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
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Select Item</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th>Kondisi Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ditel = $this->General->fetch_records("v_pengirimankekp", ['id_pengirimankekp' => $penerimaan->id_pengirimankekp]);
                                if ($ditel) {
                                    foreach ($ditel as $value) {
                                        $no = 1;
                                ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><input type="hidden" value="<?php echo $value->no_urut; ?>" name="no_urut[]"> <?php echo $value->nama_barang; ?></td>
                                            <td><input type="hidden" value="<?php echo $value->no_sn; ?>" name="no_sn[]"><?php echo $value->no_sn; ?></td>
                                            <td><input type="hidden" value="<?php echo $value->harga_barang; ?>" name="harga_barang[]"><?php echo $value->harga_barang; ?></td>
                                            <?php if ($value->status_perbaikan == 0 || $value->status_perbaikan == 2) { ?>
                                                <td><?php echo labelWarna("danger", "Barang tidak lolos QC"); ?></td>
                                            <?php } else { ?>
                                                <td><input type="hidden" value="<?php echo $value->status_perbaikan; ?>" name="status_perbaikan[]"><input type="hidden" value="<?php echo $value->kondisi_barang; ?>" name="kondisi_barang[]"><?php echo $value->kondisi_barang == 0 ? labelWarna("danger", "Rusak") : labelWarna("success", "Bagus"); ?></td>
                                            <?php } ?>
                                        </tr>
                                        <!-- <tr>
                                    <td>1</td>
                                    <td>LCD 1500 - 15 INCH</td>
                                    <td>SN1374</td>
                                    <td><?= rupiah(152188) ?></td>
                                    <td>Rusak</td>
                                    <td>
                                        <input type="checkbox" checked disabled name="check[]">
                                    </td>
                                </tr> -->
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row text-center">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-success btn-sm" value="Terima">
                            <a href="<?= base_url("Penerimaanbarcab") ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>