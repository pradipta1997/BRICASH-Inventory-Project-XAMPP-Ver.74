<form action="<?= base_url('Permohonanpem/approvPermohonanpem/' . $permohonan->id_permohonan_pem) ?>" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            LIST APPROVEL PERMOHONAN PEMBAYARAN PEMBELIAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <!-- <legend>Detail Permintaan Barang</legend> -->
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