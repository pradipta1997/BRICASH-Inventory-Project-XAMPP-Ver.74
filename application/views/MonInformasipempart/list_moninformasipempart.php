<div class="box">
    <div class="box-header">
        <h3 class="box-title">MONITORING INFORMASI PEMAKAIAN SPAREPART
            <!-- <span <?php echo $My_Controller->savePermission; ?>>
                | <a href="#addinformasipempart" data-toggle="modal" class='btn btn-info btn-sm'> Tambah <i class="fa fa-plus"></i></a>
            </span> -->
        </h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="tableMoninformasi" class="table table-bordered table-hover" width="100%">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <!-- <th>TID | Project</th> -->
                        <th>Group Barang</th>
                        <th>Subgroup Barang</th>
                        <th>Nama Barang</th>
                        <th>Merek Barang</th>
                        <th>Tipe Barang</th>
                        <th>No SN</th>
                        <th>Harga Barang</th>
                    </tr>
                </thead>
                <tbody id="rows-list">
                    
                </tbody>
                <tfoot>
                    <th colspan="7">Total: </th>
                    <th><?= rupiah($totalHarga[0]->GrandTotalHarga) ?></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script>
    const urlPenerimaanbartek = '<?= site_url("Moninformasipempart/") ?>';
    let table;


    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableMoninformasi')) {
            table = $('#tableMoninformasi').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbartek + "listPenerimaanbartek",
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