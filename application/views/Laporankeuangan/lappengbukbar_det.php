<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL LAPORAN PENGHAPUS BUKUAN BARANG</h3>
    </div>
    <div class="box-body">

        <table class="table table-bordered" id="tableLapPengbukbarDet" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>No SN</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kondisi Barang</th>
                    <th>Harga Barang</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <td colspan="10">Grand Total: </td>
                    <td><?= rupiah($grandTotal[0]->GrandTotal) ?></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <hr>
        <div class="text-center">
            <a href="<?= base_url('Laporankeuangan/Pengbukbar') ?>" class="btn btn-warning btn-sm">Kembali</a>
        </div>
    </div>
</div>

<script>
    const urlLaporankeuangan = '<?= site_url("Laporankeuangan/") ?>';

    $(function() {

        if (!$.fn.DataTable.isDataTable('#tableLapPengbukbarDet')) {
            table = $('#tableLapPengbukbarDet').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLaporankeuangan + "listLapPenghapusbukbarDet",
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