<form action="<?= base_url('Perbartek/savePerbartek') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            TAMBAH PERMINTAAN BARANG TEKNISI
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="nomor_pertek">No Permintaan</label>
                        <input type="text" name="nomor_pertek" id="nomor_pertek" value="<?= $autoNoPertek ?>" class="form-control" style="color: red;" title="No Permintaan Otomatis" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="tanggal_pertek">Tanggal Permintaan</label>
                        <input type="date" name="tanggal_pertek" id="tanggal_pertek" value="<?= date('Y-m-d') ?>" class="form-control" title="Pilih Tanggal" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="id_user">Nama Teknisi</label>
                        <select name="id_user" id="id_user" class="form-control select2" style="width: 100%;" required>
                            <option value="">--Pilih Teknisi--</option>
                            <?php foreach ($userTek as $utk) {  ?>
                                <option value="<?= $utk->id_user ?>"><?= $utk->nama_uker . " | " . $utk->username ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="id_project">TID Project</label>
                        <select name="id_project" id="id_project" class="form-control select2" style="width: 100%;" required>
                            <option value="">--Pilih TID--</option>
                            <?php foreach ($tid as $value) { ?>
                                <option value="<?= $value->id_project ?>"><?= $value->tid . " | " . $value->nama_project ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control" title="Masukan Keterangan" required></textarea>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12 ui-sortable">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">DAFTAR BARANG DIMINTA</h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Select Item</th>
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control input-xlarge select2" name="no_urut[]" title="Pilih Item Barang" required>
                                            <option>--Pilih Items--</option>
                                            <?php foreach ($barang as $value) { ?>
                                                <option value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="qty[]" value="0" class="form-control" title="Masukan Jumlah Quantity" required></td>
                                    <td><input type="text" name="ketdet[]" class="form-control carton" title="Masukan Keterangan" required></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row" title="Hapus List Barang">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td align="left">
                                        <button type="button" class="btn btn-success btn-sm" title="Tambah List Barang" onclick="addBarang('rows-list');">
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
                            <a href="<?= base_url('Perbartek') ?>" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    total_number = 0;

    function add_product(product_id) {
        total_number++;
    }

    function delete_row(entry_number) {
        $("#entry_row_" + entry_number).remove();

        for (var i = entry_number; i < total_number; i++) {
            $("#delete_button_" + (i + 1)).attr("id", "delete_button_" + i);
            $("#delete_button_" + (i)).attr("onclick", "delete_row(" + i + ")");

            $("#entry_row_" + (i + 1)).attr("id", "entry_row_" + i);
        }

        total_number--;
    }

    $(document).ready(function() {
        $('.select2').select2();

        var list = $("#rows-list");

        $(list).on('click', ".delete-row", function() {
            if (list.children("tr").length > 1) {
                $(this).closest('tr').remove();
                do_grand_total();
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

    $(function() {
        $('.select2').select2();
    })
</script>