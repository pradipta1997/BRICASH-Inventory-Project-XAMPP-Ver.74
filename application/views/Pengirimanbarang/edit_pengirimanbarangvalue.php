<style>
    .wizard {
        margin: 20px auto;
        background: #fff;
    }

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard>div.wizard-inner {
        position: relative;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 80%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs>li.active>a,
    .wizard .nav-tabs>li.active>a:hover,
    .wizard .nav-tabs>li.active>a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 70px;
        height: 70px;
        line-height: 70px;
        display: inline-block;
        border-radius: 100px;
        background: #fff;
        border: 2px solid #e0e0e0;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 25px;
    }

    span.round-tab i {
        color: #555555;
    }

    .wizard li.active span.round-tab {
        background: #fff;
        border: 2px solid #5bc0de;

    }

    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }

    span.round-tab:hover {
        color: #333;
        border: 2px solid #333;
    }

    .wizard .nav-tabs>li {
        width: 25%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: #5bc0de;
        transition: 0.1s ease-in-out;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 1;
        margin: 0 auto;
        bottom: 0px;
        border: 10px solid transparent;
        border-bottom-color: #5bc0de;
    }

    .wizard .nav-tabs>li a {
        width: 70px;
        height: 70px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
    }

    .wizard .nav-tabs>li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 50px;
    }

    .wizard h3 {
        margin-top: 0;
    }

    .step1 .row {
        margin-bottom: 10px;
    }

    .step_21 {
        border: 1px solid #eee;
        border-radius: 5px;
        padding: 10px;
    }

    .step33 {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding-left: 10px;
        margin-bottom: 10px;
    }

    .dropselectsec {
        width: 68%;
        padding: 6px 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        color: #333;
        margin-left: 10px;
        outline: none;
        font-weight: normal;
    }

    .dropselectsec1 {
        width: 74%;
        padding: 6px 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        color: #333;
        margin-left: 10px;
        outline: none;
        font-weight: normal;
    }

    .mar_ned {
        margin-bottom: 10px;
    }

    .wdth {
        width: 25%;
    }

    .birthdrop {
        padding: 6px 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        color: #333;
        margin-left: 10px;
        width: 16%;
        outline: 0;
        font-weight: normal;
    }


    /* according menu */
    #accordion-container {
        font-size: 13px
    }

    .accordion-header {
        font-size: 13px;
        background: #ebebeb;
        margin: 5px 0 0;
        padding: 7px 20px;
        cursor: pointer;
        color: #fff;
        font-weight: 400;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px
    }

    .unselect_img {
        width: 18px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .active-header {
        -moz-border-radius: 5px 5px 0 0;
        -webkit-border-radius: 5px 5px 0 0;
        border-radius: 5px 5px 0 0;
        background: #F53B27;
    }

    .active-header:after {
        content: "\f068";
        font-family: 'FontAwesome';
        float: right;
        margin: 5px;
        font-weight: 400
    }

    .inactive-header {
        background: #333;
    }

    .inactive-header:after {
        content: "\f067";
        font-family: 'FontAwesome';
        float: right;
        margin: 4px 5px;
        font-weight: 400
    }

    .accordion-content {
        display: none;
        padding: 20px;
        background: #fff;
        border: 1px solid #ccc;
        border-top: 0;
        -moz-border-radius: 0 0 5px 5px;
        -webkit-border-radius: 0 0 5px 5px;
        border-radius: 0 0 5px 5px
    }

    .accordion-content a {
        text-decoration: none;
        color: #333;
    }

    .accordion-content td {
        border-bottom: 1px solid #dcdcdc;
    }



    @media(max-width : 585px) {

        .wizard {
            width: 90%;
            height: auto !important;
        }

        span.round-tab {
            font-size: 16px;
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard .nav-tabs>li a {
            width: 50px;
            height: 50px;
            line-height: 50px;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 35%;
        }
    }
</style>

<form action="<?= base_url('Pengirimanbarang/updatePengiriman/' . $pengiriman->id_pengirimankekp) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PENGIRIMAN BARANG KE KP/KC
        </header>
        <div class="panel-body">
            <div class="row">
                <section>
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#pengbar" data-toggle="tab" aria-controls="pengbar" role="tab" title="Pengeluaran Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#pacbar" data-toggle="tab" aria-controls="pacbar" role="tab" title="Packing Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#pengrimbar" data-toggle="tab" aria-controls="pengrimbar" role="tab" title="Pengiriman Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-picture"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <form role="form">
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="pengbar">
                                    <div class="pengbar">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">No Permintaan</label>
                                                            <input type="text" style="color: red;" readonly name="noPermintaan" value="<?= $pengiriman->no_permintaan ?>" id="noPermintaan" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="tanggal_permintaan">Tanggal Pengiriman</label>
                                                            <input type="date" name="tanggal_pengiriman" id="tanggal_pengiriman" value="<?= $pengiriman->tanggal_pengiriman ?>" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="jumlah_permintaan">Jumlah Permintaan</label>
                                                            <input type="number" value="<?= $pengiriman->jumlah_permintaan ?>" name="jumlah_permintaan" id="jumlah_permintaan" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="jumlah_pemenuhan">Jumlah Pemenuhan</label>
                                                            <input type="number" name="jumlah_pemenuhan" value="<?= $pengiriman->jumlah_pemenuhan ?>" id="jumlah_pemenuhan" class="form-control">
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="sisa">Sisa</label>
                                                            <input type="number" name="sisa" value="<?= $pengiriman->sisa ?>" id="sisa" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="sisa">Estimasi Pengiriman</label>
                                                            <input type="number" name="estimasi" value="<?= $pengiriman->estimasi ?>" id="estimasi" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="sisa">No Resi</label>
                                                            <input type="text" name="no_resi" value="<?= $pengiriman->no_resi ?>" id="no_resi" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="sisa">Nama Pengirim</label>
                                                            <input type="text" name="nama_pengirim" value="<?= $pengiriman->nama_pengirim ?>" id="nama_pengirim" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="sisa">Berat Barang</label>
                                                            <input type="number" name="berat_barang" id="berat_barang" value="<?= $pengiriman->berat_barang ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary btn-sm next-step" style="font-weight: bold; margin-right: 10px;">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="pacbar">
                                    <div class="pacbar">
                                        <div class="table-responsive">
                                            <table id="" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>No SN</th>
                                                        <th>Harga Barang</th>
                                                        <th>Kondisi Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rows-list">
                                                    <?php
                                                    $ditel = $this->General->fetch_records("tbl_pengirimankekp_det", ['id_pengirimankekp' => $pengiriman->id_pengirimankekp]);
                                                    if ($ditel) {
                                                        foreach ($ditel as $value) {
                                                    ?>
                                                            <tr>
                                                                <td class="product-list">
                                                                    <select class="form-control no_urut" name="no_urut[]" style="width: 100%;" id="no_urut[]" required>
                                                                        <option value="">-- Pilih Barang --</option>
                                                                        <?php foreach ($namaBarang as $val) { ?>
                                                                            <option <?= $value->no_urut == $val->no_urut ? 'selected' : '' ?> value="<?php echo $val->no_urut ?>"><?= $val->nama_barang ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" value="<?php echo $value->no_sn; ?>" name="no_sn[]" class="form-control carton"></td>
                                                                <td>
                                                                    <input type="number" value="<?php echo $value->harga_barang; ?>" name="harga_barang[]" class="form-control rate">
                                                                </td>
                                                                <td>
                                                                    <select class="form-control kondisi_barang" name="kondisi_barang[]" style="width: 100%;" id="kondisi_barang[]" required>
                                                                        <option value="">-- Kondisi Barang --</option>
                                                                        <option <?php if ($value->kondisi_barang == 0) echo ' selected="selected"'; ?> value="0">Rusak</option>
                                                                        <option <?php if ($value->kondisi_barang == 1) echo ' selected="selected"'; ?> value="1">Bagus</option>
                                                                    </select>
                                                                </td>
                                                                <td align="center">
                                                                    <button type="button" class="btn btn-danger btn-sm delete-row">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                    <?php }
                                                    } ?>
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
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default btn-sm prev-step" style="font-weight: bold; margin-right: 10px;">Previous</button></li>
                                        <li><button type="button" class="btn btn-primary btn-sm next-step" style="font-weight: bold; margin-right: 10px;">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="pengrimbar">
                                    <div class="pengrimbar">
                                        <section class="panel">
                                            <div class="panel-body">

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="d_type">Delivery Type</label>
                                                            <select class="form-control d_type" name="d_type" style="width: 100%;" id="d_type" required>
                                                                <option value="">-- Pilih Delivery Type --</option>
                                                                <?php foreach ($deliveryType as $val) { ?>
                                                                    <option <?= $pengiriman->id_delivery_type == $val->id_delivery_type ? 'selected' : '' ?> value="<?php echo $val->id_delivery_type ?>"><?= $val->nama_delivery_type ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="ekspedisi">Ekspedisi</label>
                                                            <select class="form-control id_ekpedisi" name="id_ekpedisi" style="width: 100%;" id="id_ekpedisi" required>
                                                                <option value="">-- Pilih Delivery Type --</option>
                                                                <?php foreach ($ekspedisi as $val) { ?>
                                                                    <option <?= $pengiriman->id_ekpedisi == $val->id_ekpedisi ? 'selected' : '' ?> value="<?php echo $val->id_ekpedisi ?>"><?= $val->nama_ekpedisi ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="tujuan">Tujuan</label>
                                                            <select class="form-control id_uker" name="id_uker" style="width: 100%;" id="id_uker" required>
                                                                <option value="">-- Pilih Delivery Type --</option>
                                                                <?php foreach ($uker as $val) { ?>
                                                                    <option <?= $pengiriman->id_uker == $val->id_uker ? 'selected' : '' ?> value="<?php echo $val->id_uker ?>"><?= $val->nama_uker ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="j_koli">Jumlah Koli</label>
                                                            <input type="text" name="j_koli" id="j_koli" value="<?php echo $pengiriman->j_koli; ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                        </section>
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-default btn-sm prev-step" style="font-weight: bold; margin-right: 10px;">Previous</button></li>
                                        <li><input type="submit" class="btn btn-primary btn-sm btn-sm-full next-step" style="font-weight: bold; margin-right: 10px;"></input></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="complete">
                                    <div class="text-center">
                                        <h3 style="font-weight: bold;">Completed</h3>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
</form>

<script>
    $(document).ready(function() {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function(e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });

        $(".select2").select2();
        var list = $("#rows-list");

        $(list).on('click', ".delete-row", function() {
            if (list.children("tr").length > 1) {
                $(this).closest('tr').remove();
            } else {
                alert("This row cannot be deleted");
            }
        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    //according menu

    $(document).ready(function() {
        //Add Inactive Class To All Accordion Headers
        $('.accordion-header').toggleClass('inactive-header');

        //Set The Accordion Content Width
        var contentwidth = $('.accordion-header').width();
        $('.accordion-content').css({});

        //Open The First Accordion Section When Page Loads
        $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
        $('.accordion-content').first().slideDown().toggleClass('open-content');

        // The Accordion Effect
        $('.accordion-header').click(function() {
            if ($(this).is('.inactive-header')) {
                $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
                $(this).toggleClass('active-header').toggleClass('inactive-header');
                $(this).next().slideToggle().toggleClass('open-content');
            } else {
                $(this).toggleClass('active-header').toggleClass('inactive-header');
                $(this).next().slideToggle().toggleClass('open-content');
            }
        });

        return false;
    });

    var total_number = 0;

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