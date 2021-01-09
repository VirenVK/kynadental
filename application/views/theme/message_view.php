<?php
if(strlen($this->session->flashdata('message')) > 0) {
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class=" text-center alert <?php echo $this->session->flashdata('color'); ?>">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>
    <?php
}
?>
