<!-- <div class="row"> -->
    <!-- <div class="col-lg-6"> -->
    
    <!-- </div> -->
<!-- </div> -->

<div class="box small">
    <div class="box-header">
        <h3 class="box-title">LIST PERMINTAAN PBJ</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
            | <a href='<?= base_url('Permintaanpbj/tambahPBJ') ?>' class='btn btn-info btn-sm'>Tambah Permintaan PBJ<i class="fa fa-plus"></i></a>
        </span>
    </div>
    <div class="box-body">
        <table id="tablePurchaseorder" class="table table-bordered table-hover  text-center" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomor PBJ</th>
                    <th>Tanggal Permintaan</th>
                    <th>Keterangan</th>
                    <th>Approval</th>
                    <th>Status PBJ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPermintaanpbj = '<?= site_url("Permintaanpbj/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePurchaseorder')) {
            table = $('#tablePurchaseorder').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPermintaanpbj + "listPurchaseorder",
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

    function deletepbj(id) {
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
                        id: id
                    },
                    url: urlPermintaanpbj + "deletepbj",
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
</script>