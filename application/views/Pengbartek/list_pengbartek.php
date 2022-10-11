<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER STATUS PEMAKAIAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Nama Teknisi</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option value="">--All Nama Teknisi--</option>
                            <option value="">Mr.A</option>
                            <option value="">Mr.B</option>
                            <option value="">Mr.C</option>
                            <option value="">Mr.D</option>
                            <option value="">Mr.E</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST STATUS PEMAKAIAN BARANG</h3>
    </div>
    <div class="box-body">
        <table id="tablePengbartek" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Teknisi</th>
                    <th>TID</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Nama Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>No SN</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPengbartek = '<?= site_url("Pengbartek/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePengbartek')) {
            table = $('#tablePengbartek').DataTable({
                responsive: true,
                processing: false,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPengbartek + "listPengbartek",
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



    // const urlPengbartek = '<?= site_url("Pengbartek/") ?>';
    // let table;

    // $(function() {
    //     if (!$.fn.DataTable.isDataTable('tablePengbartek')) {
    //         table = $('tablePengbartek').DataTable({
    //             responsive: true,
    //             processing: true,
    //             serverSide: true,
    //             order: [],
    //             scrollX: true,
    //             ajax: {
    //                 url: urlPengbartek + "listPengbartek",
    //                 type: "POST"
    //             },
    //             columnDefs: [{
    //                 targets: [0, -1],
    //                 orderable: false,
    //                 className: "text-center",
    //             }, ],
    //         });
    //     }
    // });




    // $(function() {
    //     $('#tablePengbartek').DataTable();
    // })
</script>