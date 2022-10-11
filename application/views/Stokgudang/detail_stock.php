<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER STOCK GUDANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-5">
                    <form action="#" method="post">
                        <div class="form-group" style="display: flex;">
                            <label for="filter_nama_barang" class="col-sm-3 col-form-label">Filter Nama Barang</label>
                            <input type="text" id="filter_nama_barang" class="form-control" name="filter_nama_barang">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST STOCK GUDANG</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered" id="tableStokdetail" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. PO</th>
                    <th>Nama Gudang</th>
                    <th>Nama Rak</th>
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
                <th class="text-center" colspan="10">Total Harga Barang</th>
                <th><?= rupiah($totalHarga[0]->Total) ?></th>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlStokgudang = '<?= site_url("Stokgudang/") ?>';
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