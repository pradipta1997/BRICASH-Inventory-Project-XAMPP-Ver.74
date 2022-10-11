    <h3 class="box-title">DETAIL PENERIMAAN BARANG VENDOR | <?php echo $nopo[0]->no_po; ?></h3>
        <span <?php echo $My_Controller->savePermission; ?>>
        <?php 
            $Poqty = $this->General->fetch_CoustomQuery("SELECT qty FROM v_podet WHERE id_po = ".$id_po."");
            // $qty = $this->General->fetch_CoustomQuery("SELECT  qty FROM v_dodet WHERE id_po = ".$id_po."");
            $retur = $this->General->fetch_CoustomQuery("SELECT  COUNT(*) FROM v_cek_tomboldo WHERE id_po = '".$id_po."' AND flag_qc = 2");
            // lastq();
            // cetak_die($Poqty[0]->qty);
            // cetak_die($qty[0]->qty);
            if($Poqty == $retur){ ?>
                | <a class='btn btn-success btn-sm' disabled readonly> PO Sudah terpenuhi <i class="fa fa-plus"></i></a>
            <?php }else{ ?>
                | <a href='<?= base_url('Penerimaanbarven/tambahDO/' . $id_po) ?>' data-toggle='modal' class='btn btn-info btn-sm'> Add New <i class="fa fa-plus"></i></a>
            <?php }
        
        ?>