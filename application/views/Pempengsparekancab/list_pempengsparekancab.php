<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Awal</label>
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
                        <label>Status Pembukuan</label>
                        <select id="status_pembukuan" name="status_pembukuan" class="form-control select2">
                            <option value="All">--Status--</option>
                            <option value="1">Sudah Dibukukan</option>
                            <option value="0">Belum Dibukukan</option>
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
        <h3 class="box-title">PEMBUKUAN PENGGUNAAN SPAREPART KANTOR CABANG
        </h3>
    </div>
    <div class="box-body">
        <table id="tableMonpengspare" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th style="width:20px;">No</th>
                    <th>Nama Uker</th>
                    <th style="width:20px;">Tanggal Pemakaian</th>
                    <th>Total Harga</th>
                    <th style="width:20px;">Status Pembukuan</th>
                    <th style="width:20px;">No Voucher</th>
                    <th style="width:20px;">Tanggal Pembukuan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <!-- <tfoot>
                <tr>
                    <td colspan="3">Total :</td>
                    <td>Rp.2.047.695,00</td>
                    <td colspan="3"></td>
                    <td></td>
                </tr>
            </tfoot> -->
        </table>
    </div>
</div>

<script>
    const urlPempengsparekancab = '<?= site_url("Pempengsparekancab/") ?>';
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
    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let status_pembukuan = $('#status_pembukuan').val();
        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

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
                url: urlPempengsparekancab + "filter",
                data: {
                    status_pembukuan: status_pembukuan,
                    startdate: startdate,
                    enddate: enddate
                },
                dataType: "JSON"
            },
        });
    })
</script>