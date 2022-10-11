<!-- <div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER PENGIRIMAN BARANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-3">
                    <form action="#" method="post">
                        <div class="form-group" style="display: flex;">
                            <label class="col-sm-6 col-form-label" for="stock">Filter Status</label>

                            <select name="" id="" class="form-control">
                                <option value="All">--Nama Barang--</option>
                                <option value="">AD BOARD 280 HG</option>
                                <option value="">CE 280 DW</option>
                            </select>
                        </div>
                    </form>

                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div> -->


<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENGIRIMAN BARANG
            <span <?php echo $My_Controller->savePermission; ?>>
                | <a href='<?= base_url('Pengbarkp/tambahPengbar') ?>' class='btn btn-info'> Tambah <i class="fa fa-plus"></i></a>
            </span>
        </h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover" id="tablePengbarkp" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Pengiriman</th>
                    <th>Tanggal Pengiriman (SP)</th>
                    <th>Tujuan (Uker)</th>
                    <th>No. Resi</th>
                    <th>Jumlah Koli</th>
                    <th>Berat Barang</th>
                    <th>Ekspedisi</th>
                    <th>Layanan</th>
                    <th>Nama Pengirim</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody></tbody>

            <tfoot>
                <td class="text-center" style="float: center;" colspan="10">Grand Total: </td>
                <td><?= rupiah($totalHarga[0]->GrandTotalHarga) ?></td>
                <td></td>
            </tfoot>
        </table>
    </div>
</div>


<script>
    const urlPengbarkp = '<?= site_url("Pengbarkp/") ?>';
    let table;

    $(function() {
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

    function deletePengbarkp(id_pengiriman) {
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
                    url: urlPengbarkp + "deletePengbarkp",
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