<div class="row">
    <div class="col-sm-12">
        <div style="padding: 10px;" class="portlet box red">
            <div class="portlet-title">
                <h4>PERMISSIONS LIST</h4>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <form action="<?= base_url('Permission/createPermission/' . $this->uri->segment(3)) ?>" class="form-horizontal group-border hover-stripped" method="post">
                        <table class="display table table-bordered  text-center" id="dynamic-table">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="hidden-phone">Menu Name</th>
                                    <th>View</th>
                                    <th>Insert</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <th class="hidden-phone">Checklist All</th>
                                    <th><input type="checkbox" id="checkAllmenu"></th>
                                    <th><input type="checkbox" id="checkAllinsert"></th>
                                    <th><input type="checkbox" id="checkAllupdate"></th>
                                    <th><input type="checkbox" id="checkAlldelete"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($parentnav as $parentnav_list_data) :
                                    $permission_count = $Generals->checkpermission($parentnav_list_data->id_menu, $this->uri->segment(3));
                                    $permission_sql = $Generals->fetchRecordpermission($parentnav_list_data->id_menu, $this->uri->segment(3));

                                    if ($permission_count > 0) {
                                        foreach ($permission_sql as $permission_sql_data) {
                                            $view = $permission_sql_data->per_select;
                                        }
                                    } else {
                                        $view = 0;
                                    }
                                ?>
                                    <tr>
                                        <td style="background-color: #67809f; border-color: #67809f; color:white;  opacity: 0.8;filter: alpha(opacity=80); text-align:left;">
                                            <span style='font-size:16px; '><?= $parentnav_list_data->nama_menu ?></span>
                                        </td>
                                        <?php if ($parentnav_list_data->parent_id != 0) {
                                            $menuid = $parentnav_list_data->id_menu;
                                        } else { ?>
                                            <td>
                                                <input type="checkbox" class="daftarMenu" <?= $view == 1 ? "checked" : '' ?> class="make-switch" data-on-color="info" data-off-color="danger" data-size="medium" name="permission[view][<?php echo $parentnav_list_data->id_menu; ?>]">
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php
                                    $secondchild_count = $Generals->checkchildMenuCount($parentnav_list_data->id_menu);

                                    if ($secondchild_count > 0) {
                                        $secondChildrow_data = $Generals->fetchchildMenu($parentnav_list_data->id_menu);

                                        foreach ($secondChildrow_data as $secondChildrow_data) {
                                            $secondpermission_count_child = $Generals->checkpermission($secondChildrow_data->id_menu, $this->uri->segment(3));
                                            $secondpermission_sql_child = $Generals->fetchRecordpermission($secondChildrow_data->id_menu, $this->uri->segment(3));

                                            if ($secondpermission_count_child > 0) {
                                                foreach ($secondpermission_sql_child as $secondpermission_sql_childdata) {
                                                    $view = $secondpermission_sql_childdata->per_select;
                                                    $insert = $secondpermission_sql_childdata->per_insert;
                                                    $update = $secondpermission_sql_childdata->per_update;
                                                    $delete = $secondpermission_sql_childdata->per_delete;
                                                }
                                            } else {
                                                $view = 0;
                                                $insert = 0;
                                                $update = 0;
                                                $delete = 0;
                                            }
                                    ?>
                                            <tr>
                                                <td style="background-color: #2f353b; border-color: #2f353b; color:white; text-align:left;">
                                                    <?php echo " - - " . $secondChildrow_data->nama_menu; ?>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="daftarMenu" <?= $view == 1 ? "checked" : '' ?> class="make-switch" data-on-color="info" data-off-color="danger" data-size="medium" name="permission[view][<?php echo $secondChildrow_data->id_menu; ?>]">
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="perInsert" <?= $insert == 1 ? "checked" : '' ?> class="make-switch" data-on-color="info" data-off-color="danger" data-size="medium" name="permission[insert][<?php echo $secondChildrow_data->id_menu; ?>]">
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="perUpdate" <?= $update == 1 ? "checked" : '' ?> class="make-switch" data-on-color="info" data-off-color="danger" data-size="medium" name="permission[update][<?php echo $secondChildrow_data->id_menu; ?>]">
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="perDelete" <?= $delete == 1 ? "checked" : '' ?> class="make-switch" data-on-color="info" data-off-color="danger" data-size="medium" name="permission[delete][<?php echo $secondChildrow_data->id_menu; ?>]">
                                                </td>
                                            </tr>
                                            <?php
                                            $thirdchild_count = $Generals->checkchildMenuCount($secondChildrow_data->id_menu);

                                            if ($thirdchild_count > 0) {
                                                $thirdChildrow_data = $Generals->fetchchildMenu($secondChildrow_data->id_menu);

                                                foreach ($thirdChildrow_data as $thirdChildrow_data) {
                                                    $thirdpermission_count_child = $Generals->checkpermission($thirdChildrow_data->id_menu, $this->uri->segment(3));
                                                    $thirdpermission_sql_child = $Generals->fetchRecordpermission($thirdChildrow_data->id_menu, $this->uri->segment(3));

                                                    if ($thirdpermission_count_child > 0) {
                                                        foreach ($thirdpermission_sql_child as $thirdpermission_sql_childdata) {
                                                            $view = $thirdpermission_sql_childdata->per_select;
                                                            $insert = $thirdpermission_sql_childdata->per_insert;
                                                            $update = $thirdpermission_sql_childdata->per_update;
                                                            $delete = $thirdpermission_sql_childdata->per_delete;
                                                        }
                                                    } else {
                                                        $view = 0;
                                                        $insert = 0;
                                                        $update = 0;
                                                        $delete = 0;
                                                    }

                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo " - - - " . $thirdChildrow_data->nama_menu; ?>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" <?= $view == 1 ? "checked" : '' ?> name="permission[view][<?php echo $thirdChildrow_data->id_menu; ?>]">
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" <?= $insert == 1 ? "checked" : '' ?> name="permission[insert][<?php echo $thirdChildrow_data->id_menu; ?>]">
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" <?= $update == 1 ? "checked" : '' ?> name="permission[update][<?php echo $thirdChildrow_data->id_menu; ?>]">
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" <?= $delete == 1 ? "checked" : '' ?> name="permission[delete][<?php echo $thirdChildrow_data->id_menu; ?>]">
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <input type="submit" class="btn btn-primary btn-sm" value="Save">
                        <a href="<?= base_url('Subgroupuser') ?>" class="btn btn-success btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page end-->

<script>
    $('#checkAllmenu').click(function() {
        if ($(this).is(":checked")) {
            $('.daftarMenu').each(function(index, element) {
                $(this).prop('checked', true);
            });
        } else {
            $('.daftarMenu').each(function(index, element) {
                $(this).prop('checked', false);
            });
        }
    });

    $('#checkAllinsert').click(function() {
        if ($(this).is(":checked")) {
            $('.perInsert').each(function(index, element) {
                $(this).prop('checked', true);
            });
        } else {
            $('.perInsert').each(function(index, element) {
                $(this).prop('checked', false);
            });
        }
    });

    $('#checkAllupdate').click(function() {
        if ($(this).is(":checked")) {
            $('.perUpdate').each(function(index, element) {
                $(this).prop('checked', true);
            });
        } else {
            $('.perUpdate').each(function(index, element) {
                $(this).prop('checked', false);
            });
        }
    });

    $('#checkAlldelete').click(function() {
        if ($(this).is(":checked")) {
            $('.perDelete').each(function(index, element) {
                $(this).prop('checked', true);
            });
        } else {
            $('.perDelete').each(function(index, element) {
                $(this).prop('checked', false);
            });
        }
    });
</script>