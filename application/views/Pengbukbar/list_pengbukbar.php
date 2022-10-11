<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PENGHAPUS BUKUAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label">Periode Awal</label>
                                <input type="date" id="startdate" name="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label">Periode Akhir</label>
                                <input type="date" id="enddate" name="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-3 col-form-label">Status Penghapus Bukuan</label>
                        <select name="status_hapusbuk" id="status_hapusbuk" class="form-control">
                            <option value="All">--All Status--</option>
                            <option value="1">Sudah</option>
                            <option value="0">Belum</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-3 col-form-label">Status Pembukuan</label>
                        <select name="status_buku" id="status_buku" class="form-control">
                            <option value="All">--All Status--</option>
                            <option value="1">Sudah di Buku</option>
                            <option value="0">Belum di Buku</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterpengbukbar" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENGHAPUS BUKUAN BARANG</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
        </span>
    </div>
    <div class="box-body">
        <table id="tablePenghapusbukbar" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Permintaan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Qty</th>
                    <th>Harga Barang</th>
                    <th>Status PH</th>
                    <th>Status Pembukuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <td class="text-center" style="float: center;" colspan="4">Total : </td>
                <td><?= rupiah($totalharga[0]->totalHarga) ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tfoot>
        </table>
    </div>
</div>

<div id="addPengbukbar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addPengbukbar-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPengbukbar-title">Proses Penghapus Bukuan Barang</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label for='tgl_pm' class='control-label'>Tanggal Permintaan</label>
                    <input type='date' value="<?= date('Y-m-d') ?>" name="tgl_pm" required class='form-control' id='tgl_pm' />
                </div>
                <div class='form-group'>
                    <label for='no_sn' class='control-label'>No SN</label>
                    <!-- <input type='text' name="no_sn" onkeyup="cariNosn(this.value)" required class='form-control' id='no_sn' /> -->
                    <input type='text' name="no_sn" required class='form-control' id='no_sn' />
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
                <div class='form-group'>
                    <label for='hbrg' class='control-label'>Harga Barang</label>
                    <input type='text' readonly name="hbrg" required class='form-control' id='hbrg' />
                </div>
                <div class="form-group">
                    <label for="kon_barang">Kondisi Barang</label>
                    <select name="kon_barang" id="kon_barang" class="form-control select2" style="width: 100%;">
                        <option value="1">Bagus</option>
                        <option value="0">Rusak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="remark">Remark</label>
                    <textarea id="remark" required class="form-control" name="remark"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Save" class="btn btn-success btn-sm">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="editPengbukbar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editPengbukbar-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPengbukbar-title">Tambah Penghapus Bukuan Barang</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class='form-group'>
                        <label for='tgl_pm' class='control-label'>Tanggal Permintaan</label>
                        <input type='date' value="<?= date('Y-m-d') ?>" name="tgl_pm2" required class='form-control' id='tgl_pm2' />
                    </div>
                    <div class='form-group'>
                        <label for='no_sn' class='control-label'>No SN</label>
                        <!-- <input type='text' name="no_sn" onkeyup="cariNosn(this.value)" required class='form-control' id='no_sn' /> -->
                        <input readonly type='text' name="no_sn2" required class='form-control' id='no_sn2' />
                        <input readonly type='hidden' name="id_perbaikanbarang2" required class='form-control' id='id_perbaikanbarang2' />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='gbrg' class='control-label'>Group Barang</label>
                                <input type='text' readonly name="gbrg2" required class='form-control' id='gbrg2' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='sgbrg' class='control-label'>Subgroup Barang</label>
                                <input type='text' readonly name="sgbrg2" required class='form-control' id='sgbrg2' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='mbrg' class='control-label'>Merek Barang</label>
                                <input type='text' readonly name="mbrg2" required class='form-control' id='mbrg2' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='tpbrg' class='control-label'>Tipe Barang</label>
                                <input type='text' readonly name="tpbrg2" required class='form-control' id='tpbrg2' />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class='form-group' style="margin-right: 5px;">
                                <label for='kdbrg' class='control-label'>Kode Barang</label>
                                <input type='text' readonly name="kdbrg2" required class='form-control' id='kdbrg2' />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class='form-group'>
                                <label for='nmbrg' class='control-label'>Nama Barang</label>
                                <input type='hidden' name="no_urut2" required class='form-control' id='no_urut2' />
                                <input type='text' readonly name="nmbrg2" required class='form-control' id='nmbrg2' />
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label for='hbrg' class='control-label'>Harga Barang</label>
                        <input type='text' readonly name="hbrg2" required class='form-control' id='hbrg2' />
                    </div>
                    <div class="form-group">
                        <label for="kon_barang">Kondisi Barang</label>
                        <select readonly name="kon_barang2" id="kon_barang2" class="form-control select2" style="width: 100%;">
                            <option value="1">Bagus</option>
                            <option value="0" selected>Rusak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea id="remark2" required class="form-control" name="remark2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Save" class="btn btn-success btn-sm">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="ijinPrinsip">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Ijin Prinsip</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="ijinprinsip">Ijin Prinsip</label>
                    <input type="file" class="form-control" id="ijinprinsip" name="ijinprinsip">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
    const urlPenerimaanbarcab = '<?= site_url("Penghapusbukbar/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenghapusbukbar')) {
            table = $('#tablePenghapusbukbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbarcab + "listPenghapusbukbar",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }
    });

    function Modalpengbukbar(id_perbaikanbarang) {
        $.ajax({
            url: urlPenerimaanbarcab + 'showModalPerbaikan/' + id_perbaikanbarang,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_perbaikanbarang2').val(response[0].id_pengkekp_det);
                $('#no_sn2').val(response[0].no_sn);
                $('#tgl_pm2').val(response[0].tanggal_perbaikan);
                $('#gbrg2').val(response[0].nama_gbarang);
                $('#sgbrg2').val(response[0].nama_sgbarang);
                $('#mbrg2').val(response[0].nama_merek);
                $('#tpbrg2').val(response[0].tipe_barang);
                $('#kdbrg2').val(response[0].kode_barang);
                $('#nmbrg2').val(response[0].nama_barang);
                $('#hbrg2').val(response[0].harga_barang);
                $('#kon_barang2').val(response[0].kondisi_barang);
                $('#remark2').val(response[0].catatan_perbaikan);
                $('#editPengbukbar').modal('show');
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: urlPenerimaanbarcab + 'savePengbukber',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function(data) {
                Swal.fire(data.pesan, "", data.tipe).then((result) => {
                    table.ajax.reload(null, false);
                    $('#form')[0].reset();
                    $('#editPengbukbar').modal('hide');
                });
            },
        });
    });

    // $(function() {
    //     $('.select2').select2();
    // })

    $('#filterpengbukbar').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status_hapusbuk = $('#status_hapusbuk').val();
        let status_buku = $('#status_buku').val();

        let table = $('#tablePenghapusbukbar').DataTable({
            dom: 'Bfrtip',
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

            processing: true,
            responsive: true,
            serverSide: true,
            destroy: true,
            order: [],
            scrollX: true,
            columnDefs: [{
                targets: [0, -1],
                orderable: false,
            }, ],
            ajax: {
                type: "POST",
                url: urlPenerimaanbarcab + "filter",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    status_hapusbuk: status_hapusbuk,
                    status_buku: status_buku,

                },
                dataType: "JSON"
            },
        });
    })
</script>