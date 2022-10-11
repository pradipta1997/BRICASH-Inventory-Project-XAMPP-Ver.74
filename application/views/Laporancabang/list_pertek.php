<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PERMINTAAN TEKNISI</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label ">Periode Awal</label>
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
                        <label class="col-sm-3 col-form-label " for="namaTeknisi">Nama Teknisi</label>
                        <select name="id_user" id="id_user" class="form-control select2" style="width: 100%;" title="Pilih Nama Teknisi">
                            <option value="All">--Nama Teknisi--</option>
                            <?php foreach ($user as $val) { ?>
                                <option value="<?php echo $val->id_user; ?>"><?php echo $val->username; ?></option>
                            <?php } ?>
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
    <div class="box-body">
        <table id="Laporancabang" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>Nomor Permintaan</th>
                    <th>Nama Teknisi</th>
                    <th>Keperluan</th>
                    <th>Keterangan</th>
                    <th>Status Permintaan</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlLapPertek = '<?= site_url("Laporancabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#Laporancabang')) {
            table = $('#Laporancabang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLapPertek + "listPertek",
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

        let id_user = $('#id_user').val();
        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#Laporancabang').DataTable({
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
                url: urlLapPertek + "filterLapPertek",
                data: {
                    id_user: id_user,
                    startdate: startdate,
                    enddate: enddate
                },
                dataType: "JSON"
            },
        });
    })


    // $(function() {
    //     $('#Laporancabang').DataTable({
    //         responsive: true,
    //         processing: true,
    //         // serverSide: true,
    //         order: [],
    //         scrollX: true,
    //         dom: 'Bfrtip',
    //         buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //     });
    // });
</script>