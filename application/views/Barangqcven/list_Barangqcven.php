<div class="box text-sm">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER BARANG QC</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control" id="startdate" name="startdate">
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
                        <label>Status QC</label>
                        <select class="form-control select2" id="qc" name="qc">
                            <option value="All">--All Status--</option>
                            <option value="0">Tidak Lolos QC</option>
                            <option value="1">Lolos QC</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterqc" name="filterqc" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box text-sm">
    <div class="box-header">
        <h3 class="box-title">LIST BARANG QC VENDOR</h3>
    </div>
    <div class="box-body">
        <table id="tableBarangqcven" class="table table-bordered table-hover" style="width: 100%;">
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

<div class="modal fade" id="formBarangqcven" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form" class="form-horizontal group-border hover-stripped" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Quality Control Barang</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_tmp" id="id_tmp">
                    <div class='form-group'>
                        <label class='control-label'>Nama Barang</label>
                        <input type='hidden' name="kode_barang" id="kode_barang" />
                        <input type='text' readonly name="nama_barang" id="nama_barang" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>No. SN</label>
                        <div class="row">
                            <div class="col-lg-10">
                                <input type='text' name="no_sn" id="no_sn" required class='form-control' />
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-success btn-sm" disabled id="dataSN" title="Generate Data" onclick="generateSN()"><i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tanggal QC</label>
                        <input type='date' name="tgl_qc" id="tgl_qc" value="<?= date("Y-m-d") ?>" required class='form-control' />
                    </div>
                    <table class="table table-bordered" style="width: 100%;">
                        <tr>
                            <td>Status QC</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_qc" id="flag_qc" value="2"> Lolos QC </td>
                        </tr>
                        <tr>
                            <td>Status Greenpart</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_greenpart" id="flag_greenpart" value="1"> Greenpart </td>
                        </tr>
                        <tr>
                            <td>Status Retur Barang</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_retur" id="flag_retur" value="1"> Retur Barang </td>
                        </tr>
                        <tr>
                            <td>Status Dikemas</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_dikemas" id="flag_dikemas" value="1"> Dikemas </td>
                        </tr>
                        <tr>
                            <td>Status Cacat</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_cacat" id="flag_cacat" value="1"> Cacat </td>
                        </tr>
                        <tr>
                            <td>Status Fisik</td>
                            <td class="text-center">:</td>
                            <td><input type="checkbox" name="flag_fisik" id="flag_fisik" value="1"> Bagus </td>
                        </tr>
                        <tr>
                            <td>Jenis Barang Sesuai Permintaan?</td>
                            <td>:</td>
                            <td><input type="checkbox" name="flag_brg_sesuai" id="flag_brg_sesuai" value="1"> Ya </td>
                        </tr>
                    </table>
                    <div class='form-group'>
                        <label class='control-label'>Keterangan</label>
                        <textarea name="ket" id="ket" class="form-control" required></textarea>
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

<script>
    const urlBarangqcven = '<?= site_url("Barangqcven/") ?>';
    const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;

    $("#flag_qc").change(function() {
        if(this.checked) {
            $("#flag_cacat").attr("disabled",true);
            $("#flag_retur").attr("disabled",true);
        }else{
            $("#flag_cacat").attr("disabled",false);
            $("#flag_retur").attr("disabled",false);
        }
    });

    $("#flag_retur").change(function() {
        if(this.checked) {
            $("#flag_qc").attr("disabled",true);
        }else{
            $("#flag_qc").attr("disabled",false);
        }
    });

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableBarangqcven')) {
            table = $('#tableBarangqcven').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlBarangqcven + "listBarangqcven",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });

    function VBarangqcven(id_tmp) {
        $.ajax({
            url: urlBarangqcven + 'VBarangqcven/' + id_tmp,
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                $('#id_tmp').val(response[0].id_tmp);
                $('#kode_barang').val(response[0].kode_barang);
                $('#nama_barang').val(response[0].kode_barang + " | " + response[0].nama_barang);
                // No SN
                if (response[0].no_sn) {
                    $('#no_sn').val(response[0].no_sn);
                } else {
                    $('#no_sn').val("");
                }
                // Tanggal QC
                if (response[0].tgl_qc) {
                    $('#tgl_qc').val(response[0].tgl_qc);
                }
                // Rak
                if (response[0].id_rak) {
                    $('#id_rak').val(response[0].id_rak).trigger("change");
                } else {
                    $('#id_rak').val("").trigger("change");
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
                $('#formBarangqcven').modal('show');
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
                    url: urlBarangqcven + 'updateBarangqcven',
                    data: $(this).serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        Swal.fire(data.pesan, "", data.tipe).then((result) => {
                            table.ajax.reload(null, false);
                            $('#form')[0].reset();
                            $('#formBarangqcven').modal('hide');
                        });
                    },
                });
            }
        });
    });

    $('#flag_greenpart').click(function() {
        if ($(this).is(':checked')) {
            $('#dataSN').prop('disabled', false);
            $('#no_sn').prop('readonly', true);
        } else {
            $('#dataSN').prop('disabled', true);
            $('#no_sn').prop('readonly', false);
        }
    })

    function generateSN() {
        if ($('#kode_barang').val() != "") {
            $.ajax({
                type: "POST",
                url: urlCustomfunction + "generateNoSn",
                data: {
                    kode_barang: $('#kode_barang').val(),
                },
                dataType: "json",
                success: function(data) {
                    $('#no_sn').val(data);
                }
            });
        } else {
            Swal.fire("INFORMATION", "Pilih Nama Barang terlebih dahulu!", "info");
        }
    }

    $('#filterqc').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status = $('#qc').val();

        let table = $('#tableBarangqcven').DataTable({
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
                url: urlBarangqcven + "filterBarangqcven",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    qc: status,
                },
                dataType: "JSON"
            },
        });
    })
</script>