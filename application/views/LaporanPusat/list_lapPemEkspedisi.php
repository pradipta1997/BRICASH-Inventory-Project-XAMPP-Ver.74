<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST LAPORAN PEMBAYARAN EKSPEDISI
                <!-- <span <?php echo $My_Controller->savePermission; ?>>
                    | <a href='#addRegInvEkspedisi' data-toggle='modal' class='btn btn-info'> Add New <i class="fa fa-plus"></i></a>
                </span> -->
            </header>
            <?php if ($this->session->flashdata('msg'))
                echo $this->session->flashdata('msg');
            ?>
            <div class="panel-body">
                <table class="table table-bordered table-hover" style="width: 100%;" id="tableLapPemEkspedisi">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Tanggal Invoice</th>
                            <th>Periode</th>
                            <th>Vendor</th>
                            <th>Nilai Invoice</th>
                            <th>Status Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-center" style="float: center;">Grand Total : </td>
                            <td><?= rupiah($grandTotal[0]->GrandTotal) ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div class="modal fade" id="addRegInvEkspedisi" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('RegInvoice/saveRegInvoice') ?>" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add Invoice</h4>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='nama_penerima' class='col-lg-3 col-sm-3 control-label'>Nama Penerima</label>
                        <div class='col-lg-9'>
                            <input type='text' name="nama_penerima" required class='form-control' id='nama_penerima' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='tgl_diterima_invoice' class='col-lg-3 col-sm-3 control-label'>Tanggal Diterima Invoice</label>
                        <div class='col-lg-9'>
                            <input type='date' name="tgl_diterima_invoice" required class='form-control' value="<?= date('Y-m-d') ?>" id='tgl_diterima_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='id_vendor' class='col-lg-3 col-sm-3 control-label'>Nama Vendor</label>
                        <div class='col-lg-9'>
                            <select name="id_vendor" id="id_vendor" onclick="cariAlamatVendor(this.value)" class="form-control">
                                <option value="">Pilih Vendor</option>
                                <?php foreach ($vendor as $vd) { ?>
                                    <option value="<?= $vd->id_vendor ?>"><?= $vd->nama_vendor ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='alamat_vendor' class='col-lg-3 col-sm-3 control-label'>Alamat Vendor</label>
                        <div class='col-lg-9'>
                            <textarea readonly name="alamat_vendor" id="alamat_vendor" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='id_po' class='col-lg-3 col-sm-3 control-label'>No PO</label>
                        <div class='col-lg-9'>
                            <select name="id_po" id="id_po" class="form-control">
                                <?php foreach ($po as $pad) { ?>
                                    <option value="<?= $pad->id_po ?>"><?= $pad->no_po ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='no_invoice' class='col-lg-3 col-sm-3 control-label'>No Invoice</label>
                        <div class='col-lg-9'>
                            <input type='text' name="no_invoice" required class='form-control' id='no_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='tgl_invoice' class='col-lg-3 col-sm-3 control-label'>Tanggal Invoice</label>
                        <div class='col-lg-9'>
                            <input type='date' name="tgl_invoice" required class='form-control' value="<?= date('Y-m-d') ?>" id='tgl_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='nilai_invoice' class='col-lg-3 col-sm-3 control-label'>Nilai Invoice</label>
                        <div class='col-lg-9'>
                            <input type='number' name="nilai_invoice" required class='form-control' id='nilai_invoice' />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for ADD ends-->

<!--Modal for EDIT -->
<div class="modal fade" id="editRegInv" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('RegInvoice/editRegInvoice') ?>" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Invoice</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_reg_inv" id="id_reg_inv">
                    <div class='form-group'>
                        <label for='nama_penerima' class='col-lg-3 col-sm-3 control-label'>Nama Penerima</label>
                        <div class='col-lg-9'>
                            <input type='text' name="nama_penerima" required class='form-control' id='nama_penerima' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='tgl_diterima_invoice' class='col-lg-3 col-sm-3 control-label'>Tanggal Diterima Invoice</label>
                        <div class='col-lg-9'>
                            <input type='date' name="tgl_diterima_invoice" required class='form-control' value="<?= date('Y-m-d') ?>" id='tgl_diterima_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='id_vendor' class='col-lg-3 col-sm-3 control-label'>Nama Vendor</label>
                        <div class='col-lg-9'>
                            <select name="id_vendor" id="id_vendor" onclick="cariAlamatVendor(this.value)" class="form-control">
                                <option value="">Pilih Vendor</option>
                                <?php foreach ($vendor as $vd) { ?>
                                    <option value="<?= $vd->id_vendor ?>"><?= $vd->nama_vendor ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='alamat_vendor' class='col-lg-3 col-sm-3 control-label'>Alamat Vendor</label>
                        <div class='col-lg-9'>
                            <textarea readonly name="alamat_vendor" id="alamat_vendor" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='id_po' class='col-lg-3 col-sm-3 control-label'>No PO</label>
                        <div class='col-lg-9'>
                            <select name="id_po" id="id_po" class="form-control">
                                <?php foreach ($po as $ped) { ?>
                                    <option value="<?= $ped->id_po ?>"><?= $ped->no_po ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='no_invoice' class='col-lg-3 col-sm-3 control-label'>No Invoice</label>
                        <div class='col-lg-9'>
                            <input type='text' name="no_invoice" value="001" required class='form-control' id='no_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='tgl_invoice' class='col-lg-3 col-sm-3 control-label'>Tanggal Invoice</label>
                        <div class='col-lg-9'>
                            <input type='date' name="tgl_invoice" required class='form-control' value="<?= date('Y-m-d') ?>" id='tgl_invoice' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='nilai_invoice' class='col-lg-3 col-sm-3 control-label'>Nilai Invoice</label>
                        <div class='col-lg-9'>
                            <input type='number' value="1000000" name="nilai_invoice" required class='form-control' id='nilai_invoice' />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for EDIT ends-->

<script>
    const urlLapPemEkspedisi = '<?= site_url("Laporanpusat/") ?>';

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableLapPemEkspedisi')) {
            table = $('#tableLapPemEkspedisi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLapPemEkspedisi + "listLapPemEkspedisi",
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