<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                DATA PEGAWAI
            </header>
            <div class="panel-body">
                <form action="<?= base_url('Pegawai/savePegawai/' . $this->uri->segment(3) . '/' . isset($userpegawai[0]['id_pegawai'])) ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="custom-file">
                                <p class="text-center">Photo Pegawai</p>
                                <?php if (isset($userpegawai[0]['photo'])) { ?>
                                    <input type=file name="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?= base_url('assets/img/pegawai/' . $userpegawai[0]['photo']) ?>">
                                <?php } else { ?>
                                    <input type=file name="file" class="dropify" data-allowed-file-extensions="png jpg jpeg">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label for='nama' class='control-label'>Nama Pegawai</label>
                                        <input type='text' name="nama" required class='form-control' id='nama' value="<?= isset($userpegawai[0]['nama_pegawai']) ? $userpegawai[0]['nama_pegawai'] : '' ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label for='jk' class='control-label'>Jenis Kelamin</label>
                                        <select name="jk" id="jk" class="form-control" required>
                                            <option value="">Select Jenis Kelamin</option>
                                            <?php if (isset($userpegawai[0]['jk'])) { ?>
                                                <option <?= $userpegawai[0]['jk'] == 'L' ? 'selected' : '' ?> value="L">Laki - Laki</option>
                                                <option <?= $userpegawai[0]['jk'] == 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
                                            <?php } else { ?>
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label for='telp' class='control-label'>Telepon</label>
                                        <input type='number' name="telp" required class='form-control' id='telp' value="<?= isset($userpegawai[0]['telp']) ? $userpegawai[0]['telp'] : '' ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label for='email' class='control-label'>Email</label>
                                        <input type='email' name="email" required class='form-control' id='email' value="<?= isset($userpegawai[0]['email']) ? $userpegawai[0]['email'] : '' ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class='form-group'>
                                        <label for='alamat' class='col-lg-1 col-sm-1 control-label'>Alamat</label>
                                        <textarea name="alamat" id="alamat" rows="10" class="form-control"><?= isset($userpegawai[0]['alamat_pegawai']) ? $userpegawai[0]['alamat_pegawai'] : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
                        <a href="<?= base_url('User') ?>" class="btn btn-danger btn-sm">Kembali</a>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    $(function() {
        $(".dropify").dropify();
    })
</script>