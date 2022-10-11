<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PEMENUHAN BARANG UNTUK TEKNISI</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label ">Periode Awal</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-3 col-form-label " for="namaTeknisi">Nama Teknisi</label>
                        <select name="id_user" id="id_user" class="form-control select2" style="width: 100%;" title="Pilih Nama Teknisi">
                            <option value="All">--Nama Teknisi--</option>
                            <?php foreach ($user as $val) : ?>
                                <option value="<?= $val->id_user; ?>"><?= $val->username; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-3 col-form-label ">Status Pemenuhan</label>
                        <select name="status_permintaan" id="status_permintaan" class="form-control select2" title="Pilih Status Permintaan">
                            <option value="All">--Status--</option>
                            <option value="0">Belum Terpenuhi</option>
                            <option value="1">Sudah Terpenuhi</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="Proceed">
                </div>
            </div>
        </div>

    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PEMENUHAN BARANG UNTUK TEKNISI</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
            |
            <!-- <a href='<?= base_url('Pemenuhanbartek/tambahPemenuhanbartek') ?>' class='btn btn-info btn-sm'>
                Add New <i class="fa fa-plus"></i>
            </a> -->

            <!-- <a href="" class='btn btn-info btn-sm mt-2'> Cetak</a>
            | -->
            <!-- <label for=""> Nomor SN</label>
            <input type="text" name="no_sn"> -->
        </span>

    </div>
    <div class="box-body">
        <table id="tablePemenuhanbartek" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemenuhan</th>
                    <th>Nomer Permintaan</th>
                    <th>Nama Teknisi</th>
                    <th>TID</th>
                    <th>Keterangan</th>
                    <th>Status Pemenuhan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPemenuhanbartek = '<?= site_url("Pemenuhanbartek/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePemenuhanbartek')) {
            table = $('#tablePemenuhanbartek').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPemenuhanbartek + "listPemenuhanBarTek",
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

    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let id_user = $('#id_user').val();
        let status_permintaan = $('#status_permintaan').val();
        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#tablePemenuhanbartek').DataTable({
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
                url: urlPemenuhanbartek + "filter",
                data: {
                    id_user: id_user,
                    status_permintaan: status_permintaan,
                    startdate: startdate,
                    enddate: enddate
                },
                dataType: "JSON"
            },
        });
    })
</script>