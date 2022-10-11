<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER MONITORING PEMBAYARAN</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Awal</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label " for="sbuku">Status Pembukuan</label>
                        <select name="sbuku" id="sbuku" class="form-control">
                            <option value="All">--All Status--</option>
                            <option value="Sudah">Sudah dibuku</option>
                            <option value="Belum">Belum dibuku</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label " for="spo">Status PO</label>
                        <select name="spo" id="spo" class="form-control">
                            <option value="All">--All Status--</option>
                            <option value="open">Open</option>
                            <option value="close">Close</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST MONITORING PEMBAYARAN</h3>
    </div>
    <div class="box-body">
        <div class="table table-responsive">
            <table id="tablePurchaseorder" class="table table-bordered table-hover" style="width: 100%;">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <th>No. Invoice</th>
                        <th>No. Permohonan Pembayaran</th>
                        <th>No. PO</th>
                        <th>Tanggal PO</th>
                        <th>Tanggal Jatuh Tempo Pembayaran</th>
                        <th>Nama Vendor</th>
                        <th>Jenis Pembayaran</th>
                        <th>Tempo Pembayaran</th>
                        <th>Subtotal</th>
                        <th>Nilai Pajak</th>
                        <th>Total</th>
                        <th>Status PO</th>
                        <th>Status Bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>001</td>
                        <td>B0001/CHM/PGD/PSD/IV/2021</td>
                        <td>PO03</td>
                        <td><?= date('Y-m-d') ?></td>
                        <td>2021-05-10</td>
                        <td>ACE HARDWARE</td>
                        <td>Full</td>
                        <td><?= rand(1, 31) ?> Hari</td>
                        <td>Rp.248.133,00</td>
                        <td>Rp.1.840,00</td>
                        <td>Rp.246.293,00</td>
                        <td><?= labelWarna("success", "Open") ?></td>
                        <td><?= labelWarna("success", "Sudah dibayar") ?></td>
                        <td><?= labelWarna("success", "Sudah dibuku") ?></td>
                        <td>
                            <a href='<?= base_url('Monpembayaran/detailMonpembayaran') ?>' class='btn btn-primary btn-sm'>
                                <li class="fa fa-eye"></li>
                            </a>
                        </td>
                    </tr> -->
                </tbody>
                <tfoot>
                    <!-- <tr>
                        <td colspan="9">Total :</td>
                        <td>Rp.248.133,00</td>
                        <td>Rp.1.840,00</td>
                        <td>Rp.246.293,00</td>
                    </tr> -->
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    const urlMonpembayaran = '<?= site_url("Monpembayaran/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePurchaseorder')) {
            table = $('#tablePurchaseorder').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlMonpembayaran + "listPermohonanpem",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });
</script>