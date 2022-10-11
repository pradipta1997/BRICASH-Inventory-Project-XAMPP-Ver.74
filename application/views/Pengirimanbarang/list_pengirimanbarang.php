<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENGIRIMAN BARANG
            <span <?php echo $My_Controller->savePermission; ?>>
                | <a href='<?= base_url('Pengirimanbarang/tambahPengirimanbarang') ?>' class='btn btn-info'> Tambah <i class="fa fa-plus"></i></a>
            </span>
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="tablePengbarkp" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Resi</th>
                    <th>Uker Pengirim</th>
                    <th>Uker Tujuan</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Estimasi</th>
                    <th>Nama Pengirim</th>
                    <th>Total Harga</th>
                    <th>Berat Barang</th>
                    <th>Tipe Pengiriman</th>
                    <th>Status Pengiriman</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody></tbody>

            <tfoot>
                <th class="text-center" style="float: left;" colspan="9">Grand Total: </th>
                <th class="text-center" style="float: left;"><?= rupiah($totalHarga[0]->GrandTotalHarga) ?></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlPengbarkp = '<?= site_url("Pengirimanbarang/") ?>';
    let table;

    $(document).ready(function(){
        if (!$.fn.DataTable.isDataTable('#tablePengbarkp')) {
            table = $('#tablePengbarkp').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPengbarkp + "listPengirimanBarang",
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

    function deletePengiriman(id_pengiriman) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "d33",
                confirmButtonText: "Yes!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: {
                            id_pengiriman: id_pengiriman
                        },
                        url: urlPengbarkp + "delPengiriman",
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
                    })
                }
            });
        }
</script>



