<div class="box text-sm">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PENERIMAAN BARANG LOLOS QC</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" id="startdate" name="startdate" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control" id="enddate" name="enddate">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group" style="display: flex;">
                        <label>Nama Barang</label>
                        <select class="form-control select2" id="no_urut" name="no_urut">
                            <option value="All">--Status--</option>
                            <?php foreach ($nmbarang as $brg) : ?>
                                <option value="<?= $brg->no_urut ?>"><?= $brg->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterlolosqc" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box text-sm">
    <div class="box-header">
        <h3 class="box-title">LIST BARANG LOLOS QC DARI VENDOR</h3>
    </div>
    <div class="box-body">
        <table id="tablePenerimaanlolosqc" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No PO</th>
                    <th>No DO</th>
                    <th>Tanggal QC</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>Serial Number</th>
                    <th>Nama Vendor</th>
                    <th>Status QC</th>
                    <th>Status Greenpart</th>
                    <th>Status Retur Barang</th>
                    <th>Status Fisik</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="formPenerimaanlolosqc" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Quality Control Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_tmp" id="id_tmp">
                    <input type="hidden" name="id_vendor" id="id_vendor">
                    <input type="hidden" name="qty" id="qty">
                    <div class='form-group'>
                        <label class='control-label'>Nama Barang</label>
                        <input type='hidden' name="no_urut" id="no_urut" />
                        <input type='text' readonly name="namabarang" id="namabarang" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>No. SN</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type='text' name="no_sn" id="no_sn" required class='form-control' readonly />
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-success btn-sm" disabled id="dataSN" title="Generate Data" onclick="generateSN()"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tanggal QC</label>
                        <input type='date' name="tgl_qc" id="tgl_qc" value="" required class='form-control' readonly />
                    </div>
                    <table class="table table-bordered" style="width: 100%;">
                        <tr>
                            <td>Status QC</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_qc" id="flag_qc" value="2" disabled> Bagus</td>
                        </tr>
                        <tr>
                            <td>Status Greenpart</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_greenpart" id="flag_greenpart" value="1" disabled> Greenpart</td>
                        </tr>
                        <tr>
                            <td>Status Retur Barang</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_retur" id="flag_retur" value="1" disabled> Retur Barang</td>
                        </tr>
                        <tr>
                            <td>Status Dikemas</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_dikemas" id="flag_dikemas" value="1" disabled> Dikemas</td>
                        </tr>
                        <tr>
                            <td>Status Cacat</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_cacat" id="flag_cacat" value="1" disabled> Cacat</td>
                        </tr>
                        <tr>
                            <td>Status Fisik</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_fisik" id="flag_fisik" value="1" disabled> Bagus</td>
                        </tr>
                        <tr>
                            <td>Jenis Barang Sesuai Permintaan?</td>
                            <td>:</td>
                            <td><input type="checkbox" name="flag_brg_sesuai" id="flag_brg_sesuai" value="1" disabled> Ya</td>
                        </tr>
                    </table>
                    <div class='form-group'>
                        <label class='control-label'>Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Pindahkan Barang" class="btn btn-success btn-sm" title="Memindahkan Barang dari QC -> Stock">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    const urlPenerimaanlolosqc = '<?= site_url("Penerimaanlolosqc/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenerimaanlolosqc')) {
            table = $('#tablePenerimaanlolosqc').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanlolosqc + "listPenerimaanlolosqc",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });


    function VPenerimaanlolosqc(id_tmp) {
        $.ajax({
            url: urlPenerimaanlolosqc + 'VPenerimaanlolosqc/' + id_tmp,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_tmp').val(response[0].id_tmp);
                $('#no_urut').val(response[0].no_urut);
                $('#qty').val(response[0].qty);
                $('#id_vendor').val(response[0].no_urut);
                $('#namabarang').val(response[0].nama_barang);
                $('#no_sn').val(response[0].no_sn);
                // Tanggal QC
                if (response[0].tgl_qc) {
                    $('#tgl_qc').val(response[0].tgl_qc);
                }
                // Flag QC
                if (response[0].flag_qc == 2) {
                    $('#flag_qc').prop('checked', true);
                } else {
                    $('#flag_qc').prop('checked', false);
                }
                // Flag Retur
                if (response[0].flag_retur == 1) {
                    $('#flag_retur').prop('checked', true);
                } else {
                    $('#flag_retur').prop('checked', false);
                }
                // Flag Greenpart
                if (response[0].flag_greenpart == 1) {
                    $('#flag_greenpart').prop('checked', true);
                } else {
                    $('#flag_greenpart').prop('checked', false);
                }
                // Flag Dikemas
                if (response[0].flag_dikemas == 1) {
                    $('#flag_dikemas').prop('checked', true);
                } else {
                    $('#flag_dikemas').prop('checked', false);
                }
                // Flag Cacat
                if (response[0].flag_cacat == 1) {
                    $('#flag_cacat').prop('checked', true);
                } else {
                    $('#flag_cacat').prop('checked', false);
                }
                // Flag Fisik
                if (response[0].flag_fisik == 1) {
                    $('#flag_fisik').prop('checked', true);
                } else {
                    $('#flag_fisik').prop('checked', false);
                }
                // Keterangan
                if (response[0].ket) {
                    $('#ket').val(response[0].ket);
                } else {
                    $('#ket').val("");
                }
                $('#formPenerimaanlolosqc').modal('show');
            }
        });
    }

    function cariNosn(isinya) {
        $.ajax({
            type: "POST",
            url: urlPenerimaanlolosqc + "cariNosn",
            data: {
                no_sn: isinya
            },
            dataType: "json",
            success: function(response) {
                $('#gbrg').val(response.nama_gbarang);
                $('#sgbarang').val(response.nama_sgbarang);
                $('#mbrg').val(response.nama_merek);
                $('#tpbarang').val(response.tipe_barang);
                $('#kdbrg').val(response.kode_barang);
                $('#nmbrg').val(response.nama_barang);
                // $('#no_urut').val(response.harga_barang);
                // if (response) {
                //     // $('#id_tranOld').val(response.id_tran);
                //     // $('#no_urut').val(response.no_urut);
                //     $('#gbrg').val(response.nama_gbarang);
                //     $('#sgbrg').val(response.nama_sgbarang);
                //     $('#mbrg').val(response.nama_merek);
                //     $('#tpbrg').val(response.tipe_barang);
                //     $('#kdbrg').val(response.kode_barang);
                //     $('#nmbrg').val(response.nama_barang);
                //     $('#hbrg').val(response.harga_barang);
                // } else {
                //     // $('#id_tranOld').val('-');
                //     // $('#no_urut').val('-');
                //     $('#gbrg').val('-');
                //     $('#sgbrg').val('-');
                //     $('#mbrg').val('-');
                //     $('#tpbrg').val('-');
                //     $('#kdbrg').val('-');
                //     $('#nmbrg').val('-');
                //     $('#hbrg').val('-');
                // }
            }
        });
    }

    $("#form").on("submit", function(event) {
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: urlPenerimaanlolosqc + 'updatePenerimaanlolosqc',
                    data: $(this).serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        Swal.fire(data.pesan, "", data.tipe).then((result) => {
                            table.ajax.reload(null, false);
                            $('#form')[0].reset();
                            $('#formPenerimaanlolosqc').modal('hide');
                        });
                    },
                });
            }
        });
    });

    $(function() {
        $('.select2').select2();
    })

    $('#filterlolosqc').on('click', function(e) {
        e.preventDefault();

        let no_urut = $('#no_urut').val();
        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#tablePenerimaanlolosqc').DataTable({
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
                url: urlPenerimaanlolosqc + "filter",
                data: {
                    no_urut: no_urut,
                    startdate: startdate,
                    enddate: enddate,
                },
                dataType: "JSON"
            },
        });
    })
</script>