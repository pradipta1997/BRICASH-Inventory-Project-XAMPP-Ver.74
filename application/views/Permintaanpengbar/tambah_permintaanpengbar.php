<form action="<?= base_url('Permintaanpengbar/savePermintaanpengbar') ?>" enctype="multipart/form-data" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="box light bordered">
                <div class="box-body">
                    <div class="clearfix">
                        <div class="col-md-3">
                            <label for="tgl_diminta">Tanggal Permintaan</label>
                            <input type="date" value="<?= date('Y-m-d') ?>" name="tgl_diminta" id="tgl_diminta" class="form-control" required />
                        </div>
                        <div class="col-md-3">
                            <label for="no_permintaan">No Permintaan</label>
                            <input type="text" name="no_permintaan" id="no_permintaan" class="form-control" required />
                        </div>
                        <div class="col-md-3">
                            <label for="alasan_permintaan">Alasan Permintaan</label>
                            <textarea name="alasan_permintaan" id="alasan_permintaan" class="form-control"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="catatan_permintaan">Catatan Permintaan</label>
                            <textarea name="catatan_permintaan" id="catatan_permintaan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-warning">
                <div class="box-body" id="rows-list">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-search"></span></span>
                        <select class="form-control select2" name="id_barang" onchange="return tambahBarang(this.value, '<?= base_url('Permintaanpengbar/permintaanBartran/') ?>'+this.value);" style="width: 100%;">
                            <option value="">Tambah Barang</option>
                            <?php foreach ($barang as $brg) : ?>
                                <option value="<?= $brg->no_urut; ?>"><?= $brg->nama_barang; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <hr>
                    <div style="height:250px;overflow-y:scroll;" id="">
                        <div>
                            <table border="1" style="font-size:11px;border-collapse:collapse;" class="table  table-hover" rules="all">
                                <thead class="bg-primary">
                                    <tr>
                                        <th style="width: 2%;">#</th>
                                        <th>Nama Barang</th>
                                        <th>Quantity</th>
                                        <th><i class="fa fa-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody id="listBarang"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group" style="margin: 10px;">
                    <label for="ijin_prinsip">Ijin Prinsip</label>
                    <input type="file" multiple required name="ijin_prinsip[]" id="ijin_prinsip">

                    <p class="help-block">Harap upload dokument permintaan.</p>
                </div>
            </div>
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm" style="margin: 10px;">Simpan Data</button>
                <a href="<?= base_url('Permintaanpengbar') ?>" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    var total_number = 0;

    $(function() {
        $(".select2").select2();
    })

    function tambahBarang(no_urut, url) {
        total_number++;

        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'no_urut': no_urut,
                'total': total_number,
            },
            dataType: 'html',
            success: function(response) {
                $('#listBarang').append(response);
            }
        });
    }

    function delete_row(entry_number) {
        $("#entry_row_" + entry_number).remove();
        total_number--;
    }
</script>