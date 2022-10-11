<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PERMOHONAN PEMBAYARAN EKPEDISI</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Tgl Pengiriman Awal</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Tgl Pengiriman Akhir</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Cabang</label>
                        <select class="form-control select2" id="uker" name="uker" style="width: 100%;">
                            <option value="All">--Nama Uker--</option>
                            <?php foreach ($uker as $uk) : ?>
                                <option value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Status Cek</label>
                        <select class="form-control " id="status_cek" name="status_cek" style="width: 100%;">
                            <option value="All">--Status Cek--</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterpemekspedisi" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>

        </div>
    </form>
    <div class="box-body">
        <table id="tablePermohonanPembayaranEkspedisi" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Pengiriman</th>
                    <th>Tanggal Pengiriman (SP)</th>
                    <th>Tujuan (Uker)</th>
                    <th>No. Resi</th>
                    <th>Jumlah Koli</th>
                    <th>Berat Barang</th>
                    <th>Ekspedisi</th>
                    <th>Layanan</th>
                    <th>Nama Pengirim</th>
                    <th>Total Harga</th>
                    <th>Status Cek</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <th class="text-center" colspan="10">Grand Total: </th>
                <th><?= rupiah($totalHarga[0]->grandTotalHarga) ?></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</div>


<script>
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePermohonanPembayaranEkspedisi')) {
            table = $('#tablePermohonanPembayaranEkspedisi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLaporanpusat + "listLapPemEkspedisi",
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

    $('#filterpemekspedisi').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let uker = $('#uker').val();
        let status_cek = $('#status_cek').val();

        let table = $('#tablePermohonanPembayaranEkspedisi').DataTable({
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
                url: urlLaporanpusat + "filterPembayaranEk",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    uker: uker,
                    status_cek: status_cek,

                },
                dataType: "JSON"
            },
        });
    })
</script>