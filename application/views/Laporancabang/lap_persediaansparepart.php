<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PERSEDIAAN SPAREPART CABANG</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label class="col-sm-3 col-form-label " for="namaTeknisi">Status Sparepart</label>
                        <select name="status" id="status" class="form-control select2" style="width: 100%;" title="Pilih Status Sparepart">
                            <option value="All">--Status Sparepart--</option>
                                <option value="1">Good Part</option>
                                <option value="0">Bad Part</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="View Data">
                    <a type="button" href="<?= base_url('LapPersediaanSparepart/downloadExcel') ?>" class="btn btn-success btn-sm" >Download Laporan</a>
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
    	<h3 class="box-title">Sparepart Cabang</h3>
        <table id="tableCabang" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Uker</th>
                    <th>Nama Barang</th>
                    <th>Merek</th>
                    <th>Kode Barang</th>
                    <th>Harga Barang</th>
                    <th>QTY</th>
                    <!-- <th>Status Permintaan</th> -->
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlLapSparepartCab = '<?= site_url("LapPersediaanSparepart/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableCabang')) {
            table = $('#tableCabang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLapSparepartCab + "list_LapPersediaanSparepart",
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

        let status = $('#status').val();

        let table = $('#tableCabang').DataTable({
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
                url: urlLapSparepartCab + "filter_PersediaanSparepart",
                data: {
                    status: status,
                },
                dataType: "JSON"
            },
        });
    })
</script>