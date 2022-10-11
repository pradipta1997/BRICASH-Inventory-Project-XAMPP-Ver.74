<form action="<?= base_url('Laporanpsat/detailLappengbar/' . $pengiriman->id_pengiriman) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            Pengiriman Barang
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <legend>Data Pengiriman Barang</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Pengiriman</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->no_pengiriman ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->tanggal_pengiriman ?></td>
                        </tr>
                        <tr>
                            <td>Uker Pengirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td>Pengadaan</td>
                        </tr>
                        <tr>
                            <td>Uker Tujuan</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->nama_uker ?></td>
                        </tr>
                        <tr>
                            <td>Berat Barang</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->berat_barang ?></td>
                        </tr>
                        <tr>
                            <td>No. Resi</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->no_resi ?></td>
                        </tr>
                        <tr>
                            <td>Total Harga</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= rupiah($pengiriman->total_harga) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">
                    <legend>Detail Pengiriman Barang</legend>
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Ekspedisi</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->nama_ekpedisi ?></td>
                        </tr>
                        <tr>
                            <td>Service</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->layanan_ekspedisi ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pengiriman</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->nama_pengirim ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Koli</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $pengiriman->jumlah_koli ?></td>
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
                    <h4 class="panel-title"> Packing / Koli</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th>Koli ke</th>
                                    <th>Berat Koli</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $pengbarDet = $this->General->fetch_records("tbl_pengiriman_barang_det", ['id_pengiriman' => $pengiriman->id_pengiriman]);
                                foreach ($pengbarDet as $pbd) {
                                ?>
                                    <tr>
                                        <td class="product-list">
                                            <select class="form-control input-xlarge" name="no_urut[]" style="width: 100%;" readonly disabled>
                                                <!-- <option>--Pilih Items--</option> -->
                                                <?php foreach ($barang as $value) { ?>
                                                    <option <?= $pbd->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="no_sn[]" class="form-control no_sn" value="<?= $pbd->no_sn ?>" title="Masukan No SN" readonly disabled>
                                        </td>
                                        <td>
                                            <input type="text" name="harga_barang[]" class="form-control harga_barang" value="<?= $pbd->harga_barang ?>" title="Masukan Harga Barang" readonly disabled>
                                        </td>
                                        <td>
                                            <input type="number" name="koli[]" value="<?= $pbd->koli_ke ?>" class="form-control Poqty" readonly disabled>
                                        </td>
                                        <td>
                                            <input type="number" name="berat_koli[]" value="<?= $pbd->berat_koli ?>" class="form-control Pohargasatuan" readonly disabled>
                                        </td>
                                        <td>
                                            <input type="text" name="keterangan[]" value="<?php echo $pbd->keterangan ?>" class="form-control poKet" readonly disabled>
                                        </td>
                                        <!-- <td align="center">
                                            <button data-toggle="modal" data-target="#addData" type="button" id="" class="btn btn-success valid"><i class="fa fa-plus"></i></button>
                                            <button type="button" class="btn btn-danger delete-row">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-print-list" style="margin-left:20%;margin-top:50px;">
                        <a href="<?= base_url('Laporanpusat/print_pengiriman/'.$pengiriman->id_pengiriman) ?>" class="btn btn-small btn-primary">Cetak Laporan Pengeluaran Barang</a>
                        <a href="<?= base_url('Laporanpusat/print_checklist/'.$pengiriman->id_pengiriman) ?>" class="btn btn-small btn-primary">Cetak Check List</a>
                        <a href="<?= base_url('Laporanpusat/print_suratpengantar/'.$pengiriman->id_pengiriman) ?>" class="btn btn-small btn-primary">Cetak Surat Pengantar</a>
                        <a href="<?= base_url('Laporanpusat/print_packlist/'.$pengiriman->id_pengiriman) ?>" class="btn btn-small btn-primary">Cetak Pack List</a>
                    </div>
                    <div class="button-back" style="margin-left:50%;margin-top:50px;">
                        <a href="<?= base_url('Laporanpusat/Lappengbar') ?>" class="btn btn-small btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>