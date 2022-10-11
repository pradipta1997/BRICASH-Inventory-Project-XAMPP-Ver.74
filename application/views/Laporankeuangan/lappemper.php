<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PEMBUKUAN PERSEDIAAN</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label for="per_awal">Periode Awal</label>
                                <input type="date" class="form-control" id="startdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label for="per_akhir">Periode Akhir</label>
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
                    <button type="submit" id="filterLappemper" name="filterLappemper" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table class="table table-bordered table-hover" style="width: 100%;" id="lapPemper">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Tanggal Diterima</th>
                    <th>Uker Pengiriman</th>
                    <th>Uker Penerima</th>
                    <th>Nama Ekpedisi</th>
                    <th>Keterangan</th>
                    <th>Status Pengiriman</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <td class="text-center" style="float: center;" colspan="8">Grand Total :</td>
                <td> <?= rupiah($totalHarga[0]->total) ?> </td>
                <td></td>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlLaporankeuangan = '<?= site_url("Laporankeuangan/") ?>';

    $(function() {

        if (!$.fn.DataTable.isDataTable('#lapPemper')) {
            table = $('#lapPemper').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLaporankeuangan + "listPemper",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                    className: "text-center",
                }, ],
            });
        }
    })

    $(function() {
        $('.select2').select2();
    })

    $('#filterLappemper').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let uker = $('#id_uker').val();

        let table = $('#lapPemper').DataTable({
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
                url: urlLaporankeuangan + "filterLapPemper",
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