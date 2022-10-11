<!-- page start-->
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                LIST REGISTRASI INVOICE EKSPEDISI
                <span <?php echo $My_Controller->savePermission; ?>>
                    | <button type="button" id='addReginekspedisi' class='btn btn-info btn-sm'>
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </span>
            </header>
            <?php if ($this->session->flashdata('msg'))
                echo $this->session->flashdata('msg');
            ?>
            <div class="panel-body">
                <table class="table table-bordered table-hover" style="width: 100%;" id="tableReginekspedisi">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>No Invoice</th>
                            <th>Tanggal Invoice</th>
                            <th>Periode</th>
                            <th>Vendor</th>
                            <th>Nilai Invoice</th>
                            <th>Status Verifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all"></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </section>
    </div>
</div>

<!--Modal for ADD/EDIT -->
<div class="modal fade" id="formReginekspedisi" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Invoice</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_invoice" id="id_invoice">
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
                        <label for='periode' class='col-lg-3 col-sm-3 control-label'>Periode</label>
                        <div class='col-lg-9'>
                            <input type='text' name="periode" required class='form-control' id='periode' />
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='id_vendor' class='col-lg-3 col-sm-3 control-label'>Nama Vendor</label>
                        <div class='col-lg-9'>
                            <select name="id_vendor" id="id_vendor" class="form-control" onchange="cariAlamatvendor(this.value)" required>
                                <option value="">--Pilih Vendor--</option>
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


<script>
    const urlRegInvoiceEkspedisi = '<?= site_url("RegInvoiceEkspedisi/") ?>';
    const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableReginekspedisi')) {
            table = $('#tableReginekspedisi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlRegInvoiceEkspedisi + "listReginekspedisi",
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
            dropdownParent: $('#formReginekspedisi'),
        });

        $('#addReginekspedisi').on('click', function(e) {
            e.preventDefault();

            $('#form')[0].reset();
            $('#id_invoice').val("");
            $('#id_vendor').val("").trigger('change');
            $('#formReginekspedisi').modal('show');
        });
    });

    function cariAlamatvendor(value) {
        $.ajax({
            type: "POST",
            url: urlCustomfunction + "cariVendor",
            data: {
                id_vendor: value
            },
            dataType: "JSON",
            success: function(response) {
                if (response.alamat_vendor) {
                    $('#alamat_vendor').val(response.alamat_vendor);
                } else {
                    $('#alamat_vendor').val(response);
                }
            }
        });
    }

    function VReginekspedisi(id_invoice) {
        $.ajax({
            url: urlRegInvoiceEkspedisi + 'viewReginekspedisi/' + id_invoice,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_invoice').val(response[0].id_invoice);
                $('#no_invoice').val(response[0].no_invoice);
                $('#tgl_invoice').val(response[0].tgl_invoice);
                $('#periode').val(response[0].periode);
                $('#id_vendor').val(response[0].id_vendor).trigger('change');
                $('#alamat_vendor').val(response[0].alamat_vendor);
                $('#nilai_invoice').val(response[0].nilai_invoice);
                $('#formReginekspedisi').modal('show');
            }
        });
    }

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
                    url: urlRegInvoiceEkspedisi + "deleteRegin",
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

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlRegInvoiceEkspedisi + 'formReginekspedisi',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#id_vendor').val(0).trigger('change');
                    $('#formReginekspedisi').modal('hide');
                });
            },
        });
    });
</script>