<form action="<?= base_url('Penerimaanbarven/updateDo/' . $do->id_po . "/" . $do->id_do) ?>" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT DELIVERY ORDER
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_do">No DO</label>
                        <input type="text" readonly name="no_do" value="<?= $do->no_do ?>" id="no_do" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_do">Tanggal DO</label>
                        <input type="date" name="tgl_do" id="tgl_do" value="<?= $do->tgl_do ?>" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_kirim">Tanggal Kirim</label>
                        <input type="date" name="tgl_kirim" id="tgl_kirim" value="<?= $do->tgl_kirim ?>" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_terima">Tanggal Terima</label>
                        <input type="date" name="tgl_terima" id="tgl_terima" value="<?= $do->tgl_terima ?>" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_pengirim">Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" value="<?= $do->nama_pengirim ?>" id="nama_pengirim" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="telp_pengirim">Telepon Pengirim</label>
                        <input type="text" name="telp_pengirim" value="<?= $do->telp_pengirim ?>" id="telp_pengirim" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_penerima">Nama Penerima</label>
                        <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" value="<?= $do->nama_penerima ?>" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="sandbox">
                        <label for="kethead">Keterangan</label>
                        <textarea name="kethead" class="form-control" id="kethead"><?= $do->keterangan ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG DELIVERY ORDER</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered  table-nowrap" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah PO</th>
                                    <th>Jumlah Terima</th>
                                    <th>Total Terima</th>
                                    <th>Total Barang Bagus</th>
                                    <th>Total Barang Rusak</th>
                                    <th>Total Retur Barang</th>
                                    <th>Sisa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $poDet = $this->General->fetch_records('tbl_po_det', ['id_po' => $do->id_po]);
                                foreach ($poDet as $pd) {
                                    $doDet = $this->General->getRow('tbl_do_detail', ["id_do" => $do->id_do, "no_urut" => $pd->no_urut]);
                                    $dataBar = $this->General->fetch_CoustomQuery("SELECT SUM(qty) as Totalterima, id_do_detail FROM v_dodet WHERE id_po = $do->id_po AND no_urut = $pd->no_urut");

                                    $QtotalBargus = $this->General->fetch_CoustomQuery("SELECT COUNT(id_do_detail) as totalBargus FROM tbl_barang_temp WHERE id_do_detail = " . $dataBar[0]->id_do_detail . " AND no_urut = " . $pd->no_urut . " AND flag_qc = 2");
                                    $QtotalBarsak = $this->General->fetch_CoustomQuery("SELECT COUNT(id_do_detail) as totalBarsak FROM tbl_barang_temp WHERE id_do_detail = " . $dataBar[0]->id_do_detail . " AND no_urut = " . $pd->no_urut . " AND flag_qc = 1");
                                    $QtotalRetur = $this->General->fetch_CoustomQuery("SELECT COUNT(id_do_detail) as totalRetur FROM tbl_barang_temp WHERE id_do_detail = " . $dataBar[0]->id_do_detail . " AND no_urut = " . $pd->no_urut . " AND flag_retur = 1");

                                    if ($QtotalBargus) {
                                        $totalBargus = $QtotalBargus[0]->totalBargus;
                                    } else {
                                        $totalBargus = 0;
                                    }

                                    if ($QtotalBarsak) {
                                        $totalBarsak = $QtotalBarsak[0]->totalBarsak;
                                    } else {
                                        $totalBarsak = 0;
                                    }

                                    if ($QtotalRetur) {
                                        $totalRetur = $QtotalRetur[0]->totalRetur;
                                    } else {
                                        $totalRetur = 0;
                                    }

                                    if ($pd->qty == $totalBargus) {
                                        $readonly = "readonly";
                                    } else {
                                        $readonly = "";
                                    }
                                ?>
                                    <input type="hidden" name="id_do_detail[]" value="<?= $doDet->id_do_detail ?>">
                                    <tr>
                                        <td class="product-list">
                                            <input type="hidden" name="no_urut[]" value="<?= $pd->no_urut ?>">
                                            <select class="form-control" disabled>
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($barang as $value) { ?>
                                                    <option <?= $value->no_urut == $pd->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="totalPo[]" value="<?= $pd->qty ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" readonly name="qty[]" value="<?= $doDet->qty ?>" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="totalQty[]" value="<?= $dataBar[0]->Totalterima ? $dataBar[0]->Totalterima : 0 ?>" readonly value="0" class="form-control">
                                        </td>
                                        <td>
                                            <?php 
                                                if($dataBar[0]->Totalterima){
                                                    $terima = $dataBar[0]->Totalterima;
                                                    $bagus = $terima-$totalBarsak;
                                                    
                                                }else{
                                                    $terima = 0;
                                                    $bagus = 0;
                                                }
                                                $po = $pd->qty;
                                                $sisa = $po-$terima;
                                             ?>
                                            <input type="number" name="totalBargus[]" value="<?= $bagus ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="totalBarsak[]" value="<?= $totalBarsak ?>" readonly class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" name="totalBartur[]" value="<?= $totalRetur ?>" readonly class="form-control totalBartur">
                                        </td>
                                        <td>
                                            <input type="number" name="sisa[]" value="<?= $sisa ?>" readonly class="form-control sisa">
                                        </td>
                                        <td>
                                            <input type="text" readonly name="ketdet[]" value="<?= $doDet->keterangan ?>" class="form-control">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-sm" value="Simpan Data">
                            <a href="<?= base_url('Penerimaanbarven/detailListpenbarven/' . $do->id_po) ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#kethead').summernote({
                height: 200,
            });
        })
    });
</script>