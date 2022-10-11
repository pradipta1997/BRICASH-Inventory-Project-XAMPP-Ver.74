<div class="box">
    <div class="box-header">
        <?php $nopo = $this->General->fetch_CoustomQuery("SELECT * FROM v_pohead WHERE id_po = ".$id_po.""); ?>
        <h3 class="box-title">No PO. <?php echo $nopo[0]->no_po; ?></h3>
        <hr>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead class="bg-primary">
                    <th>Tanggal PO</th>
                    <th>Project</th>
                    <th>Vendor</th>
                    <th>Info Harga</th>
                    <th>Pesan</th>
                    <th>Terima</th>
                    <th>Remark</th>
                </thead>
                <tbody>
                    <tr>
                        <?php                
                            $jumlah = $this->General->fetch_CoustomQuery("SELECT SUM(qty) AS pesan FROM tbl_po_det WHERE id_po = $id_po");
                            $terima = $this->General->fetch_CoustomQuery("SELECT SUM(qty) AS terima FROM v_terimado WHERE id_po = $id_po");
                        ?>
                        <td><?= $nopo[0]->tanggal_po ?></td>
                        <td><?= $nopo[0]->nama_project ?></td>
                        <td><?= $nopo[0]->nama_vendor ?></td>
                        <td><?= "Subtotal : ".$nopo[0]->subtotal."<br>Subtotal PPN : ".$nopo[0]->subtotal_ppn."<br>Total : ".$nopo[0]->grand_total ?></td>
                        <td><?= $jumlah[0]->pesan ?></td>
                        <td><?= $terima[0]->terima ?></td>
                        <td><?= $nopo[0]->catatan_po ?></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="mt-3">
                Detail Purchase Order
                <table class="table table-bordered mt-3">
                    <thead class="bg-primary">
                        <th>Nama Part</th>
                        <th>Spesifikasi</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                    </thead>
                    <tbody>
                    <?php
                        $poDet = $this->General->fetch_records('v_podet', ['id_po' => $id_po]);
                        foreach ($poDet as $pDet) {
                        ?>
                            <tr>
                                <td class="product-list">
                                    <?= $pDet->kode_barang." | ".$pDet->nama_barang ?>
                                </td>
                                <td>
                                    <?= $pDet->keterangan ?>
                                </td>
                                <td>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                        Order
                                    </div>
                                    <div class="col-md-3">
                                        Terima
                                    </div>
                                    <div class="col-md-3">
                                        Sisa
                                    </div>
                                    <div class="col-md-3">
                                        Jumlah :
                                    </div>
                                    <div class="col-md-3">
                                        <?= $pDet->qty ?>
                                    </div>
                                    <div class="col-md-3">
                                        <?php 
                                            $terima = $this->General->fetch_CoustomQuery("SELECT SUM(qty) AS jumlah FROM v_terimado WHERE id_po = $id_po AND no_urut = $pDet->no_urut");
                                            echo $terima[0]->jumlah;
                                         ?>

                                    </div>
                                    <div class="col-md-3">
                                        <?php 
                                        echo $pDet->qty-$terima[0]->jumlah;
                                        ?>
                                    </div>
                                </td>
                                <td>
                                    Unit Price : <?= rupiah($pDet->harga_satuan) ?>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="box-body">
        
    </div>
</div>

<div class="box">
    <div class="box-header">
        <?php $nopo = $this->General->fetch_CoustomQuery("SELECT * FROM v_pohead WHERE id_po = ".$id_po.""); ?>
        <h3 class="box-title">DAFTAR DELIVERY ORDER | <?php echo $nopo[0]->no_po; ?></h3>
    </div>
    <div class="box-body">
        <table id="tableDetailPenerimaanbarven" class="table table-bordered " style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal PO</th>
                    <th>Nomor DO</th>
                    <th>Tanggal DO</th>
                    <th>Tanggal Terima</th>
                    <th>Nama Pengirim</th>
                    <th>Keterangan</th>
                    <th>Status DO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($detailDo as $value) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->tanggal_po ?></td>
                        <td><?= $value->no_do ?></td>
                        <td><?= $value->tgl_do ?></td>
                        <td><?= $value->tgl_terima ?></td>
                        <td><?= $value->nama_pengirim ?></td>
                        <td><?= $value->keterangan ?></td>
                        <td><?= $value->status_do == 1 ? labelWarna('danger', 'Close') : labelWarna('success', 'Open') ?></td>
                        <td>
                            <a onclick="showModalDetailDo(<?php echo $value->id_do ?>)" class="btn btn-primary btn-sm">
                                <i class='fa fa-eye'></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="do-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box">
                <center>Detail Delivery Order</center>
                <hr>
                <table style="width:40%;margin-left:20px;">
                    <tbody>
                        <tr>
                            <td>Nomor PO : <span id="nopo"></span></td>
                        </tr>
                        <tr>
                            <td>Tanggal PO : <span id="tanggalpo"></span></td>
                        </tr>
                        <tr>
                            <td>Nomor DO : <span id="nodo"></span></td>
                        </tr>
                        <tr>
                            <td>Tanggal DO : <span id="tanggaldo"></span></td>
                        </tr>
                        <tr>
                            <td>Tanggal Terima : <span id="tanggalterima"></span></td>
                        </tr>
                        <tr>
                            <td>Pengirim : <span id="pengirim"></span></td>
                        </tr>
                        <tr>
                            <td>Keterangan : <span id="keterangan"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <table class="table table-bordered " id="do-detail-table" style="margin:auto;width:80%;">
                <thead class="bg-primary">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Diterima</th>
                </thead>
                <tbody></tbody>
            </table>
            <div style="margin-top:50px;">
                <center>
                <a class="btn btn-primary btn-sm" id="deliveryorder" href="#">Cetak Laporan Delivery Order</a>
                <a class="btn btn-primary btn-sm" id="pengeluaran" href="#">Cetak Laporan Pengeluaran Barang</a>
                <a class="btn btn-primary btn-sm" id="penerimaan" href="#">Cetak Laporan Penerimaan barang</a><br>
                <a class="btn btn-success btn-sm" id="hasilqc" style="margin-top:20px;" href="#">Cetak Hasil QC</a><br>
                <!-- <button onclick="resetModal()" style="margin-top:20px;" class="btn btn-success btn-sm">Cetak Hasil QC</button><br> -->
                <button onclick="resetModal()" style="margin-top:20px;" class="btn btn-warning btn-sm">Kembali</button>
                </center>
                <br>
            </div>
        </div>
    </div>
</div>

<script>
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';

    $(function() {
        $('#tableDetailPenerimaanbarven').DataTable();
    })

    function showModalDetailDo($id_do) {
        if (!$.fn.DataTable.isDataTable('#do-detail-table')) {
            table = $('#do-detail-table').DataTable({
                retrieve: true,
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                dom: 'lrt',
                order: [],
                ajax: {
                    url: urlLaporanpusat + "listDo_Det/"+$id_do,
                    type: "POST",

                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }else{
            table = $('#do-detail-table').DataTable({
                retrieve: true,
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                dom: 'lrt',
                order: [],
                ajax: {
                    url: urlLaporanpusat + "listDo_Det/"+$id_do,
                    type: "POST",

                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }

        $.ajax({
            url: urlLaporanpusat + 'showModalDoDet/' + $id_do,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#nopo').text(response[0].no_po);
                $('#tanggalpo').text(response[0].tanggal_po);
                $('#nodo').text(response[0].no_do);
                $('#tanggaldo').text(response[0].tgl_do);
                $('#tanggalterima').text(response[0].tgl_terima);
                $('#pengirim').text(response[0].nama_pengirim);
                $('#keterangan').html(response[0].keterangan);
                $('#pengeluaran').attr('href', '<?php echo base_url('Laporanpusat/print_lap_pengeluaran/') ?>'+response[0].id_do);
                $('#penerimaan').attr('href', '<?php echo base_url('Laporanpusat/print_lap_penerimaan/') ?>'+response[0].id_do);
                $('#deliveryorder').attr('href', '<?php echo base_url('Laporanpusat/print_lap_do/') ?>'+response[0].id_do);
                $('#hasilqc').attr('href', '<?php echo base_url('Laporanpusat/print_lap_qc/') ?>'+response[0].id_do);
                // $('#nama_barang').val(response[0].nama_barang);
                // $('#flag_barang').val(response[0].flag_barang);
                // $('#harga_barang').val(response[0].harga_satuan);
                // $('#keterangan').val(response[0].keterangan);
                // $('#tanggal_perbaikan').val(response[0].tanggal_perbaikan);
                $('#do-detail').modal('show');
            }
        });
    }

    function resetModal(){
        $('#do-detail-table').DataTable().clear().destroy();
        $('#do-detail').modal('hide');
    }
</script>