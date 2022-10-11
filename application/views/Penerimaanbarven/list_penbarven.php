<div class="box small">
    <div class="box-header">
        <h3 class="box-title">LIST PENERIMAAN BARANG VENDOR</h3>
    </div>
    <div class="box-body">
        <table id="tablePenerimaanbarven" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomer PO</th>
                    <th>Tanggal PO</th>
                    <th>Project</th>
                    <th>Ship To Unit Kerja</th>
                    <th>To Vendor</th>
                    <th>Tempo Terima Barang</th>
                    <th>SLA Pemenuhan Barang</th>
                    <th>Status PO</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!--Modal for DETAIL -->
<div class="modal fade" id="detailPO" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Detail PO | <b id="no_po"></b></h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered  table-nowrap" width="100%">
                        <thead class="bg-primary">
                            <tr>
                                <th>No</th>
                                <th>Tipe Barang</th>
                                <th>Nama Barang</th>
                                <th>Currency</th>
                                <th>Quantity</th>
                                <th>Harga Barang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="dataPo"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal for DETAIL ends-->

<script>
    const urlPenerimaanbarven = '<?= site_url("Penerimaanbarven/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenerimaanbarven')) {
            table = $('#tablePenerimaanbarven').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbarven + "listPenerimaanbarven",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    });

    function activePermintaanpengbar(id_pbarang) {
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
                        id_pbarang: id_pbarang
                    },
                    url: urlPermintaanpengbar + "activePermintaanpengbar",
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

    function VPurchaseorder(id_po) {
        $.ajax({
            type: "POST",
            url: urlPenerimaanbarven + "detailPO",
            data: {
                id_po: id_po
            },
            dataType: "JSON",
            success: function(response) {
                $('#no_po').text(response[0].no_po);
                let dataPo = "";
                let no = 1;

                for (let i = 0; i < response.length; i++) {
                    const element = response[i];

                    dataPo += `
                        <tr>
                            <th>${no++}</th>
                            <th>${element.tipe_barang}</th>
                            <th>${element.kode_barang} | ${element.nama_barang}</th>
                            <th>${element.kode_currency} | ${element.nama_currency}</th>
                            <th>${element.qty}</th>
                            <th>${element.harga_satuan}</th>
                            <th>${element.keterangan}</th>
                        </tr>
                    `;
                }

                $('#dataPo').html(dataPo);
                $('#detailPO').modal('show');
            }
        });
    }
</script>