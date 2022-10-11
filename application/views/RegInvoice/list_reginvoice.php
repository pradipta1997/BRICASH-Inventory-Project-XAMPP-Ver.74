<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="box-header">
                <h3 class="box-title">LIST REGISTRASI INVOICE PEMBELIAN BARANG</h3>
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <a href='#addRegInv' data-toggle='modal' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </a>
                </span>
            </div>
            <?php if ($this->session->flashdata('msg'))
                echo $this->session->flashdata('msg');
            ?>
            <div class="panel-body">
                <table class="table table-bordered table-hover" style="width: 100%;" id="tableInvoice">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Tanggal Invoice</th>
                            <th>No PO</th>
                            <th>No Invoice</th>
                            <th>Nilai Invoice</th>
                            <th>Status Verifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                    <tfoot>
                        <td colspan="4">Total : </td>
                        <td><?= rupiah($totalHarga[0]->GrandTotalHarga) ?></td>
                        <td></td>
                        <td></td>
                    </tfoot>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div id="addRegInv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addRegInv-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="addReginvoice" action="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRegInv-title">Input Registrasi Invoice</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="rows-list">
                        <div class="col-lg-5">
                            <div class='form-group'>
                                <label class='control-label'>Jenis Pembayaran : </label>
                                <input type="radio" name="jenis_bayar" id="jb_full" value="full" required> Full
                                <input type="radio" name="jenis_bayar" id="jb_termin" value="termin" required> Termin
                                <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Purchase Order</label>
                                <select name="id_po" id="id_po" class="form-control id_po" onchange="cariAlamatVendorNew(this.value)" required>
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <?php foreach ($po as $val) { ?>
                                        <option value="<?= $val->id_po ?>"><?= $val->no_po ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Tanggal Invoice</label>
                                <input type='date' name="tgl_invoice" id="tgl_invoice" value="<?= date('Y-m-d') ?>" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Tanggal Terima Invoice</label>
                                <input type='date' name="tgl_terima_invoice" id="tgl_terima_invoice" value="<?= date('Y-m-d') ?>" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Invoice</label>
                                <input type='text' name="no_invoice" id="no_invoice" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nilai Invoice</label>
                                <input type='text' onchange="limit_check(this)" name="nilai_invoice" id="nilai_invoice" required class='form-control nilai_invoice' />
                                <label class='control-label'>Sisa Belum Bayar</label>
                                <input type='text' name="sisa_po" id="sisa_po" required class='form-control sisa_po' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nama Vendor</label>
                                <input type='text' name="nama_vendor" id="nama_vendor" readonly class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Rekening</label>
                                <input type='text' name="no_rekening" id="no_rekening" readonly class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nama Bank</label>
                                <input type='text' name="nama_bank" id="nama_bank" readonly class='form-control' />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class='form-group'>
                                <label class='control-label'>Nama Rekening</label>
                                <input type='text' name="nama_rekening" id="nama_rekening" readonly class='form-control' />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Beban</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td><input type="radio" name="beban" value="overhead" required> Overhead</td>
                                            <td><input type="radio" name="beban" value="project" required> Project</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" style="vertical-align : middle;text-align:left;">Tahap Tagihan</td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">:</td>
                                            <td><input type="radio" name="tahap_tagihan" value="persen" required> ......%</td>
                                            <td><input type="radio" name="tahap_tagihan" value="btb" required> Back to Back</td>
                                        
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="tahap_tagihan" value="lunas" required> Lunas</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Invoice/Kwitansi</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="inv" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Faktur Pajak</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="fakpaj" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Tanda Terima/Surat Jalan/DO</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="ttsjdo" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Copy PO</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="cpo" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Copy IP</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="cip" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Berita Acara</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="berac" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Dokumen Pendukung</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="dokpen" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Lain - Lain</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="ll" value="1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal for ADD ends-->

<!--Modal for EDIT -->
<div class="modal fade" id="formReginekspedisi" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="form" action="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRegInv-title">Edit Registrasi Invoice</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_invoice2" id="id_invoice2">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class='form-group'>
                                <label class='control-label'>Jenis Pembayaran : </label>
                                <input type="radio" id="jb_full2" name="jenis_bayar2" <?php if (isset($jenis_bayar) && $jenis_bayar=="full") echo "checked";?> value="full" required> Full
                                <input type="radio" id="jb_termin2" name="jenis_bayar2" <?php if (isset($jenis_bayar) && $jenis_bayar=="termin") echo "checked";?> value="termin" required> Termin
                                <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Purchase Order</label>
                                <select name="id_po2" id="id_po2" class="form-control id_po2" onchange="cariAlamatVendor(this.value)" required>
                                    <option value="1">--Pilih Purchase No Order--</option>
                                    <?php foreach ($po as $val) { ?>
                                        <option value="<?= $val->id_po ?>"><?= $val->no_po ?></option>
                                    <?php } ?>
                                </select>
                                <!-- <select name="id_po" id="id_po" class="form-control" onclick="cariVendor(this.value)">
                                    <option value="">--Pilih Purchase No Order--</option>
                                    <option value="" selected>00001/CHM/PGD/IV/2021</option>
                                </select> -->
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Tanggal Invoice</label>
                                <input type='date' name="tgl_invoice2" id="tgl_invoice2" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Tanggal Terima Invoice</label>
                                <input type='date' name="tgl_terima_invoice2" id="tgl_terima_invoice2" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Invoice</label>
                                <input type='text' name="no_invoice2" required class='form-control' id='no_invoice2' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nilai Invoice</label>
                                <input type='text' name="nilai_invoice2" id="nilai_invoice2" required class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nama Vendor</label>
                                <input type='text' name="nama_vendor2" id="nama_vendor2" readonly class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>No Rekening</label>
                                <input type='text' name="no_rekening2" id="no_rekening2" readonly class='form-control' />
                            </div>
                            <div class='form-group'>
                                <label class='control-label'>Nama Bank</label>
                                <input type='text' name="nama_bank2" id="nama_bank2" readonly class='form-control' />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class='form-group'>
                                <label class='control-label'>Nama Rekening</label>
                                <input type='text' name="nama_rekening2" id="nama_rekening2" readonly class='form-control' />
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                            <td style="vertical-align : middle;text-align:left;">Beban</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td><input type="radio" name="beban2" id="bb_overhead" value="overhead" required> Overhead</td>
                                            <td><input type="radio" name="beban2" id="bb_project" value="project" required> Project</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2" style="vertical-align : middle;text-align:left;">Tahap Tagihan</td>
                                            <td rowspan="2" style="vertical-align : middle;text-align:center;">:</td>
                                            <td><input type="radio" name="tahap_tagihan2" id="tt_persen" value="persen" required> ......%</td>
                                            <td><input type="radio" name="tahap_tagihan2" id="tt_btb" value="btb" required> Back to Back</td>
                                        
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="tahap_tagihan2" id="tt_lunas" value="lunas" required> Lunas</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Invoice/Kwitansi</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="inv2" id="inv2" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Faktur Pajak</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="fakpaj2" id="fakpaj2" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Tanda Terima/Surat Jalan/DO</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="ttsjdo2" id="ttsjdo2" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Copy PO</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="cpo2" id="cpo2" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Copy IP</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="cip2" id="cip2" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Asli Berita Acara</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="berac2" id="berac2" value="1" required></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Dokumen Pendukung</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="dokpen2" id="dokpen2" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align : middle;text-align:left;">Lain - Lain</td>
                                            <td style="vertical-align : middle;text-align:center;">:</td>
                                            <td class="text-center"><input type="checkbox" name="ll2" id="ll2" value="1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    $get_session = [];
                    $get_session = $this->session->userdata("user_login");
                    if ($get_session['id_sgroup'] == '2' || $get_session['id_sgroup'] == '8') {
                    ?>
                        <button type="button" onclick="tolakApproval()" class="btn btn-danger btn-sm">Tolak</button>
                        <input type="submit" value="Verifikasi" class="btn btn-success">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                    <?php
                    } else {
                    ?>
                        <input type="submit" value="Save" class="btn btn-warning">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const urlReginvoice = '<?= site_url("RegInvoice/") ?>';
    const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;
    var list = $("#rows-list");

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableInvoice')) {
            table = $('#tableInvoice').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlReginvoice + "listInvoicebarang",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }
        $(".select2").select2({
            dropdownParent: $('#editRegInv'),
        });
    });

    // $(document).ready(function() {
    //     $(list).on('change', ".nilai_invoice", function() {
    //         limit_check();
    //     });
    // });

    function limit_check(input) {
        
        var sisaPO = Number(document.getElementById("sisa_po").value)
        // var bayar = $(this).find("#nilai_invoice").val();

        // console.log();
        if(Number(input.value)===0){
            alert("Jumlah yang dibayarkan tidak boleh kosong atau 0.");
            document.getElementById("nilai_invoice").value = "1";
        }
        if(sisaPO-Number(input.value)<0){
            alert("Jumlah yang anda bayar melebihi sisa PO, sisa PO saat ini Rp."+sisaPO);
            document.getElementById("nilai_invoice").value = "1";
        }
    }

    function ModaleditReginv($id_invoice) {
        $.ajax({
            url: urlReginvoice + 'showModalInvoice/' + $id_invoice,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_invoice2').val(response[0].id_invoice);
                $('#no_invoice2').val(response[0].no_invoice);
                $('#tgl_invoice2').val(response[0].tanggal_invoice);
                $('#tgl_terima_invoice2').val(response[0].tanggal_terima);
                $('#id_po2').val(response[0].id_po).trigger('change');
                $('#nilai_invoice2').val(response[0].nilai_invoice);
                // console.log(response[0]);
                if(response[0].beban=="overhead"){
                    $('#bb_overhead').prop('checked',true);
                }else{
                    $('#bb_project').prop('checked',true);
                }
                if(response[0].tahap_tagihan=="persen"){
                    $('#tt_persen').prop('checked',true);
                }else if(response[0].tahap_tagihan=="btb"){
                    $('#tt_btb').prop('checked',true);
                }else{
                    $('#tt_lunas').prop('checked',true);
                }
                if(response[0].jenis_pembayaran=="termin"){
                    $('#jb_termin2').prop('checked',true);
                }else{
                    $('#jb_full2').prop('checked',true);
                }
                if(response[0].asli_invoice==1){
                    $('#inv2').prop('checked',true);
                }else{
                    $('#inv2').prop('checked',false);
                }
                if(response[0].asli_pajak==1){
                    $('#fakpaj2').prop('checked',true);
                }else{
                    $('#fakpaj2').prop('checked',false);
                }
                if(response[0].asli_tandaterima==1){
                    $('#ttsjdo2').prop('checked',true);
                }else{
                    $('#ttsjdo2').prop('checked',false);
                }
                if(response[0].copy_po==1){
                    $('#cpo2').prop('checked',true);
                }else{
                    $('#cpo2').prop('checked',false);
                }
                if(response[0].copy_ip==1){
                    $('#cip2').prop('checked',true);
                }else{
                    $('#cip2').prop('checked',false);
                }
                if(response[0].asli_ba==1){
                    $('#berac2').prop('checked',true);
                }else{
                    $('#berac2').prop('checked',false);
                }
                if(response[0].dokumen==1){
                    $('#dokpen2').prop('checked',true);
                }else{
                    $('#dokpen2').prop('checked',false);
                }
                if(response[0].lain_lain==1){
                    $('#ll2').prop('checked',true);
                }else{
                    $('#ll2').prop('checked',false);
                }
                $('#formReginekspedisi').modal('show');
            }
        });
    }

    function cariAlamatVendor(value) {
        $.ajax({
            type: "POST",
            url: urlCustomfunction + "cariInvoiceVendor",
            data: {
                id_po2: value
            },
            dataType: "JSON",
            success: function(response) {
                
                $('#nama_vendor2').val(response.nama_vendor);
                $('#no_rekening2').val(response.no_rekening);
                $('#nama_bank2').val(response.nama_bank);
                $('#nama_rekening2').val(response.nama_rekening);
            }
        });
    }

    function tolakApproval() {
        $.ajax({
            type: "POST",
            url: urlReginvoice + "tolakApproval",
            data: {
                id_invoice2: $('#id_invoice2').val()
            },
            dataType: "JSON",
            success: function(response) {
                Swal.fire("Data berhasil diedit!", "", "success").then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formReginekspedisi').modal('hide');
                });
            }
        });
    }

    function cariAlamatVendorNew(value) {
        $.ajax({
            type: "POST",
            url: urlCustomfunction + "cariInvoiceVendor",
            data: {
                id_po: value
            },
            dataType: "JSON",
            success: function(response) {
                $('#sisa_po').val(response.sisa_bayar);
                $('#nama_vendor').val(response.nama_vendor);
                $('#no_rekening').val(response.no_rekening);
                $('#nama_bank').val(response.nama_bank);
                $('#nama_rekening').val(response.nama_rekening);
            }
        });
    }


    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlReginvoice + 'updateRegInvoice',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_po2').val(0).trigger('change');
                    $('#formReginekspedisi').modal('hide');
                });
            },
        });
    });

    $("#addReginvoice").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlReginvoice + 'addReginv',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#addReginvoice')[0].reset();
                    $('#id_po').val(0).trigger('change');
                    $('#addRegInv').modal('hide');
                });
            },
        });
    });

    function deleteRegin(id_invoice) {
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
                        id_invoice: id_invoice
                    },
                    url: urlReginvoice + "deleteRegin",
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

    $(function() {
        $('.select2').select2();
    })
</script>