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

<form action="<?= base_url('Pemenuhanbarang/updatePemenuhanbarang/' . $permintaan->id_permintaan) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            PEMENUHAN BARANG
        </header>
        <div class="panel-body">
            <div class="row">
                <section>
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <!-- <li role="presentation" class="active">
                                    <a href="#pengbar" data-toggle="tab" aria-controls="pengbar" role="tab" title="Pengeluaran Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-folder-open"></i>
                                        </span>
                                    </a>
                                </li> -->
                                <li role="presentation" class="active" >
                                    <a href="#pacbar" data-toggle="tab" aria-controls="pengrimbar" role="tab" title="Item Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-picture"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled" style="margin-left: 170px;">
                                    <a href="#pengrimbar" data-toggle="tab" aria-controls="pacbar" role="tab" title="Pengiriman Barang">
                                        <span class="round-tab">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </span>
                                    </a>
                                </li>
                                <li role="presentation" class="disabled" style="float: right;">
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
                                <div class="tab-pane active" role="tabpanel" id="pacbar">
                                    <div class="pengbar">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">Jumlah Permintaan</label>
                                                            <input type="number" readonly name="jmlpemenuhan" value="<?php echo $jmlhpemenuhan[0]->jumlah; ?>" id="jmlpemenuhan" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">Jumlah Pemenuhan</label>
                                                            <input type="number" readonly name="pemenuhan" value="" id="pemenuhan" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">Sisa</label>
                                                            <input type="number" name="sisa" value="" id="sisa" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">Keterangan</label>
                                                            <input type="text" readonly name="keterangan" value="<?= $permintaan->catatan_permintaan ?>" id="keterangan" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:20px;">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">No Surat Permintaan</label>
                                                            <input type="text" readonly value="<?= $permintaan->no_permintaan ?>" name="nopermintaan" id="nopermintaan" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="noPermintaan">No Surat Pemenuhan</label>
                                                            <input type="text" name="nopemenuhan" id="nopemenuhan" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class="pacbar">
                                        <div class="table-responsive">
                                            <table id="id" class="table table-bordered  table-nowrap dataTable" cellspacing="0" width="100%">
                                                <thead class="bg-primary">
                                                    <tr>
                                                        <th>Select Item</th>
                                                        <th>Merk</th>
                                                        <th>Tipe Barang</th>
                                                        <th>No SN</th>
                                                        <th>Harga Barang</th>
                                                        <th>Kondisi Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="rows-list">
                                                    <?php
                                                    $permintaandet = $this->General->fetch_CoustomQuery("SELECT * FROM v_pemenuhan_barang_det WHERE id_permintaan = $permintaan->id_permintaan AND no_sn IS NULL OR id_permintaan = $permintaan->id_permintaan AND no_sn = ''");
                                                    // $permintaandet = $this->General->fetch_records("v_pemenuhan_barang_det", ['id_permintaan' => $permintaan->id_permintaan, 'no_sn' => null, 'no_sn' => '']);
                                                    // lastq();
                                                    // cetak_die($permintaandet);
                                                    foreach ($permintaandet as $result) {
                                                        if ($result->qty == 0) { ?>
                                                            <tr>
                                                                <td class="product-list">
                                                                    <select class="form-control product input-xlarge no_urut select2" style="width: 100%;" name="no_urut[]" id="no_urut[]" onchange="return get_purchased_data(this.value);">
                                                                        <option value="">--SELECT ITEM--</option>
                                                                        <?php foreach ($barang as $value) : ?>
                                                                            <option <?= $result->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control Perbar_merekbarang" value="<?= $result->nama_merek ?>" readonly>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control Perbar_tpbarang" value="<?= $result->tipe_barang ?>" readonly>
                                                                </td>
                                                                <td><input type="text" value="<?= $result->no_sn ?>" name="sn[]" class="form-control carton sn"></td>
                                                                <td>
                                                                    <input type="number" value="<?= $result->harga_barang ?>" name="harga_barang[]" id="harga_barang[]" class="form-control rate harga_barang">

                                                                </td>
                                                                <td>
                                                                    <select class="form-control product input-xlarge kondisibrg" id="kondisibrg[]" name="kondisibrg[]">
                                                                        <option value=""><?= $result->kondisi_barang ?></option>
                                                                        <!-- <option value="1">--Kondisi Barang--</option> -->
                                                                        <option value="Bagus">Bagus</option>
                                                                        <option value="Rusak">Rusak</option>
                                                                    </select>
                                                                    <input type="hidden" id="status_pemenuhan[]" name="status_pemenuhan[]" class="status_pemenuhan">

                                                                </td>
                                                                <input type="hidden" name="grandtotal" id="grandtotal" value="">
                                                            </tr>
                                                            <?php } else {
                                                            for ($x = 1; $x <= $result->qty; $x++) { ?>
                                                                <tr>
                                                                    <td class="product-list">
                                                                        <select class="form-control product input-xlarge no_urut" name="no_urut[]" id="no_urut[]" onchange="return get_purchased_data(this.value);">
                                                                            <option value="">--SELECT ITEM--</option>
                                                                            <?php foreach ($barang as $value) : ?>
                                                                                <option <?= $result->no_urut == $value->no_urut ? 'selected' : '' ?> value="<?= $value->no_urut ?>"><?= $value->kode_barang . " | " . $value->nama_barang ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control Perbar_merekbarang" value="<?= $result->nama_merek ?>" readonly>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control Perbar_tpbarang" value="<?= $result->tipe_barang ?>" readonly>
                                                                    </td>
                                                                    <td><input type="text" value="" name="sn[]" class="form-control carton sn"></td>
                                                                    <td>
                                                                        <input type="number" value="<?= $result->harga_barang ?>" name="harga_barang[]" id="harga_barang[]" class="form-control rate harga_barang">

                                                                    </td>
                                                                    <td>
                                                                        <select class="form-control product input-xlarge kondisibrg" id="kondisibrg[]" name="kondisibrg[]">
                                                                            <option value=""><?= $result->kondisi_barang ?></option>
                                                                            <!-- <option value="1">--Kondisi Barang--</option> -->
                                                                            <option value="Bagus">Bagus</option>
                                                                            <option value="Rusak">Rusak</option>
                                                                        </select>
                                                                        <input type="hidden" id="status_pemenuhan[]" name="status_pemenuhan[]" class="status_pemenuhan">

                                                                    </td>
                                                                    <input type="hidden" name="grandtotal" id="grandtotal" value="">
                                                                </tr>
                                                    <?php }
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>                                
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="pengrimbar">
                                <?php
                                $permintaandet = $this->General->fetch_records("v_permintaan_barang", ['id_permintaan' => $permintaan->id_permintaan]);
                                foreach ($permintaandet as $result) {
                                ?>
                                    <div class="pengrimbar">
                                        <section class="panel">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="d_type">Delivery Type</label>
                                                            <select class="form-control select2" name="d_type" id="d_type" style="width: 100%;" required>
                                                                <option value="">--Pilih Delivery Type--</option>
                                                                <?php foreach ($delivery as $dev) : ?>
                                                                    <option <?= $result->id_delivery_type == $dev->id_delivery_type ? 'selected' : '' ?> value="<?= $dev->id_delivery_type ?>"><?= $dev->nama_delivery_type; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="ekspedisi">Ekspedisi</label>
                                                            <select class="form-control select2" name="ekspedisi" id="ekspedisi" style="width: 100%;" required>
                                                                <option value="">--Pilih Ekspedisi--</option>
                                                                <?php foreach ($ekspedisi as $eks) : ?>
                                                                    <option <?= $result->id_ekpedisi == $eks->id_ekpedisi ? 'selected' : '' ?> value="<?= $eks->id_ekpedisi ?>"><?= $eks->nama_ekpedisi; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="service">Service/Layanan</label>
                                                            <select class="form-control select2" name="service" id="service" style="width: 100%;" required>
                                                                <option value="">--Pilih Service/Layanan--</option>
                                                                <?php foreach ($layanan as $lay) : ?>
                                                                    <option <?= $result->id_layanan_ekspedisi == $lay->id_layanan_ekspedisi ? 'selected' : '' ?> value="<?= $lay->id_layanan_ekspedisi ?>"><?= $lay->layanan_ekspedisi; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="sandbox">
                                                            <label for="tujuan">Tujuan</label>
                                                            <select class="form-control select2" name="tujuan" id="tujuan" style="width: 100%;" required>
                                                                <option value="">--Pilih Tujuan--</option>
                                                                <?php foreach ($uker as $value) : ?>
                                                                    <option <?= $result->id_uker == $value->id_uker ? 'selected' : '' ?> value="<?= $value->id_uker ?>"><?= $value->nama_uker ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3" style="margin-left:10px;margin-top:10px;">
                                                            <div class="sandbox">
                                                                <label for="no_pengiriman">No Pengiriman</label>
                                                                <input type="text" name="no_pengiriman" id="no_pengiriman" value="<?= $autoNoPengiriman ?>" class="form-control" style="color: red;" title="No Pengiriman Otomatis" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-default btn-sm prev-step">Previous</button></li>
                                            <li><input type="submit" class="btn btn-primary btn-sm next-step"></input></li>
                                        </ul>
                                        <?php } ?>
                                    </div>                       
                                    <div class="tab-pane" role="tabpanel" id="complete">
                                        <div class="step44">
                                            <h3 class="text-center" style="font-weight: bolder;">Completed</h3>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    const urlPemenuhanbarcab = '<?= site_url("Pemenuhanbarang/") ?>';
    let table;
    
    var list = $("#rows-list");
    var row = list.children('tr:first');


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

        var countNull = $('.sn').not(function() {
            return this.value;
        }).length;
        $(this).find("#sisa").val(countNull);
        var permintaan = Number($(document).find("#jmlpemenuhan").val());
        var pemenuhan = 0;
        $(this).find("#pemenuhan").val(0);
        

        $(list).on('change', ".sn", function() {
            // if($(this).val()===""){
            //     console.log("Eweuh");
            // }else{
            //     console.log("Ayaan");
            // }
           
            var row = $(this).closest('tr');
            let ini = $(this);
            var permintaan = Number($(document).find("#jmlpemenuhan").val());

            $.ajax({
                type: "POST",
                url: urlPemenuhanbarcab + "check_sn",
                data: {
                    no_sn: row.find(".sn").val(),
                },
                dataType: "JSON",
                success: function(response){
                    console.log(response);
                    if(response.pesan == true){
                        pemenuhan += 1;
                        row.find('.harga_barang').val(response.harga_barang);
                        row.find('.kondisibrg').val(response.flag_barang).change();
                        row.find('.status_pemenuhan').val("Terpenuhi");
                        $(document).find("#pemenuhan").val(pemenuhan);
                        $(document).find("#sisa").val(countNull-pemenuhan);
                    }else{
                        alert('No SN Tidak Terdaftar.');
                        row.find('.sn').val('');
                    }
                    // console.log(response);
                    // if(response.data){
                    //     // $('#testing').html(response.data);
                    //     // row.find('.Perbar_barang').html(response.data);
                    // }
                },
                // error: function(xhr, thrownError){
                //     alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                // }
            });
            
            // $(row).find(".status_pemenuhan").prop('checked',true);
            $(document).find("#pemenuhan").val(pemenuhan);
            $(document).find("#sisa").val(permintaan-pemenuhan);
        });
    });

    function po_subtotal() {
        
        $(list).find("tr").each(function(e){
            console.log(this);
            // $(this).find(".status_pemenuhan").prop('checked',true);
            // alert(penerimaan);
        });
    }

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

    

    $(function() {
        $('.select2').select2();
    })
</script>