<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST BARANG BALIKAN</h3>
    </div>
    <div class="box-body">
        <table id="tableBarbal" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tipe Barang</th>
                    <th>Nama Barang</th>
                    <th>No Serial Number</th>
                    <th>No SN Lama</th>
                    <th>Nama Teknisi</th>
                    <th>TID Project</th>
                    <th>Kondisi Barang</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    const barangBalik = '<?= site_url("Barbal/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableBarbal')) {
            table = $('#tableBarbal').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: barangBalik + "listBarbal",
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