<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PERMINTAAN BARANG PROJECT</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Awal</label>
                                <input type="date" id="periodeAwal" name="periodeAwal" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label>Periode Akhir</label>
                                <input type="date" id="periodeAkhir" name="periodeAkhir" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Project</label>
                        <select name="id_project" id="id_project" class="form-control select2">
                            <option value="">--All Tipe Barang--</option>
                            <?php foreach ($project as $pj) : ?>
                                <option value="<?php echo $pj->id_project; ?>"><?php echo $pj->nama_project; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <button type="button" id="viewLapPerbaject" class="btn btn-success text-center btn-sm">Filter</button>
                    <input type="submit" value="Download" class="btn btn-primary text-center btn-sm">
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="tableProject" class="table table-bordered table-hover  dataTable" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>TID</th>
                    <th>Tanggal SPK</th>
                    <th>Nomor SPK</th>
                    <th>Nama Project</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlLaporanPerject = '<?= site_url("Laporanpusat/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tableProject')) {
            table = $('#tableProject').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                scrollX: true,
                ajax: {
                    url: urlLaporanPerject + "listLapPenghapusbukbar",
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
        $('.select2').select2();
    })

    $('#viewLapPerbaject').on('click', function(e) {
        e.preventDefault();

        let periodeAwal = $('#periodeAwal').val();
        let periodeAkhir = $('#periodeAkhir').val();
        let id_project = $('#id_project').val();

        let table = $('#listLapPenghapusbukbar').DataTable({
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
                url: urlLaporanPerject,
                data: {
                    periodeAwal: periodeAwal,
                    periodeAkhir: periodeAkhir,
                    id_project: id_project,
                },
                dataType: "JSON"
            },
        });
    })
</script>