<!-- Page Heading -->
<div class="card shadow">
    <div class="card-body">
        <?php    
        if(!sizeof($updateSubMenu) == 0):?>
            <div class="row">
                <div class="col-md-3">
                    <label class="font-weight-bold">Menu Name</label>
                </div>
                <div class="col-md-3">
                    <label class="font-weight-bold">Display Order</label>
                </div>
            </div>
            <form method="POST" action="<?php echo WEB_URL.'menu/updateMenusAjax';?>">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                <?php
                    foreach ($updateSubMenu as $row) {
                        echo '<div class= "row">';
                            echo '<div class= "col-md-3 form-group">';
                            echo '<input type="text" name="menuName[]" class="form-control" value="' . $row['name'] . '"/>';
                            echo '<input type="hidden" name="menuid[]" value="' . $row['id_menu'] . '"/>';
                            echo '</div>';

                            echo '<div class= "col-md-3 form-group">';
                            echo '<input type="text" name="orderNumber[]" class="form-control" value="' . $row['display_orders'] . '"/>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
                <input type="submit" name="submit" value="submit" class="btn btn-primary" />
                <a href="allSubMenu" class="btn btn-danger">Cancel</a>
            </form>
                <?php else:?>
                    No Sub Menu Found
                <?php endif;?>
    </div>
</div>
