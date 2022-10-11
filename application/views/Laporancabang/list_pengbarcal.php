<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PENGELUARAN BARANG BALIKAN</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label ">Kondisi Barang</label>
                                <select name="kondisi_barang" id="kondisi_barang" class="form-control select2" title="Pilih Nama Teknisi">
                                    <option value="">--Pilih Kondisi Barang--</option>
                                    <option value="1">Bagus</option>
                                    <option value="0">Rusak</option>
                                </select>
                            </div>
                        </div>
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
    <div class="box-body">
        <table id="tablePengbarbal" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>No Serial Number</th>
                    <th>No SN Lama</th>
                    <th>Kondisi Barang</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>EXIT SHUTTER</td>
                    <td>CPRT001</td>
                    <td>BPRT001</td>
                    <td>RUSAK</td>
                    <td>BESI NYA KARATAN</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>

<script>

    const urlLapPertek = '<?= site_url("Laporancabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePengbarbal')) {
            table = $('#tablePengbarbal').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlLapPertek + "listPengbarcal",
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

        let kondisi_barang = $('#kondisi_barang').val();

        let table = $('#tablePengbarbal').DataTable({
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
                url: urlLapPertek + "filterPengbarcal",
                data: {
                    kondisi_barang: kondisi_barang
                },
                dataType: "JSON"
            },
        });
    })
    // $(function() {
    //     $('#tablePengbarbal').DataTable({
    //         responsive: true,
    //         processing: true,
    //         // serverSide: true,
    //         order: [],
    //         scrollX: true,
    //         dom: 'Bfrtip',
    //         buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //     });
    // })
</script>