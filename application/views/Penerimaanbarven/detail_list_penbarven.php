<div class="box">
    <div class="box-header">
        <?php $nopo = $this->General->fetch_CoustomQuery("SELECT * FROM v_pohead WHERE id_po = ".$id_po.""); ?>
        <h3 class="box-title">DETAIL PENERIMAAN BARANG VENDOR | <?php echo $nopo[0]->no_po; ?></h3>
        <span <?php echo $My_Controller->savePermission; ?>>
        <?php 
            $Poqty = $this->General->fetch_CoustomQuery("SELECT COUNT(qty) as Poqty FROM v_podet WHERE id_po = ".$id_po."");
            $qty = $this->General->fetch_CoustomQuery("SELECT COUNT(qty) as qty FROM v_dodet WHERE id_po = ".$id_po."");
            if($Poqty[0]->Poqty==$qty[0]->qty){ ?>
                | <a class='btn btn-success btn-sm' disabled readonly> PO Sudah terpenuhi <i class="fa fa-plus"></i></a>
            <?php }else{ ?>
                | <a href='<?= base_url('Penerimaanbarven/tambahDO/' . $id_po) ?>' data-toggle='modal' class='btn btn-info btn-sm'> Add New <i class="fa fa-plus"></i></a>
            <?php }
        
        ?>
            
        </span>
    </div>
    <div class="box-body">
        <table id="tableDetailPenerimaanbarven" class="table table-bordered " style="width: 100%;">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
                    <th>No DO</th>
                    <th>Tanggal DO</th>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Terima</th>
                    <th>Nama Pengirim</th>
                    <th>Telp Pengirim</th>
                    <th>Tanggal Close DO</th>
                    <th>Status DO</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($detailDo as $value) {
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value->no_do ?></td>
                        <td><?= $value->tgl_do ?></td>
                        <td><?= $value->tgl_kirim ?></td>
                        <td><?= $value->tgl_terima ?></td>
                        <td><?= $value->nama_pengirim ?></td>
                        <td><?= $value->telp_pengirim ?></td>
                        <td><?= $value->do_status_date ?></td>
                        <td><?= $value->status_do == 1 ? labelWarna('danger', 'Close') : labelWarna('success', 'Open') ?></td>
                        <td><?= $value->keterangan ?></td>
                        <td>
                            <a href="<?= base_url('Penerimaanbarven/editDO/' . $value->id_do) ?>" <?= getEditperm() ?> class="btn btn-warning btn-sm">
                                <i class='fa fa-pencil-square-o'></i>
                            </a>
                            <button type='button' class='btn btn-danger btn-sm' <?= getDeleteperm() ?> onclick='deleteDO(<?= $value->id_do ?>)'>
                                <i class='fa fa-trash' aria-hidden='true'></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const urlPenerimaanbarven = '<?= site_url("Penerimaanbarven/") ?>';

    $(function() {
        $('#tableDetailPenerimaanbarven').DataTable();
    })

    function deleteDO(id_do) {
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
                        id_do: id_do
                    },
                    url: urlPenerimaanbarven + "deleteDO",
                    dataType: 'JSON',
                    success: function(response) {
                        if (response) {
                            Swal.fire(response, "", "success").then((result) => {
                                location.reload();
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