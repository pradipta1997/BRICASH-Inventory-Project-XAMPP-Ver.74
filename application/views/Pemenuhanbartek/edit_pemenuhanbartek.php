<form action="<?= base_url('Pemenuhanbartek/updatePemenuhanbartek/' . $perTek->id_pertek) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PEMENUHAN BARANG UNTUK TEKNISI
        </header>
        <div class="panel-body">
            <div class="row">
                <?php if ($perTek->status_pertek == 1) { ?>
                    <div class="col-md-3">
                        <div class="sandbox">
                            <label for="tglPemenuhan">Tanggal Pemenuhan</label>
                            <input type="date" name="tglPemenuhan" value="<?php echo $perTek->tanggal_pemenuhan; ?>" id="tglPemenuhan" class="form-control" title="Input Tanggal Pemenuhan" required>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-3">
                        <div class="sandbox">
                            <label for="tglPemenuhan">Tanggal Pemenuhan</label>
                            <input type="date" name="tglPemenuhan" id="tglPemenuhan" class="form-control" title="Input Tanggal Pemenuhan" required>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="namaTeknisi">Nama Teknisi</label>
                        <select readonly name="namaTeknisi" id="namaTeknisi" class="form-control select2" style="width: 100%;" required>
                            <option value="">--Pilih Teknisi--</option>
                            <?php foreach ($namaTeknisi as $nt) {  ?>
                                <option <?= $perTek->id_user == $nt->id_user ? 'selected' : '' ?> value="<?= $nt->id_user ?>"><?= $nt->nama_uker . " | " . $nt->username ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tid">TID</label>
                        <select readonly name="tid" id="tid" class="form-control select2" style="width: 100%;" required>
                            <option value="">--Pilih TID--</option>
                            <?php foreach ($tid as $t) {  ?>
                                <option <?= $perTek->id_project == $t->id_project ? 'selected' : '' ?> value="<?= $t->id_project ?>"><?= $t->tid ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="keteranganHeader">Keterangan</label>
                        <input  readonly type="text" value="<?= $perTek->keterangan; ?>" name="keteranganHeader" id="keteranganHeader" class="form-control" title="Input Keterangan" required>
                    </div>
                </div>
            </div>

    </section>

    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">

                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Item</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>No SN</th>
                                    <th>Harga Satuan</th>
                                    <th>Have PPN</th>
                                    <th>Total PPN</th>
                                    <th>Total</th>
                                    <th>Keterangan</th>

                                </tr>
                            </thead>

                            <tbody id="rows-list">
                                <?php
                                $pembartekDet = $this->General->fetch_records("v_pertekdet", ['id_pertek' => $perTek->id_pertek]);
                                $subtotal = 0;
                                $totalppn = 0;
                                $grandtotal = 0;
                                if ($pembartekDet) {
                                    foreach ($pembartekDet as $pemenuhan) {
                                        for ($x = 1; $x <= $pemenuhan->qty; $x++) {
                                ?>

                                            <tr>
                                                <td class="product-list">
                                                    <select readonly class="form-control input-xlarge Perbar_barang" name="no_urut[]" style="width: 100%;" title="Pilih Item Barang" required>
                                                        <option>--Pilih Items--</option>
                                                        <?php foreach ($namaBarang as $value) { ?>
                                                            <option <?= $pemenuhan->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" value="<?= $nm_brg->nama_merek ?>" id="merek_barang[]" name="merek_barang[]" class="form-control Perbar_merekbarang" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" value="<?= $nm_brg->tipe_barang ?>" id="tp_barang[]" name="tp_barang[]" class="form-control Perbar_tpbarang" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" value="<?php echo $pemenuhan->no_sn_new; ?>" id="no_sn[]" name="no_sn[]" class="form-control Perbar_nosn" required>
                                                    <input type="hidden" name="qty[]" value="1" class="form-control PemlocQty">
                                                </td>
                                                <td>
                                                    <input type="number" name="harga_satuan[]" value="<?php echo $pemenuhan->harga_satuan ?>" class="form-control PemlocHargasatuan" required>
                                                </td>
                                                <?php if ($pemenuhan->totalppn > 0) { ?>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="have_ppn[]" class="PemlocHave_ppn" checked value="1">
                                                    </td>
                                                <?php } else { ?>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="have_ppn[]" class="PemlocHave_ppn" value="1">
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <input type="number" name="total_ppn[]" value="<?php echo $pemenuhan->totalppn; ?>" class="form-control Pemlocppn" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" name="total[]" value="<?php echo $pemenuhan->qty * $pemenuhan->harga_satuan + $pemenuhan->totalppn; ?>" class="form-control PemlocTotal" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" id="keterangan[]" name="keterangan[]" class="form-control carton" value="<?php echo $pemenuhan->keterangan; ?>" required>
                                                </td>
                                            </tr>
                                <?php }
                                    }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tfoot>
                                    <tr>
                                        <td style="text-align:right;" colspan="6">
                                            <strong style="color: inherit;">Subtotal:</strong>
                                        </td>
                                        <td colspan="2" class="text-right">
                                            <input type="number" id="subtotal" value="<?php echo $totalHarga[0]->subtotal; ?>" class="form-control" name="subtotal" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align:right;">
                                            <strong style="color: inherit;">Subtotal PPN:</strong>
                                        </td>
                                        <td colspan="1" class="text-right">
                                            <input type="number" id="subtotal_ppn" value="<?php echo $ppkmmode[0]->subtotal; ?>" class="form-control" name="subtotal_ppn" readonly>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" style="text-align:right;">
                                            <strong style="color: inherit;">Grand Total:</strong>
                                        </td>
                                        <td colspan="1">
                                            <?php $grandtotal = $totalppn + $subtotal; ?>
                                            <input type="number" id="grand_total" value="<?php echo $grandservant[0]->subtotal; ?>" class="form-control" name="grand_total" readonly>
                                        </td>
                                    </tr>
                                </tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary btn-sm" value="Penuhi">
                            <a href="<?= base_url('Pemenuhanbartek') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    const urlPemenuhanbartek = '<?= site_url("Pemenuhanbartek/") ?>';

    $(document).ready(function() {
        var list = $("#rows-list");
        var row = list.children('tr:first');

        $(list).on('input propertychange paste', ".PemlocQty, .PemlocHargasatuan, .PemlocHave_ppn", function() {
            pemloc_total(this);
            pemloc_subtotal();
        });

        function pemloc_subtotal() {
            var subtotal = 0;
            var Pemlochave_ppn = 0;

            $(list).find(".PemlocTotal").each(function(e) {
                subtotal += Number($(this).val());
            });

            $(list).find("tr").each(function(e) {
                var PemlocQty = Number($(this).find(".PemlocQty").val());
                var PemlocHargasatuan = Number($(this).find(".PemlocHargasatuan").val());
                var Pemlocppn = Number($(this).find(".Pemlocppn").val());
                Pemlochave_ppn += Pemlocppn;
            });

            $("#subtotal_ppn").val(Pemlochave_ppn);
            $("#subtotal").val(subtotal);
            $("#grand_total").val(Pemlochave_ppn + subtotal);
        }

        $(list).on('input property change paste', ".Poqty, .Pohargasatuan, .Pototalppn", function() {
            pemloc_total(this);
            pemloc_subtotal();
        });

        $(function() {
            $('.select2').select2();
            $('#catatan_po').summernote({
                height: 200,
            });
            $('#term_condition').summernote({
                height: 200,
            });
        })

        $(list).on("change", ".Perbar_barang", function() {
            var row = $(this).closest("tr");

            $.ajax({
                type: "POST",
                url: urlPemenuhanbartek + "caribarang",
                data: {
                    no_urut: row.find(".Perbar_barang").val(),
                },
                dataType: "json",
                success: function(response) {
                    if (response) {
                        row.find(".Perbar_merekbarang ").val(response.nama_merek);
                        row.find(".Perbar_tpbarang").val(response.tipe_barang);
                    } else {
                        row.find(".Perbar_merekbarang ").val("-");
                        row.find(".Perbar_tpbarang").val("-");
                    }
                },
            });
        });
    });

    function pemloc_total(elem) {
        var row = $(elem).closest('tr');
        var PemlocQty = Number(row.find(".PemlocQty").val());
        var PemlocHargasatuan = Number(row.find(".PemlocHargasatuan").val());
        // var PemlocCurrency = Number(row.find(".PemlocCurrency").val());
        let PemlocHave_ppn = 0;

        if (row.find(".PemlocHave_ppn").is(':checked')) {
            // PemlocHave_ppn += (PemlocQty * (PemlocHargasatuan * PemlocCurrency)) * 10 / 100;
            PemlocHave_ppn += (PemlocQty * PemlocHargasatuan) * 10 / 100;
        } else {
            PemlocHave_ppn += 0;
        }

        row.find(".Pemlocppn").val(PemlocHave_ppn);
        // row.find(".PemlocTotal").val(PemlocQty * (PemlocHargasatuan * PemlocCurrency));
        row.find(".PemlocTotal").val(PemlocQty * PemlocHargasatuan);
    }
    
</script>