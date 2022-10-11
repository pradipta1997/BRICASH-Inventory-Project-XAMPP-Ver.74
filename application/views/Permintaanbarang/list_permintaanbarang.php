<div class="box">
    <form action="<?= base_url('Permintaanbarang/filter') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PERMINTAAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label for="stock">Status Permintaan</label>
                        <select name="status_permintaan" id="status_permintaan" class="form-control">
                            <option value="">All Status</option>
                            <option value="1">Sudah dipenuhi</option>
                            <option value="0">Belum dipenuhi</option>
                        </select>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <label for="stock">Filter Status</label>
                        <select name="status_permintaan" id="status_permintaan" class="form-control">
                            <option value="">Pinca Approve</option>
                            <option value="1">Sudah diApprove</option>
                            <option value="0">Belum diApprove</option>
                        </select>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="Proceed">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PERMINTAAN BARANG</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
            | <a href='<?= base_url('Permintaanbarang/tambahPermintaanbarang') ?>' class='btn btn-info btn-sm'>
                Add New <i class="fa fa-plus"></i>
            </a>
        </span>
    </div>
    <div class="box-body">

        <table id="tablePermintaanBarang" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No Permintaan</th>
                    <th>Tanggal Permintaan</th>
                    <th>Alasan Permintaan</th>
                    <th>Catatan Permintaan</th>
                    <th>Tempo Barang</th>
                    <th>Status Permintaan</th>
                    <th>Approvel</th>
                    <th>SLA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script>
    const urlPermintaanbarang = '<?= site_url("Permintaanbarang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePermintaanBarang')) {
            table = $('#tablePermintaanBarang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPermintaanbarang + "listPermintaanbarang",
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

    function deletePermintaanbarang(id_permintaan) {
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
                        id_permintaan: id_permintaan
                    },
                    url: urlPermintaanbarang + "deletePermintaanbarang",
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

    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let status_permintaan = $('#status_permintaan').val();

        let table = $('#tablePermintaanBarang').DataTable({
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
                url: urlPermintaanbarang + "filter",
                data: {
                    status_permintaan: status_permintaan
                },
                dataType: "JSON"
            },
        });
    })
</script>