<form action="<?= base_url('Penerimaanbarven/updateDo/' . $do->id_po . "/" . $do->id_do) ?>" class="small" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            LAPORAN DELIVERY ORDER
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>No. Purchase Order</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->no_po ?></td>
                        </tr>
                        <tr>
                            <td>No. DO</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->no_do ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal DO</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->tgl_do ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->tgl_kirim ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Tanggal Terima</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->tgl_terima ?></td>
                        </tr>
                        <tr>
                            <td>Nama Pengirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->nama_pengirim ?></td>
                        </tr>
                        <tr>
                            <td>Telepon Pengirim</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->telp_pengirim ?></td>
                        </tr>
                        <tr>
                            <td>Nama Penerima</td>
                            <td style="width: 2%;" class="text-center">:</td>
                            <td><?= $do->nama_penerima ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" width="100%">
                        <tr>
                            <td>Keterangan</td>
                        </tr>
                        <tr>
                            <td><?php echo $do->keterangan; ?></td>
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
                                    $doDet = $this->General->getRow('v_dodet', ["id_do" => $do->id_do, "no_urut" => $pd->no_urut]);
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
                                        <?= $doDet->kode_barang . " | " . $doDet->nama_barang ?>
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
                            <a id="printPageButton" href="<?= base_url('Penerimaanbarven/detailListpenbarven/' . $do->id_po) ?>" class="btn btn-warning btn-sm">Kembali</a>
                            <a id="printPageButton" onclick="printPO()" class="btn btn-primary btn-sm">Print</a>
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

    function printPO(){
        content = document.getElementsByName('row');
        console.log(content);
        window.print(content);
    }
</script>