<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                UPDATE PROFILE
            </header>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="<?= base_url('User/saveProfile/' . isset($user->id_user)) ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="custom-file">
                                        <p class="text-center">Photo Pegawai</p>
                                        <?php if (isset($user->photo)) { ?>
                                            <input type=file name="file" class="dropify" data-allowed-file-extensions="png jpg jpeg" data-default-file="<?= base_url('assets/img/pegawai/' . $user->photo) ?>">
                                        <?php } else { ?>
                                            <input type=file name="file" class="dropify" data-allowed-file-extensions="png jpg jpeg">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label for='id_uker' class='control-label'>Unit Kerja</label>
                                                <select name="id_uker" id="id_uker" class="form-control" required>
                                                    <option value="">Select Unit Kerja</option>
                                                    <?php if (isset($user->id_uker)) {
                                                        foreach ($uker as $uk) {
                                                    ?>
                                                            <option <?= $user->id_uker == $uk->id_uker ? 'selected' : '' ?> value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?></option>
                                                        <?php }
                                                    } else { ?>
                                                        <option value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label for='nama' class='control-label'>Nama Pegawai</label>
                                                <input type='text' name="nama" required class='form-control' id='nama' value="<?= isset($user->nama_pegawai) ? $user->nama_pegawai : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label for='jk' class='control-label'>Jenis Kelamin</label>
                                                <select name="jk" id="jk" class="form-control" required>
                                                    <option value="">Select Jenis Kelamin</option>
                                                    <?php if (isset($user->jk)) { ?>
                                                        <option <?= $user->jk == 'L' ? 'selected' : '' ?> value="L">Laki - Laki</option>
                                                        <option <?= $user->jk == 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
                                                    <?php } else { ?>
                                                        <option value="L">Laki - Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label for='telp' class='control-label'>Telepon</label>
                                                <input type='number' name="telp" required class='form-control' id='telp' value="<?= isset($user->telp) ? $user->telp : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label for='email' class='control-label'>Email</label>
                                                <input type='email' name="email" required class='form-control' id='email' value="<?= isset($user->email) ? $user->email : '' ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label for='username' class='control-label'>Username</label>
                                                <input type='text' name="username" required class='form-control' id='username' value="<?= isset($user->username) ? $user->username : '' ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label for='password' class='control-label'>Password</label>
                                                <input type='password' name="password" class='form-control' id='password' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class='form-group'>
                                                <label for='alamat' class='col-lg-1 col-sm-1 control-label'>Alamat</label>
                                                <textarea name="alamat" id="alamat" rows="10" class="form-control"><?= isset($user->alamat_pegawai) ? $user->alamat_pegawai : '' ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Simpan" class="btn btn-primary btn-sm btn-lg btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    $(function() {
        $(".dropify").dropify();
    })
</script>