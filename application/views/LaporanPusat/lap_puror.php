<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PURCHASING ORDER</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Tipe Barang</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option value="">--Status--</option>
                            <option value="">Status Aktif</option>
                            <option value="">Status Non-Aktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="tblPO" style="width: 100%;" class="table table-bordered table-hover dataTable">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Nomor PO</th>
                    <th>Tanggal PO</th>
                    <th>Tanggal Persetujuan PO</th>
                    <th>Kontak Person PO</th>
                    <th>Nama Kontak PO</th>
                    <th>Jenis Pembayaran PO</th>
                    <th>Catatan PO</th>
                    <th>Total Harga PO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>Cabang Bekasi</td>
                    <td>AX123</td>
                    <td>09/02/2020</td>
                    <td>07/07/2020</td>
                    <td>082628476638</td>
                    <td>Bella Swan</td>
                    <td>Bekasi</td>
                    <td>Cash</td>
                    <td>--</td>
                    <td>Rp. 200.000</td>
                    <td><a href='<?= base_url('Laporanpusat/detailPurchaseorder') ?>' type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Cabang Cempaka Putih</td>
                    <td>AX111</td>
                    <td>01/01/2020</td>
                    <td>18/08/2020</td>
                    <td>089964738874</td>
                    <td>Erik Jocabeb</td>
                    <td>Cempaka Putih</td>
                    <td>Cash</td>
                    <td>--</td>
                    <td>Rp. 210.000</td>
                    <td><a href='<?= base_url('Laporanpusat/detailPurchaseorder') ?>' type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Cabang Jatipadang</td>
                    <td>AX122</td>
                    <td>22/05/2020</td>
                    <td>06/06/2020</td>
                    <td>083837599984</td>
                    <td>Anatasya</td>
                    <td>Jatipadang</td>
                    <td>Debit</td>
                    <td>--</td>
                    <td>Rp. 150.000</td>
                    <td><a href='<?= base_url('Laporanpusat/detailPurchaseorder') ?>' type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr> -->
            </tbody>
            <tfoot>
                <tr>
                    <td class="" style="float: center;" colspan="9">Grand Total:</td>
                    <td><?= rupiah($totalPO[0]->GrandTotalPO) ?></td>
                    <td></td>
                </tr>


                <!-- <tr>
                    <td colspan="10">Total :</td>
                    <td>Rp. 560.000</td>
                </tr> -->
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlLapPO = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tblPO')) {
            table = $('#tblPO').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLapPO + "listLapPO",
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


    // $(function() {
    //     $('#tbl_po').DataTable({
    //         responsive: true,
    //         processing: true,
    //         // serverSide: true,
    //         order: [],
    //         scrollX: true,
    //         dom: 'Bfrtip',
    //         buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //     });
    // });
</script>