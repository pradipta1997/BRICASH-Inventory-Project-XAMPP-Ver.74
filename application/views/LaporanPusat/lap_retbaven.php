<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN RETUR BARANG VENDOR</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Tgl Terima Vendor Awal</label>
                                <input type="date" name="periodeawal" id="periodeawal" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Tgl Terima Vendor Akhir</label>
                                <input type="date" id="periodeakhir" name="periodeakhir" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Vendor</label>
                        <select class="form-control select2" id="id_vendor" name="id_vendor" style="width: 100%;">
                            <option value="All">--All Vendor--</option>
                            <?php foreach ($vendor as $ven) : ?>
                                <option value="<?= $ven->id_vendor ?>"><?= $ven->nama_vendor ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Tipe Barang</label>
                        <select class="form-control select2" id="tipe_barang" name="tipe_barang" style="width: 100%;">
                            <option value="All">--All Tipe Barang--</option>
                            <?php foreach ($tpbarang as $tipe) : ?>
                                <option value="<?= $tipe->id_tipe_barang ?>"><?= $tipe->tipe_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="button" id="filterretbaven" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="box text-sm">
    <!-- <div class="box-header">
        <h3 class="box-title">LIST RETUR BARANG VENDOR</h3>
    </div> -->
    <div class="box-body">
        <table id="tableBalikanbrgqc" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No PO</th>
                    <th>No DO</th>
                    <th>Tanggal QC</th>
                    <th>Tanggal Diterima Vendor</th>
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
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>
</div>

<script>
    const urlLapretbaven = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableBalikanbrgqc')) {
            table = $('#tableBalikanbrgqc').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLapretbaven + "list_Returbarver",
                    type: "POST",

                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });

    $(function() {
        $('.select2').select2();
    })

    $('#filterretbaven').on('click', function(e) {
        e.preventDefault();

        let periodeawal = $('#periodeawal').val();
        let periodeakhir = $('#periodeakhir').val();
        let id_vendor = $('#id_vendor').val();
        let tipe_barang = $('#tipe_barang').val();

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
                url: urlLapretbaven + "filterRetbaven",
                data: {
                    periodeawal: periodeawal,
                    periodeakhir: periodeakhir,
                    id_vendor: id_vendor,
                    tipe_barang: tipe_barang,

                },
                dataType: "JSON"
            },
        });
    })
</script>