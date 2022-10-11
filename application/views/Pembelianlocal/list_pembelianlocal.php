    <div class="box">
        <div class="box-header">
            <h3 class="box-title">LIST PEMBELIAN LOCAL</h3>
            <span <?php echo $My_Controller->savePermission; ?>>
                | <a href='<?= base_url('Pembelianlocal/tambahPembelianlocal') ?>' class='btn btn-info btn-sm'>
                    Add New <i class="fa fa-plus"></i>
                </a>
            </span>
        </div>
        <div class="box-body">
            <table id="tablePembelianlocal" class="table table-bordered table-hover" style="width: 100%;">
                <thead class="bg-primary">
                    <tr>
                        <th>No</th>
                        <th>Nomor Pembelian</th>
                        <th>Tanggal Pembelian</th>
                        <th>Unit Kerja</th>
                        <th>Nama Vendor</th>
                        <th>Jenis Pembayaran</th>
                        <th>Tempo Pembayaran</th>
                        <th>Subtotal</th>
                        <th>Subtotal PPN</th>
                        <th>Grand Total</th>
                        <th>Approvel</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>

                <tfoot>
                    <tr>
                        <td class="text-center" style="float: center;" colspan="7">Grand Total:</td>
                        <td><?= rupiah($subTotal[0]->GrandTotalSub) ?></td>
                        <td><?= rupiah($nilaiPajak[0]->GrandTotalNilaiPajak) ?></td>
                        <td><?= rupiah($total[0]->GrandTotal) ?></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <!-- <tr>
                    <td colspan="7">Total : </td>
                    <td>Rp.405.812</td>
                    <td>Rp.3.347</td>
                    <td>Rp.402.072</td>
                </tr> -->
                </tfoot>

            </table>
        </div>
    </div>

    <script>
        const urlPembelianLocal = '<?= site_url("Pembelianlocal/") ?>';
        let table;

        $(function() {
            if (!$.fn.DataTable.isDataTable('#tablePembelianlocal')) {
                table = $('#tablePembelianlocal').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    order: [],
                    scrollX: true,
                    ajax: {
                        url: urlPembelianLocal + "listPembelianLocal",
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

        function deletePembelianLocal(id_pembelian) {
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
                            id_pembelian: id_pembelian
                        },
                        url: urlPembelianLocal + "deletePembelianLocal",
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