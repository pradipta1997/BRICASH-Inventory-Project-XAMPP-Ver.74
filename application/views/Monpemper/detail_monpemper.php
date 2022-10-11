<form action="" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            DETAIL MONITRONG PEMBUKUAN PERSEDIAAN
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4 sandbox">
                    <label for="tanggalPengiriman">Tanggal Pengiriman</label>
                    <input type="date" name="tanggalPengiriman" value="" id="tanggalPengiriman" class="form-control" readonly>
                </div>

                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="tanggalDiterima">Tanggal Diterima</label>
                        <input type="date" name="tanggalDiterima" value="2021-04-29" id="tanggalDiterima" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="ukerPengirim">Uker Pengirim</label>
                        <input type="text" name="ukerPengirim" value="Pengadaan" id="ukerPengirim" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="sandbox">
                        <label for="ukerPenerima">Uker Penerima</label>
                        <input type="text" name="ukerPenerima" value="Madium" id="ukerPenerima" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="ket">Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" rows="3" readonly>-</textarea>
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
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <tr>
                                    <td>1</td>
                                    <td class="product-list">BELT LOWER</td>
                                    <td>NCR</td>
                                    <td>NCR S55</td>
                                    <td>2</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="product-list">BELT UPPER</td>
                                    <td>NCR</td>
                                    <td>NCR S55</td>
                                    <td>5</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="product-list">BOARD DISPENSER</td>
                                    <td>NCR</td>
                                    <td>NCR S55 </td>
                                    <td>6</td>
                                    <td>-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="<?= base_url("Monpemper") ?>" class="btn btn-warning btn-sm">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    let total_number = 0;

    $(document).ready(function() {
        var list = $("#rows-list");

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