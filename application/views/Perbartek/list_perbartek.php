<div class="box">
    <form action="<?= base_url('Perbartek/filterPerbartek') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PERMINTAAN BARANG TEKNISI</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Nama Teknisi</label>
                        <select name="id_user" id="id_user" class="form-control select2" style="width: 100%;" title="Pilih Nama Teknisi">
                            <option value="All">--Nama Teknisi--</option>
                            <?php foreach ($user as $val) { ?>
                                <option value="<?php echo $val->id_user; ?>"><?php echo $val->username; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label>Status Permintaan</label>
                        <select name="status_permintaan" id="status_permintaan" class="form-control" title="Pilih Status Permintaan">
                            <option value="All">--Status--</option>
                            <option value="0">Belum Terpenuhi</option>
                            <option value="1">Sudah Terpenuhi</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div>
                    <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="Filter">
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PERMINTAAN BARANG TEKNISI</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
            | <a href='<?= base_url('Perbartek/tambahPerbartek') ?>' class='btn btn-info btn-sm'> Add Permintaan <i class="fa fa-plus"></i></a>
        </span>
    </div>
    <div class="box-body">
        <table id="tablePerbartek" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>Nomer Permintaan</th>
                    <th>Nama Teknisi</th>
                    <th>TID Project</th>
                    <th>Keterangan</th>
                    <th>Status Permintaan</th>
                    <th>Status Approvel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPerbartek = '<?= site_url("Perbartek/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePerbartek')) {
            table = $('#tablePerbartek').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPerbartek + "listPerbartek",
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

    function deletePerbartek(id_pertek) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: {
                        id_pertek: id_pertek
                    },
                    url: urlPerbartek + "deletePerbartek",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                table.ajax.reload(null, false);
                            });
                        } else {
                            Swal.fire("Data gagal di delete!", "", "error");
                        }
                    },
                });
            }
        });
    }

    $(function() {
        $('.select2').select2();
    })

    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let id_user = $('#id_user').val();
        let status_permintaan = $('#status_permintaan').val();

        let table = $('#tablePerbartek').DataTable({
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
                url: urlPerbartek + "filterPerbartek",
                data: {
                    id_user: id_user,
                    status_permintaan: status_permintaan
                },
                dataType: "JSON"
            },
        });
    })
</script>