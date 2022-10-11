<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PEMENUHAN BARANG CABANG</h3>
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
                <!-- <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Tipe Barang</label>
                        <select name="tipe_barang" id="tipe_barang" class="form-control select2">
                            <option value="All">--All Tipe Barang--</option>
                            <?php foreach ($tpbarang as $barang) : ?>
                                <option value="<?= $barang->id_tipe_barang ?>"><?= $barang->tipe_barang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div> -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group" style="display: flex;">
                            <label class="col-sm-2 col-form-label ">Ke Uker</label>
                            <select class="form-control select2" name="id_uker" id="id_uker">
                                <option value="All">--Unit Kerja--</option>
                                <?php foreach ($uker as $uk) {  ?>
                                    <option value="<?= $uk->id_uker ?>"><?= $uk->kode_uker . " | " . $uk->nama_uker ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row text-center" style="margin-bottom: 20px;">
                    <div>
                        <button type="submit" id="filterpembarcab" class="btn btn-primary btn-sm">Filter</button>
                    </div>
                </div>
            </div>

    </form>
</div>
</div>

<div class="box">
    <div class="box-body">
        <table id="tablecab" class="table table-bordered table-hover  dataTable" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomor Permintaan</th>
                    <th>Dari Uker</th>
                    <th>Ke Uker</th>
                    <th>Tanggal Pemenuhan</th>
                    <!-- <th>Tanggal Diterima</th> -->
                    <!-- <th>Nama Pengeluaran</th> -->
                    <th>Harga Pemenuhan</th>
                    <th>Jumlah Koli</th>
                    <!-- <th>Estimasi</th> -->
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        $('.select2').select2();
    })

    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#tablecab')) {
            table = $('#tablecab').DataTable({
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLaporanpusat + "listLap_pembacab",
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

    $('#filterpembarcab').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        // let tipe_barang = $('#tipe_barang').val();
        let id_uker = $('#id_uker').val();

        let table = $('#tablecab').DataTable({
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
                url: urlLaporanpusat + "filterpembacab",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    // tipe_barang: tipe_barang,
                    id_uker: id_uker,

                },
                dataType: "JSON"
            },
        });
    })
</script>