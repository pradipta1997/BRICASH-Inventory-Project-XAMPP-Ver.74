    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <span <?php echo $My_Controller->savePermission; ?>> </span>
                    <h3 class="box-title">LAPORAN PART & MATERIAL</h3>
                    <div class="col-sm-3">
                    <a type="button" href="<?= base_url('LapPartdanMaterialKanPus/downloadExcel') ?>" class="btn btn-success btn-sm"><i class="fa fa-download"> Download Laporan</i></a>
                    </div>
                </header>
                <div class="panel-body">
                    <h3 class="box-title">Material</h3>
                    <table id="tablePerso" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                        	<th>No</th>
                            <th>SubGrup Barang</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Harga Beli</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
                <div class="panel-body">
                    <h3 class="box-title">Sparepart</h3>
                    <table id="tableSparepart" class="table table-bordered table-hover" style="width: 100%;">
                    <thead class="bg-primary">
                        <tr role="row">
                            <th>No</th>
                            <th>SubGrup Barang</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Harga Beli</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </section>
        </div>
    </div>
<script>
    const urlPartMaterial = '<?= site_url("LapPartdanMaterialKanPus/") ?>';
    let table;

       $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePerso')) {
            table = $('#tablePerso').DataTable({
                scrollCollapse: true,
                scrollY: "510px",
                processing: true,
                serverSide: true,
                orderable: true,
                searchable: true,
                scrollX: true,
                // paging: false,
                ajax: {
                    url: urlPartMaterial + "List_LapPerso",
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
        if (!$.fn.DataTable.isDataTable('#tableSparepart')) {
            table = $('#tableSparepart').DataTable({
                scrollCollapse: true,
                scrollY: "510px",
                processing: true,
                serverSide: true,
                orderable: true,
                searchable: true,
                scrollX: true,
                // paging: false,
                ajax: {
                    url: urlPartMaterial + "List_LapSparepart",
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



    // $('#selecttable').on('click', function(e) {
    //     e.preventDefault();

    //     let cabang = $('#cabang').val();
    //     // let bulan = $('#bulan').val();
        
    //     let table = $('#tableCROkolaborasi').DataTable({
    //         processing: true,
    //         // responsive: true,
    //         serverSide: true,
    //         destroy: true,
    //         order: [],
    //         scrollX: true,
    //         columnDefs: [{
    //             targets: [0, -1],
    //             orderable: false,
    //         }, ],
    //         ajax: {
    //             type: "POST",
    //             url: urlRekapBiaya + "####",
    //             data: {
    //                 cabang: cabang
    //             },
    //             dataType: "JSON"
    //         },
    //     });
    // })


    // $('#selecttable').on('click', function(e) {
    //     e.preventDefault();

    //     let cabang = $('#cabang').val();
    //     // let bulan = $('#bulan').val();
        
    //     let table = $('#tableCIT').DataTable({
    //         processing: true,
    //         // responsive: true,
    //         serverSide: true,
    //         destroy: true,
    //         order: [],
    //         scrollX: true,
    //         columnDefs: [{
    //             targets: [0, -1],
    //             orderable: false,
    //         }, ],
    //         ajax: {
    //             type: "POST",
    //             url: urlRekapBiaya + "listRekapBiayaCIT",
    //             data: {
    //                 cabang: cabang
    //             },
    //             dataType: "JSON"
    //         },
    //     });
    // })


    // $('#selecttable').on('click', function(e) {
    //     e.preventDefault();

    //     let cabang = $('#cabang').val();
    //     // let bulan = $('#bulan').val();
        
    //     let table = $('#tablePJPURsupport').DataTable({
    //         processing: true,
    //         // responsive: true,
    //         serverSide: true,
    //         destroy: true,
    //         order: [],
    //         scrollX: true,
    //         columnDefs: [{
    //             targets: [0, -1],
    //             orderable: false,
    //         }, ],
    //         ajax: {
    //             type: "POST",
    //             url: urlRekapBiaya + "listRekapBiayaPJPUR",
    //             data: {
    //                 cabang: cabang
    //             },
    //             dataType: "JSON"
    //         },
    //     });
    // })


    // $('#selecttable').on('click', function(e) {
    //     e.preventDefault();

    //     let cabang = $('#cabang').val();
    //     // let bulan = $('#bulan').val();
        
    //     let table = $('#tableSortir').DataTable({
    //         processing: true,
    //         // responsive: true,
    //         serverSide: true,
    //         destroy: true,
    //         order: [],
    //         scrollX: true,
    //         columnDefs: [{
    //             targets: [0, -1],
    //             orderable: false,
    //         }, ],
    //         ajax: {
    //             type: "POST",
    //             url: urlRekapBiaya + "listRekapBiayaSortir",
    //             data: {
    //                 cabang: cabang
    //             },
    //             dataType: "JSON"
    //         },
    //     });
    // })


    // $(function() {
    //     $('.select2').select2();
    // })


    // $(document).ready(function() {
    // $('#tableCabang').DataTable( {
    //     "scrollX": true
    // } );
    // } );

</script>