<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
	$attributes = array('id' => 'searchForm', 'autocomplete'=>'off');
	echo form_open(WEB_URL, $attributes);
	?>
	<input type="hidden" name="post_url" id="post_url" value="">
	<input type="hidden" id='page_num' name='page_num' value='1'>
	<div class="card shadow mb-4">
		<div class="card-header">
		  <div class="row">
			<div class="col-sm-6">
			  <h6 class="font-weight-bold text-primary"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
			</div>
			<div class="col-sm-6 text-right">
			  <a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'treatmentPlan/patientTrtmntPlan?patientid='.$patientid;?>">Generator Treatment Plan</a>
			  <a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'treatmentPlan/treatmentPlan';?>">Back</a>
			</div>
		  </div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<table id="dataTable" class="table table-hover" width="100%" cellspacing="0">
						<thead>
						<tr>
							<th class="border-0">Id</th>
							<th class="border-0">Dentist Name</th>
							<th class="border-0">Patient Name</th>
							<th class="border-0">Office Charges</th>
							<th class="border-0">Insurance Price</th>
							<th class="border-0">Insurance Pays</th>
							<th class="border-0 text-center">Action</th>
						</tr>
						</thead>
					<tbody>
					<?php
					if(!empty($patientTrtmnt)) {
						foreach($patientTrtmnt as $trtmnt){
							?>
							<tr>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['idtrtmnt_plan_hdr'];?></td>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['dentistfirstname'].' '.$trtmnt['dentistlastname'];?></td>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['patientfirstname'].' '.$trtmnt['patientlastname'];?></td>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['officecharges'];?></td>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['insuranceprice'];?></td>
								<td onclick="window.location='<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>'" style="cursor:pointer"><?php echo $trtmnt['insurancepays'];?></td>
								<td class="text-center">
									<div class="dropdown dropleft">
										<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
											Action
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="<?php echo WEB_URL.'treatmentPlan/treatmentPlanDetails?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>">View</a>
											<a class="dropdown-item" href="<?php echo WEB_URL.'treatmentPlan/deleteTreatmentPlan?id='.$trtmnt['idtrtmnt_plan_hdr'].'&patientid='.$trtmnt['patientid']?>">Delete</a>
										</div>
									</div>
								</td>
							</tr>
							<?php
						}
					}
					?>
					</tbody>
				</table>	
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<!-- <script>
$('.btnList').click(function(e){
  var id_emp = $(this).data('index');
  console.log(id_emp);
    $.ajax({
        url:"<?php echo base_url();?>index.php/employee/ajaxTestData",
        type:"POST",
        data:{id_employee:id_emp},
        success: function(result){
          //  var obj = $.parseJSON(result);
            console.log(result);
           // $.each(result.results,function(item){
           //     $('ul').append('<li>' + item + '</li>')
           // })
        }
    })
    $('#div_list').toggle(900)
})
</script> -->
