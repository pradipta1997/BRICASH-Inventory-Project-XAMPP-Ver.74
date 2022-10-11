<!-- <div class="row"> -->
    <!-- <div class="col-lg-6"> -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">VIEW PURCHASEORDER</h3>
        </div>
        <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="per_awal">Periode Awal</label>
                            <input type="date" class="form-control" id="startdate">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="per_akhir">Periode Akhir</label>
                            <input type="date" class="form-control" id="enddate">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tempo Pemenuhan</label> <br>
                            <input type="radio" value="lebih" name="tempo Pemenuhan" checked> <span> > Tempo Pemenuhan </span> <br>
                            <input type="radio" value="kurang" name="tempo Pemenuhan"> <span>
                                < Tempo Pemenuhan </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status PO</label>
                            <select class="form-control select2" id="status_po" name="status_po" style="width: 100%;">
                                <option value="All">--All--</option>
                                <option value="0">Open</option>
                                <option value="1">Close</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row text-center">
            <button type="submit" id="filterpurchase" name="filterpurchase" class="btn btn-primary btn-sm">Filter Purhcase Order</button>
        </div>
    </div>
    </div>
    <!-- </div> -->
<!-- </div> -->

<div class="box small">
    <div class="box-header">
        <h3 class="box-title">LIST PURCHASE ORDER</h3>
        <span <?php echo $My_Controller->savePermission; ?>>
            | <a href='<?= base_url('Purchaseorder/tambahPurchaseorder') ?>' class='btn btn-info btn-sm'> Tambah Purchase Order <i class="fa fa-plus"></i></a>
        </span>
    </div>
    <div class="box-body">
        <table id="tablePurchaseorder" class="table table-bordered table-hover  text-center" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomer PO</th>
                    <th>Tanggal PO</th>
                    <th>Project</th>
                    <th>Ship To Unit Kerja</th>
                    <th>To Vendor</th>
                    <th>Jenis Pembayaran</th>
                    <th>Tempo Pemenuhan</th>
                    <th>Subtotal</th>
                    <th>Subtotal PPN</th>
                    <th>Grand Total</th>
                    <th>Status PO</th>
                    <th>Status Invoice</th>
                    <th>Approvel</th>
                    <th>SLA</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<script>
    const urlPurchaseorder = '<?= site_url("Purchaseorder/") ?>';
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
                    url: urlPurchaseorder + "listPurchaseorder",
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

    $('#filterpurchase').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();
        let status_po = $('#status_po').val();
        // let enddate = $('#enddate').val();

        let table = $('#tablePurchaseorder').DataTable({
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
                url: urlPurchaseorder + "filter",
                data: {
                    startdate: startdate,
                    enddate: enddate,
                    status_po: status_po,
                },
                dataType: "JSON"
            },
        });
    })

    function deletePurchaseorder(id_po) {
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
                        id_po: id_po
                    },
                    url: urlPurchaseorder + "deletePurchaseorder",
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