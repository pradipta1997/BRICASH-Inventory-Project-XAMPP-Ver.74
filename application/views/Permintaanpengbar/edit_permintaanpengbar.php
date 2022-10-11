<form action="<?= base_url('Permintaanbarangcab/updatePermintaanpengbar/' . $permintaan->id_permintaan) ?>" method="post">
    <section class="panel">
        <header class="panel-heading" style="background-color: black; color: white;">
            EDIT PERMINTAAN BARANG DARI CABANG
        </header>
        <div class="panel-body">
            <table class="table table-bordered" width="100%">
                <tr>
                    <td>Tanggal Diminta : <?= $permintaan->tgl_permintaan ?></td>
                </tr>
                <tr>
                    <td>Nomor Permintaan : <?= $permintaan->no_permintaan ?></td>
                </tr>
                <tr>
                    <td>Alasan Permintaan : <?= $permintaan->alasan_permintaan ?></td>
                </tr>
                <tr>
                    <td>Catatan Permintaan : <?= $permintaan->catatan_permintaan ?></td>
                </tr>
                <tr>
                    <td>Tempo Barang : <?= $permintaan->tempo_barang ?> Hari</td>
                </tr>
            </table>
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
                                </tr>
                            </thead>
                            <tbody id="rows-list">
                                <?php
                                $no = 1;
                                $permintaandet = $this->General->fetch_records('v_permintaan_barang_det', ['id_permintaan' => $permintaan->id_permintaan]);
                                foreach ($permintaandet as $result) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td class="product-list"><?= $result->nama_barang  ?></td>
                                        <td><?= $result->nama_merek ?></td>
                                        <td><?= $result->tipe_barang ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="row text-center">
                        <div class="col-lg-12">
                            <?php
                            if ($this->session->userdata('user_login')['id_sgroup'] == 22 || $this->session->userdata('user_login')['id_sgroup'] == 25) {
                            ?>
                                <a href="<?= base_url('Permintaanbarangcab/approve_perbarcab/'.$permintaan->id_permintaan) ?>" class="btn btn-success btn-sm">Approve Permintaan</a>
                                <a href="<?= base_url('Permintaanbarangcab/decline_perbarcab/'.$permintaan->id_permintaan) ?>" class="btn btn-danger btn-sm">Tolak Permintaan</a>
                                <a href="<?= base_url('Permintaanbarangcab') ?>" class="btn btn-warning btn-sm">Kembali</a>
                            <?php } else {
                            ?>
                            <a href="<?= base_url('Permintaanbarangcab') ?>" class="btn btn-warning btn-sm">Kembali</a>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL -->
<div class="modal fade" id="formData" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?= base_url('Permintaanbarangcab/penuhiStatus/' . $permintaan->id_permintaan) ?>" id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add/Edit Pengeluaran Barang</h4>
                </div>
                <div class="modal-body">

                    <div class='form-group'>
                        <label for='no_sn' class='control-label'>No SN</label>
                        <input type='text' name="no_sn" onkeyup="cariNosn(this.value)" required class='form-control' id='no_sn' />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='gbrg' class='control-label'>Group Barang</label>
                                <input type='text' readonly name="gbrg" required class='form-control' id='gbrg' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='sgbrg' class='control-label'>Subgroup Barang</label>
                                <input type='text' readonly name="sgbrg" required class='form-control' id='sgbrg' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='mbrg' class='control-label'>Merek Barang</label>
                                <input type='text' readonly name="mbrg" required class='form-control' id='mbrg' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='tpbrg' class='control-label'>Tipe Barang</label>
                                <input type='text' readonly name="tpbrg" required class='form-control' id='tpbrg' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='kdbrg' class='control-label'>Kode Barang</label>
                                <input type='text' readonly name="kdbrg" required class='form-control' id='kdbrg' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='nmbrg' class='control-label'>Nama Barang</label>
                                <input type='hidden' name="no_urut" required class='form-control' id='no_urut' />
                                <input type='text' readonly name="nmbrg" required class='form-control' id='nmbrg' />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='hbrg' class='control-label'>Harga Barang</label>
                                <input type='text' readonly name="hbrg" required class='form-control' id='hbrg' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='qty' class='control-label'>Quantity</label>
                                <input type='text' readonly name="qty" required class='form-control' id='qty' />
                            </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for='keterangan' class='control-label'>Keterangan</label>
                        <input type='text' readonly name="keterangan" required class='form-control' id='keterangan' />
                    </div>
                </div>

                <div class="modal-footer">

                    <div class="text-center">
                        <?php
                        if ($permintaan->status_permintaan == 1) {
                            $disableStatus = 'disabled';
                        } else {
                            $disableStatus = '';
                        }

                        if ($this->session->userdata('user_login')) {
                        ?>
                            <input type="submit" <?= $disableStatus ?> class="btn btn-primary btn-sm" value="Penuhi Status Permintaan" disabled>
                        <?php } ?>
                    </div>

                    <!-- <input type="submit" value="Save" class="btn btn-success">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const urlPermintaanbarangcab = '<?= site_url("Permintaanbarangcab/") ?>';
    let total_number = 0;

    function caribarang(isinya) {
        $.ajax({
            type: "POST",
            url: urlPermintaanbarangcab + "caribarang",
            data: {
                no_urut: isinya
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    $('#merekbrg').val(response.nama_merek);
                    $('#tipebrg').val(response.tipe_barang);
                } else {
                    $('#merekbrg').val('-');
                    $('#tipepbrg').val('-');
                }
            }
        });
    }

    function cariNosn(isinya) {
        $.ajax({
            type: "POST",
            url: urlPermintaanbarangcab + "cariNosn",
            data: {
                no_sn: isinya
            },
            dataType: "json",
            success: function(response) {
                if (response) {
                    // $('#id_tmp').val(response.id_tmp);
                    $('#no_urut').val(response.no_urut);
                    $('#gbrg').val(response.nama_gbarang);
                    $('#sgbrg').val(response.nama_sgbarang);
                    $('#mbrg').val(response.nama_merek);
                    $('#tpbrg').val(response.tipe_barang);
                    $('#kdbrg').val(response.kode_barang);
                    $('#nmbrg').val(response.nama_barang);
                    // $('#hbrg').val(response.harga_barang);
                    // $('#qty').val(response.qty);
                    $('#keterangan').val(response.keterangan);
                } else {
                    // $('#id_tmp').val('-');
                    $('#no_urut').val('-');
                    $('#gbrg').val('-');
                    $('#sgbrg').val('-');
                    $('#mbrg').val('-');
                    $('#tpbrg').val('-');
                    $('#kdbrg').val('-');
                    $('#nmbrg').val('-');
                    // $('#hbrg').val('-');
                    // $('#qty').val('-');
                    $('#keterangan').val('-');
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
                url: urlPermintaanbarangcab + "caribarang",
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

    $(function() {
        $('.select2').select2();
    })
</script>