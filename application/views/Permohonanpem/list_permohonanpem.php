<div class="box">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST PERMOHONAN PEMBAYARAN PEMBELIAN BARANG

                | <a href='#formPermohonanPem' data-toggle='modal' class='btn btn-info btn-sm'>
                    Add New Payment <i class="fa fa-plus"></i>
                </a>
            </header>

            <div class="panel-body">
                <table id="tablePermohonanPem" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr>
                            <th>No</th>
                            <th>No. Invoice</th>
                            <th>No. Permohonan Pembayaran</th>
                            <th>No. PO</th>
                            <th>Tanggal PO</th>
                            <th>Tanggal Invoice</th>
                            <th>Unit Kerja</th>
                            <th>Nama Vendor</th>
                            <th>Jenis Pembayaran</th>
                            <th>Tempo Pembayaran</th>
                            <th>Subtotal</th>
                            <th>Nilai Pajak</th>
                            <th>Total</th>
                            <th>Status PO</th>
                            <th>Approvel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>

                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div id="formPermohonanPem" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="addPermohonanPem" action="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Permohonan Pembayaran Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_permohonan_pem" id="id_permohonan_pem">
                    <input type="hidden" name="id_permohonan_pem_old" id="id_permohonan_pem_old">

                    <div class='form-group'>
                        <label for="no_permohonan_pembayaran" class='control-label'>No Permohonan Pembayaran</label>
                        <input type='text' value="<?php echo $autoNo; ?>" name="no_permohonan_pembayaran" id="no_permohonan_pembayaran" class='form-control no_permohonan_pembayaran' style="color: red;" readonly />
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>No Invoice</label>
                        <select name="id_reg_inv" id="id_reg_inv" class="form-control id_reg_inv" onchange="cariDetailNoInvoice(this.value)" required>
                            <option value="">--Pilih No Invoice--</option>
                            <?php foreach ($noInvoice as $val) { ?>
                                <option value="<?= $val->id_invoice ?>"><?= $val->no_invoice ?></option>
                            <?php } ?>
                        </select>
                        <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                    </div>

                    <div class='form-group'>
                        <label for="no_po" class='control-label'>No Purchase Order</label>
                        <input type='text' name="no_po" id="no_po" readonly class='form-control no_po' />
                    </div>
                    <div class='form-group'>
                        <label for="tanggal_po" class='control-label'>Tanggal PO</label>
                        <input type='date' name="tanggal_po" id="tanggal_po" readonly class='form-control tanggal_po' />
                    </div>
                    <div class='form-group'>
                        <label for="tanggal_invoice" class='control-label'>Tanggal Invoice</label>
                        <input type='date' name="tanggal_invoice" id="tanggal_invoice" readonly class='form-control tanggal_invoice' />
                    </div>
                    <div class="form-group">
                        <label for="id_uker">Unit Kerja</label>
                        <select name="id_uker" id="id_uker" class="form-control select2" style="width: 100%;" disabled>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $u) { ?>
                                <option value="<?= $u->id_uker ?>"><?php echo $u->kode_uker . " |" . $u->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_vendor">Vendor</label>
                        <select name="id_vendor" id="id_vendor" class="form-control select2" style="width: 100%;" disabled>
                            <option value="">--Pilih Vendor--</option>
                            <?php foreach ($vendor as $v) { ?>
                                <option value="<?= $v->id_vendor ?>"><?php echo $v->nama_vendor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control select2" style="width: 100%;" disabled>
                            <option value="">-- Pilih Jenis Pembayaran --</option>
                            <option value="Full">Full</option>
                            <option value="Termin">Termin</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tempo Pembayaran</label>
                        <input type='number' name="tempo_pembayaran" id="tempo_pembayaran" class='form-control' disabled />
                    </div>
                    <div class='form-group'>
                        <label for='subtotal' class='control-label'>Subtotal</label>
                        <input type='text' name="subtotal" required class='form-control' id='subtotal' readonly />
                    </div>
                    <div class='form-group'>
                        <label for='subtotal_ppn' class='control-label'>Nilai Pajak</label>
                        <input type='text' name="subtotal_ppn" required class='form-control' id='subtotal_ppn' readonly />
                    </div>
                    <div class='form-group'>
                        <label for='grand_total' class='control-label'>Total</label>
                        <input type='text' name="grand_total" required class='form-control' id='grand_total' readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="submit" type="submit" value="Submit" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for ADD ends-->

<!--Modal for EDIT -->
<div id="formPermohonanPem2" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" class="form-horizontal group-border hover-stripped" action="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Permohonan Pembayaran Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_permohonan_pem2" id="id_permohonan_pem2">
                    <input type="hidden" name="id_po" id="id_po">
                    <!-- <input type="hidden" name="id_permohonan_pem_old" id="id_permohonan_pem_old"> -->

                    <div class='form-group'>
                        <label for="no_permohonan_pembayaran" class='control-label'>No Permohonan Pembayaran</label>
                        <input type='text' value="<?php echo $autoNo; ?>" name="no_permohonan_pembayaran2" id="no_permohonan_pembayaran2" class='form-control' style="color: red;" readonly />
                    </div>

                    <div class='form-group'>
                        <label class='control-label'>No Invoice</label>
                        <select name="id_reg_inv2" id="id_reg_inv2" class="form-control id_reg_inv2" onchange="cariDetailNoInvoice(this.value)" required>
                            <option value="">--Pilih No Invoice--</option>
                            <?php foreach ($noInvoice as $val) { ?>
                                <option value="<?= $val->id_invoice ?>"><?= $val->no_invoice ?></option>
                            <?php } ?>
                        </select>
                        <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                    </div>

                    <div class='form-group'>
                        <label for="no_po" class='control-label'>No Purchase Order</label>
                        <input type='text' name="no_po2" id="no_po2" readonly class='form-control no_po2' />
                    </div>
                    <div class='form-group'>
                        <label for="tanggal_po2" class='control-label'>Tanggal PO</label>
                        <input type='date' name="tanggal_po2" id="tanggal_po2" readonly class='form-control tanggal_po2' />
                    </div>
                    <div class='form-group'>
                        <label for="tanggal_invoice2" class='control-label'>Tanggal Invoice</label>
                        <input type='date' name="tanggal_invoice2" id="tanggal_invoice2" readonly class='form-control tanggal_invoice2' />
                    </div>
                    <div class="form-group">
                        <label for="id_uker2">Unit Kerja</label>
                        <select name="id_uker2" id="id_uker2" class="form-control select2" style="width: 100%;" disabled>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $u) { ?>
                                <option value="<?= $u->id_uker ?>"><?php echo $u->kode_uker . " |" . $u->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_vendor2">Vendor</label>
                        <select name="id_vendor2" id="id_vendor2" class="form-control select2" style="width: 100%;" disabled>
                            <option value="">--Pilih Vendor--</option>
                            <?php foreach ($vendor as $v) { ?>
                                <option value="<?= $v->id_vendor ?>"><?php echo $v->nama_vendor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pembayaran2">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran2" id="jenis_pembayaran2" class="form-control select2" style="width: 100%;" disabled>
                            <option value="full">Full</option>
                            <option value="termin">Termin</option>
                        </select>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tempo Pembayaran</label>
                        <input type='number' name="tempo_pembayaran2" id="tempo_pembayaran2" class='form-control' disabled />
                    </div>
                    <div class='form-group'>
                        <label for='subtotal2' class='control-label'>Subtotal</label>
                        <input type='text' name="subtotal2" required class='form-control' id='subtotal2' readonly />
                    </div>
                    <div class='form-group'>
                        <label for='subtotal_ppn2' class='control-label'>Nilai Pajak</label>
                        <input type='text' name="subtotal_ppn2" required class='form-control' id='subtotal_ppn2' readonly />
                    </div>
                    <div class='form-group'>
                        <label for='grand_total2' class='control-label'>Total</label>
                        <input type='text' name="grand_total2" required class='form-control' id='grand_total2' readonly />
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    $get_session = [];
                    $get_session = $this->session->userdata("user_login");
                    if ($get_session['id_sgroup'] == '2' || $get_session['id_sgroup'] == '8') {
                    ?>
                        <input type="submit" value="Verifikasi" class="btn btn-success btn-sm">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <?php
                    } else {
                    ?>
                        <input type="submit" value="Save" class="btn btn-warning btn-sm">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for EDIT ends-->

<script>
    const urlPermohonanpem = '<?= site_url("Permohonanpem/") ?>';
    const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePermohonanPem')) {
            table = $('#tablePermohonanPem').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlPermohonanpem + "listPermohonanpem",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }


        // $('#addPermohonanPem').on('click', function(e) {
        //     e.preventDefault();
        //     $('#id_permohonan_pem').val("");
        //     $('#no_urut').val("").trigger('change');
        //     $('#id_uker').val("").trigger('change');
        //     $('#formPermohonanPem').modal('show');
        // });
    });

    function cariDetailNoInvoice(value) {
        $.ajax({
            type: "POST",
            url: urlCustomfunction + "cariInvoicePermohonanPembayaran",
            data: {
                id_reg_inv: value
            },
            dataType: "JSON",
            success: function(response) {
                $('#no_po').val(response.no_po);
                $('#tanggal_po').val(response.tanggal_po);
                $('#tanggal_invoice').val(response.tanggal_invoice);
                $('#subtotal').val(response.subtotal);
                $('#subtotal_ppn').val(response.subtotal_ppn);
                $('#grand_total').val(response.grand_total);
                $('#id_uker').val(response.id_uker).trigger('change');
                $('#id_vendor').val(response.id_vendor).trigger('change');
                $('#jenis_pembayaran').val(response.jenis_pembayaran).trigger('change');
                $('#tempo_pembayaran').val(response.jtempo_pembayaran);
            }
        });
    }

    $("#addPermohonanPem").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlPermohonanpem + 'addPermohonanPem',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#formPermohonanPem').modal('hide');
                });
            },
        });
    });

    $("#editForm").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlPermohonanpem + 'savePermohonanPem',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#formPermohonanPem2').modal('hide');
                });
            },
        });
    });


    $('body').on('shown.bs.modal', '.modal', function() {
        $(this).find('select').each(function() {
            var dropdownParent = $(document.body);
            if ($(this).parents('.modal.in:first').length !== 0)
                dropdownParent = $(this).parents('.modal.in:first');
            $(this).select2({
                dropdownParent: dropdownParent
            });
        });
    });


    function VPermohonanPem(id_permohonan_pem) {
        $.ajax({
            url: urlPermohonanpem + 'viewPermohonanpem/' + id_permohonan_pem,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_permohonan_pem2').val(response[0].id_permohonan_pem);
                $('#no_permohonan_pembayaran2').val(response[0].no_permohonan_pem);
                $('#id_reg_inv2').val(response[0].id_invoice).trigger('change');
                $('#no_po2').val(response[0].no_po);
                $('#tanggal_po2').val(response[0].tanggal_po);
                $('#tanggal_invoice2').val(response[0].tanggal_invoice);
                $('#id_uker2').val(response[0].id_uker).trigger('change');
                $('#id_vendor2').val(response[0].id_vendor).trigger('change');
                $('#jenis_pembayaran2').val(response[0].jenis_pembayaran);
                $('#tempo_pembayaran2').val(response[0].jtempo_pembayaran);
                $('#subtotal2').val(response[0].subtotal);
                $('#subtotal_ppn2').val(response[0].subtotal_ppn);
                $('#grand_total2').val(response[0].grand_total);
                $('#id_po').val(response[0].id_po);
                $('#formPermohonanPem2').modal('show');
            }
        });
    }

    function deletePermohonanpem(id_permohonan_pem) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: {
                        id_permohonan_pem: id_permohonan_pem
                    },
                    url: urlPermohonanpem + "deletePermohonanPem",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire("Data gagal di delete!", "", "error");
                        }
                    },
                });
            }
        });
    }
</script>