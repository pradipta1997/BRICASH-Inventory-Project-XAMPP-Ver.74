<div class="box">
    <form action="<?= base_url('Monpenghapusbukbar/filterPenghapusbukbar') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER MONITORING PENGHAPUS BUKUAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Awal</label>
                                <input type="date" class="form-control" id="startdate" name="startdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" class="form-control" id="enddate" name="enddate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-2 col-form-label ">Status Penghapus Bukuan</label>
                        <select name="status" id="status" class="form-control">
                            <option value="All">--All Status--</option>
                            <option value="0">Belum</option>
                            <option value="1">Sudah</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterPH" name="filterPH" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST MONITORING PENGHAPUS BUKUAN BARANG</h3>
        <span <?php echo $My_Controller->savePermission; ?>>

        </span>
    </div>
    <div class="box-body">
        <table id="tablePenghapusbukbar" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Permintaan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Harga Barang</th>
                    <th title="Status Penghapus Bukuan">Status PH</th>
                    <th title="Status Pembukuan">Status Pembukuan</th>
                    <th>Ijin Prinsip</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="uploadBuktiPembukuan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Bukti Pembukuan</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tgl_transaksi">Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi">
                </div>
                <div class="form-group">
                    <label for="file_voucher">Voucher Pembukuan</label>
                    <input type="file" class="form-control" id="file_voucher" name="file_voucher">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm">Save changes</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    const urlPenerimaanbarcab = '<?= site_url("Monpenghapusbukbar/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenghapusbukbar')) {
            table = $('#tablePenghapusbukbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbarcab + "listPenghapusbukbar",
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

    $('#filterPH').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status = $('#status').val();

        let table = $('#tablePenghapusbukbar').DataTable({
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
                url: urlPenerimaanbarcab + "filterPenghapusbukbar",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    status: status,
                },
                dataType: "JSON"
            },
        });
    })
</script>