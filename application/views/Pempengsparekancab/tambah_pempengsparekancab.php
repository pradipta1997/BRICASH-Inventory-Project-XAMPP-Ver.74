<form action="<?= base_url('Pempengsparekancab/savePempengsparekancab') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Nama Uker</label>
                        <select class="form-control select2" name="id_uker" style="width: 100%;" id="id_uker" required title="Pilih Nama Unit Kerja">
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $value) { ?>
                                <option value="<?= $value->id_uker ?>"><?= $value->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_pemakaian">Tanggal Pemakaian</label>
                        <input type="date" name="tgl_pemakaian" id="tgl_pemakaian" value="<?= date('Y-m-d') ?>" class="form-control" title="Pilih Tanggal">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_pembukuan">Tanggal Pembukuan</label>
                        <input type="date" name="tgl_pembukuan" id="tgl_pembukuan" value="<?= date('Y-m-d') ?>" class="form-control" title="Pilih Tanggal">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_voucher">No Voucher</label>
                        <input type="text" name="no_voucher" id="no_voucher" class="form-control" title="Masukan No Voucher">
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
                        <table id="detailPembukuan" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Group Barang</th>
                                    <th>Subgroup Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th style="width: 5%;">Buku?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>
                                        <?php foreach ($dataDetail as $value) { ?>
                                            <option value="<?= $value->no_urut ?>"><?= $value->no_urut ?></option>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php foreach ($dataDetail as $value) { ?>
                                            <option value="<?= $value->no_urut ?>"><?= $value->nama_gbarang ?></option>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php foreach ($dataDetail as $value) { ?>
                                            <option value="<?= $value->no_urut ?>"><?= $value->nama_sgbarang ?></option>
                                        <?php } ?>
                                    </td>
                                    <td>BELT 517</td>
                                    <td>NCR</td>
                                    <td>NCR S55</td>
                                    <td><?= "SN" . rand(1, 1000) ?></td>
                                    <td>15000</td>
                                    <td class="text-center"><input type="checkbox" name="buku"></td>
                                </tr> -->
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


    <script>
        $(function() {
            const urlPempengsparekancab = '<?= site_url("Pempengsparekancab/") ?>';
            let table;

            if (!$.fn.DataTable.isDataTable('#detailPembukuan')) {
                table = $('#detailPembukuan').DataTable({
                    responsive: true,
                    processing: false,
                    serverSide: true,
                    order: [],
                    scrollX: true,
                    ajax: {
                        url: urlPempengsparekancab + "listPempengsparekancab_Det",
                        type: "POST"
                    },
                    columnDefs: [{
                        targets: [0, -1],
                        orderable: false,
                        className: "text-center",
                    }, ],
                });
            }
        });
    </script>