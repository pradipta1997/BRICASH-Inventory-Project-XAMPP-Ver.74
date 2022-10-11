<form action="<?= base_url('Permintaanbarang/updatePermintaanbarang/' . $permintaan->id_permintaan) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PERMINTAAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_permintaan">Tanggal Diminta</label>
                        <input type="date" name="tgl_permintaan" value="<?= $permintaan->tgl_permintaan ?>" id="tgl_permintaan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_permintaan">No Permintaan</label>
                        <input type="text" name="no_permintaan" value="<?= $permintaan->no_permintaan ?>" id="no_permintaan" class="form-control" style="color: red;" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="alasan_permintaan">Alasan Permintaan</label>
                        <input type="text" name="alasan_permintaan" value="<?= $permintaan->alasan_permintaan ?>" id="alasan_permintaan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="catatan_permintaa">Catatan Permintaan</label>
                        <input type="text" name="catatan_permintaan" value="<?= $permintaan->catatan_permintaan ?>" id="catatan_permintaan" class="form-control" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tempo_barang">Tempo Barang</label>
                        <input type="number" name="tempo_barang" value="<?= $permintaan->tempo_barang ?>" id="tempo_barang" value="3" class="form-control" required>
                    </div>
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
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Item</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                    <!-- <th>Harga</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tbody id="rows-list">
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control product input-xlarge" name="no_urut[]">
                                            <option value="">Tambah Barang</option>
                                            <option value="" selected>CE 280 DW</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="merek_barang[]" value="Wincore" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="tipe_barang[]" value="WINCOR 280 DW" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" value="2" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" value="-" class="form-control">
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control product input-xlarge" name="no_urut[]">
                                            <option value="">Tambah Barang</option>
                                            <option value="" selected>BELT 518</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="merek_barang[]" value="NCR" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="tipe_barang[]" value="NCR S55" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" value="1" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" value="-" class="form-control">
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control product input-xlarge" name="no_urut[]">
                                            <option value="">Tambah Barang</option>
                                            <option value="" selected>BOARD INTERFACE</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="merek_barang[]" value="NCR" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="tipe_barang[]" value="WINCOR 280 DW" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" value="5" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" value="-" class="form-control">
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody> -->
                            <tbody id="rows-list">
                                <?php
                                $permintaandet = $this->General->fetch_records("v_permintaan_barang_det", ['id_permintaan' => $permintaan->id_permintaan]);
                                foreach ($permintaandet as $result) {
                                ?>
                                    <tr>
                                        <td class="product-list">
                                            <select class="form-control input-xlarge Perbar_barang" name="no_urut[]" style="width: 100%;" onchange="caribarang(this.value)" required>
                                                <option>--Pilih Items--</option>
                                                <?php foreach ($barang as $value) { ?>
                                                    <option <?= $result->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td><input type="text" value="<?= $result->nama_merek ?>" class="form-control Perbar_merekbarang" readonly></td>
                                        <td><input type="text" value="<?= $result->tipe_barang ?>" class="form-control Perbar_tpbarang" readonly></td>
                                        <td><input type="number" name="qty[]" value="<?= $result->qty ?>" class="form-control" required></td>
                                        <td><input type="text" name="keterangan[]" value="<?= $result->keterangan ?>" class="form-control carton" required></td>
                                        <!-- <td><input type="text" name="harga[]" value="<?= $result->harga_barang ?>" class="form-control carton"></td> -->
                                        <td align="center">
                                            <button type="button" class="btn btn-danger btn-sm delete-row">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="center">
                                        <button type="button" class="btn btn-success btn-sm" onclick="addBarang('rows-list');">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <input type="submit" class="btn btn-primary btn-sm" value="Proceed">
                            <a href="<?= base_url('Permintaanbarang') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const urlPermintaanbarang = '<?= site_url("Permintaanbarang/") ?>';
    let total_number = 0;

    function caribarang(isinya) {
        $.ajax({
            type: "POST",
            url: urlPermintaanbarang + "caribarang",
            data: {
                no_urut: isinya
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    $('#mbrg').val(response.nama_merek);
                    $('#tpbrg').val(response.tipe_barang);
                    // $('#kdbrg').val(response.kode_barang);
                    // $('#nmbrg').val(response.nama_barang);
                } else {
                    $('#mbrg').val('-');
                    $('#tpbrg').val('-');
                    // $('#kdbrg').val('-');
                    // $('#nmbrg').val('-');
                }
            }
        });
    }

    $(document).ready(function() {
        var list = $("#rows-list");

        $(list).on("change", ".Perbar_barang", function() {
            var row = $(this).closest("tr");

            $.ajax({
                type: "POST",
                url: urlPermintaanbarang + "caribarang",
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

        $(list).on('click', ".delete-row", function() {
            if (list.children("tr").length > 1) {
                $(this).closest('tr').remove();
            } else {
                alert("This row cannot be deleted");
            }
        });
    });

    // Add input field for new Invoice
    var count = 2;
    var limits = 500;

    function addBarang(e) {
        var t = $("tbody#rows-list tr:first-child").html();
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#rows-list").append("<tr>" + t + "</tr>")
    }

    function delete_row(entry_number) {
        $("#entry_row_" + entry_number).remove();

        for (var i = entry_number; i < total_number; i++) {
            $("#entry_row_" + (i + 1)).attr("id", "entry_row_" + i);
        }

        total_number--;
    }
</script>