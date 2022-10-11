<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PENERIMAAN BARANG DARI VENDOR</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Date Created Awal</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Date Created Akhir</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Nama Pengirim</label>
                        <select class="form-control select2" id="nama_pengirim" name="nama_pengirim" style="width: 100%;">
                            <option value="All">--Nama Pengirim--</option>
                            <?php foreach ($pengirim as $peng) : ?>
                                <option value="<?= $peng->id_do ?>"><?= $peng->nama_pengirim ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Status DO</label>
                        <select class="form-control select2" id="status_do" name="status_do" style="width: 100%;">
                            <option value="All">--Status DO--</option>
                            <option value="0">Open</option>
                            <option value="1">Close</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterpenbaven" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>

        </div>
    </form>

</div>

<div class="box">
    <div class="box-body">
        <table id="tableven" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomer PO</th>
                    <th>Tanggal PO</th>
                    <th>Project</th>
                    <th>Ship To Unit Kerja</th>
                    <th>To Vendor</th>
                    <th>Harga</th>
                    <th>Jumlah Pesanan</th>
                    <th>Diterima</th>
                    <th>Catatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPenbarven = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableven')) {
            table = $('#tableven').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlPenbarven + "listLap_penbaven",
                    type: "POST",

                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });

    $(function() {
        $('.select2').select2();
    })

    $('#filterpenbaven').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let nama_pengirim = $('#nama_pengirim').val();
        let status_do = $('#status_do').val();

        let table = $('#tableven').DataTable({
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
                url: urlPenbarven + "filterpenbaven",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    nama_pengirim: nama_pengirim,
                    status_do: status_do,

                },
                dataType: "JSON"
            },
        });
    })
</script>