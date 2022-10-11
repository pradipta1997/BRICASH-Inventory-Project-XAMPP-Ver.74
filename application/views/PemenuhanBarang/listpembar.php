<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PEMENUHAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="#" method="post">
                        <div class="form-group" style="display: flex;">
                            <label for="stock">Filter Cabang</label>
                            <select name="id_uker" id="id_uker" class="form-control select2">
                                <option value="All">--Cabang--</option>
                                <?php foreach ($uker as $uk) : ?>
                                    <option value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label for="stock">Filter Status</label>
                        <select name="status_permintaan" id="status_permintaan" class="form-control">
                            <option value="All">--Status--</option>
                            <option value="1">Sudah Dipenuhi</option>
                            <option value="0">Belum Dipenuhi</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterpemenuhan" name="filterpemenuhan" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PEMENUHAN BARANG</h3>
    </div>
    <div class="box-body">
        <table id="tablePemenuhanbarang" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No Permintaan</th>
                    <th>Tanggal Pemenuhan</th>
                    <th>Tujuan (Uker)</th>
                    <th>Status Pemenuhan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlPemenuhanbarcab = '<?= site_url("Pemenuhanbarang/") ?>';
    let table;

    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#tablePemenuhanbarang')) {
            table = $('#tablePemenuhanbarang').DataTable({
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPemenuhanbarcab + "listPemenuhanbarang",
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

    $('#filterpemenuhan').on('click', function(e) {
        e.preventDefault();

        let status_permintaan = $('#status_permintaan').val();
        let id_uker = $('#id_uker').val();

        let table = $('#tablePemenuhanbarang').DataTable({
            dom: 'Bfrtip',
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],

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
                url: urlPemenuhanbarcab + "filter",
                data: {
                    status_permintaan: status_permintaan,
                    id_uker: id_uker
                },
                dataType: "JSON"
            },
        });
    })
</script>