<div class="box">
    <div class="box-header">
        <h3 class="box-title">LAPORAN PENGIRIMAN BARANG</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="tablePengbarkp" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Pengiriman</th>
                    <th>Tanggal Pengiriman (SP)</th>
                    <th>Tujuan (Uker)</th>
                    <th>No. Resi</th>
                    <th>Pengirim (Uker)</th>
                    <th>Jumlah Koli</th>
                    <th>Berat Barang</th>
                    <th>Ekspedisi</th>
                    <th>Layanan</th>
                    <th>Nama Pengirim</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="11">Grand Total : </td>
                    <td><?= rupiah($grandtotal[0]->harga) ?></td>
                    <td></td>
                    <!-- <td></td> -->
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script type="text/javascript">
    const urlLaporanpusat = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#tablePengbarkp')) {
            table = $('#tablePengbarkp').DataTable({
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLaporanpusat + "listLap_pengbar",
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