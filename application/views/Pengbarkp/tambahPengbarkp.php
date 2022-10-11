<form action="<?= base_url('Pengbarkp/savePengbarkp') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            TAMBAH PENGIRIMAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_pengiriman">No Pengiriman</label>
                        <input type="text" name="no_pengiriman" id="no_pengiriman" value="<?= $autoNoPengiriman ?>" class="form-control" style="color: red;" title="No Pengiriman Otomatis" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tanggal_pengiriman">Tanggal Kirim</label>
                        <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" value="<?= date('Y-m-d') ?>" class="form-control" title="Pilih Tanggal Kirim" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Unit Kerja Tujuan</label>
                        <select class="form-control select2" name="id_uker" id="id_uker" style="width: 100%;" required>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $value) { ?>
                                <option <?= $value->id_uker == 1 ? 'selected' : '' ?> value="<?= $value->id_uker ?>"><?= $value->kode_uker . " | " . $value->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_ekpedisi">Ekspedisi</label>
                        <select class="form-control select2" name="id_ekpedisi" id="id_ekpedisi" style="width:100%;" required>
                            <option value="">--Pilih Ekspedisi--</option>
                            <?php foreach ($ekspedisi as $value) { ?>
                                <option <?= $value->id_ekpedisi == 1 ? 'selected' : '' ?> value="<?= $value->id_ekpedisi ?>"><?= $value->nama_ekpedisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_layanan_ekspedisi">Service</label>
                        <select class="form-control select2" name="id_layanan_ekspedisi" id="id_layanan_ekspedisi" style="width:100%;" required>
                            <option value="">--Pilih Service--</option>
                            <?php foreach ($service as $value) { ?>
                                <option <?= $value->id_layanan_ekspedisi == 1 ? 'selected' : '' ?> value="<?= $value->id_layanan_ekspedisi ?>"><?= $value->layanan_ekspedisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_pengirim">Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jumlah_koli">Jumlah Koli</label>
                        <input type="number" name="jumlah_koli" id="jumlah_koli" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="berat_barang">Berat Barang</label>
                        <input type="text" name="berat_barang" id="berat_barang" class="form-control" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_resi">Nomor Resi</label>
                        <input type="text" name="no_resi" id="no_resi" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="estimasi">Estimasi</label>
                        <input type="text" name="estimasi" id="estimasi" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="total_harga">Total Harga</label>
                        <input type="number" name="total_harga" id="total_harga" multiple class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="keteranganHead">Keterangan</label>
                        <input type="text" name="keteranganHead" id="keteranganHead" class="form-control" required>
                    </div>
                </div>
            </div>
    </section>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"> PACKING / KOLI</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th>Koli ke</th>
                                    <th>Berat Koli</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <tr>
                                    <td>
                                        <select class="form-control input-xlarge select2" name="no_urut[]" title="Pilih Item Barang" required>
                                            <option value="">--Pilih Items--</option>
                                            <?php foreach ($barang as $value) { ?>
                                                <option value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="no_sn[]" class="form-control no_sn" title="Masukan No SN" required>
                                    </td>
                                    <td>
                                        <input type="text" name="harga_barang[]" class="form-control harga_barang" title="Masukan Harga Barang" required>
                                    </td>
                                    <td>
                                        <input type="number" name="koli[]" value="0" class="form-control Poqty" title="Masukan Koli Ke.." required>
                                    </td>
                                    <td>
                                        <input type="number" name="berat_koli[]" value="0" class="form-control Pohargasatuan" title="Masukan Jumlah Berat Koli" required>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control poKet" title="Masukan Keterangan" required>
                                    </td>
                                    <td align="center">
                                        <!-- <button data-toggle="modal" data-target="#addData" type="button" id="" class="btn btn-success valid" title=""><i class="fa fa-plus"></i></button> -->
                                        <button type="button" class="btn btn-danger delete-row" title="Tombol Hapus Items">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <button type="button" id="add-invoice-item" class="btn btn-success valid" name="add-invoice-item" onclick="addPurchaseInputField('rows-list');" value="" tabindex="9" aria-invalid="false" title="Tombol Tambah Items"><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Simpan Data">
                            <a href="<?= base_url('Pengbarkp') ?>" class="btn btn-warning">Kembali</a>
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
</script>