<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PERMOHONAN PEMBAYARAN EKPEDISI</h3>
    </div>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <th class="text-center" colspan="10">Grand Total: </th>
                <th><?= rupiah($totalHarga[0]->grandTotalHarga) ?></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</div>


<script>
    const urlPermohonanpembarek = '<?= site_url("Permohonanpembarek/") ?>';
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
                    url: urlPermohonanpembarek + "listPermohonanPembayaranEks",
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