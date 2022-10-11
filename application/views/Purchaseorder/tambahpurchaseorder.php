<form action="<?= base_url('Purchaseorder/simpanPurchaseOrder') ?>" class="small" enctype="multipart/form-data" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PURCHASING ORDER
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_po">No PO</label>
                        <input type="text" class="form-control" id="no_po" name="no_po" value="<?= $autoNopo ?>" style="color: red;" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tanggal_po">Tanggal PO</label>
                        <input type="date" name="tanggal_po" id="tanggal_po" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Ship To Unit Kerja</label>
                        <select class="form-control select2" name="id_uker" id="id_uker" style="width: 100%;" required>
                            <option value="">Pilih Unit Kerja</option>
                            <?php foreach ($uker as $value) { ?>
                                <option <?= $value->id_uker == 1 ? 'selected' : '' ?> value="<?= $value->id_uker ?>"><?= $value->kode_uker . " | " . $value->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_vendor">To Vendor</label>
                        <select class="form-control select2" name="id_vendor" style="width: 100%;" id="id_vendor" required>
                            <option value="">Pilih Vendor</option>
                            <?php foreach ($vendor as $value) { ?>
                                <option value="<?= $value->id_vendor ?>"><?= $value->nama_vendor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="kontak_person_po">Kontak Person PO</label>
                        <input type="text" name="kontak_person_po" id="kontak_person_po" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_kontak_po">Nama Kontak PO</label>
                        <input type="text" name="nama_kontak_po" id="nama_kontak_po" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_project">Project</label>
                        <select class="form-control select2" style="width: 100%;" name="id_project" id="id_project" required>
                            <option value="">Pilih Project</option>
                            <?php foreach ($project as $value) { ?>
                                <option value="<?= $value->id_project ?>"><?= $value->tid . " | " . $value->nama_project ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <select class="form-control select2" name="jenis_pembayaran" style="width: 100%;" id="jenis_pembayaran" required>
                            <option value="">Pilih Jenis Pembayaran</option>
                            <option value="Full">Full</option>
                            <option value="Termin">Termin</option>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jtempo_pembayaran">Jatuh Tempo Bayar</label>
                        <input type="number" name="jtempo_pembayaran" id="jtempo_pembayaran" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jtempo_pemenuhan">Tempo Terima Barang</label>
                        <input type="number" name="jtempo_pemenuhan" id="jtempo_pemenuhan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="file_po">Ijin Prinsip PO</label>
                        <input type="file" name="file_po[]" id="file_po" multiple class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_ijin_prinsip">No. Ijin Prinsip</label>
                        <input type="text" name="no_ijin_prinsip" id="no_ijin_prinsip" class="form-control" required>
                    </ div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="sandbox">
                        <label for="catatan_po">Catatan PO</label>
                        <textarea name="catatan_po" class="form-control" id="catatan_po" required></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="sandbox">
                        <label for="term_condition">Term & Condition</label>
                        <textarea name="term_condition" class="form-control" id="term_condition" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG PURCHASING ORDER</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Item</th>
                                    <th>Currency</th>
                                    <th>Quantity</th>
                                    <th>Harga Satuan</th>
                                    <th style="width: 5%;">Have PPN</th>
                                    <th>Total PPN</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control select2" name="no_urut[]" id="Pono_urut" required>
                                            <option value="">Pilih Barang</option>
                                            <?php foreach ($barang as $value) { ?>
                                                <option value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="product-list">
                                        <input type="hidden" class="Pocurrency">
                                        <select class="form-control Poid_currency" name="id_det_currency[]" required>
                                            <option value="">Pilih Currency</option>
                                            <?php foreach ($currency as $value) { ?>
                                                <option <?= $value->id_det_currency == 4 ? 'selected' : '' ?> value="<?= $value->id_det_currency ?>"><?= $value->kode_currency . " | " . $value->tgl_kurs . " | " . rupiah($value->rupiah) ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" value="0" class="form-control Poqty" required>
                                    </td>
                                    <td>
                                        <input type="number" name="harga_satuan[]" value="0" class="form-control Pohargasatuan" required>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="have_ppn[]" class="Pohave_ppn" value="1">
                                    </td>
                                    <td>
                                        <input type="number" name="total_ppn[]" value="0" class="form-control Pototalppn" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="total[]" value="0" class="form-control poTotal" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control poKet" required>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <button type="button" id="add-invoice-item" class="btn btn-success btn-sm valid" name="add-invoice-item" onclick="addPurchaseInputField('rows-list');" value="" tabindex="9" aria-invalid="false"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td style="text-align:right;" colspan="5">
                                        <strong style="color: inherit;">Subtotal:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="number" id="subtotal" value="0" class="form-control" name="subtotal" readonly>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Subtotal PPN:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="number" id="subtotal_ppn" value="0" class="form-control" name="subtotal_ppn">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Grand Total:</strong>
                                    </td>
                                    <td>
                                        <input type="number" id="grand_total" value="0" class="form-control" name="grand_total" readonly>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary btn-sm" value="Simpan Data">
                            <a href="<?= base_url('Purchaseorder') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    const urlPurchaseorder = '<?= site_url("Purchaseorder/") ?>';

    $(document).ready(function() {
        $(function() {
            // $('.select2').select2();
            $('#catatan_po').summernote({
                height: 200,
            });
            $('#term_condition').summernote({
                height: 200,
            });
        })

        var list = $("#rows-list");
        var row = list.children('tr:first');

        $("#add-item").on('click', function(e) {
            e.preventDefault();
            var newRow = row.clone();
            list.append(newRow);
        });

        $(list).on('click', ".delete-row", function() {
            if (list.children("tr").length > 1) {
                $(this).closest('tr').remove();
                po_subtotal();
            } else {
                alert("This row cannot be deleted");
            }
        });

        $(list).on('input propertychange paste', ".Poqty, .Pohargasatuan, .Pohave_ppn", function() {
            po_total(this);
            po_subtotal();
        });

        $(list).on('change', ".Poqty", function() {
            var row = $(this).closest('tr');
            let ini = $(this);

            $.ajax({
                type: "POST",
                url: urlPurchaseorder + "currencyPodet",
                data: {
                    id_det_currency: row.find(".Poid_currency").val()
                },
                dataType: "JSON",
                success: function(response) {
                    row.find(".Pocurrency").val(Number(response));
                },
                complete: function() {
                    po_total(ini);
                    po_subtotal();
                },
            });

        });

        // ini untuk subtotal
        function po_subtotal() {
            var subtotal = 0;
            var Pohave_ppn = 0;

            $(list).find(".poTotal").each(function(e) {
                subtotal += Number($(this).val());
            });

            $(list).find("tr").each(function(e) {
                var Poqty = Number($(this).find(".Poqty").val());
                var Pohargasatuan = Number($(this).find(".Pohargasatuan").val());
                var Pototalppn = Number($(this).find(".Pototalppn").val());
                Pohave_ppn += Pototalppn;
            });

            $("#subtotal_ppn").val(Pohave_ppn);
            $("#subtotal").val(subtotal);
            $("#grand_total").val(Pohave_ppn + subtotal);
        }
    });

    var count = 2;
    var limits = 500;

    function addPurchaseInputField(e) {
        var t = $("tbody#rows-list tr:first-child").html();
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#rows-list").append("<tr>" + t + "</tr>")
    }

    // ini untuk total harga per barang
    function po_total(elem) {
        var row = $(elem).closest('tr');
        var Poqty = Number(row.find(".Poqty").val());
        var Pohargasatuan = Number(row.find(".Pohargasatuan").val());
        var Pocurrency = Number(row.find(".Pocurrency").val());
        let Pohave_ppn = 0;

        if (row.find(".Pohave_ppn").is(':checked')) {
            Pohave_ppn += (Poqty * (Pohargasatuan * Pocurrency)) * 10 / 100;
        } else {
            Pohave_ppn += 0;
        }

        row.find(".Pototalppn").val(Pohave_ppn);
        row.find(".poTotal").val(Poqty * (Pohargasatuan * Pocurrency));
    }

    // $(function() {
    //     $('.select2').select2();
    // })
</script>