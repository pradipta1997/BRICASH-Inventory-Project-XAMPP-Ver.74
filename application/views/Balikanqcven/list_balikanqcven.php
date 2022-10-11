<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">BALIKAN BARANG TIDAK LOLOS QC VENDOR</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Awal</label>
                                <input type="date" id="startdate" name="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" id="enddate" name="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Filter Nama Barang</label>
                        <select class="form-control select2" id="no_urut" name="no_urut" style="width: 100%;">
                            <option value="All">--Nama Barang--</option>
                            <?php foreach ($barang as $brg) : ?>
                                <option value="<?= $brg->no_urut ?>"><?= $brg->nama_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label "> Status Terima Vendor</label>
                        <select class="form-control " id="status_terima" name="status_terima" style="width: 100%;">
                            <option value="All">--Status Vendor--</option>
                            <option value="1">Sudah Diterima</option>
                            <option value="0">Belum Diterima</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Vendor</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option value="">--All Vendor--</option>
                            <?php foreach ($vendor as $vend) : ?>
                                <option value="<?= $vend->id_vendor ?>"><?= $vend->nama_vendor ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Tipe Barang</label>
                        <select class="form-control select2" id="tipe_barang" style="width: 100%;">
                            <option value="">--All Tipe Barang--</option>
                            <?php foreach ($tipebarang as $tb) : ?>
                                <option value="<?= $tb->id_tipe_barang ?>"><?= $tb->tipe_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div> -->
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterbalikanven" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="box text-sm">
    <div class="box-header">
        <h3 class="box-title">LIST BARANG BALIKAN QC DARI VENDOR</h3>
    </div>
    <div class="box-body">
        <table id="tableBalikanbrgqc" class="table table-bordered table-hover" style="width: 100%;">
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
                    <th>Status Vendor</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </div>
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
                        <input type='text' readonly name="no_sn" id="no_sn" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class='control-label'>Tanggal QC</label>
                        <input type='date' readonly name="tgl_qc" id="tgl_qc" class='form-control' />
                    </div>
                    <div class='form-group'>
                        <label class="control-label">Status Vendor</label>
                        <select class="form-control select2" style="width: 100%;" required name="status_vendor" id="status_vendor">
                            <option value="">--Select Status Vendor--</option>
                            <option value="1">Sudah Diterima</option>
                            <option value="0">Belum Diterima</option>
                        </select>
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
    const urlBarangbalikqcven = '<?= site_url("Balikanqcven/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableBalikanbrgqc')) {
            table = $('#tableBalikanbrgqc').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlBarangbalikqcven + "list_balikanqcven",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });

    function VBalikanqcven(id_tmp) {
        $.ajax({
            url: urlBarangbalikqcven + 'VBalikanqcven/' + id_tmp,
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
                if (response[0].flag_status_vendor) {
                    $('#status_vendor').val(response[0].flag_status_vendor);
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
                    url: urlBarangbalikqcven + 'updateBalikanqcven',
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

    $(function() {
        $('.select2').select2();
    })

    $('#filterbalikanven').on('click', function(e) {
        e.preventDefault();

        let no_urut = $('#no_urut').val();
        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status_terima = $('#status_terima').val();

        let table = $('#tableBalikanbrgqc').DataTable({
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
                url: urlBarangbalikqcven + "filter",
                data: {
                    no_urut: no_urut,
                    startdate: startdate,
                    enddate: enddate,
                    status_terima: status_terima,

                },
                dataType: "JSON"
            },
        });
    })
</script>