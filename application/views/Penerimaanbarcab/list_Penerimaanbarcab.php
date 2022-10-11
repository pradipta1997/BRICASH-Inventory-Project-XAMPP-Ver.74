<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST PENERIMAAN BARANG DARI CABANG</h3>
    </div>
    <div class="box-body">
        <table id="tablePenerimaanbarcab" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Tanggal Dikirim</th>
                    <th>Uker Pengirim</th>
                    <th>Status</th>
                    <th>Ekspedisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <td> 1 </td>
                    <td> SRT-0001 </td>
                    <td> 2021-Maret-10 </td>
                    <td> <?= date("Y-m-d") ?> </td>
                    <td> Cempaka Putih </td>
                    <td> <?= labelWarna("success", "Sudah Diterima") ?> </td>
                    <td> On Hand </td>
                    <td> - </td> -->
                <!-- <td><a href='<?= base_url('Penerimaanbarcab/detailPenerimaanbarcab') ?>' class="btn btn-primary btn-sm">
                            <i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td> -->
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlPenerimaanbarcab = '<?= site_url("Penerimaanbarcab/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#tablePenerimaanbarcab')) {
            table = $('#tablePenerimaanbarcab').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlPenerimaanbarcab + "listPenerimaanbarcab",
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
</script>