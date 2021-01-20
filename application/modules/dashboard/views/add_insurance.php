<!-- Begin Page Content -->
  <!-- Page Heading -->
	<?php
	$attributes = array('id' => 'myform');
	echo form_open(WEB_URL.'dashboard/addInsurance',$attributes);
	?>
	  	<div class="card shadow mb-4 valid-form">
		    <div class="card-header">
		      <div class="row">
		        <div class="col-6">
		          <h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		        </div>
		        <div class="col-6 text-right">
		          <a class="btn btn-sm btn-outline-secondary" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</a>
		        </div>
		      </div>
		    </div>
		    <input type="hidden" name="plansid" value="<?php echo $data['postVal']['plansid']?>">
		    <input type="hidden" name="patientid" value="<?php echo $data['postVal']['patientid']?>">
		    <?php $this->load->view('theme/message_view');?>
		    <div class="card-body">
		        <div class="row">
		        	<div class="col-md-6 col-12">
			            <div class="form-group">
			              <label for="first_name" class="col-form-label">Employer<span> *</span></label>
			               <select class="form-control" name="employer" id="employer" onchange="insuranceEmployerChange(this)">
                            <?php foreach ($data['employers'] as $pRow) { ?>
                                <option value="<?php echo $pRow['employerid'];?>"><?php echo $pRow['employersname'];?></option>
                            <?php } ?>
                            <option value="New">New</option>
                        	</select>
                        	<div id="new-employer"></div>
			            </div>
		          	</div>
		          	<div class="col-md-6 col-12">
			            <div class="form-group">
			             <label for="first_name" class="col-form-label">Insurance<span> *</span></label>
			             <select class="form-control" name="insurance" id="insurance" onchange="insuranceChange(this)">
                            <?php foreach ($data['insurance'] as $iRow) { ?>
                                <option value="<?php echo $iRow['insurance_id'];?>"><?php echo $iRow['insurancename'];?></option>
                            <?php } ?>
                            <option value="New">New</option>
                        </select>
                        <div id="new-insurance"></div>
			            </div>
		          	</div>
		          	<div class="col-md-4 col-12">
			            <div class="form-group">
				             <label for="first_name" class="col-form-label">Group<span> *</span></label>
				             <select class="form-control" name="plansid" id="plansid" onchange="insurancePlanChange(this)">
	                            <?php foreach ($data['insurance_plans'] as $pRow) { ?>
	                                <option value="<?php echo $pRow['insurance_plans_id'];?>"><?php echo $pRow['groupid'];?></option>
	                            <?php } ?>
	                            <option value="New">New</option>
	                         </select>
	                        	<div id="new-insurance-plan">
				            </div>
		          		</div>
		          	</div>
		          	<div class="col-md-4 col-12">
			            <div class="form-group">
			              <label for="first_name" class="col-form-label">Sub Group</label>
			              <input type="text" class="form-control" id="sub_group" name="sub_group" placeholder="Enter Sub Group" >
			            </div>
		          	</div>
		          	<div class="col-md-4 col-12">
			            <div class="form-group">
			              <label for="first_name" class="col-form-label">Product Id</label>
			              <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Product Id" >
			            </div>
		          	</div>
		        </div>
		    </div>
		    <div class="card-body">
		        <div class="row">
			  		<div class="col-12">
			  			<div class="form-group">
				            <button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Save</button>
				            <a class="btn pl-3 pr-3 btn-danger" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</a>
				        </div>
			  		</div>
		        </div>
		  	</div>
	  	</div>
	  	
	<?php echo form_close(); ?>
<!-- /.container-fluid -->

<script type="text/javascript">
	function insuranceChange(e)
    {
        var id = $(e).val();
        if (id=='New') {
        	$('#insurance').hide();
            $('#new-insurance').html('<input type="text" name="insurance_new" class="form-control" placeholder="Insurance *" required>');
        }else{
            $('#new-insurance').html('');
        }

  //       var plan_insuranceId= '<?php echo isset($plan['insurance_plans_id'])?$plan['insurance_plans_id']:0?>';
		// var weburl = $('meta[name="weburl"]').attr('content');
		// $.get(weburl + 'dashboard/getPlans?insurance_id='+id+'&selected='+plan_insuranceId, function (d) {
		// 	var response=d+'<option value="New">New</option>';
		// 	$('#plansid').html(response);
		// });
    }

    function insurancePlanChange(e)
    {
        var id = $(e).val();
        if (id=='New') {
        	$('#plansid').hide();
            $('#new-insurance-plan').html('<input type="text" class="form-control" name="plansid_new" placeholder="Group ID  *" required>');
        }else{
            $('#new-insurance-plan').html('');
        }
    }

    function insuranceEmployerChange(e)
    {
        var id = $(e).val();
        if (id=='New') {
        	$('#employer').hide();
            $('#new-employer').html('<input type="text" name="employer_new" class="form-control" placeholder="Employer *" required>');
        }else{
            $('#new-employer').html('');
        }


  //       var plan_employer= '<?php echo isset($plan['insurance_id'])?$plan['insurance_id']:0?>';
		// var weburl = $('meta[name="weburl"]').attr('content');
		// $.get(weburl + 'dashboard/getInsurance?employerId='+id+'&selected='+plan_employer, function (d) {
		// 	var response=d+'<option value="New">New</option>';
		// 	$('#insurance').html(response);
		// 	// $('#ajx_content').html(d);
		// 	// $('#myModal').modal('show');
		// });
    }

</script>
