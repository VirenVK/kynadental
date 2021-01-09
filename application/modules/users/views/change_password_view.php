<div class="app-content container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="font-weight-bold text-primary m-0">Change Password</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body card-pwd">
                    <?php $this->load->view('theme/message_view');?>
                    <form method="post" action="" id="forgotPass" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mx-auto">
                                <div class="form-group">
                                    <label>Old Password</label> <star>*</star>
                                    <input required type="password" name="oldpassword" value="" class="form-control border-input" placeholder="Old Password">
                                    <p>  </p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label> <star>*</star>
                                    <input required type="password" id="password" name="password" class="form-control border-input" value="" placeholder="New Password">
                                    <p>  </p>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label> <star>*</star>
                                    <input required type="password" name="cnfpassword" class="form-control border-input" value="" placeholder="Confirm Password">
                                    <p>  </p>
                                </div>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                                <div class="col-12 mx-auto px-0">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block-xs-only">Change Password</button>
                                </div>
                            </div>							
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .card-pwd p{
        font-size: 12px;
        color: #dd4b39;
    }
</style>
<script>
    $(function () {
        $('#forgotPass').validate({
            rules : {
                password : {
                    minlength : 8
                },
                cnfpassword : {
                    minlength : 8,
                    equalTo : "#password",
                }
            }
        });

        $.extend($.validator.messages, {
            equalTo: "Please enter the same password again."
        });
    })
</script>
