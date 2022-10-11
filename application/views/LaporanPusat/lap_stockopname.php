<div class="box">
    <form action="<?= base_url('LapStockOpname/downloadExcel') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN STOCK OPNAME SPAREPART & MATERIAL</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <!-- <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" id="periodeawal" name="periodeawal" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" id="periodeakhir" name="periodeakhir" class="form-control">
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-3" style="margin-bottom: 20px;">
                    <div>
                        <button type="submit" id="filterbarnofix" class="btn btn-success btn-sm">Download Laporan</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="tablenofix" class="table table-bordered table-hover dataTable" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th rowspan="2" style="vertical-align : middle;">No</th>
                    <th rowspan="2" colspan="2" style="vertical-align : middle;">Jenis Persediaan</th>
                    <th colspan="3" class="text-center">Opname</th>
                </tr>
                <tr>
                	<th>Gudang (BG PUSAT)</th>
                	<th>Kanca BG Selindo</th>
                	<th>Total</th>
                </tr>
            </thead>
            <!-- PERHITUNGAN -->
            <?php
                // cetak_die($TotalPusat);
            	$Totalbgpusat = rupiah(($TotalPusat[7]->gudang_bg_pusat + $TotalPusat[8]->gudang_bg_pusat + $TotalPusat[6]->gudang_bg_pusat + $QC[0]->QC + $TotalPusat[4]->gudang_bg_pusat + $TotalPusat[5]->gudang_bg_pusat + $TotalPusat[1]->gudang_bg_pusat));
            	$TotalCabHyosung = ($AtmHyosung[0]->hyosung + $AtmCabang[0]->total);
            	$TotalNCR = ($AtmNcr[0]->ncr + $AtmCabang[2]->total);
            	$TotalWincor = ($AtmWincor[0]->wincor + $AtmCabang[3]->total);
            	$TotalAtmGoodPusat = rupiah(($AtmHyosung[0]->hyosung + $AtmNcr[0]->ncr + $AtmWincor[0]->wincor + $TotalPusat[2]->gudang_bg_pusat + $TotalPusat[3]->gudang_bg_pusat + $TotalPusat[9]->gudang_bg_pusat));
            	$TotalAtmGoodCab = rupiah($AtmCabang[0]->total + $AtmCabang[2]->total + $AtmCabang[3]->total);
            	$TotalAtmGoodAll = rupiah(($TotalCabHyosung + $TotalNCR + $TotalWincor + $TotalPusat[2]->gudang_bg_pusat + $TotalPusat[3]->gudang_bg_pusat + $TotalPusat[9]->gudang_bg_pusat ));
            	$totalthermal = ($TotalPusat[6]->gudang_bg_pusat + $ThermalCab[0]->total);
            	$TotalbgpusatAll = rupiah(($TotalPusat[7]->gudang_bg_pusat + $TotalPusat[8]->gudang_bg_pusat + $QC[0]->QC + $TotalPusat[4]->gudang_bg_pusat + $TotalPusat[5]->gudang_bg_pusat + $TotalPusat[1]->gudang_bg_pusat + $totalthermal));
                $Totalbadpartpusat = ($BadPartHyosung[0]->total + $BadPartNCR[0]->total + $BadPartWincore[0]->total + $BadPartCRM[0]->total + $BadPartSSB[0]->total);
            	// cetak_die($TotalAtmGoodAll);

            ?>
            <!-- ------------------------------------------------------------------------------------------------ -->
            <tbody>
                <tr>
                    <td class="bg-primary">1</td>
                    <td colspan="5" class="bg-primary">Material</td>
                    <!-- <td>MONIMAX 9200</td>
                    <td>A12345678</td>
                    <td>A12345678</td> -->
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Perso</td>
                	<td><?= rupiah($TotalPusat[7]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[7]->gudang_bg_pusat) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">PMS-LAN</td>
                	<td><?= rupiah($TotalPusat[8]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[8]->gudang_bg_pusat) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Thermal & Segel</td>
                	<td><?= rupiah($TotalPusat[6]->gudang_bg_pusat) ?></td>
                	<td><?= rupiah($ThermalCab[0]->total) ?></td>
                	<td><?= rupiah($totalthermal) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Perangkat Pengetesan & QC</td>
                	<td><?= rupiah($QC[0]->QC) ?></td>
                	<td>0</td>
                	<td><?= rupiah($QC[0]->QC) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Perangkat Notebook BRILife</td>
                	<td><?= rupiah($TotalPusat[4]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[4]->gudang_bg_pusat) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Perangkat IT EX Project dan Asset</td>
                	<td><?= rupiah($TotalPusat[5]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[5]->gudang_bg_pusat) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">CCTV Pertamina Retail</td>
                	<td><?= rupiah($TotalPusat[1]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[1]->gudang_bg_pusat) ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td colspan="2">Total :</td>
                    <td>
                    	<?php echo $Totalbgpusat ?>
                    </td>
                    <td></td>
                    <td>
                    	<?php echo $TotalbgpusatAll ?> 
                    </td>
                </tr>
                <tr>
                    <td class="bg-primary">2</td>
                    <td colspan="5" class="bg-primary">Sparepart GOOD</td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM Hyosung</td>
                	<td><?= rupiah($AtmHyosung[0]->hyosung) ?></td>
                	<td><?= rupiah($AtmCabang[0]->total) ?></td>
                	<td><?= rupiah($TotalCabHyosung) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM NCR</td>
                	<td><?= rupiah($AtmNcr[0]->ncr) ?></td>
                	<td><?= rupiah($AtmCabang[2]->total) ?></td>
                	<td><?= rupiah($TotalNCR) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM Wincore</td>
                	<td><?= rupiah($AtmWincor[0]->wincor) ?></td>
                	<td><?= rupiah($AtmCabang[3]->total) ?></td>
                	<td><?= rupiah($TotalWincor) ?></td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">CRM</td>
                	<td><?= rupiah($TotalPusat[2]->gudang_bg_pusat) ?> </td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[2]->gudang_bg_pusat) ?> </td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">Hybrid</td>
                	<td><?= rupiah($TotalPusat[3]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[3]->gudang_bg_pusat) ?> </td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">SSB</td>
                	<td><?= rupiah($TotalPusat[9]->gudang_bg_pusat) ?></td>
                	<td>0</td>
                	<td><?= rupiah($TotalPusat[9]->gudang_bg_pusat) ?> </td>
                </tr>
                <tr>
                    <td> </td>
                    <td colspan="2">Total :</td>
                    <td>
                    	<?php echo $TotalAtmGoodPusat ?>

                    </td>
                    <td><?= $TotalAtmGoodCab ?></td>
                    <td>
                    	<?php echo $TotalAtmGoodAll ?>
                    </td>
                </tr>
                    <td class="bg-primary">3</td>
                    <td colspan="5" class="bg-primary">Sparepart BAD</td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM Hyosung</td>
                	<td><?= rupiah($BadPartHyosung[0]->total) ?></td>
                	<td>0</td>
                	<td>0</td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM NCR</td>
                	<td><?= rupiah($BadPartNCR[0]->total) ?></td>
                	<td>0</td>
                	<td>0</td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">ATM Wincore</td>
                	<td><?= rupiah($BadPartWincore[0]->total) ?></td>
                	<td>0</td>
                	<td>0</td>
                </tr>
                <tr>
                	<td> </td>
                	<td colspan="2">CRM</td>
                	<td><?= rupiah($BadPartCRM[0]->total) ?></td>
                	<td>0</td>
                	<td>0</td>
                </tr>
                <tr><!-- 
                	<td> </td>
                	<td colspan="2">Hybrid</td>
                	<td>9999</td>
                	<td>9999</td>
                	<td>9999</td>
                </tr> -->
                <tr>
                	<td> </td>
                	<td colspan="2">SSB</td>
                	<td><?= rupiah($BadPartSSB[0]->total) ?></td>
                	<td>0</td>
                	<td>0</td>
                </tr>
                <tr>
                    <td> </td>
                    <td colspan="2">Total :</td>
                    <td><?= rupiah($Totalbadpartpusat) ?></td>
                    <td>0</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    // let table;

    // $(function() {
    //     if (!$.fn.DataTable.isDataTable('#tablenofix')) {
    //         table = $('#tablenofix').DataTable({
    //             responsive: true,
    //             processing: true,
    //             serverSide: true,
    //             order: [],
    //             scrollX: true,
    //             dom: 'Bfrtip',
    //             buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //             ajax: {
    //                 url: urlLaporanpusat + "listPenghapusbukbar",
    //                 type: "POST"
    //             },
    //             columnDefs: [{
    //                 targets: [0, -1],
    //                 orderable: false,
    //                 className: "text-center",
    //             }, ],
    //         });
    //     }
    // });

    // $(function() {
    //     $('.select2').select2();
    // })

    // $('#filterbarnofix').on('click', function(e) {
    //     e.preventDefault();

    //     let periodeawal = $('#periodeawal').val();
    //     let periodeakhir = $('#periodeakhir').val();

    //     let table = $('#tablenofix').DataTable({
    //         processing: true,
    //         responsive: true,
    //         serverSide: true,
    //         destroy: true,
    //         order: [],
    //         scrollX: true,
    //         columnDefs: [{
    //             targets: [0, -1],
    //             orderable: false,
    //         }, ],
    //         ajax: {
    //             type: "POST",
    //             url: urlLaporanpusat + "filterbarnofix",
    //             data: {
    //                 periodeawal: periodeawal,
    //                 periodeakhir: periodeakhir,


    //             },
    //             dataType: "JSON"
    //         },
    //     });
    // })
</script>