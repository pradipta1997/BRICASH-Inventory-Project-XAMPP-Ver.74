<form action="<?= base_url('Permintaanbarang/savePermintaanbarang') ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            TAMBAH PERMINTAAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="no_permintaan">No Permintaan</label>
                        <input type="text" name="no_permintaan" id="no_permintaan" value="<?= $autoNoPerBar ?>" class="form-control" style="color: red;" title="No Permintaan Otomatis" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tgl_permintaan">Tanggal Diminta</label>
                        <input type="date" readonly name="tgl_permintaan" value="<?= date('Y-m-d') ?>" id="tgl_permintaan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="alasan_permintaan">Alasan Permintaan</label>
                        <input type="text" name="alasan_permintaan" id="alasan_permintaan" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="catatan_permintaan">Catatan Permintaan</label>
                        <input type="text" name="catatan_permintaan" id="catatan_permintaan" class="form-control" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tempo_barang">Tempo Barang ( SLA )</label>
                        <input type="number" name="tempo_barang" id="tempo_barang" class="form-control" required>
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
                                    <th>Subgroup Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merek Barang</th>
                                    <th>Tipe Barang</th>
                                    <th>Quantity</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <tr>
                                    <td class="product-list">
                                        <select class="form-control input-xlarge Perbar_sgbarang select2" id="sgbarang[]" name="sgbarang[]" style="width: 100%;" title="Pilih Item Barang" required>
                                            <option>--Pilih Items--</option>
                                            <?php foreach ($sgbarang as $value) { ?>
                                                <option value="<?= $value->id_sgbarang ?>"><?= $value->nama_sgbarang ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="product-list">
                                        <select class="form-control input-xlarge Perbar_barang select2" name="no_urut[]" id="no_urut[]" style="width: 100%;" title="Pilih Item Barang" required>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control Perbar_merekbarang" readonly>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control Perbar_tpbarang" readonly>
                                    </td>
                                    <td>
                                        <input type="number" name="qty[]" id="qty[]" class="form-control qty" required>
                                    </td>
                                    <td>
                                        <input type="text" name="keterangan[]" class="form-control" required>
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
                                        <button type="button" class="btn btn-success btn-sm" onclick="addBarang('rows-list');">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- <select class="form-control input-xlarge class_testing select2" name="testing" id="testing" style="width: 100%;" title="Pilih Item Barang" required> -->
                        </select>
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
    // const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    const urlPermintaanbarang = '<?= site_url("Permintaanbarang/") ?>';
    // let total_number = 0;

    // Add input field for new Invoice
    var count = 2;
    var limits = 500;

    var poqty = document.getElementsByName("qty[]")
    var list = $("#rows-list");
    var row = list.children('tr:first');

    $(document).ready(function() {

        


    });

    function po_subtotal() {
        var totalPenerimaan = 0;
        $(list).find(".qty").each(function(e){
            // totalPenerimaan += Number($(this).val());
            if(this.value<=0){
                // console.log(this.value);
                alert("Quantity Permintaan Barang Tidak Boleh Lebih Kecil/Sama Dengan 0.");
                $(this).val("1");
            }
            // console.log(this.value);
        })
        // $(list).find("tr").each(function(e){
        //     var Poqty = Number($(this).find(".poqty").val());
        //     var qty = Number($(this).find(".qty").val());
        //     var totalqty = Number($(this).find(".totalqty").val());
        //     var totaltur = Number($(this).find(".totalBartur").val());
        //     if(qty+totalqty-totaltur>Poqty){
        //         alert("Barang yang diterima melebihi jumlah PO.");
        //         $(this).find(".qty").val("1");
        //     }
        //     // alert(penerimaan);
        // });
    }



    function addBarang(e) {
        var t = $("tbody#rows-list tr:first-child").html();
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#rows-list").append("<tr>" + t + "</tr>")
    }



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
        $(list).on('change', ".qty", function() {
            var row = $(this).closest('tr');
            let ini = $(this);

            po_subtotal();
        });

        $(list).on("change", ".Perbar_sgbarang", function(){
            // console.log(this.value);
            var row = $(this).closest("tr");
            var tes = row.length-1
            // console.log(tes);

            $.ajax({
                type: "POST",
                url: urlPermintaanbarang + "fromSG",
                data: {
                    id_sgbarang: row.find(".Perbar_sgbarang").val(),
                },
                dataType: "JSON",
                success: function(response){
                    if(response.data){
                        // $('#testing').html(response.data);
                        row.find('.Perbar_barang').html(response.data);
                    }
                },
                error: function(xhr, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
                    // // console.log("Sukses");
                    // // var html = '';
                    // // var nourut = row.find("#no_urut");
                    // // row.find('#no_urut').html('');
                    // // row.find('#no_urut').append($('<option>Make Selection</option>'));
                    // for(let index = 0; index<array.length; index++){
                    //     // row.find('#no_urut').append($('<option></option>').text(array[index]));
                    //     // html+= "<option>"+array[index].nama_barang+"</option>"
                    //     // console.log(html);
                    // }
                    // console.log(row.find('#no_urut'));
                    // // row.find("#no_urut").html(html);
                    // // row.find("#no_urut").html(html);
                    // // $('#no_urut[]').html(html);
                });
         });

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


    function delete_row(entry_number) {
        $("#entry_row_" + entry_number).remove();

        for (var i = entry_number; i < total_number; i++) {
            $("#entry_row_" + (i + 1)).attr("id", "entry_row_" + i);
        }

        total_number--;
    }
</script>