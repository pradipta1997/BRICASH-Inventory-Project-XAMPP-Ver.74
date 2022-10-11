<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PERMINTAAN BARANG PERBAIKAN</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Tipe Barang</label>
                        <select name="" id="" class="form-control">
                            <option value="">--All Tipe Barang--</option>
                            <option value="">NCR S55</option>
                            <option value="">MONIMAX 9200</option>
                            <option value="">WINCOR 280 HG</option>
                            <option value="">PROCASH 1500</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="tbl_permintaan_barang" class="table table-bordered table-hover  dataTable" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Tanggal Diminta</th>
                    <th>Nomor Permintaan</th>
                    <th>Alasan Permintaan</th>
                    <th>Catatan Permintaan</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>Cabang Jatipadang</td>
                    <td>24/01/2020</td>
                    <td>1001</td>
                    <td>--</td>
                    <td>--</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#tbl_permintaan_barang')) {
            table = $('#tbl_permintaan_barang').DataTable({
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLaporanpusat + "listPermintaanbarang",
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
</script>