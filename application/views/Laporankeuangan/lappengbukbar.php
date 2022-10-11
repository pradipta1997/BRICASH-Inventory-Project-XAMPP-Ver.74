<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PENGHAPUS BUKUAN BARANG</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label for="per_awal">Periode Awal</label>
                                <input type="date" class="form-control" id="startdate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label for="per_akhir">Periode Akhir</label>
                                <input type="date" class="form-control" id="enddate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <button type="submit" id="filterLappengbukbar" name="filterLappengbukbar" class="btn btn-primary btn-sm">Filter</button>
                    </div>
                </div>
            </div>


        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table class="table table-bordered table-hover" style="width: 100%;" id="tableLapPengbukbar">
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Grand Total:</td>
                    <td><?= rupiah($grandTotal[0]->GrandTotal) ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlLaporankeuangan = '<?= site_url("Laporankeuangan/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableLapPengbukbar')) {
            table = $('#tableLapPengbukbar').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                scrollX: true,
                ajax: {
                    url: urlLaporankeuangan + "listLapPenghapusbukbar",
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

    $('#filterLappengbukbar').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#tableLapPengbukbar').DataTable({
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
                url: urlLaporankeuangan + "filterLappengbukbar",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                },
                dataType: "JSON"
            },
        });
    })
</script>