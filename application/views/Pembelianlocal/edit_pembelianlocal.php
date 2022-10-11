<form action="<?= base_url('Pembelianlocal/updatePembelianlocal/' . $pemLocal->id_pembelian) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PEMBELIAN LOCAL
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nomor_pembelian">Nomor Pembelian</label>
                        <input type="text" name="nomor_pembelian" id="nomor_pembelian" class="form-control" value="<?= $pemLocal->nomor_pembelian ?>" style="color: red;" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tanggal_pembelian">Tanggal Pembelian</label>
                        <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control" value="<?= $pemLocal->tanggal_pembelian ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Unit Kerja</label>
                        <select class="form-control select2" name="id_uker" id="id_uker">
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $ukr) { ?>
                                <option <?= $pemLocal->id_uker == $ukr->id_uker ? 'selected' : '' ?> value="<?= $ukr->id_uker ?>"><?= $ukr->kode_uker . " | " . $ukr->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_vendor">Nama Vendor</label>
                        <select class="form-control select2" name="nama_vendor" id="nama_vendor">
                            <option value="AL">--Pilih Nama Vendor--</option>
                            <?php foreach ($vendor as $ven) { ?>
                                <option <?= $pemLocal->id_vendor == $ven->id_vendor ? 'selected' : '' ?> value="<?= $ven->id_vendor ?>"><?= $ven->kode_vendor . " | " . $ven->nama_vendor ?></option>
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
                        <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran">
                            <option value="Full">Full</option>
                            <option value="Termin">Termin</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tempo_pembayaran">Tempo Pembayaran</label>
                        <input type="text" name="tempo_pembayaran" id="tempo_pembayaran" class="form-control" value="<?= $pemLocal->tempo_pembayaran ?>">
                    </div>
                </div>
            </div>

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
                                    <th>Select Item</th>
                                    <th>Currency</th>
                                    <th>Quantity</th>
                                    <th>Harga Satuan</th>
                                    <th>Have PPN</th>
                                    <th>Total PPN</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">

                                <?php
                                $pembelianLocalDet = $this->General->fetch_records("tbl_pembelian_det", ['id_pembelian' => $pemLocal->id_pembelian]);
                                foreach ($pembelianLocalDet as $pld) {
                                ?>

                                    <tr>
                                        <td class="product-list">
                                            <select class="form-control select2" name="no_urut[]" style="width: 100%;">
                                                <option>--Pilih Items--</option>
                                                <?php foreach ($barang as $value) { ?>
                                                    <option <?= $pld->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="product-list">
                                            <?php
                                            $rupiah = $this->General->getRow('v_currency', ['id_det_currency' => $pld->id_det_currency]);
                                            ?>
                                            <input type="hidden" class="Pocurrency" value="<?= $rupiah->rupiah ?>">
                                            <select class="form-control Poid_currency" name="id_det_currency[]">
                                                <option value="">--Pilih Currency--</option>
                                                <?php foreach ($currency as $value) { ?>
                                                    <option <?= $value->id_det_currency == $pld->id_det_currency ? 'selected' : '' ?> value="<?= $value->id_det_currency ?>"><?= $value->kode_currency . " | " . $value->tgl_kurs . " | " . rupiah($value->rupiah) ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="qty[]" class="form-control Poqty" value="<?= $pld->qty ?>">
                                        </td>
                                        <td>
                                            <input type="number" name="harga_satuan[]" class="form-control Pohargasatuan" value="<?= $pld->harga_satuan ?>">
                                        </td>
                                        <td class="text-center">
                                            <input type="checkbox" name="have_ppn[]" <?= $pld->total_ppn > 0 ? 'checked' : '' ?> class="Pohave_ppn" value="1">
                                        </td>
                                        <td>
                                            <input type="number" name="total_ppn[]" class="form-control Pototalppn" value="<?= $pld->total_ppn ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" class="form-control poTotal" value="<?= $pld->total ?>" readonly>
                                        </td>
                                        <td>
                                            <input type="text" name="keterangan[]" class="form-control poKet" value="<?= $pld->keterangan ?>">
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-danger btn-sm delete-row" title="Hapus Item">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <button type="button" id="add-invoice-item" class="btn btn-success btn-sm valid" name="add-invoice-item" onclick="addPembelianInputField('rows-list');" value="" tabindex="9" aria-invalid="false" title="Tambah Item"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td style="text-align:right;" colspan="5">
                                        <strong style="color: inherit;">Subtotal:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="number" class="form-control" id="sub_total" name="sub_total" value="<?= $pemLocal->sub_total ?>" readonly>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Subtotal PPN:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="number" class="form-control" id="nilai_pajak" name="nilai_pajak" value="<?= $pemLocal->nilai_pajak ?>" readonly>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Grand Total:</strong>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="total" name="total" value="<?= $pemLocal->total ?>" readonly>
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
    const urlPurchaseorder = '<?= site_url("Purchaseorder/") ?>';

    $(document).ready(function() {

        $(function() {
            $('.select2').select2();
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

        $(list).on('change', ".Poid_currency", function() {
            var id_currency = $(this).val();
            var row = $(this).closest('tr');
            let ini = $(this);

            $.ajax({
                type: "POST",
                url: urlPurchaseorder + "currencyPodet",
                data: {
                    id_currency: row.find(".Poid_currency").val()
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

    function addPembelianInputField(e) {
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

    $(function() {
        $('.select2').select2();
    })
</script>