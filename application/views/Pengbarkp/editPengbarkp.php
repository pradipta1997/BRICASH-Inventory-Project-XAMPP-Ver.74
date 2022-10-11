<form action="<?= base_url('Pengbarkp/updatePengbar/' . $pengiriman->id_pengiriman) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PENGIRIMAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_pengiriman">No Pengiriman</label>
                        <input type="text" name="no_pengiriman" id="no_pengiriman" value="<?= $pengiriman->no_pengiriman ?>" class="form-control" style="color: red;" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tanggal_pengiriman">Tanggal Kirim</label>
                        <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" value="<?= $pengiriman->tanggal_pengiriman ?>" class="form-control">
                    </div>
                </div>
                <!-- <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Uker Pengirim</label>
                        <select class="form-control select2" name="id_uker" id="id_uker" style="width: 100%;" required>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $ukr) { ?>
                                <option <?= $pengiriman->id_uker == $ukr->id_uker ? 'selected' : '' ?> value="<?= $ukr->id_uker ?>"><?= $ukr->kode_uker . " | " . $ukr->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> -->
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_uker">Uker Tujuan</label>
                        <select class="form-control select2" name="id_uker" id="id_uker" style="width: 100%;" required>
                            <option value="">--Pilih Unit Kerja--</option>
                            <?php foreach ($uker as $ukr) { ?>
                                <option <?= $pengiriman->id_uker == $ukr->id_uker ? 'selected' : '' ?> value="<?= $ukr->id_uker ?>"><?= $ukr->kode_uker . " | " . $ukr->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="id_ekpedisi">Ekspedisi</label>
                        <select class="form-control select2" name="id_ekpedisi" id="id_ekpedisi" style="width: 100%;" required>
                            <option value="">--Pilih Ekspedisi--</option>
                            <?php foreach ($ekspedisi as $value) { ?>
                                <option <?= $pengiriman->id_ekpedisi == $value->id_ekpedisi ? 'selected' : '' ?> value="<?= $value->id_ekpedisi ?>"><?= $value->nama_ekpedisi ?></option>
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
                            <option value="">--Pilih Layanan/Service--</option>
                            <?php foreach ($service as $ser) { ?>
                                <option <?= $pengiriman->id_layanan_ekspedisi == $ser->id_layanan_ekspedisi ? 'selected' : '' ?> value="<?= $ser->id_layanan_ekspedisi ?>"><?= $ser->layanan_ekspedisi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="nama_pengirim">Nama Pengirim</label>
                        <input type="text" name="nama_pengirim" value="<?= $pengiriman->nama_pengirim ?>" id="nama_pengirim" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="jumlah_koli">Jumlah Koli</label>
                        <input type="text" name="jumlah_koli" value="<?= $pengiriman->jumlah_koli ?>" id="jumlah_koli" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="berat_barang">Berat Barang</label>
                        <input type="text" name="berat_barang" id="berat_barang" value="<?= $pengiriman->berat_barang ?>" class="form-control">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_resi">Nomor Resi</label>
                        <input type="text" name="no_resi" value="<?= $pengiriman->no_resi ?>" id="no_resi" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="total_harga">Total Harga</label>
                        <input type="text" name="total_harga" value="<?= $pengiriman->total_harga ?>" id="total_harga" multiple class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title"> Packing / Koli</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Item</th>
                                    <th>Koli ke</th>
                                    <th>Berat Koli</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">

                                <?php
                                $pengbarDet = $this->General->fetch_records("tbl_pengiriman_barang_det", ['id_pengiriman' => $pengiriman->id_pengiriman]);
                                foreach ($pengbarDet as $pbd) {
                                ?>
                                    <tr>
                                        <td class="product-list">
                                            <select class="form-control input-xlarge select2" name="no_urut[]" style="width: 100%;" title="Pilih Item Barang" required>
                                                <option>--Pilih Items--</option>
                                                <?php foreach ($barang as $value) { ?>
                                                    <option <?= $pbd->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="koli[]" value="<?= $pbd->koli_ke ?>" class="form-control Poqty">
                                        </td>
                                        <td>
                                            <input type="number" name="berat_koli[]" value="<?= $pbd->berat_koli ?>" class="form-control Pohargasatuan">
                                        </td>
                                        <td>
                                            <input readonly type="text" name="no_sn[]" value="<?= $pbd->no_sn ?>" class="form-control Pohargasatuan">
                                        </td>
                                        <td>
                                            <input readonly type="text" name="harga_barang[]" value="<?= $pbd->harga_barang ?>" class="form-control Pohargasatuan">
                                        </td>
                                        <td>
                                            <input type="text" name="keterangan[]" value="<?php echo $pbd->keterangan ?>" class="form-control poKet">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
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

    <div class="modal fade" id="addData">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Data Barang</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered  " width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>No.</th>
                                    <th>Group Barang</th>
                                    <th>SubGroup Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Barang</th>
                                    <th class="text-center">Penuhi/Tidak Dipenuhi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sparepart</td>
                                    <td>CRM </td>
                                    <td>EXIT SHUTTER </td>
                                    <td> NCR </td>
                                    <td> NCR S55</td>
                                    <td> 123 </td>
                                    <td> Rp. 50.000</td>
                                    <td class="text-center">
                                        <input type="checkbox" checked disabled name="check[]">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sparepart</td>
                                    <td>CRM</td>
                                    <td>BELT LOWER</td>
                                    <td>NCR</td>
                                    <td>NCR S55</td>
                                    <td>1234</td>
                                    <td>Rp. 100.000</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="check[]">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">Total Harga :</td>
                                    <td>Rp. 150.000</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

    $(function() {
        $('.select2').select2();
    })
</script>