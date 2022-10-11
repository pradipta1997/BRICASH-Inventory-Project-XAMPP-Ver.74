<form action="<?= base_url('Pembelianlocal/simpanPembelianLocal') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            TAMBAH PEMBELIAN LOCAL
        </header>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nomor_pembelian">Nomor Pembelian</label>
                        <input type="text" name="nomor_pembelian" id="nomor_pembelian" value="<?= $autoNoPemLocal ?>" class="form-control" style="color: red;" disabled>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_pembelian">Tanggal Pembelian</label>
                        <input type="date" name="tgl_pembelian" id="tgl_pembelian" value="<?= date('Y-m-d') ?>" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="uker">Unit Kerja</label>
                        <select class="form-control" name="uker" id="uker" required>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $ukr) {  ?>
                                <option value="<?= $ukr->id_uker ?>"><?= $ukr->kode_nama . " | " . $ukr->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_vendor">Nama Vendor</label>
                        <select class="form-control" name="nama_vendor" id="nama_vendor" required>
                            <option value="">--Pilih Nama Vendor--</option>
                            <?php foreach ($vendor as $vend) {  ?>
                                <option value="<?= $vend->id_vendor ?>"><?= $vend->kode_vendor . " | " . $vend->nama_vendor ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jenis_pembayaran">Jenis Pembayaran</label>
                        <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required>
                            <option value="">--Pilih Jenis Pembayaran--</option>
                            <?php foreach ($jenisPembayaran as $jp) {  ?>
                                <option value="<?= $jp->id_po ?>"><?= $jp->jenis_pembayaran ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tempo_pembayaran">Tempo Pembayaran</label>
                        <input type="text" name="tempo_pembayaran" id="tempo_pembayaran" class="form-control" title="Input Tempo Pembayaran" required>
                    </div>
                </div>

            </div>

            <hr>

        </div>
    </section>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG PEMBELIAN LOCAL</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Itemmmmmm</th>
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
                                        <select class="form-control" name="no_urut[]" id="Pono_urut" required>
                                            <option value="">--Pilih Barang--</option>
                                            <?php foreach ($barang as $value) { ?>
                                                <option value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="product-list">
                                        <input type="hidden" class="PemlocCurrency">
                                        <select class="form-control PemlocId_currency" name="id_currency[]" required>
                                            <option value="">--Pilih Currency--</option>
                                            <?php foreach ($currency as $value) { ?>
                                                <option value="<?= $value->id_det_currency ?>"><?= $value->kode_currency . " | " . $value->tgl_kurs . " | " . rupiah($value->rupiah) ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" value="0" class="form-control PemlocQty" required>
                                    </td>
                                    <td>
                                        <input type="number" name="harga_satuan[]" value="0" class="form-control PemlocHargasatuan" required>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="have_ppn[]" class="PemlocHave_ppn" value="1">
                                    </td>
                                    <td>
                                        <input type="number" name="total_ppn[]" value="0" class="form-control PemlocTotalppn" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="total[]" value="0" class="form-control PemlocTotal" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control pemlocKet" required>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row" title="Hapus List">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <button type="button" id="add-invoice-item" class="btn btn-success btn-sm valid" name="add-invoice-item" onclick="addPurchaseInputField('rows-list');" value="" tabindex="9" aria-invalid="false" title="Tambah List"><i class="fa fa-plus"></i></button>
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
                                        <input type="number" id="subtotal_ppn" value="0" class="form-control" name="subtotal_ppn" readonly>
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
                            <a href="<?= base_url('Pembelianlocal') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    const urlPembelianLocal = '<?= site_url("Pembelianlocal/") ?>';

    $(document).ready(function() {
        // $(function() {
        //     $('.select2').select2();
        //     $('#catatan_po').summernote({
        //         height: 200,
        //     });
        //     $('#term_condition').summernote({
        //         height: 200,
        //     });
        // })

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
                pemloc_subtotal();
            } else {
                alert("This row cannot be deleted");
            }
        });

        $(list).on('input propertychange paste', ".PemlocQty, .PemlocHargasatuan, .PemlocHave_ppn", function() {
            pemloc_total(this);
            pemloc_subtotal();
        });

        $(list).on('change', ".PemlocId_currency", function() {
            var id_currency = $(this).val();
            var row = $(this).closest('tr');
            let ini = $(this);

            $.ajax({
                type: "POST",
                url: urlPembelianLocal + "currencyPemlocdet",
                data: {
                    id_currency: row.find(".PemlocId_currency").val()
                },
                dataType: "JSON",
                success: function(response) {
                    row.find(".PemlocCurrency").val(Number(response));
                },
                complete: function() {
                    pemloc_total(ini);
                    pemloc_subtotal();
                },
            });

        });

        // ini untuk subtotal
        function pemloc_subtotal() {
            var subtotal = 0;
            var Pemlochave_ppn = 0;

            $(list).find(".PemlocTotal").each(function(e) {
                subtotal += Number($(this).val());
            });

            $(list).find("tr").each(function(e) {
                var PemlocQty = Number($(this).find(".PemlocQty").val());
                var PemlocHargasatuan = Number($(this).find(".PemlocHargasatuan").val());
                var PemlocTotalPpn = Number($(this).find(".PemlocTotal").val());
                Pemlochave_ppn += PemlocTotalPpn;
            });

            $("#subtotal_ppn").val(Pemlochave_ppn);
            $("#subtotal").val(subtotal);
            $("#grand_total").val(Pemlochave_ppn + subtotal);
        }
    });

    var count = 2;
    var limits = 500;

    function addPurchaseInputField(e) {
        var t = $("tbody#rows-list tr:first-child").html();
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#rows-list").append("<tr>" + t + "</tr>")
    }

    // ini untuk total harga per barang
    function pemloc_total(elem) {
        var row = $(elem).closest('tr');
        var PemlocQty = Number(row.find(".PemlocQty").val());
        var PemlocHargasatuan = Number(row.find(".PemlocHargasatuan").val());
        var PemlocCurrency = Number(row.find(".PemlocCurrency").val());
        let PemlocHave_ppn = 0;

        if (row.find(".PemlocHave_ppn").is(':checked')) {
            PemlocHave_ppn += (PemlocQty * (PemlocHargasatuan * PemlocCurrency)) * 10 / 100;
        } else {
            PemlocHave_ppn += 0;
        }

        row.find(".PemlocTotalppn").val(PemlocHave_ppn);
        row.find(".PemlocTotal").val(PemlocQty * (PemlocHargasatuan * PemlocCurrency));
    }
</script>