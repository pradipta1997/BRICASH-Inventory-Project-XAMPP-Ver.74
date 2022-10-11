<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL PENGHAPUS BUKUAN BARANG</h3>
    </div>
    <div class="box-body">

        <table class="table table-bordered " id="stockCabang">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Tanggal Permintaan</th>
                    <th>No SN</th>
                    <th>Group Barang</th>
                    <th>Subgroup Barang</th>
                    <th>Merek Barang</th>
                    <th>Tipe Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Kondisi Barang</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2021-04-21</td>
                    <td>SN403123468</td>
                    <td>Sparepart</td>
                    <td>ATM</td>
                    <td>Wincore</td>
                    <td>WINCOR 280 DW</td>
                    <td>AW020</td>
                    <td>CE 280 DW</td>
                    <td><?= rupiah(rand(100000, 1000000)) ?></td>
                    <td>Rusak</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2021-04-21</td>
                    <td>SN847563895</td>
                    <td>Sparepart</td>
                    <td>ATM</td>
                    <td>Wincore</td>
                    <td>WINCOR 280 DW</td>
                    <td>AW020</td>
                    <td>CE 280 DW</td>
                    <td><?= rupiah(rand(100000, 1000000)) ?></td>
                    <td>Rusak</td>
                    <td>-</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="9">Total :</td>
                    <td> Rp.1.638.420,00</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    $(function() {
        $('#stockCabang').dataTable();
    })
</script>