<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PENERIMAAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label ">Periode Awal</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <input type="submit" id="filterPenbar" name="filterPenbar" class="btn btn-primary btn-sm" value="Filter">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="listPenbar" class="table table-bordered table-hover" style="width: 100%;">
        <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Resi</th>
                    <th>Uker Pengirim</th>
                    <th>Uker Tujuan</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Tanggal Diterima</th>
                    <th>Nama Pengirim</th>
                    <!-- <th>Keterangan</th> -->
                    <th>Total Harga</th>
                    <th>Berat Barang</th>
                    <th>Ekpedisi</th>
                    <th>Status Pengiriman</th>
                </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlLaporancabang = '<?= site_url("Laporancabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#listPenbar')) {
            table = $('#listPenbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLaporancabang + "listPengirimanBarang",
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

    $('#filterPenbar').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#listPenbar').DataTable({
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
                url: urlLaporancabang + "filterPenbar",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                },
                dataType: "JSON"
            },
        });
    })
</script>