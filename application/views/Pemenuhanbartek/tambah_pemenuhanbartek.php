<form action="" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            TAMBAH PEMENUHAN BARANG UNTUK TEKNISI
        </header>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="tglPemenuhan">Tanggal Pemenuhan</label>
                        <input type="date" name="tglPemenuhan" id="tglPemenuhan" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="namaTeknisi">Nama Teknisi</label>
                        <input type="text" name="namaTeknisi" id="namaTeknisi" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="keperluan">Keperluan</label>
                        <input type="text" name="keperluan" id="keperluan" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" name="namaBarang" id="namaBarang" class="form-control">
                    </div>
                </div>

            </div>

            <hr>

            <div class="row">

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="sandbox">
                        <label for="statusPemenuhan">Status Pemenuhan</label>
                        <select class="form-control" name="statusPemenuhan" id="statusPemenuhan" required>
                            <option value="AL">Pilih Status</option>
                            <option value="AL">Sudah Dipenuhi</option>
                            <option value="AL">Belum Dipenuhi</option>
                        </select>
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
                                    <th>Quantity</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th>Have PPN</th>
                                    <th>Sub Total</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody id="rows-list">

                                <tr>
                                    <td class="product-list">
                                        <select class="form-control product input-xlarge" name="no_urut[]" onchange="return get_purchased_data(this.value);">
                                            <option value="">Tambah Barang</option>
                                        </select>
                                    </td>
                                    <td><input type="number" name="qty[]" class="form-control carton"></td>
                                    <td>
                                        <input type="number" name="harga_satuan[]" class="form-control rate">
                                    </td>
                                    <td><input type="number" name="totals[]" class="form-control total" readonly></td>
                                    <td class="text-center"><input type="checkbox" name="have_ppn[]" value="1"></td>
                                    <td><input type="number" name="totals[]" class="form-control total" readonly></td>
                                    <td><input type="text" name="qty[]" class="form-control carton"></td>
                                    <td align="center">
                                        <button type="button" class="btn btn-danger btn-sm delete-row">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>

                            <tfoot>

                                <tr>
                                    <td style="text-align:right;" colspan="6">
                                        <strong style="color: inherit;">Total PPN:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="text" id="total_discount" class="form-control" name="total_discount" tabindex="" value="0.00" readonly="readonly">
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="6" style="text-align:right;">
                                        <strong style="color: inherit;">Grand Total:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="text" id="grand_total" tabindex="" class="form-control" name="total_amount" value="0.00" readonly="readonly">
                                    </td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        <button type="button" id="add-invoice-item" class="btn btn-success btn-sm valid" name="add-invoice-item" onclick="addPurchaseInputField('rows-list');" value="" tabindex="9" aria-invalid="false"><i class="fa fa-plus"></i></button>
                                    </td>
                                    <td style="text-align:right;" colspan="5">
                                        <strong style="color: inherit;">Total:</strong>
                                    </td>
                                    <td class="text-right">
                                        <input type="text" value="0" id="total" name="total" class="form-control">
                                    </td>
                                    <td></td>
                                </tr>

                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function get_product(category_id) {
        //        alert(category_id);
        // get the product list
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/sales/get_sale_product_list/' + category_id,
            success: function(response) {
                $('#product_list_holder').html(response);
            }
        });

    }

    total_number = 0;

    function add_product(product_id) {
        //if (total_number != 0)
        //  total_number = 0;

        total_number++;

        // get the product detail
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/sales/get_selected_product/' + product_id + '/' + total_number,
            success: function(response) {
                jQuery('#invoice_entry_holder').append(response);
                calculate_grand_total();
                calculate_change_amount();
            }
        });
    }

    function delete_row(entry_number) {

        //alert(entry_number);
        // return false;
        $("#entry_row_" + entry_number).remove();

        for (var i = entry_number; i < total_number; i++) {

            $("#serial_" + (i + 1)).attr("id", "serial_" + i);
            $("#serial_" + (i)).html(i);

            $("#quantity_" + (i + 1)).attr("id", "quantity_" + i);
            $("#quantity_" + (i)).attr({
                onkeyup: "calculate_single_entry_sum(" + i + ")",
                onclick: "calculate_single_entry_sum(" + i + ")"
            });

            $("#unit_price_" + (i + 1)).attr("id", "unit_price_" + i);
            $("#unit_price_" + (i)).attr({
                onkeyup: "calculate_single_entry_sum(" + i + ")",
                onclick: "calculate_single_entry_sum(" + i + ")"
            });

            $("#delete_button_" + (i + 1)).attr("id", "delete_button_" + i);
            $("#delete_button_" + (i)).attr("onclick", "delete_row(" + i + ")");

            $("#entry_row_" + (i + 1)).attr("id", "entry_row_" + i);
        }

        total_number--;
        calculate_grand_total_for_purchase();
    }

    function calculate_grand_total() {

        // calculating subtotal
        sub_total = 0;
        for (var i = 1; i <= total_number; i++) {
            sub_total += Number($("#single_entry_total_" + i).val());

        }
        $("#sub_total").attr("value", sub_total);

        // calculating grand total
        discount_percentage = Number($("#discount_percentage").val());
        vat_percentage = Number($("#vat_percentage").val());

        sub_total = sub_total - (sub_total * (discount_percentage / 100));
        grand_total = sub_total + (sub_total * (vat_percentage / 100));

        grand_total = grand_total.toFixed(2);
        $("#grand_total").attr("value", grand_total);
        calculate_change_amount();
    }


    function calculate_change_amount() {
        get_grand_total = Number($("#net_payment").val());
        get_payment_amount = Number($("#payment").val());

        if (get_payment_amount > get_grand_total) {

            change_amount = get_payment_amount - get_grand_total;
            change_amount = change_amount.toFixed(2);
            $("#change_amount").attr("value", change_amount);
            get_change_amount = Number($("#change_amount").val());
            net_payable = get_payment_amount - get_change_amount;
            net_payable = net_payable.toFixed(2);
            $("#net_payment").attr("value", net_payable);
            $("#due_amount").attr("value", 0);
        }

        if (get_payment_amount < get_grand_total) {

            $("#change_amount").attr("value", 0);
            $("#net_payment").attr("value", get_payment_amount);
            get_due_amount = get_grand_total - get_payment_amount;
            get_due_amount = get_due_amount.toFixed(2);
            $("#due_amount").attr("value", get_due_amount);
        }

        if (get_payment_amount == get_grand_total) {

            $("#change_amount").attr("value", 0);
            $("#net_payment").attr("value", get_payment_amount);
            $("#due_amount").attr("value", 0);
        }
    }

    function calculate_single_entry_total(entry_number) {

        quantity = $("#single_entry_quantity_" + entry_number).val();
        selling_price = $("#single_entry_selling_price_" + entry_number).val();

        single_entry_total = quantity * selling_price;
        $("#single_entry_total_" + entry_number).val(single_entry_total);

        // on change each single entry, update the grand total area also
        calculate_grand_total();
        calculate_change_amount();
    }

    function calculate_grand_total_for_purchase() {

        grand_total = 0;
        for (var i = 1; i <= total_number; i++) {
            grand_total += Number($("#single_entry_total_" + i).val());

        }
        //alert(grand_total);
        $("#sub_total").val(grand_total);
    }

    function calculate_discount(id) {

        var amount = $("#sub_total").val();
        discount = (id / 100) * amount;
        var net_payment = amount - discount;
        $("#net_payment").val(net_payment);


    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true
        })
        var base_url = "<?= base_url() ?>";
        // $(".demo-select2-2").select2({
        //     dir:"ltr"
        // });

        var list = $("#rows-list");
        var row = list.children('tr:first');
        $("#add-item").on('click', function(e) {
            e.preventDefault();
            var newRow = row.clone();
            list.append(newRow);
            // $(".demo-select2-2").select2('refresh');
            do_grand_total();
        });

        $(list).on('click', ".delete-row", function() {
            if (list.children("tr").length > 1) {
                $(this).closest('tr').remove();
                do_grand_total();
            } else {
                alert("This row cannot be deleted");
            }
        });

        $(list).on('change', ".product", function() {
            var id = $(this).val();
            var row = $(this).closest('tr');
            var csrf_test_name = $("input[name=csrf_test_name]").val();
            $.ajax({
                type: 'post',
                url: base_url + 'index.php/sales/imran',
                data: {
                    'id': id,
                    'csrf_test_name': csrf_test_name
                }
            }).then(function(res) {
                var res = $.parseJSON(res);
                if (res.stock_qty > 0) {
                    row.find(".stock").val(res.stock_qty);
                    row.find(".items-carton").val(res.cart_qty);
                    row.find(".rate").val(res.stock_rate);
                    row.find(".category").val(res.category_id);
                    row.find(".discount").val(0);
                    row.find(".supplier_rate").val(res.supplier_price);
                    row.find(".carton").removeAttr('readonly', 'readonly');
                    do_total(row);
                    do_grand_total();
                } else {
                    toastr.warning('quantity is less');
                    row.find(".stock").val('');
                    row.find(".items-carton").val('');
                    row.find(".carton").attr('readonly', 'readonly');
                    row.find(".rate").val('');
                    row.find(".supplier_rate").val('');

                }
            }, function() {
                alert("Sorry cannot get the product details!");
            });
        });

        $(list).on('input propertychange paste', ".carton, .rate, .discount", function() {
            if ($(this).hasClass("carton")) {
                var stock = Number($(this).closest("tr").find(".stock").val());
                if (Number($(this).val()) > stock) {
                    $(this).css({
                        "border": "1px solid red"
                    });
                    toastr.warning("Available stock is " + stock);
                } else {
                    $(this).css({
                        "border": "1px solid green"
                    });
                }
            }
            do_total(this);
            do_grand_total();
        });

        $("#paid_amount").on('input propertychange paste', function() {
            do_paid_total(this);
        });

        function do_total(elem) {
            var row = $(elem).closest('tr');
            var carton = Number(row.find(".carton").val());
            // var items = Number(row.find(".items-carton").val());
            var rate = Number(row.find(".rate").val());
            var discount = Number(row.find(".discount").val());
            //row.find(".quantity").val((carton * items));
            var row_items = (carton);
            var row_discount = row_items * discount;
            var total = (row_items * rate) - row_discount;
            row.find(".total").val(total);
        }

        function do_grand_total() {
            var total = 0;
            var g_discount = 0;
            $(list).find(".total").each(function(e) {
                total += Number($(this).val());
            });
            $(list).find("tr").each(function(e) {
                var discount = Number($(this).find(".discount").val());
                var quantity = Number($(this).find(".carton").val());
                g_discount += Number(discount * quantity);
            });
            //var vat_percentage = Number($("#total_vat").val());

            //total = total + (total * (vat_percentage / 100));
            $("#total_discount").val(g_discount);
            $("#grand_total").val(total);
            $("#due_amount").val(total - Number($("#paid_amount").val()));
        }

        function do_paid_total(row) {
            var paid_amount = Number($(row).val());
            var grand_total = Number($("#grand_total").val());
            $("#due_amount").val(grand_total - paid_amount);
        }

        $("#btn-full-paid").on("click", function(e) {
            e.preventDefault();
            var amount = $("#grand_total").val();
            $("#paid_amount").val(amount);
            $("#due_amount").val(0);

        });

    });
    // Add input field for new Invoice
    var count = 2;
    var limits = 500;

    function addPurchaseInputField(e) {
        var t = $("tbody#rows-list tr:first-child").html();
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#rows-list").append("<tr>" + t + "</tr>")
    }
</script>