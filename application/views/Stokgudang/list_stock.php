<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER STOCK GUDANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-3">
                    <form action="#" method="post">
                        <div class="form-group" style="display: flex;">
                            <label class="col-sm-6 col-form-label " for="stock">Filter Barang</label>
                            <select name="nama_barang" id="nama_barang" class="form-control select2">
                                <option value="All">--Nama Barang--</option>
                                <?php foreach ($barang as $value) : ?>
                                    <option value="<?= $value->no_urut ?>"><?= $value->nama_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <button type="submit" id="filterstock" class="btn btn-primary">Filter</button>
                    </div>
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
        <table class="table table-bordered table-hover" id="tableStokgudang" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>Qty</th>
                    <th>Total Harga Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <th class="text-center" colspan="8">Grand Total</th>
                <th><?= rupiah($totalHarga[0]->total) ?></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlStokgudang = '<?= site_url("Stokgudang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableStokgudang')) {
            table = $('#tableStokgudang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlStokgudang + "listStokgudang",
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


    $('#filterstock').on('click', function(e) {
        e.preventDefault();

        let nama_barang = $('#nama_barang').val();

        let table = $('#tableStokgudang').DataTable({
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
                url: urlStokgudang + "filter",
                data: {
                    nama_barang: nama_barang,
                },
                dataType: "JSON"
            },
        });
    })
</script>