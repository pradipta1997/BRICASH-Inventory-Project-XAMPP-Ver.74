<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST STOCK CABANG</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered" id="tableStokdetail" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>No. SN</th>
                    <th>Harga Barang</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <th class="text-center" colspan="7">Total Harga Barang</th>
                <th><?= rupiah($totalHarga[0]->Total) ?></th>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlStokgudang = '<?= site_url("Stokcabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableStokdetail')) {
            table = $('#tableStokdetail').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    data: {
                        no_urut: <?= $no_urut ?>,
                    },
                    url: urlStokgudang + "listStokdetail",
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