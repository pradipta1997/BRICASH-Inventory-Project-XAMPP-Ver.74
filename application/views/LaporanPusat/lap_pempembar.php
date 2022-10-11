<div class="box">
    <div class="box-header">
        <h3 class="box-title">LAPORAN PERMOHONAN PEMBAYARAN PEMBELIAN BARANG</h3>
    </div>
    <div class="box-body">
        <table id="tablePurchaseorder" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No. Invoice</th>
                    <th>No. Permohonan Pembayaran</th>
                    <th>No. PO</th>
                    <th>Tanggal PO</th>
                    <th>Unit Kerja</th>
                    <th>Nama Vendor</th>
                    <th>Jenis Pembayaran</th>
                    <th>Tempo Pembayaran</th>
                    <th>Subtotal</th>
                    <th>Nilai Pajak</th>
                    <th>Total</th>
                    <th>Status PO</th>
                    <th>Approvel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>INV-001</td>
                    <td>B0001/CHM/PGD/PSD/IV/2021</td>
                    <td>PO01</td>
                    <td><?= date('Y-m-d') ?></td>
                    <td>Pengadaan</td>
                    <td>ACE HARDWARE</td>
                    <td>Full</td>
                    <td><?= rand(1, 31) ?> Hari</td>
                    <td><?php
                        $subtotal = rand(150000, 250000);
                        echo rupiah($subtotal);
                        ?></td>
                    <td><?php
                        $pajak = rand(1500, 2500);
                        echo rupiah($pajak);
                        ?></td>
                    <td><?= rupiah(intval($subtotal - $pajak)) ?></td>
                    <td><?= labelWarna("danger", "Close") ?></td>
                    <td><?= labelWarna("success", "Sudah di Approv") ?></td>
                </tr> -->
            </tbody>
            <tfoot>
                <!-- <td colspan="9">Total : </td>
                <td><?= rupiah($subTotal[0]->SUBTotal) ?></td>
                <td><?= rupiah($nilaiPajak[0]->Pajak) ?></td>
                <td><?= rupiah($grandTotal[0]->GRANDTotal) ?></td>
                <td></td>
                <td></td> -->
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlPermohonanpem = '<?= site_url("Laporanpusat/") ?>';
    // const urlCustomfunction = '<?= site_url("Customfunction/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePurchaseorder')) {
            table = $('#tablePurchaseorder').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                dom: 'Bfrtip',
                buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: urlPermohonanpem + "listLap_pempembar",
                    type: "POST"
                },
                columnDefs: [{
                    targets: [0, -1],
                    orderable: false,
                }, ],
            });
        }
    })
</script>