<form action="<?= base_url('Pempengsparekancab/updatePembukuan/' . $gen->id_pertek) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Nama Uker</label>
                        <select class="form-control select2" name="id_uker" style="width: 100%;" id="id_uker" required>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $value) { ?>
                                <option <?= $gen->id_uker == $value->id_uker ? 'selected' : '' ?> value="<?= $value->id_uker ?>"><?= $value->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_pemakaian">Tanggal Pemakaian</label>
                        <input type="date" name="tgl_pemakaian" id="tgl_pemakaian" value="<?= $gen->tanggal_pemenuhan ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_pembukuan">Tanggal Pembukuan</label>
                        <input type="date" name="tanggal_pembukuan" id="tanggal_pembukuan" value="<?= $gen->tanggal_pembukuan ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_voucher">No Voucher</label>
                        <input type="text" name="no_voucher" id="no_voucher" class="form-control" value="<?= $gen->no_voucher ?>" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="file_voucher">Upload Voucher Pembukuan</label>
                        <input type="file" name="file_voucher[]" id="file_voucher" class="form-control">
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
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Group Barang</th>
                                    <th>Subgroup Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th class="text-center">Buku?</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $ditel = $this->General->fetch_records("v_barangbalikteknisi", ['id_pertek' => $gen->id_pertek]);
                                if ($ditel) {
                                    foreach ($ditel as $value) {
                                ?>
                                        <tr>
                                            <td class="product-list">
                                                <select disabled class="form-control nama_gbarang" name="nama_gbarang[]" style="width: 100%;" id="nama_gbarang[]" required>
                                                    <option value="">-- Pilih Group Barang --</option>
                                                    <?php foreach ($gbarang as $val) { ?>
                                                        <option <?= $value->id_gbarang == $val->id_gbarang ? 'selected' : '' ?> value="<?php echo $val->id_gbarang ?>"><?= $val->nama_gbarang ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="form-control nama_sgbarang" name="nama_sgbarang[]" style="width: 100%;" id="nama_sgbarang[]" required>
                                                    <option value="">-- Pilih Sub-Group Barang --</option>
                                                    <?php foreach ($sgbarang as $val) { ?>
                                                        <option <?= $value->id_sgbarang == $val->id_sgbarang ? 'selected' : '' ?> value="<?php echo $val->id_sgbarang ?>"><?= $val->nama_sgbarang ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="form-control nama_barang" name="nama_barang[]" style="width: 100%;" id="nama_barang[]" required>
                                                    <option value="">-- Pilih Barang --</option>
                                                    <?php foreach ($namaBarang as $val) { ?>
                                                        <option <?= $value->no_urut == $val->no_urut ? 'selected' : '' ?> value="<?php echo $val->no_urut ?>"><?= $val->nama_barang ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="form-control merek_barang" name="merek_barang[]" style="width: 100%;" id="merek_barang[]" required>
                                                    <option value="">-- Pilih Merek Barang --</option>
                                                    <?php foreach ($merek as $val) { ?>
                                                        <option <?= $value->id_merek == $val->id_merek ? 'selected' : '' ?> value="<?php echo $val->id_merek ?>"><?= $val->nama_merek ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select disabled class="form-control tipe_barang" name="tipe_barang[]" style="width: 100%;" id="tipe_barang[]" required>
                                                    <option value="">-- Pilih Tipe Barang --</option>
                                                    <?php foreach ($tipeBarang as $val) { ?>
                                                        <option <?= $value->id_tipe_barang == $val->id_tipe_barang ? 'selected' : '' ?> value="<?php echo $val->id_tipe_barang ?>"><?= $val->tipe_barang ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" value="<?php echo $value->no_sn_new ?>" id="no_sn[]" name="no_sn[]" class="form-control Pembukuan_nosn" readonly>
                                            </td>
                                            <td>
                                                <input type="text" value="<?php echo $value->harga_satuan ?>" id="harga_barang[]" name="harga_barang[]" class="form-control Pembukuan_hargabarang" readonly>
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" <?= $value->flag_pembukuan > 0 ? 'checked' : '' ?> id="status_pembukuan[]" name="status_pembukuan[]" class="status_pembukuan" value="1">

                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-center">
                        <input type="submit" value="Buku" class="btn btn-primary">
                        <a href="<?= base_url("Pempengsparekancab") ?>" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('#status_pembukuan').click(function() {
            $(this).val(this.checked ? 1 : 0);
        });

        var id_grupbar = $(this).find(".nama_gbarang").val();
        $("#nama_gbarang").val(id_grupbar);
    });

    $(function() {
        $('.select2').select2();
    })
</script>