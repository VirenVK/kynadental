<div class="app-content container-fluid mb-4">
    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('theme/message_view'); ?>
            <div class="card shadow  valid-form">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
							<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
						</div>
                    </div>
                </div>
            <div class="tab-content">
                <div id="about" class="tab-pane active">
                    <form id="form_submit" method="post" action="<?php echo base_url('users/profile')?>" enctype="multipart/form-data" autocomplete="off">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Full Name </label>
                                                <star>*</star>
                                                <input type="text" id="full_name" name="full_name"
                                                       class="form-control"
                                                       value="<?php echo $user['first_name'].' '.$user['last_name'];?>"
                                                       placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Phone Number </label>
                                                <star>*</star>
                                                <input type="text" id="phone" name="phone" required value="<?php echo $user['phone'];?>" data-msg="Please Enter Valid Phone Numner" class="form-control phone-input" placeholder="Phone Number" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label">Email </label>
                                                <star>*</star>
                                                <input class="form-control"
                                                       autocomplete="off" type="text" id="email" name="email"
                                                       value="<?php echo $user['email'];?>"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nationality" class="control-label">Nationality </label>
                                                <star>*</star>
												<input class="form-control"
													   autocomplete="off" type="text" id="nationality" name="nationality"
													   value="<?php echo $user['nationality'];?>"
													   placeholder="Nationality">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group skin skin-square">
												<div for="gender" class="col-form-label">Gender<star> *</star></div>
												<div class="form-check-inline">
													<label class="form-check-label" for="gender">
														<input type="radio" class="form-check-input" id="gender" name="gender" <?php echo $user['gender']=='M' ? 'checked' : '' ?> value="M">Male
													</label>
												</div>
												<div class="form-check-inline">
													<label class="form-check-label" for="gender">
														<input type="radio" class="form-check-input" id="gender" name="gender" <?php echo $user['gender']=='F' ? 'checked' : '' ?> value="F">Female
													</label>
												</div>

                                            </div>
                                        </div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Date of Birth</label>
												<star>*</star>
												<input class="form-control useCurrentDateTodayMax"
													   autocomplete="off" type="text" id="dob" name="dob"
													   value="<?php echo $user['dob'];?>"
													   placeholder="Date of Birth">
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> Address </label>
										<star>*</star>
                                        <input type="text" name="address1"
                                               id="address1"
                                               class="form-control"
                                               value="<?php echo $user['address1'];?>"
                                               placeholder="Address 1">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label"> State </label>
										<star>*</star>
										<select name="state1" class="form-control state" id="state1">
											<option value="">Select State</option>
											<?php foreach($state1 as $stt){ ?>
												<option value="<?php echo $stt['id']?>" <?php echo $user['state1'] == $stt['id']?'selected="selected"':"";?>><?php echo $stt['name']?></option>
											<?php } ?>
										</select>
                                        <!--<input type="text" id="state" name="state"
                                               value="" class="form-control"
                                               placeholder="State">-->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">City </label>
										<star>*</star>
										<select name="city1" class="form-control city" id="city1">
											<option value="">Select City</option>
											<?php foreach($city1 as $cit){ ?>
												<option value="<?php echo $cit['id']?>" <?php echo $user['city1'] == $cit['id']?'selected="selected"':"";?>><?php echo $cit['name']?></option>
											<?php } ?>
										</select>
                                        <!--<input type="text"
                                               id="city"
                                               name="city"
                                               value=""
                                               class="form-control"
                                               placeholder="City">-->
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">PO Box</label>
										<star>*</star>
                                        <input type="text"
                                               id="pin_code1"
                                               name="pin_code1"
                                               value="<?php echo $user['pin_code1'];?>"
                                               class="form-control"
                                               placeholder="PO Box Number">
                                    </div>
                                </div>
                            </div>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4">
                                    <div class="form-group mt-32">
                                        <div class="row">
                                            <div class="col">
                                                <button type="submit" name="submit" value="submit"
                                                        class="btn btn-primary pl-3 pr-3"> Update
                                                </button>
												&nbsp;
												<a href="<?php echo WEB_URL.'dashboard/index'; ?>"
												   class="btn btn-danger pl-3 pr-3"> Cancel </a>
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="vehicledetails" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tbldata">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title"> Vehicle Details </h4>
                                        </div>
                                        <div class="col-6 text-right mt-2">
                                            <a href="<?php echo WEB_URL; ?>units/addVehicle"> Manage Vehicle </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="dependent-multply-div">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="memberlist" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="tbldata">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title"> Member List </h4>
                                        </div>
                                        <div class="col-6 text-right mt-2">
                                            <a href="<?php echo WEB_URL; ?>users/addMember"> Add Member </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" style="min-height:200px">
                                        <table class="table table-hover table-line footable" data-toggle-column="last">
                                            <thead>
                                            <tr>
                                                <th class="border-0" >Name</th>
                                                <th class="border-0" >Relation</th>
                                                <th class="border-0" data-breakpoints="xs" data-hide="phone,tablet" >Email</th>
                                                <th class="border-0" data-breakpoints="xs" data-hide="phone,tablet" >Gender</th>
                                                <th data-breakpoints="xs" data-hide="phone,tablet"
                                                    class="border-0 footable-last-visible text-right" >Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mydocuments" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="card-title">My Documents</h4>
                                        </div>
                                        <div class="col-6 text-right mt-2">
                                            <a href="<?php echo WEB_URL; ?>users/addDocuments">Add Document</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body" id="tbldata">
                                    <div class="table-responsive" style="min-height:200px">
                                        <table class="table table-hover table-line footable" cellspacing="0" data-toggle-column="last">
                                            <thead>
                                            <tr>
                                                <th class="border-0">Name</th>
                                                <th class="border-0">Expiry Date</th>
                                                <th data-breakpoints="xs" data-hide="phone,tablet" class="border-0 text-right footable-last-visible">Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div id="myunits" class="tab-pane fade">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
	$(".useCurrentDateTodayMax").datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayHighlight: true
	});
</script>
<script>
	$(document).ready(function(){
		var weburl = $('#weburl').val();
		$('body').on('change','.cscl', function(){
			var countryID = $(this).val();
			var $this=$(this);

			if(countryID){

				$.ajax({
					type:'POST',
					url: weburl+'csclmng/ajaxGetState',
					dataType: 'json',
					data:'id='+countryID,
					headers: {'X-CSRF-TOKEN': $('meta[nmae=csrf-token]').attr('content')},
					success:function(html){
						var opt_str='<option value="">Select State</option>';
						$.each(html, function(i,v) {
							opt_str+='<option value="'+v.id+'">'+v.name+'</option>';
						});
						$this.parents('.address').find('.state').html(opt_str);
					}
				});

			}else{
				$('.cscl').html('<option value="">Select country first</option>');
			}
		});

		$('body').on('change','.state', function(){
			var stateID = $(this).val();
			var $this=$(this);
			if(stateID){
				$.ajax({
					type:'POST',
					url: weburl+'csclmng/ajaxGetCity',
					dataType: 'json',
					data:'id='+stateID,
					headers: {'X-CSRF-TOKEN': $('meta[nmae=csrf-token]').attr('content')},
					success:function(html){
						var opt_str='<option value="">Select City</option>';
						$.each(html, function(i,v) {
							opt_str+='<option value="'+v.id+'">'+v.name+'</option>';
						});
						$this.parents('.address').find('.city').html(opt_str);
					}
				});

			}else{
				$('.state').html('<option value="">Select State first</option>');
			}
		});

	});
</script>
