<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->

	<?php 
  	$attributes = array('id' => 'myform','enctype'=>'multipart/form-data');
	echo form_open(WEB_URL.'dashboard/addNewPatient',$attributes);?>
	  	<div class="card shadow mb-4 valid-form">
		   <!--  <div class="card-header">
		      <div class="row">
		        <div class="col-md-6 col-sm-12">
		        </div>
		        <div class="col-md-6 col-sm-12 text-right">
		        	
		          <a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'dashboard/index';?>">Return to the Dashboard</a>
		        </div>
		      </div>
		    </div> -->
		    
		    <?php $this->load->view('theme/message_view');?>
		    <div class="card-body">
		        <div class="row">
					<div class="container-fluid">
					    <div class="row mb-3">
					        <div class="col-12">
					        	<img src="<?php echo isset($officeName['logo'])?WEB_URL.$officeName['logo']:'' ?>">
					        	<span style="float: right;">
					        		  <a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$header['patientid'];?>">Back</a>
					        	</span>
					            <h2 class="font-weight-bold text-dark text-center"><?php echo isset($officeName['officename'])?$officeName['officename']:'' ?></h2>
					        </div>
					        <div class="col-12">
					            <h5 class="font-weight-bold text-dark text-center">Treatment of Patient: <?php echo $patient['p_firstname'].' '.$patient['p_lastname']; ?></h5>
					            <hr>
					        </div>
					      
					        </div>
					    </div>
					    <div class="card-body">
					    <div class="row">
					        <div class="col-md-12 col-sm-12">
					           <table class="table table-sm">
								 <!--  <caption>Delivery slots:</caption> -->
								  <tr>
								    <td ></td>
								    <th scope="col" class="text-center">Fees</th>
								    <th scope="col"></th>
								    <th scope="col">Insurance Pays</th>
								    <th scope="col">Patient Pays</th>
								  </tr>
								   <tr>
								    <td></td>
								    <th scope="col">Office</th>
								    <th scope="col">Insurance</th>
								    <th scope="col"></th>
								    <th scope="col"></th>
								  </tr>
								  <?php 
								  if (count($lines)>0) {
								  	foreach ($lines as $row) {
								  ?>
									  <tr>
									    <th scope="row"><?php echo $row['cdt_codes']; ?></th>
									    <td>$<?php echo $row['officecharge']; ?></td>
									    <td>$<?php echo $row['Insuranceprice']; ?></td>
									    <td>$<?php echo $row['insurancepays']; ?></td>
									    <td>$<?php echo $row['patientpays']; ?></td>
									  </tr>
									 <?php
									}
								}
								?>
								<tfoot>
								    <tr>
								   	  <td></td>
								      <td></td>
								      <td class="text-center"><b>Total</b></td>
								      <td>$<?php echo $header['insurancepays']?></td>
								      <td>$<?php echo $header['patientpays']?></td>
								    </tr>
								  </tfoot>
								</table>

					        </div>
					    </div> 
					   </div>      
		    </div>
	  	</div>
	<?php echo form_close();?>
</div>
<!-- /.container-fluid -->

<script>
	$(".disabled-input input").attr('disabled','disabled');
    $(".disabled-input select").attr('disabled','disabled');

    $(document).ready(function () {
    $('#checkbox1').change(function () {
        if (!this.checked){
        	$(".disabled-input input").attr('disabled','disabled');
         	$(".disabled-input select").attr('disabled','disabled');
        }
        else {
            $(".disabled-input select").removeAttr('disabled');
            $(".disabled-input input").removeAttr('disabled');
        }
    });

});

	$( function() {
    $('.datepicker').datepicker({
    	 format: 'mm/dd/yyyy',
    });

  } );


	

</script>

