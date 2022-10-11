<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN BARANG TIDAK BISA DI PERBAIKI</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" id="periodeawal" name="periodeawal" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" id="periodeakhir" name="periodeakhir" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <button type="submit" id="filterbarnofix" class="btn btn-primary btn-sm">Filter</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="tablenofix" class="table table-bordered table-hover dataTable" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Satuan</th>
                    <th>Tipe Barang</th>
                    <th>Nomor SN</th>
                    <th>Nama Barang</th>
                    <th>Kondisi Barang</th>
                    <th>Tanggal Permintaan</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>PCS</td>
                    <td>MONIMAX 9200</td>
                    <td>A12345678</td>
                    <td>ATM</td>
                    <td>Belum Diperbaiki</td>
                    <td>08/04/2020</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablenofix')) {
            table = $('#tablenofix').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLaporanpusat + "listPenghapusbukbar",
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

    $('#filterbarnofix').on('click', function(e) {
        e.preventDefault();

        let periodeawal = $('#periodeawal').val();
        let periodeakhir = $('#periodeakhir').val();

        let table = $('#tablenofix').DataTable({
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
                url: urlLaporanpusat + "filterbarnofix",
                data: {
                    periodeawal: periodeawal,
                    periodeakhir: periodeakhir,


                },
                dataType: "JSON"
            },
        });
    })
</script>