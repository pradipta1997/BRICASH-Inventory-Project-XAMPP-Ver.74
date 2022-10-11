<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PEMBUKUAN PEMBEBANAN SPAREPART</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control" id="startdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control" id="enddate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Unit Kerja</label>
                        <select class="form-control select2" id="id_uker" name="id_uker" style="width: 100%;">
                            <option value="All">--All Unit Kerja--</option>
                            <?php foreach ($uker as $uk) {  ?>
                                <option value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterLapPempemspare" name="filterLapPempemspare" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table class="table table-bordered table-hover" style="width: 100%;" id="lapPempemspare">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Tanggal Pemakaian</th>
                    <th>Total Harga</th>
                    <th>Status Pembukuan</th>
                    <th>No Voucher</th>
                    <th>Tanggal Pembukuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <!-- <tfoot>
                <tr>
                    <td>Total :</td>
                    <td><?= rupiah(rand(150000, 500000)) ?></td>
                    <td><?= rupiah(rand(100000, 1000000)) ?></td>
                </tr>
            </tfoot> -->
        </table>
    </div>
</div>

<script>
    const urlLaporankeuangan = '<?= site_url("Laporankeuangan/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#lapPempemspare')) {
            table = $('#lapPempemspare').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLaporankeuangan + "listPempengsparekancab",
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

    $(function() {
        $('.select2').select2();
    })

    $('#filterLapPempemspare').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let uker = $('#id_uker').val();

        let table = $('#lapPempemspare').DataTable({
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
                url: urlLaporankeuangan + "filterLapPempemspare",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    id_uker: uker,
                },
                dataType: "JSON"
            },
        });
    })
</script>