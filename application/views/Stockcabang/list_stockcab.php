<div class="box">
    <form action="<?= base_url('Stokcabang/filterStok') ?>" method="post">
        <div class="box-header">
            <h3 class="box-title">FILTER STOCK CABANG</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group" style="display: flex;">
                        <label for="stockcab">Filter Nama Barang</label>
                        <select name="no_urut" id="no_urut" class="form-control select2" style="width: 100%;" title="Pilih Nama Teknisi">
                            <option value="All">--Nama Barang--</option>
                            <?php foreach ($barang as $val) { ?>
                                <option value="<?php echo $val->no_urut; ?>"><?php echo $val->nama_barang; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row text-center" style="margin-bottom: 20px;">
                    <div class="col-lg-1">
                        <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="Proceed">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">LIST STOCK CABANG</h3>
    </div>
    <div class="box-body">

        <table class="table table-bordered table-hover" id="stockCabang" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Kode Uker</th>
                    <th>Nama Uker</th>
                    <th>Tipe Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Min Stock</th>
                    <th>Max Stock</th>
                    <th>Qty</th>
                    <th>Total Harga Barang</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody></tbody> <!-- isi dari tbody diambil dari js yg koneksi ke file Controller -->
            <?php 
                $idi_uker = $this->session->userdata('user_login')['id_uker'];
                $total = $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) AS total FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND id_uker = $idi_uker;");
            ?>
            <tfoot>
                <tr style="margin-right:10px;">
                    <td colspan="11">Total Harga : <?= rupiah($total[0]->total); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlStokCabang = '<?= site_url("Stokcabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#stockCabang')) {
            table = $('#stockCabang').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlStokCabang + "listStokCabang",
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

    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let no_urut = $('#no_urut').val();

        let table = $('#stockCabang').DataTable({
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
                url: urlStokCabang + "filterCabang",
                data: {
                    no_urut: no_urut
                },
                dataType: "JSON"
            },
        });
    })
</script>