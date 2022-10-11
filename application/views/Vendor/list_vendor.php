<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST VENDOR
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button id='addVendor' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <div class="panel-body">
                <table style="width: 100%;" class="table table-bordered table-hover" id="tableVendor">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>Kode Vendor</th>
                            <th>Nama Vendor</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>No NPWP</th>
                            <th>Nama Rekening</th>
                            <th>Telp Vendor</th>
                            <th>Email Vendor</th>
                            <th>Alamat Vendor</th>
                            <th>Keterangan</th>
                            <th style="width: 9%;">Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD -->
<div class="modal fade" id="formVendor" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Vendor</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_vendor" id="id_vendor">


                    <div class='form-group'>
                        <label class='control-label'>Kode Vendor</label>
                        <input type='text' name="kd_vendor" id="kd_vendor" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Vendor</label>
                        <input type='text' name="nama" id="nama" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Bank</label>
                        <input type='text' name="nama_bank" id="nama_bank" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>No Rekening</label>
                        <input type='text' name="no_rekening" id="no_rekening" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>No NPWP</label>
                        <input type='text' name="no_npwp" id="no_npwp" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama Rekening</label>
                        <input type='text' name="nama_rekening" id="nama_rekening" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Telp Vendor</label>
                        <input type='number' name="telp" id="telp" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Email Vendor</label>
                        <input type='email' name="email" id="email" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Alamat Vendor</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="2"></textarea>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Nama PIC</label>
                        <input type='text' name="namapic" id="namapic" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Email PIC</label>
                        <input type='email' name="emailpic" id="emailpic" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Telp PIC</label>
                        <input type='number' name="telppic" id="telppic" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Posisi PIC</label>
                        <input type='text' name="posisipic" id="posisipic" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" rows="2"></textarea>
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

<!--Modal for PIC -->
<div class="modal fade" id="PICvendor" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">PIC Vendor <b id="t_vendor"></b></h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary">
                        <tr>
                            <td style="width: 35%;">Nama PIC</td>
                            <td style="width: 5%;">:</td>
                            <td><b id="mnpic"></b></td>
                        </tr>
                        <tr>
                            <td style="width: 35%;">Telp PIC</td>
                            <td style="width: 5%;">:</td>
                            <td><b id="mtpic"></b></td>
                        </tr>
                        <tr>
                            <td style="width: 35%;">Email PIC</td>
                            <td style="width: 5%;">:</td>
                            <td><b id="mepic"></b></td>
                        </tr>
                        <tr>
                            <td style="width: 35%;">Posisi PIC</td>
                            <td style="width: 5%;">:</td>
                            <td><b id="mppic"></b></td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--Modal for PIC ends-->

<script>
    const urlVendor = '<?= site_url("Vendor/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableVendor')) {
            table = $('#tableVendor').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlVendor + "listVendor",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }

        $('#addVendor').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_vendor').val("");
            $('#formVendor').modal('show');
        });

    });

    function VVendor(id_vendor) {
        $.ajax({
            url: urlVendor + 'viewVendor/' + id_vendor,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_vendor').val(response[0].id_vendor);
                $('#nama_bank').val(response[0].nama_bank);
                $('#no_rekening').val(response[0].no_rekening);
                $('#no_npwp').val(response[0].no_npwp);
                $('#nama_rekening').val(response[0].nama_rekening);
                $('#kd_vendor').val(response[0].kode_vendor);
                $('#nama').val(response[0].nama_vendor);
                $('#telp').val(response[0].telp_vendor);
                $('#email').val(response[0].email_vendor);
                $('#alamat').val(response[0].alamat_vendor);
                $('#namapic').val(response[0].nama_pic);
                $('#emailpic').val(response[0].email_pic);
                $('#telppic').val(response[0].telp_pic);
                $('#posisipic').val(response[0].posisi_pic);
                $('#ket').val(response[0].ket);
                $('#formVendor').modal('show');
            }
        });
    }

    function deleteVendor(id_vendor) {
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
                        id_vendor: id_vendor
                    },
                    url: urlVendor + "deleteVendor",
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

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlVendor + 'formVendor',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#formVendor').modal('hide');
                });
            },
        });
    });

    function Vpic(id_vendor) {
        $.ajax({
            url: urlVendor + 'viewVendor/' + id_vendor,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#t_vendor').text(response[0].nama_vendor);
                $('#mnpic').text(response[0].nama_pic);
                $('#mepic').text(response[0].email_pic);
                $('#mtpic').text(response[0].telp_pic);
                $('#mppic').text(response[0].posisi_pic);
                $('#PICvendor').modal('show');
            }
        });
    }
</script>