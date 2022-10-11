<div class="box">
    <form action="" method="post">
        <div class="box-header">
            <h3 class="box-title">LAPORAN PENGEMBALIAN LOCAL</h3>
        </div>
        <div class="box-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-9 col-form-label ">Periode Awal</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" style="display: flex;">
                                <label class="col-sm-5 col-form-label ">Periode Akhir</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" style="margin-bottom: 20px;">
                <div>
                    <input type="submit" id="filterPertek" name="filterPertek" class="btn btn-primary btn-sm" value="Proceed">
                </div>
            </div>

        </div>

    </form>
</div>

<div class="box">
    <div class="box-body">
        <table id="laporanPengLoc" class="table table-bordered table-hover" style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>Nomor Pembelian</th>
                    <th>Tanggal Pembelian</th>
                    <th>Unit Kerja</th>
                    <th>Nama Vendor</th>
                    <th>Jenis Pembayaran</th>
                    <th>Tempo Pembayaran</th>
                    <th>SubTotal</th>
                    <th>Nilai Pajak</th>
                    <th>Total</th>
                    <th>Approvel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>1</td>
                    <td>PB0001</td>
                    <td>2021-03-31</td>
                    <td>Cabang Depok</td>
                    <td>89 ELEKTRONIK</td>
                    <td>Full</td>
                    <td>27 Hari</td>
                    <td>Rp.192.516</td>
                    <td>Rp.2.193</td>
                    <td>Rp.190.323</td>
                    <td><?= labelWarna("danger", "Belum di Approv") ?></td>
                    <td>
                        <a href="<?= base_url('Laporancabang/Pengloc_det') ?>" class="btn btn-primary btn-sm" title="View Detail">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>PB0002</td>
                    <td>2021-03-31</td>
                    <td>Cabang Bekasi</td>
                    <td>ACE HARDWARE</td>
                    <td>Full</td>
                    <td>13 Hari</td>
                    <td>Rp.213.296</td>
                    <td>Rp.1.154</td>
                    <td>Rp.211.749</td>
                    <td><?= labelWarna("success", "Sudah di Approv") ?></td>
                    <td>
                        <a href="<?= base_url('Laporancabang/Pengloc_det') ?>" class="btn btn-primary btn-sm" title="View Detail">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr> -->
            </tbody>
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
                    <td colspan="7">Total: </td>
                    <td>Rp.405.812</td>
                    <td>Rp.3.347</td>
                    <td>Rp.402.072</td>
                </tr> -->
            </tfoot>
        </table>
    </div>
</div>

<script>
    const urlLapPengloc = '<?= site_url("Laporancabang/") ?>';
    let table;

    $(function() {
        if (!$.fn.DataTable.isDataTable('#laporanPengLoc')) {
            table = $('#laporanPengLoc').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                order: [],
                scrollX: true,
                ajax: {
                    url: urlLapPengloc + "listPengloc",
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

    $('#filterPertek').on('click', function(e) {
        e.preventDefault();

        let startdate = $('#startdate').val();
        let enddate = $('#enddate').val();

        let table = $('#laporanPengLoc').DataTable({
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
                url: urlLapPengloc + "filterPengloc",
                data: {
                    startdate: startdate,
                    enddate: enddate
                },
                dataType: "JSON"
            },
        });
    })

</script>