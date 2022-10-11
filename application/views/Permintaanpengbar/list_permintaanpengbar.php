<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PERMINTAAN BARANG DARI CABANG</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-lg-6">
                    <form action="#" method="post">
                        <div class="form-group" style="display: flex;">
                            <label class="" for="stock">Filter Status</label>

                            <select name="status_permintaan" id="status_permintaan" class="form-control">
                                <option value="All">--Status--</option>
                                <option value="1">Sudah Dipenuhi</option>
                                <option value="0">Belum Dipenuhi</option>
                            </select>

                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="" for="stock">Filter Cabang</label>
                        <select name="id_uker" id="id_uker" class="form-control select2">
                            <option value="All">--Cabang--</option>
                            <?php foreach ($uker as $uk) : ?>
                                <option value="<?= $uk->id_uker ?>"><?= $uk->nama_uker ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-12">
                        <button type="submit" id="filterperbar" name="filterperbar" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PERMINTAAN BARANG DARI CABANG</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
        </span>
    </div>

    <div class="box-body">

        <table id="tablePermintaanpengbar" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Tanggal Permintaan</th>
                    <th>No Permintaan</th>
                    <th>Alasan Permintaan</th>
                    <th>Catatan Permintaan</th>
                    <th>Status Permintaan</th>
                    <th>Approvel</th>
                    <th>SLA</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <!-- <tr>
                    <td> 1 </td>
                    <td> Cempaka Putih </td>
                    <td> 2021-Maret-25 </td>
                    <td> PER-03D-001 </td>
                    <td> PART ADA YANG KARAT </td>
                    <td> KIRIM DENGAN PLASTIK BARANGNYA </td>
                    <td> <?= labelWarna("danger", "Belum dipenuhi") ?> </td>
                    <td> <?= labelWarna("success", "Sudah di Approve") ?> </td>
                    <td> <a title="0 Hari, 6 Jam, 3 Menit, 41 Detik " class="btn fa fa-thumbs-up" style="color:green" type="button"></a> </td>
                    <td>
                        <a href='<?= base_url('Permintaanpengbar/viewEdit') ?>' class='btn btn-warning'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlPermintaanbarangcab = '<?= site_url("Permintaanbarangcab/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePermintaanpengbar')) {
            table = $('#tablePermintaanpengbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPermintaanbarangcab + "listPermintaanbarang",
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

    $('#filterperbar').on('click', function(e) {
        e.preventDefault();

        let status_permintaan = $('#status_permintaan').val();
        let id_uker = $('#id_uker').val();

        let table = $('#tablePermintaanpengbar').DataTable({
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
                url: urlPermintaanbarangcab + "filter",
                data: {
                    status_permintaan: status_permintaan,
                    id_uker: id_uker
                },
                dataType: "JSON"
            },
        });
    })
</script>