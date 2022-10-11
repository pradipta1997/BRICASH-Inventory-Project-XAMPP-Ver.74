<div class="box">
    <div class="box-header">
        <h3 class="box-title">DETAIL LAPORAN PEMBUKUAN PEMBEBANAN SPAREPART</h3>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="lappempart" class="table table-bordered" width="100%">
                <thead class="bg-primary">
                    <tr>
                        <th>Item</th>
                        <th>No SN</th>
                        <th>Harga Barang</th>
                        <th>Kondisi Barang</th>
                        <th>Penuhi/Tidak Dipenuhi</th>
                    </tr>
                </thead>
                <tbody id="rows-list">
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN2075 </td>
                        <td> 245241 </td>
                        <td> BAIK </td>
                        <td> Tidak Dipenuhi </td>
                    </tr>
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN2957 </td>
                        <td> 174440 </td>
                        <td> BAIK </td>
                        <td> Dipenuhi </td>
                    </tr>
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN4287 </td>
                        <td> 182477 </td>
                        <td> BAIK </td>
                        <td> Dipenuhi </td>
                    </tr>
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN1190 </td>
                        <td> 241131 </td>
                        <td> BAIK </td>
                        <td> Dipenuhi </td>
                    </tr>
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN1570 </td>
                        <td> 184010 </td>
                        <td> BAIK </td>
                        <td> Dipenuhi </td>
                    </tr>
                    <tr>
                        <td> EXIT SHUTTER</td>
                        <td> SN3536 </td>
                        <td> 194974 </td>
                        <td> BAIK </td>
                        <td> Tidak Dipenuhi </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#lappempart').dataTable();
    })
</script>