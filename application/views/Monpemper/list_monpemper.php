<div class="box">
    <form action="<?php base_url('Monpengspare/filterPempengsparekancab') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER MONITORING PEMBUKUAN PERSEDIAAN</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control" id="startdate" name="startdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control" id="enddate" name="enddate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="display: flex;">
                        <label>Status Pembukuan</label>
                        <select class="form-control select2" name="id_pembukuan" id="id_pembukuan">
                            <option value="All">--All Status--</option>
                            <option value="0">Belum dibuku</option>
                            <option value="1">Sudah dibuku</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="submit" id="filterMonpemper" name="filterMonpemper" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">MONITORING PEMBUKUAN PERSEDIAAN</h3>
    </div>
    <div class="box-body">
        <table id="tableMonpengspare" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Uker Pengiriman</th>
                    <th>Nama Ekpedisi</th>
                    <!-- <th>Keterangan</th> -->
                    <th>Status Pengiriman</th>
                    <th>Nilai Barang</th>
                    <th title="Status Pembukuan">Status Pembukuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>

<div id="UploadVoucher" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="UploadVoucher-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UploadVoucher-title">Upload Voucher & Tanggal Transaksi</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label class='control-label'>Tanggal Transaksi</label>
                    <input type='date' name="tgl_transaksi" id="tgl_transaksi" required class='form-control' />
                </div>
                <div class='form-group'>
                    <label class='control-label'>Voucher Pembukuan</label>
                    <input type='file' name="file_voucher" id="file_voucher" required class='form-control' />
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" value="Save" class="btn btn-success btn-sm">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    const urlMonpemper = '<?= site_url("Monpemper/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableMonpengspare')) {
            table = $('#tableMonpengspare').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlMonpemper + "listMonpemper",
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

    $('#filterMonpemper').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status = $('#id_pembukuan').val();

        let table = $('#tableMonpengspare').DataTable({
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
                url: urlMonpemper + "filterMonpemper",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    id_pembukuan: status,
                },
                dataType: "JSON"
            },
        });
    })
</script>