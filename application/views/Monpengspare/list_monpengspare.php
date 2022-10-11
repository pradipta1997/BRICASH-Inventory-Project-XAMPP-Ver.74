<div class="box">
    <form action="<?= base_url('Monpengspare/filterPempengsparekancab') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER MONITORING PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Status Pembukuan</label>
                        <select name="status_pembukuan" id="status_pembukuan" class="form-control">
                            <option value="All">--All--</option>
                            <option value="0">Belum Dibuku</option>
                            <option value="1">Sudah Dibuku</option>
                        </select>
                    </div>

                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div>
                        <button type="submit" id="filter" name="filter" class="btn btn-primary btn-sm text-center">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">MONITRONG PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG</h3>
    </div>
    <div class="box-body">
        <table id="tableMonpengspare" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Tanggal Pemakaian</th>
                    <th>Total Harga</th>
                    <th>Status Pembukuan</th>
                    <th>No Voucher</th>
                    <th>Tanggal Pembukuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>

<div class="modal fade" id="editMonpengspare">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Voucher & Tanggal Pembukuan</h4>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label for='no_sp' class='control-label'>No. Sparepart</label>
                    <input type='text' name="no_sp" required class='form-control' id='no_sp' />
                </div>
                <div class='form-group'>
                    <label for='no_voucher' class='control-label'>No. Voucher Pembukuan</label>
                    <input type='text' name="no_voucher" required class='form-control' id='no_voucher' />
                </div>
                <div class='form-group'>
                    <label for='tgl_pembukuan' class='control-label'>Tanggal Pembukuan</label>
                    <input type='text' name="tgl_pembukuan" value="<?= date('Y-m-d') ?>" required class='form-control' id='tgl_pembukuan' />
                </div>
                <div class='form-group'>
                    <label for='file_pembukuan' class='control-label'>File Voucher Pembukuan</label>
                    <input type='file' name="file_pembukuan" required class='form-control' id='file_pembukuan' />
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
    const urlPempengsparekancab = '<?= site_url("Monpengspare/") ?>';
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
                    url: urlPempengsparekancab + "listPempengsparekancab",
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

    function RekapPengspare() {
        Swal.fire({
            title: "INFORMATION",
            text: "Yakin mau pembukuan barang ini?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire("Data berhasil di bukukan!", "", "success");
            }
        });
    }

    $('#filter').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status_pembukuan = $('#status_pembukuan').val();

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
                url: urlPempengsparekancab + "filterPempengsparekancab",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    status_pembukuan: status_pembukuan
                },
                dataType: "JSON"
            },
        });
    })
</script>