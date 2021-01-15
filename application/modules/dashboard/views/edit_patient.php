<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
	<?php echo form_open(WEB_URL.'dashboard/editpatient?id='.$patient['patientid']);?>
	  	<div class="card shadow mb-4 valid-form">
		 <!--    <div class="card-header">
		      <div class="row"> -->
		       <!--  <div class="col-md-6 col-sm-12"> -->
		         
		   
		      <!--   </div> -->
		        <!-- <div class="col-md-6 col-sm-12 text-right"> -->
		        <!-- 	<?php
		        		if (isset($patient['attachment_front']) && $patient['attachment_front'] !='') { ?>
		        			<a href="<?php echo WEB_URL.$patient['attachment_front']?>" class="btn btn-primary" target="_blank">Insurance Front Page</a>
		        	<?php	
		        		}else{ ?>
		        			<a href="#" class="btn btn-primary">Insurance Front Page</a>
		        	<?php } ?>
		        	<?php if(isset($patient['attachment_back']) && $patient['attachment_back'] !=''){ ?>
		        		<a href="<?php echo WEB_URL.$patient['attachment_back']?>" class="btn btn-primary" target="_blank">Insurance Back page</a>
		            <?php }else{ ?>
		            	<a href="#" class="btn btn-primary">Insurance Back page</a>
		            <?php } ?>
		          <a class="btn btn-outline-secondary" href="<?php echo WEB_URL.'dashboard/index';?>">Return to the Dashboard</a> -->
		          <br>
		          <?php
		          $id 	   =isset($_GET['id'])?$_GET['id']:0;
		          $plansid = isset($_GET['plansid'])?$_GET['plansid']:0;
		          ?>
		          
		       <!--  </div> -->
		    <!--   </div>
		    </div> -->
		    <?php
		    	$employerid = isset($plan['employer_id'])?$plan['employer_id']:0;
		    	$plan['employer_id'] = isset($_GET['employerid']) && $_GET['employerid']>0?$_GET['employerid']:$employerid;

		    	$percentage=array(
		    		1=>isset($plan['preventive_percentage'])?$plan['preventive_percentage']:'',
	            	2=>isset($plan['diagnostics_percentage'])?$plan['diagnostics_percentage']:'',
	            	3=>isset($plan['restorative_ant_percentage'])?$plan['restorative_ant_percentage']:'',
	            	4=>isset($plan['endodontics_percentage'])?$plan['endodontics_percentage']:'',
	            	5=>isset($plan['periodontics_percentage'])?$plan['periodontics_percentage']:'',
	            	6=>isset($plan['prosthodonticsremovable_percentage'])?$plan['prosthodonticsremovable_percentage']:'',
	            	7=>isset($plan['implants_percentage'])?$plan['implants_percentage']:'',
	            	8=>isset($plan['prosthodontics_fixed_percentage'])?$plan['prosthodontics_fixed_percentage']:'',
	            	9=>isset($plan['oralsurgery_percentage'])?$plan['oralsurgery_percentage']:'',
	            	10=>isset($plan['orthodontics_percentage'])?$plan['orthodontics_percentage']:'',
	            	11=>isset($plan['adjunctivegenservices_percentage'])?$plan['adjunctivegenservices_percentage']:'',
	            	12=>isset($plan['maxillofacialprosthetics_percentage'])?$plan['maxillofacialprosthetics_percentage']:'',
	            	13=>isset($plan['restorative_post_percentage'])?$plan['restorative_post_percentage']:'',
	            	14=>isset($plan['basic_percentage'])?$plan['basic_percentage']:'',
	            	15=>isset($plan['major_percentage'])?$plan['major_percentage']:'',
	            	16=>isset($plan['periomaint_percentage'])?$plan['periomaint_percentage']:'',

				);

				$waitingPeriod=array(
					1=>isset($plan['preventive_waitingperiod'])?$plan['preventive_waitingperiod']:'',
	            	2=>isset($plan['diagnostic_waitingperiod'])?$plan['diagnostic_waitingperiod']:'',
	            	3=>isset($plan['restorative_int_waitingperiod'])?$plan['restorative_int_waitingperiod']:'',
	            	4=>isset($plan['endodontics_waitingperiod'])?$plan['endodontics_waitingperiod']:'',
	            	5=>isset($plan['periodontics_waitingperiod'])?$plan['periodontics_waitingperiod']:'',
	            	6=>isset($plan['prosthodonticsremovable_waitingperiod'])?$plan['prosthodonticsremovable_waitingperiod']:'',
	            	7=>isset($plan['implant_waitingperiod'])?$plan['implant_waitingperiod']:'',
	            	8=>isset($plan['prosthodontics_fixed_waitingperiod'])?$plan['prosthodontics_fixed_waitingperiod']:'',
	            	9=>isset($plan['oralsurgery_waitingperiod'])?$plan['oralsurgery_waitingperiod']:'',
	            	10=>isset($plan['orthodontics_waitingperiod'])?$plan['orthodontics_waitingperiod']:'',
	            	11=>isset($plan['adjunctivegenservices_waitingperiod'])?$plan['adjunctivegenservices_waitingperiod']:'',
	            	12=>isset($plan['maxillofacialprosthetics_waitingperiod'])?$plan['maxillofacialprosthetics_waitingperiod']:'',
	            	13=>isset($plan['restorative_post_waitingperiod'])?$plan['restorative_post_waitingperiod']:'',
	            	14=>isset($plan['basic_waitingperiod'])?$plan['basic_waitingperiod']:'',
	            	15=>isset($plan['major_waitingperiod'])?$plan['major_waitingperiod']:'',
	            	16=>isset($plan['periomaint_waitingperiod'])?$plan['periomaint_waitingperiod']:'',

				);
		    ?>
		    <?php $this->load->view('theme/message_view');?>
		    <div class="card-body">
		        <div class="row">
					<div class="container-fluid">
					    <div class="row mb-3">

					        <div class="col-12">
					        	<img src="<?php echo isset($officeName['logo'])?WEB_URL.$officeName['logo']:'' ?>">
					        	<span style="float: right;">
					        		<?php
						        		if (isset($patient['attachment_front']) && $patient['attachment_front'] !='') { ?>
						        			<a href="<?php echo WEB_URL.$patient['attachment_front']?>" class="btn btn-primary" target="_blank">Insurance Front Page</a>
						        	<?php	
						        		}else{ ?>
						        			<a href="#" class="btn btn-primary">Insurance Front Page</a>
						        	<?php } ?>
						        	<?php if(isset($patient['attachment_back']) && $patient['attachment_back'] !=''){ ?>
						        		<a href="<?php echo WEB_URL.$patient['attachment_back']?>" class="btn btn-primary" target="_blank">Insurance Back page</a>
						            <?php }else{ ?>
						            	<a href="#" class="btn btn-primary">Insurance Back page</a>
						            <?php } ?>
						          <a class="btn btn-outline-secondary" href="<?php echo WEB_URL.'dashboard/index';?>">Return to the Dashboard</a>
					        	</span>
					            <h2 class="font-weight-bold text-dark text-center"><?php echo isset($officeName['officename'])?$officeName['officename']:'' ?> </h2>
					             <h4 class="font-weight-bold text-dark text-center"> BENEFITS BREAKDOWN </h4>
					            <a href="<?php echo WEB_URL.'dashboard/patientPdf?id='.$id.'&plansid='.$plansid ?>" class="btn-sm btn-success" target="_blank" style='float: right;' >Patient Pdf</a>
					        </div>
					       <!--  <div class="col-12">
					            <h4 class="font-weight-bold text-dark text-center"> BENEFITS BREAKDOWN </h4>
					            <hr>
					        </div>	  -->
					    </div>
					   
					    <div class="row">
					        <div class="col-md-4 col-sm-12">
					      
					            <table class="table table-bordered">
					            	<b style="font-size: 11px;">Patient was last verified by <?php echo isset($users[$patient['updatedby']])?$users[$patient['updatedby']]:''?> On <?php echo $patient['lastupdate']?></b>
					            	<a href="javascript:void(0)" onclick="addInsurance(this)" style="float: right;">Add Insurance</a>
					            	<tr>
					                <th>Employer:</th>   
					                <th colspan="3">
					                	<select class="form-control" name="employerid" id="employerid" onchange="employerId(this)">
					                		<option value="0">Please Select</option>
				                            <?php foreach ($employers as $pRow) { ?>
				                                <option value="<?php echo $pRow['employerid'];?>" <?php echo isset($plan['employer_id']) && $plan['employer_id'] == $pRow['employerid']?'selected':''; ?>><?php echo $pRow['employersname'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                <tr>
					                <th>Insurance:</th>
					                <th colspan="3">
					                	<select class="form-control" name="insurance_id" id="insurance-dropdown" onchange="insuranceId(this)">
					                		<option value="0">Please Select</option>
				                            <?php foreach ($insurance as $iRow) { ?>
				                                <option value="<?php echo $iRow['insurance_id'];?>" <?php echo isset($plan['insurance_id']) && $plan['insurance_id']==$iRow['insurance_id']?'selected':''; ?>><?php echo $iRow['insurancename'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                 <tr>
					                <th>Group #:</th>   
					                <th colspan="3">
					                	<select class="form-control" name="plansid" onchange="changePlansid(this)" id="plans-id">
					                		<option value="0">Please Select</option>
				                            <?php foreach ($insurance_plans as $pRow) { ?>
				                                <option value="<?php echo $pRow['insurance_plans_id'];?>" <?php echo isset($plan['insurance_plans_id']) && $plan['insurance_plans_id']==$pRow['insurance_plans_id']?'selected':''; ?>><?php echo $pRow['groupid'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                <tr>
					                <th>Product Id:</th>
					                <th colspan="3" class="disabled-input"><input type="text" name="productid" class="form-control" value="<?php echo isset($plan['productid'])?$plan['productid']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Fee Schedule:</th>
					                <th class="disabled-input">
					                	<select class="form-control" name="feescheduleid" id="feescheduleid">
					                		<option value="0">Please Select</option>
				                            <?php foreach ($feeschedule as $fRow) { ?>
				                                <option value="<?php echo $fRow['feescheduleid'];?>" <?php echo isset($plan['feescheduleid']) && $plan['feescheduleid']==$fRow['feescheduleid']?'selected':''; ?>><?php echo $fRow['name'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                <th>Network</th>   
					                <th class="disabled-input">
					                	<select class="form-control" name="insurance_in_out">
					                		<option value="IN" <?php echo isset($plan['insurance_in_out']) && $plan['insurance_in_out']=='IN'?'selected':''; ?>>IN</option>
					                		<option value="OUT" <?php echo isset($plan['insurance_in_out']) && $plan['insurance_in_out']=='OUT'?'selected':''; ?>>OUT</option>
					                	</select>
					                </th>
					                </tr>
					                <tr>
					                <th>Member Id:</th>
					                <th colspan=""><input type="text" name="memberid" class="form-control" value="<?php echo isset($patientInsurance['memberid'])?$patientInsurance['memberid']:''; ?>"></th>
					                 <th>Pays to Provider</th>   
					                <th class="disabled-input">
					                	<select class="form-control" name="pays_to_provider">
					                		<option value="Y" <?php echo isset($plan['pays_to_provider']) && $plan['pays_to_provider']=='Y'?'selected':''; ?>>Yes</option>
					                		<option value="N" <?php echo isset($plan['pays_to_provider']) && $plan['pays_to_provider']=='N'?'selected':''; ?>>No</option>
					                	</select>
					                </th>

					                </tr>
					               <!--  <tr>
					                <th>Effective Date:</th>   
					                <th><input type="text" name="effective_date" class="form-control datepicker" value="<?php echo getDateFormatted(isset($patientInsurance['effective_date'])?$patientInsurance['effective_date']:'','m/d/y') ?>"></th>
					                </tr>
					                <tr> -->
					                <tr>
					                <th>Insurance Benefit Coverage</th>   
					                <th class="disabled-input" style="width: 25%">
					                	<select class="form-control" name="insurance_benefits" onchange="insuranceBenefits(this)">
					                		<option value="calendar" <?php echo isset($plan['insurance_benefits']) && $plan['insurance_benefits']=='calendar'?'selected':''; ?>>Calendar Year</option>
					                		<option value="plan" <?php echo isset($plan['insurance_benefits']) && $plan['insurance_benefits']=='plan'?'selected':''; ?>>Plan Year</option>
					                	</select>
					                </th>
					                <?php
					                $effective_date_default=getDateFormatted(isset($patientInsurance['effective_date'])?$patientInsurance['effective_date']:'','m/d/y');
					                $effective_date=isset($plan['insurance_benefits']) && $plan['insurance_benefits']=='plan'?$effective_date_default:(new \DateTime(date("Y")."-01-01"))->format("m/d/Y");
					                ?>
					                <th style="width: 25%">Effective Date:</th>  
					                <th class="disabled-input">
					                	<input type="hidden" name="" id="current_year" value="<?php echo (new \DateTime(date("Y")."-01-01"))->format("m/d/Y"); ?>">
					                	<input type="text" name="effective_date" class="form-control datepicker effective_date" value="<?php echo $effective_date; ?>"></th>
					                </tr>
					            </table>
					             <table class="table table-bordered">
					                <tr>
					                <th colspan="3" class="text-center">Insurance Agent</th>
					                </tr>
					                <tr>
					                <th>Insurance Agent Name</th>   
					                <th><input type="text" name="insurance_agentname" class="form-control" value=""></th>
					                </tr>
					                <tr>
					                <th>Insurance Agent Id</th>
					                <th><input type="text" name="insurance_agentid" class="form-control" value=""></th>
					                </tr>
					                <tr>
					            </table>
					              <table class="table table-bordered">
					                <tr>
					                <input type="hidden" name="patientid" id="patientid" value="<?php echo $patient['patientid'];?>">
					                <input type="hidden" name="insurance_plans_id" id="insurance_plans_id" value="<?php echo $_GET['plansid'];?>">
					                <input type="hidden" name="officeid" value="<?php echo $patient['officeid'];?>">
					                <th>Patient Name</th>
					                <th><input type="text" name="p_firstname" class="form-control p_firstname" value="<?php echo $patient['p_firstname']?>"></th>
					                <th><input type="text" name="p_lastname" class="form-control p_lastname" value="<?php echo $patient['p_lastname']?>"></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><input type="text"  name="p_dob" class="form-control datepicker p_dob" value="<?php echo getDateFormatted($patient['p_dob'],'m/d/y')?>"></th>
					                </tr>
					                <tr>
					                	<th>Same as Patient's</th>
					                	<th></th>
					                	<th><input type="checkbox" name="" id="checkbox" onclick="copyPatientForm(this)"></th>
					                </tr>
					                <tr>
					                <th>Subscriber's Name</th>
					                <th><input type="text" name="s_firstname" class="form-control s_firstname" value="<?php echo $patient['s_firstname']?>"></th>
					                <th><input type="text" name="s_lastname" class="form-control s_lastname" value="<?php echo $patient['s_lastname']?>"></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><input type="text" name="s_dob" class="form-control datepicker s_dob" value="<?php echo getDateFormatted($patient['s_dob'],'m/d/y')?>"></th>
					                </tr>
					            </table>
					            
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="3" class="text-center">Insurance Benefits Details</th>
					                </tr>
					                <tr>
					                <th>Maximum</th>   
					                <th>$</th>
					                <th class="disabled-input"><input type="text" name="ind_limit_annual" class="form-control" value="<?php echo isset($plan['ind_limit_annual'])?$plan['ind_limit_annual']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>
					                <th>$</th>
					                <th><input type="text" name="ins_benefit_remaining" class="form-control" value="<?php echo isset($patientInsurance['ins_benefit_remaining'])?$patientInsurance['ins_benefit_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th colspan="3" class="text-center">Deductions</th>   
					                </tr>
					                <tr>
					                <th>Individual Deductions</th>   
					                <th>$</th>
					                <th class="disabled-input"><input type="text" name="ind_deductible_annual" class="form-control" value="<?php echo isset($plan['ind_deductible_annual'])?$plan['ind_deductible_annual']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><input type="text" name="ind_ded_remaining" class="form-control" value="<?php echo isset($patientInsurance['ind_ded_remaining'])?$patientInsurance['ind_ded_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Family Deduction</th>   
					                <th>$</th>
					                <th class="disabled-input"><input type="text" name="family_deductible_annual" class="form-control" value="<?php echo isset($plan['family_deductible_annual'])?$plan['family_deductible_annual']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><input type="text" name="family_ded_remaining" class="form-control" value="<?php echo isset($patientInsurance['family_ded_remaining'])?$patientInsurance['family_ded_remaining']:''; ?>"></th>
					                </tr>
					            </table>
					           
					            <table class="table table-bordered disabled-input">
					                <tr>
					                <th>Missing Tooth Clause</th>
					                <th style="width: 20%" class="text-center">Y</th>
					                <th class="text-center"><input type="radio" name="missing_tooth_clause" value="1" <?php echo isset($plan['missing_tooth_clause']) && $plan['missing_tooth_clause']=='1'?'checked':'' ?>></th>
					                <th class="text-center">N</th>
					                <th style="width: 8%" class="text-center"><input type="radio" name="missing_tooth_clause" value="0" <?php echo isset($plan['missing_tooth_clause']) && $plan['missing_tooth_clause']=='0'?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Predetermination Needed</th>
					                <th class="text-center">Y</th>
					                <th class="text-center"><input type="radio" name="predetermination_needed" value="1" <?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='1'?'checked':'' ?> onclick="predeterminationNeeded(1)" ></th>
					                <th class="text-center">N</th>
					                <th class="text-center"><input type="radio" name="predetermination_needed" value="0" <?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='0'?'checked':'' ?> onclick="predeterminationNeeded(0)"></th>
					                </tr>
					                <tr>
					                <th>Predetermination Rec.</th>
					                <th colspan="2">Above</th>
					                <th colspan="2"><input type="text" name="predetermination_needed_new" class="form-control" value="<?php echo isset($plan['predetermination_needed'])?$plan['predetermination_needed']:''?>" id='predetermination-req' <?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='1'?'readonly':'' ?>></th>
					                </tr>
					            </table>
					             

					            <table class="table table-bordered">
					            	 <tr>
					                <th colspan="6" class="text-center">History</th>
					                </tr>
					                <tr>
					                <th colspan="" class="text-center">Codes</th>
					                <th colspan="" class="text-center">Date 1</th>
					                <th colspan="" class="text-center">Date 2</th>
					                <th colspan="" class="text-center">Date 3</th>
					                <th colspan="" class="text-center">Date 4</th>
					                </tr>
					                <?php
					                	if (count($history)>0) { 
					                		foreach ($history as  $hRow) { ?>
							                <tr>
							                	<th style="width: 20%">
							                		<input type="hidden" name="historyId[]" value="<?php echo $hRow['cdtid']?>">
									                <select class="form-control" name="history_field[]">
										              <option value="0">Please Select</option>
						                            	<?php foreach ($cdt_codes as $cdtcodes) { ?>
							                                <option value="<?php echo $cdtcodes['cdtid'];?>" <?php echo $cdtcodes['cdtid']==$hRow['cdtid']?'selected':''?>><?php echo $cdtcodes['cdt_codes'];?>
							                                </option>
						                            <?php } ?>
					                        		</select>
				                        		 </th>
								                <!-- <th><input type="text" name="history_field[]" class="form-control" value="<?php echo $hRow['history_field']?>"></th> -->
								                <th><input type="text" name="history_field_date1[]" class="form-control datepicker" value="<?php echo getDateFormatted($hRow['history_field_date1'],'m/d/y')?>"></th>
								                <th><input type="text" name="history_field_date2[]" class="form-control datepicker" value="<?php echo getDateFormatted($hRow['history_field_date2'],'m/d/y')?>"></th>
								                <th><input type="text" name="history_field_date3[]" class="form-control datepicker" value="<?php echo getDateFormatted($hRow['history_field_date3'],'m/d/y')?>"></th>
								                <th><input type="text" name="history_field_date4[]" class="form-control datepicker" value="<?php echo getDateFormatted($hRow['history_field_date4'],'m/d/y')?>"></th>
								            </tr>
					               	<?php 
					               		}
						           	} ?>
						           	<?php for ($i=0; $i < 1; $i++) { ?>
						                <tr class="tr_clone_histroy">
						                  <th style="width: 20%">
						                  	<input type="hidden" name="historyId[]" value="0">
							                <select class="form-control" name="history_field[]">
								              <option value="0">Please Select</option>
				                            	<?php foreach ($cdt_codes as $cdtcodes) { ?>
					                                <option value="<?php echo $cdtcodes['cdtid'];?>"><?php echo $cdtcodes['cdt_codes'];?>
					                                </option>
				                            <?php } ?>
			                        		</select>
		                        		 </th>
<!-- 						                <th><input type="text" name="history_field[]" class="form-control"></th>
 -->						                <th><input type="text" name="history_field_date1[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date2[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date3[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date4[]" class="form-control datepicker"></th>

					           		<?php } ?>
					               	<th class="add-remove-action text-center" width="50"><i class="material-icons mt-2 text-danger delete-row" data-toggle="tooltip" title="" style="cursor: pointer; display: none;" data-original-title="Delete">do_not_disturb_on</i><i class="material-icons mt-2 text-primary add-row2" data-toggle="tooltip" title="" style="cursor: pointer;" data-original-title="Add" onclick="addRowHistory(this)">add_circle</i></th>
						                <div id="add-row2"></div>
						                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="4" class="text-center">Notes</th>
					                </tr>
					                <tr>
					                <th><textarea class="form-control" name="freetexts"><?php echo isset($patient['freetexts'])?$patient['freetexts']:''; ?></textarea></th>					               
					                </tr>					               
					            </table>
					        </div>
					        <div class="col-md-8 col-sm-12">
					            <table class="table table-bordered disabled-input">
					            	<b>Insurance Plan was last verified by <?php echo isset($users[isset($plan['updatedby'])?$plan['updatedby']:0])?$users[$plan['updatedby']]:'None'?> On <?php echo isset($plan['updatedon'])?$plan['updatedon']:'None' ?></b>
					            	  <button type="submit" class="btn btn-sm btn-primary" value="submit" name="submit" style="float: right;margin-top: -11px;">Save</button>


					                <tr>
					                <th colspan="" class="text-center" ></th>
					                <th colspan="" class="text-center" style="width: 6%">%age</th>
					                <th colspan="" class="text-center">Ded. Applies</th>
					                <th colspan="" class="text-center">Waiting Period</th>
					                <th colspan="" class="text-center"></th>
					                <th colspan="" class="text-center" style="width: 6%">%age</th>
					                <th colspan="" class="text-center">Ded. Applies</th>
					                <th colspan="" class="text-center">Waiting Period</th>
					                <th colspan="" class="text-center"></th>
					                <th colspan="" class="text-center" style="width: 6%">%age</th>
					                <th>Ded. Applies</th>
					                <th colspan="" class="text-center">Waiting Period</th>
					                </tr>
					                <tr>
						                <span style="float: right;color: #2C78BC;margin-right: 18px;">  <input type="checkbox" id="checkbox1" value="1" name="insurance_update"> Edit Insurance Plans</span>
						                <th>Preventive</th>
						                <th><input type="text" name="preventive_percentage" class="form-control" value="<?php echo isset($plan['preventive_percentage'])?$plan['preventive_percentage']:''?>"></th>
						                <th class="text-center"><input type="checkbox" name="preventive_deduction_applies" value="Y" <?php echo isset($plan['preventive_deduction_applies']) && $plan['preventive_deduction_applies']=='Y'?'checked':'' ?>></th>
						                <th><select class="form-control" name="preventive_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['preventive_waitingperiod']) && $plan['preventive_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                <th>Periodontics</th>
					                	<th>
					                		<input type="text" name="periodontics_percentage" class="form-control" value="<?php echo isset($plan['periodontics_percentage'])?$plan['periodontics_percentage']:''?>">
					                	</th>
					                	<th class="text-center">
					                		<input type="checkbox" name="periodontics_deduction_applies" value="Y" <?php echo isset($plan['periodontics_deduction_applies']) && $plan['periodontics_deduction_applies']=='Y'?'checked':'' ?>>
					                	</th>
					                	 <th>
					                	 	<select class="form-control" name="periodontics_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>"  <?php echo isset($plan['periodontics_waitingperiod']) && $plan['periodontics_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							             </select>
							            </th>
					                 	<th>Prosthodontics Fixed</th>
					                	<th><input type="text" name="prosthodontics_fixed_percentage" class="form-control" value="<?php echo isset($plan['prosthodontics_fixed_percentage'])?$plan['prosthodontics_fixed_percentage']:''?>"></th>
					                	<th class="text-center">
					                		<input type="checkbox" name="prosthodontics_fixed_ded_applies" value="Y" <?php echo isset($plan['prosthodontics_fixed_ded_applies']) && $plan['prosthodontics_fixed_ded_applies']=='Y'?'checked':'' ?>>
					                	</th>
					                	 <th>
					                	 	<select class="form-control" name="prosthodontics_fixed_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['prosthodontics_fixed_waitingperiod']) && $plan['prosthodontics_fixed_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						            </tr>
					               
					                <tr>
					                	<th>Diagnostics</th>
						                <th><input type="text" name="diagnostics_percentage" class="form-control" value="<?php echo isset($plan['diagnostics_percentage'])?$plan['diagnostics_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="diagnostic_deduction_applies" value="Y" <?php echo isset($plan['diagnostic_deduction_applies']) && $plan['diagnostic_deduction_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="diagnostic_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['diagnostic_waitingperiod']) && $plan['diagnostic_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
						                <th>Prosthodontics,Removable</th>
						                <th><input type="text" name="prosthodonticsremovable_percentage" class="form-control" value="<?php echo isset($plan['prosthodonticsremovable_percentage'])?$plan['prosthodonticsremovable_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="prosthodonticsremovable_ded_applies" value="Y" <?php echo isset($plan['prosthodonticsremovable_ded_applies']) && $plan['prosthodonticsremovable_ded_applies']=='Y'?'checked':'' ?>>
						                </th>
						                <th><select class="form-control" name="prosthodonticsremovable_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['prosthodonticsremovable_waitingperiod']) && $plan['prosthodonticsremovable_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                 <th>Oral Surgery</th>
						                <th><input type="text" name="oralsurgery_percentage" class="form-control" value="<?php echo isset($plan['oralsurgery_percentage'])?$plan['oralsurgery_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="oralsurgery_ded_applies" value="Y" <?php echo isset($plan['oralsurgery_ded_applies']) && $plan['oralsurgery_ded_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="oralsurgery_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['oralsurgery_waitingperiod']) && $plan['oralsurgery_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
					            	</tr>
					            	<tr>
					            		<th>Restorative Anterior</th>
						                <th><input type="text" name="restorative_ant_percentage" class="form-control" value="<?php echo isset($plan['restorative_ant_percentage'])?$plan['restorative_ant_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="restorative_ant_ded_applies" value="Y" <?php echo isset($plan['restorative_ant_ded_applies']) && $plan['restorative_ant_ded_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="restorative_int_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['restorative_int_waitingperiod']) && $plan['restorative_int_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
					            	 <th>Maxillofacial Prosthetics</th>
						                <th><input type="text" name="maxillofacialprosthetics_percentage" class="form-control" value="<?php echo isset($plan['maxillofacialprosthetics_percentage'])?$plan['maxillofacialprosthetics_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="maxillofacialprosthetics_ded_applies" value="Y" <?php echo isset($plan['maxillofacialprosthetics_ded_applies']) && $plan['maxillofacialprosthetics_ded_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th ><select class="form-control" name="maxillofacialprosthetics_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['maxillofacialprosthetics_waitingperiod']) && $plan['maxillofacialprosthetics_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
						                <th>Orthodontics</th>
						                <th><input type="text" name="orthodontics_percentage" class="form-control" value="<?php echo isset($plan['orthodontics_percentage'])?$plan['orthodontics_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="orthodontics_deduction_applies" value="Y" <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="orthodontics_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['orthodontics_waitingperiod']) && $plan['orthodontics_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
					                </tr>
					                <tr>
					                	<th>Endodontics</th>
						                <th><input type="text" name="endodontics_percentage" class="form-control" value="<?php echo isset($plan['endodontics_percentage'])?$plan['endodontics_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="endodontic_deduction_applies" value="Y" <?php echo isset($plan['endodontic_deduction_applies']) && $plan['endodontic_deduction_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="endodontics_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['endodontics_waitingperiod']) && $plan['endodontics_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
					                 	<th>Implants Services</th>
						               	<th><input type="text" name="implants_percentage" class="form-control" value="<?php echo isset($plan['implants_percentage'])?$plan['implants_percentage']:''?>"></th>
						               	<th class="text-center">
						               		<input type="checkbox" name="implants_ded_applies" value="Y" <?php echo isset($plan['implants_ded_applies']) && $plan['implants_ded_applies']=='Y'?'checked':'' ?>>
						               	</th>
						               	 <th><select class="form-control" name="implant_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['implant_waitingperiod']) && $plan['implant_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						               	
						               	<th>Adjunctivegen Services</th>
						               	<th><input type="text" name="adjunctivegenservices_percentage" class="form-control" value="<?php echo isset($plan['adjunctivegenservices_percentage'])?$plan['adjunctivegenservices_percentage']:''?>"></th>
						               	<th class="text-center">
						               		<input type="checkbox" name="adjunctivegenservices_ded_applies" value="Y" <?php echo isset($plan['adjunctivegenservices_ded_applies']) && $plan['adjunctivegenservices_ded_applies']=='Y'?'checked':'' ?>>
						               	</th>
						               	 <th><select class="form-control" name="adjunctivegenservices_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['adjunctivegenservices_waitingperiod']) && $plan['adjunctivegenservices_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						               	
					                </tr>
					                <!-- new -->
					                <tr>
					                	<th>Basic</th>
						                <th><input type="text" name="basic_percentage" class="form-control" value="<?php echo isset($plan['basic_percentage'])?$plan['basic_percentage']:''?>"></th>
						                <th class="text-center">
						                	<input type="checkbox" name="basic_ded_applies" value="Y" <?php echo isset($plan['basic_ded_applies']) && $plan['basic_ded_applies']=='Y'?'checked':'' ?>>
						                </th>
						                 <th><select class="form-control" name="basic_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['basic_waitingperiod']) && $plan['endodontics_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						                
					                 	<th>Major</th>
						               	<th><input type="text" name="major_percentage" class="form-control" value="<?php echo isset($plan['major_percentage'])?$plan['major_percentage']:''?>"></th>
						               	<th class="text-center">
						               		<input type="checkbox" name="major_ded_applies" value="Y" <?php echo isset($plan['major_ded_applies']) && $plan['major_ded_applies']=='Y'?'checked':'' ?>>
						               	</th>
						               	 <th><select class="form-control" name="major_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['major_waitingperiod']) && $plan['major_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
						               	
						               	<th>Perio Maintenance</th>
						               	<th><input type="text" name="periomaint_percentage" class="form-control" value="<?php echo isset($plan['periomaint_percentage'])?$plan['periomaint_percentage']:''?>"></th>
						               	<th class="text-center">
						               		<input type="checkbox" name="perio_maintenance_ded_applies" value="Y" <?php echo isset($plan['perio_maintenance_ded_applies']) && $plan['perio_maintenance_ded_applies']=='Y'?'checked':'' ?>>
						               	</th>
						               	 <th><select class="form-control" name="periomaint_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['periomaint_waitingperiod']) && $plan['periomaint_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th> 	
					                </tr>
					                <tr>
					                	<th>Restorative Posterior</th>
						                <th><input type="text" name="restorative_post_percentage" class="form-control" value="<?php echo isset($plan['restorative_post_percentage'])?$plan['restorative_post_percentage']:''?>"></th>
						                <th class="text-center"><input type="checkbox" name="restorative_post_ded_applies" value="Y" <?php echo isset($plan['restorative_post_ded_applies']) && $plan['restorative_post_ded_applies']=='Y'?'checked':'' ?>></th>
						                 <th><select class="form-control" name="restorative_post_waitingperiod">
							                	<?php for ($i=0; $i < 25 ; $i++) { ?>
							                		<option value="<?php echo $i?>" <?php echo isset($plan['restorative_post_waitingperiod']) && $plan['restorative_post_waitingperiod']==$i?'selected':''?>><?php echo $i==0?'None':$i;?></option>
							                	<?php } ?>
							                </select>
							            </th>
					                </tr>
					            </table>
<!-- 					             <table class="table table-bordered disabled-input">
					                <tr>
					                <th colspan="4" class="text-center">Deduction Applies To</th>
					                </tr>
					                <tr>
						                <th>Preventive</th>
						                <th><input type="checkbox" name="preventive_deduction_applies" value="Y" <?php echo isset($plan['preventive_deduction_applies']) && $plan['preventive_deduction_applies']=='Y'?'checked':'' ?>></th>
						                 <th>Maxillofacial Prosthetics</th>
					                	<th><input type="checkbox" name="maxillofacialprosthetics_ded_applies" value="Y" <?php echo isset($plan['maxillofacialprosthetics_ded_applies']) && $plan['maxillofacialprosthetics_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					               
					                <tr>
						               	<th>Diagnostics</th>
						                <th><input type="checkbox" name="diagnostic_deduction_applies" value="Y" <?php echo isset($plan['diagnostic_deduction_applies']) && $plan['diagnostic_deduction_applies']=='Y'?'checked':'' ?>></th>
						                
						                <th>Implants</th>
						                <th><input type="checkbox" name="implants_ded_applies" value="Y" <?php echo isset($plan['implants_ded_applies']) && $plan['implants_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                <tr>
						                <th>Restorative Anterior</th>
						                <th><input type="checkbox" name="restorative_ant_ded_applies" value="Y" <?php echo isset($plan['restorative_ant_ded_applies']) && $plan['restorative_ant_ded_applies']=='Y'?'checked':'' ?>></th>
					                	<th>Prosthodontics Fixed</th>
						                <th><input type="checkbox" name="prosthodontics_fixed_ded_applies" value="Y" <?php echo isset($plan['prosthodontics_fixed_ded_applies']) && $plan['prosthodontics_fixed_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                <tr>
						                <th>Endodontic</th>
						                <th><input type="checkbox" name="endodontic_deduction_applies" value="Y" <?php echo isset($plan['endodontic_deduction_applies']) && $plan['endodontic_deduction_applies']=='Y'?'checked':'' ?>></th>
						                <th>Oral Surgery</th>
						                <th><input type="checkbox" name="oralsurgery_ded_applies" value="Y" <?php echo isset($plan['oralsurgery_ded_applies']) && $plan['oralsurgery_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                <tr>
						                <th>Periodontics</th>
						                <th><input type="checkbox" name="periodontics_deduction_applies" value="Y" <?php echo isset($plan['periodontics_deduction_applies']) && $plan['periodontics_deduction_applies']=='Y'?'checked':'' ?>></th>
						                <th>Orthodontics</th>
						                <th><input type="checkbox" name="orthodontics_deduction_applies" value="Y" <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                 <tr>
						                <th>Prosthodontics Removable</th>
						                <th><input type="checkbox" name="prosthodonticsremovable_ded_applies" value="Y" <?php echo isset($plan['prosthodonticsremovable_ded_applies']) && $plan['prosthodonticsremovable_ded_applies']=='Y'?'checked':'' ?>></th>
						                <th>Adjunctivegen Services</th>
						                <th><input type="checkbox" name="adjunctivegenservices_ded_applies" value="Y" <?php echo isset($plan['adjunctivegenservices_ded_applies']) && $plan['adjunctivegenservices_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                 <tr>
						                <th>Basic</th>
						                <th><input type="checkbox" name="basic_ded_applies" value="Y" <?php echo isset($plan['basic_ded_applies']) && $plan['basic_ded_applies']=='Y'?'checked':'' ?>></th>
						                <th>Major</th>
						                <th><input type="checkbox" name="major_ded_applies" value="Y" <?php echo isset($plan['major_ded_applies']) && $plan['major_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					                <tr>
						                <th>Perio Maintenance</th>
						                <th><input type="checkbox" name="perio_maintenance_ded_applies" value="Y" <?php echo isset($plan['perio_maintenance_ded_applies']) && $plan['perio_maintenance_ded_applies']=='Y'?'checked':'' ?>></th>
						                <th>Restorative Posterior</th>
						                <th><input type="checkbox" name="restorative_post_ded_applies" value="Y" <?php echo isset($plan['restorative_post_ded_applies']) && $plan['restorative_post_ded_applies']=='Y'?'checked':'' ?>></th>
					                </tr>
					            </table> -->
					            <table class="table table-bordered disabled-input">
					                <tr>
					                <th>Allowed Frequency</th>
					                <th class="text-center">Calendar</th>
					                <th class="text-center"><input type="radio" name="allowed_frequency" class="" value="1" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==1?'checked':'' ?> onclick='changeAllowed(this)' ></th>
					                <th class="text-center">Continous</th>
					                <th class="text-center"><input type="radio" name="allowed_frequency" class="" value="2" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==2?'checked':'' ?> onclick='changeAllowed(this)'></th>
					                <th class="text-center">Plan</th>
					                <th class="text-center"><input type="radio" name="allowed_frequency" class="" value="3" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==3?'checked':'' ?> onclick='changeAllowed(this)'></th>
					                </tr>
					            </table>
					             <table class="table table-bordered disabled-input">
					              <tr>
					                <th colspan="">Code</th>
					                <th>Description</th>
					                <th>Up to Age</th>
					                <th colspan="4">Allowed Frequency</th>
					                <th>Insurance Covers</th>
					                <th></th>
					                </tr>
					                <tr>
					                <?php
					                $single=array();
					                $allowed_frequency_months='';
					                if (isset($plan['allowed_frequency']) && $plan['allowed_frequency']==1) {
					                	$allowed_frequency_months='Calendar Months';
					                }else if (isset($plan['allowed_frequency']) && $plan['allowed_frequency']==2) {
					                	$allowed_frequency_months='Continous Months';
					                }else if(isset($plan['allowed_frequency']) && $plan['allowed_frequency']==3){
					                	$allowed_frequency_months='Plan Months';
					                }


					                foreach ($insurancePlans as $key => $value) {
					                	if ($value['cdtid'] == 1208 || $value['cdtid']==1351) {
					                		$single[$value['cdtid']]=array(
					                		'to_age'=>$value['to_age'],
					                		'allowed_frequency'=>$value['allowed_frequency'],
					                		'allowed_frequency_months'=>$allowed_frequency_months,
					                		'coverage_percentage'=>$percentage[$value['treatmenttypeid']],
					                		'allowed_frequency_duration_single'=>$value['allowed_frequency_duration'],
					                		'waiting'=>$value['waiting'],
					                		'treatmenttypeid'=>$value['treatmenttypeid']

					                		);
					                	}
					                }
					                ?>
					                <tr>
					                <th>D1208<input type="hidden" name="cdt_codes_id_single[]" value="1208"></th>
					                <th>Topical Application of Fluoride</th>
					                <th style="width: 8%">
					                	<input type="text" name="to_age_single[]" class="form-control" value="<?php echo isset($single[1208]['to_age'])?$single[1208]['to_age']:''?>">
					                </th>
					                <th style="width: 4%"><input type="text" name="allowed_frequency_single[]" class="form-control" value="<?php echo isset($single[1208]['allowed_frequency'])?$single[1208]['allowed_frequency']:''?>"></th>
					                <th>Times in</th>
					                <th style="width: 4%"><input type="text" name="allowed_frequency_duration_single[]" class="form-control"  value="<?php echo isset($single[1208]['allowed_frequency_duration_single'])?$single[1208]['allowed_frequency_duration_single']:''?>"></th>
					                <th>
					                	<input type="text" name="allowed_frequency_months_single[]" class="allowed_frequency_months_new form-control" readonly="" value="<?php echo isset($single[1208]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>">
					                	<!-- <select class="form-control" name="allowed_frequency_months_single[]">
					                	<option value="1" <?php echo isset($single[1208]['allowed_frequency_months']) && $single[1208]['allowed_frequency_months']==1?'selected':''?>>Month</option>
					                	<option value="12" <?php echo isset($single[1208]['allowed_frequency_months']) && $single[1208]['allowed_frequency_months']==12?'selected':''?>>Year</option>
					                </select> -->
					            	</th>
					                <th style="width: 7%">
					                	 <!-- <select class="form-control" name="coverage_percentage_single[]">
					                		<option value="0" <?php echo isset($single[1208]['coverage_percentage']) && $single[1208]['coverage_percentage']==0?'selected':''; ?>>0</option>
					                		<option value="60" <?php echo isset($single[1208]['coverage_percentage']) && $single[1208]['coverage_percentage']==60?'selected':''; ?>>60</option>
					                		<option value="70" <?php echo isset($single[1208]['coverage_percentage']) && $single[1208]['coverage_percentage']==70?'selected':''; ?>>70</option>
					                		<option value="80" <?php echo isset($single[1208]['coverage_percentage']) && $single[1208]['coverage_percentage']==80?'selected':''; ?>>80</option>
					                		<option value="100" <?php echo isset($single[1208]['coverage_percentage']) && $single[1208]['coverage_percentage']==100?'selected':''; ?>>100</option>
								        </select> -->
					                	<input type="text" name="coverage_percentage_single[]" class="form-control" value="<?php echo isset($single[1208]['coverage_percentage'])?$single[1208]['coverage_percentage']:''?>">
					                </th>
					               <!--  <th><input type="text" name="waiting_single[]" class="form-control" value="<?php echo isset($single[1208]['waiting'])?$single[1208]['waiting']:''?>"></th> -->
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>D1351 <input type="hidden" name="cdt_codes_id_single[]" value="1351"></th>
					                <th>Sealant per tooth</th>
					                <th>
					                	<input type="text" name="to_age_single[]" class="form-control" value="<?php echo isset($single[1351]['to_age'])?$single[1351]['to_age']:''?>">
					                </th>
					                <th><input type="text" name="allowed_frequency_single[]" class="form-control" value="<?php echo isset($single[1351]['allowed_frequency'])?$single[1351]['allowed_frequency']:''?>"></th>
					                 <th>Times in</th>
					                <th><input type="text" name="allowed_frequency_duration_single[]" class="form-control"  value="<?php echo isset($single[1351]['allowed_frequency_duration_single'])?$single[1351]['allowed_frequency_duration_single']:''?>"></th>
					                <th>
					                	<input type="text" name="allowed_frequency_months_single[]" class="allowed_frequency_months_new form-control" readonly="" value="<?php echo isset($single[1351]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>">
					                	<!-- <select class="form-control" name="allowed_frequency_months_single[]">
						                	<option value="1" <?php echo isset($single[1351]['allowed_frequency_months']) && $single[1351]['allowed_frequency_months']==1?'selected':''?>>Month</option>
						                	<option value="12" <?php echo isset($single[1351]['allowed_frequency_months']) && $single[1351]['allowed_frequency_months']==12?'selected':''?>>Year</option>
					                	</select> -->
					            	</th>
					                <th style="width: 7%">
					                	 <!-- <select class="form-control" name="coverage_percentage_single[]">
					                		<option value="0" <?php echo isset($single[1351]['coverage_percentage']) && $single[1351]['coverage_percentage']==0?'selected':''; ?>>0</option>
					                		<option value="60" <?php echo isset($single[1351]['coverage_percentage']) && $single[1351]['coverage_percentage']==60?'selected':''; ?>>60</option>
					                		<option value="70" <?php echo isset($single[1351]['coverage_percentage']) && $single[1351]['coverage_percentage']==70?'selected':''; ?>>70</option>
					                		<option value="80" <?php echo isset($single[1351]['coverage_percentage']) && $single[1351]['coverage_percentage']==80?'selected':''; ?>>80</option>
					                		<option value="100" <?php echo isset($single[1351]['coverage_percentage']) && $single[1351]['coverage_percentage']==100?'selected':''; ?>>100</option>
								        </select> -->
					                	<input type="text" name="coverage_percentage_single[]" class="form-control" value="<?php echo isset($single[1351]['coverage_percentage'])?$single[1351]['coverage_percentage']:''?>">
					                </th>
					              <!--   <th><input type="text" name="waiting_single[]" class="form-control" value="<?php echo isset($single[1208]['waiting'])?$single[1208]['waiting']:''?>"></th> -->
					                <th>%</th>
					                </tr>
					            </table>
					            <table class="table table-bordered disabled-input">
					                <tr>
					               <!--  <th>Code</th> -->
					                <th>Cdt Groups</th>
					                <th colspan="3">Allowed Frequency</th>
					                <th style="width: 13%;"></th>
					                <th colspan="1">Insurance Covers</th>
					                <th>Waiting Period</th>
<!-- 					                <td></td>
 -->					                </tr>
					                <?php
					                
					                 foreach ($cdt_codes as $cdtcodes) {
					                 	if ($cdtcodes['cdtgroups'] !='') {
					                  ?>
					                	<tr class="">
					                		<input type="hidden" name="cdtid[]" value="<?php echo $cdtcodes['cdtid'];?>">
					                		<input type="hidden" name="cdtgroups[]" value="<?php echo $cdtcodes['cdtgroups'];?>">
					                		<input type="hidden" name="coverage_percentage[]" value="<?php echo isset($percentage[$cdtcodes['treatmenttypeid']])?$percentage[$cdtcodes['treatmenttypeid']]:0;?>">
					                		<input type="hidden" name="waiting[]" value="<?php echo isset($waitingPeriod[$cdtcodes['treatmenttypeid']])?$waitingPeriod[$cdtcodes['treatmenttypeid']]:0;?>">
							                <th  class="" ><?php echo $cdtcodes['cdtgroups']; ?></th>
							                <th style="width: 10%"><input type="text" name="code_allowed_frequency_plan[]" class="form-control" value="<?php echo isset($insurancePlans[$cdtcodes['cdtid']]['allowed_frequency'])?$insurancePlans[$cdtcodes['cdtid']]['allowed_frequency']:0?>"></th>
 							                <th>Times in</th>
							                <th style="width: 10%"><input type="text" name="allowed_frequency_duration[]" class="form-control"  value="<?php echo isset($insurancePlans[$cdtcodes['cdtid']]['allowed_frequency_duration'])?$insurancePlans[$cdtcodes['cdtid']]['allowed_frequency_duration']:0?>"></th>
 							                <th style="width: 70px;">
							                	<input type="text" name="allowed_frequency_months[]" class="form-control allowed_frequency_months_new" value="<?php echo $allowed_frequency_months;?>" readonly>
<!-- 							               
 -->							            	</th>
							                <th style="width: 7%">
							                	<?php echo isset($percentage[$cdtcodes['treatmenttypeid']])?$percentage[$cdtcodes['treatmenttypeid']]:0;?>%
							                </th>
							                <th style="width: 7%">
							                	<?php echo isset($waitingPeriod[$cdtcodes['treatmenttypeid']])?$waitingPeriod[$cdtcodes['treatmenttypeid']]:0;?>
							                </th>
						                </tr>
					                <?php }
					                	}
					                 ?>
					                <?php if(False){ ?>
					                <tbody>
					                <?php for ($i=0; $i < count($office_cdtcodes) ; $i++) { ?>
						                <tr class="cdtcodes tr_clone">
							                <th style="width: 84px;">
							                	<select class="form-control" name="cdt_codes_id[]" onchange="CdtCodesid(this)">
							                	   <option value="0">Please Select</option>
					                            <?php foreach ($cdt_codes as $cdtcodes) { ?>
						                                <option value="<?php echo $cdtcodes['cdtid'];?>" data-desc='<?php echo $cdtcodes['cdt_codes_short'];?>' data-treatmenttypeid='<?php echo $cdtcodes['treatmenttypeid'];?>' <?php echo $cdtcodes['cdtid']==$office_cdtcodes[$i]['cdtid']?'selected':'' ?> ><?php echo $cdtcodes['cdt_codes'];?>
						                                </option>
					                            <?php } ?>
				                        		</select>
				                        	</th>
							                <th class="cdtid_desc" >None</th>
							                <th style="width: 4%"><input type="text" name="code_allowed_frequency_plan[]" class="form-control"></th>
							                <th>Times in</th>
							                <th style="width: 4%"><input type="text" name="allowed_frequency_duration[]" class="form-control"></th>
							                <th style="width: 70px;">
							                	<input type="text" name="allowed_frequency_months[]" class="form-control allowed_frequency_months_new" value="<?php echo $allowed_frequency_months;?>"  readonly>
							            	</th>
							                <th style="width: 4%">
							                	<!-- <select class="form-control coverage_percentage" name="coverage_percentage[]">
							                		<option value="0">0</option>
							                		<option value="50">50</option>
							                		<option value="60">60</option>
							                		<option value="70">70</option>
							                		<option value="80">80</option>
							                		<option value="90">90</option>
							                		<option value="100">100</option>
							                	</select> -->
							                	<input type="text" name="coverage_percentage[]" class="form-control coverage_percentage">
							                </th>
							                <th>%</th>
							                <th>
							                	<select class="form-control" name="waiting[]">
							                		<option value="0">None</option>
							                		<option value="1">1</option>
							                		<option value="2">2</option>
							                		<option value="3">3</option>
							                		<option value="4">4</option>
							                		<option value="5">5</option>
							                		<option value="6">6</option>
							                		<option value="7">7</option>
							                		<option value="8">8</option>
							                		<option value="9">9</option>
							                		<option value="10">10</option>
							                		<option value="11">11</option>
							                		<option value="12">12</option>
							                		<option value="13">13</option>
							                		<option value="14">14</option>
							                		<option value="15">15</option>
							                		<option value="16">16</option>
							                		<option value="17">17</option>
							                		<option value="18">18</option>
							                		<option value="19">19</option>
							                		<option value="20">20</option>
							                		<option value="21">21</option>
							                		<option value="22">22</option>
							                		<option value="23">23</option>
							                		<option value="24">24</option>
							                	</select>
							                </th>
					                <?php } ?>
					               
						                <th class="add-remove-action text-center" width="50"><i class="material-icons mt-2 text-danger delete-row" data-toggle="tooltip" title="" style="cursor: pointer; display: none;" data-original-title="Delete">do_not_disturb_on</i><i class="material-icons mt-2 text-primary add-row" data-toggle="tooltip" title="" style="cursor: pointer;" data-original-title="Add" onclick="addRow(this)">add_circle</i></th>
						                <div id="add-row"></div>
						              </tr>
						            </tbody>
						        <?php } ?>
					            </table>
					             <?php
					                $shares=array();
					                foreach ($insurancePlans as $key => $value) {
					                	if ($value['cdtid'] == 140 || $value['cdtid']==4910) {
					                		$shares[$value['cdtid']]=array(
					                		'shares_freq_limit_exam'=>$value['shares_frequency'],
					                		'shares_freq_perio_maint'=>$value['shares_frequency'],
					                		);
					                	}
					                }
					                ?>
					            <div class="row">
					            	<div class="col-md-6">
					            			<table class="table table-bordered disabled-input">
							                <tr>
							                <th colspan="5" class="text-center">Downgrades</th>
							                </tr>
							                <tr>
							                <th>Fillings</th>
							                <th class="text-center">Y</th>
							                <th class="text-center"><input type="radio" class="text-center" name="filling_downgrades" value="Y" <?php echo isset($plan['filling_downgrades']) && $plan['filling_downgrades']=='Y'?'checked':'' ?>></th>
							                <th class="text-center">N</th>
							                <th class="text-center"><input type="radio" class="text-center" name="filling_downgrades" value="N" <?php echo isset($plan['filling_downgrades']) && $plan['filling_downgrades']=='N'?'checked':'' ?>></th>
							                </tr>
							                <tr>
							                <th>Crown Molar Downgrades</th>
							                <th class="text-center">Y</th>
							                <th class="text-center"><input type="radio" class="text-center" name="crown_molar_downgrades" value="Y" <?php echo isset($plan['crown_molar_downgrades']) && $plan['crown_molar_downgrades']=='Y'?'checked':'' ?>></th>
							                <th class="text-center">N</th>
							                <th class="text-center"><input type="radio" class="text-center" name="crown_molar_downgrades" value="N" <?php echo isset($plan['crown_molar_downgrades']) && $plan['crown_molar_downgrades']=='N'?'checked':'' ?>></th>
							                </tr>
							                <tr>
							                <th>Crown Premolar Downgrades</th>
							                <th class="text-center">Y</th>
							                <th class="text-center"><input type="radio" class="text-center" name="crown_premolar_downgrades" value="Y" <?php echo isset($plan['crown_premolar_downgrades']) && $plan['crown_premolar_downgrades']=='Y'?'checked':'' ?>></th>
							                <th class="text-center">N</th>
							                <th class="text-center"><input type="radio" class="text-center" name="crown_premolar_downgrades" value="N" <?php echo isset($plan['crown_premolar_downgrades']) && $plan['crown_premolar_downgrades']=='N'?'checked':'' ?>></th>
							                </tr>
							            </table>
					            	</div> 
					            	<div class="col-md-6">
					            		<table class="table table-bordered disabled-input">
							                <tr>
							                <th colspan="6" class="text-center">Shares Frequency</th>
							                </tr>
							                <tr>
							                <th>D0140 <input type="hidden" name="shares_cdtid[]" value="140"></th>
							                <th>Limited oral evaluation – problem focused</th>
							                <th class="text-center">Y</th>
							                <th class="text-center"><input type="radio" name="shares_freq_limit_exam" class="" value="1" <?php echo isset($shares[140]['shares_freq_limit_exam']) && $shares[140]['shares_freq_limit_exam']==1?'checked':'' ?>></th>
							                <th class="text-center">N</th>
							                <th class="text-center"><input type="radio" name="shares_freq_limit_exam" class="" value="0" <?php echo isset($shares[140]['shares_freq_limit_exam']) && $shares[140]['shares_freq_limit_exam']==0?'checked':'' ?>></th>
							                </tr>
							                <tr>
							                <th>D4910 <input type="hidden" name="shares_cdtid[]" value="4910"></th>
							                <th>Periodontal maintenance procedures</th>
							                <th class="text-center">Y</th>
							                <th class="text-center"><input type="radio" name="shares_freq_perio_maint" class="" value="1" <?php echo isset($shares[4910]['shares_freq_perio_maint']) && $shares[4910]['shares_freq_perio_maint']==1?'checked':'' ?>></th>
							                <th class="text-center">N</th>
							                <th class="text-center"><input type="radio" name="shares_freq_perio_maint" class="" value="0" <?php echo isset($shares[4910]['shares_freq_perio_maint']) && $shares[4910]['shares_freq_perio_maint']==0?'checked':'' ?>></th>
							                </tr>
							                <tr>
							                	<th colspan="6" style="color: #F5F6FA">None</th>
							                </tr>
							            </table>
					            	</div>
					            </div>
					            
					           
					             <div class="row">
					             	<div class="col-md-6">
					             		<table class="table table-bordered disabled-input">
							                <tr>
							                <th colspan="6" class="text-center">Orthodontics</th>
							                </tr>
							                <tr>
							                <th>Lifetime max</th>
							                <th style="width: 15%">
							                	 <input type="text" name="orthodontics_lifetime_max" class="form-control" value="<?php echo isset($plan['orthodontics_lifetime_max'])?$plan['orthodontics_lifetime_max']:''?>">

							                </th>
							                <th>Age Limit</th>
							                <th style="width: 15%">
							                	<input type="text" name="orthodontics_agelimit" class="form-control" value="<?php echo isset($plan['orthodontics_agelimit'])?$plan['orthodontics_agelimit']:''?>">
							                </th>
							               <!--  <th>Deduction Applies</th>
							                <th style="width: 14%"><select class="form-control" name="orthodontics_deduction_applies">
							                	<option value="N" <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='N'?'selected':''?>>N</option>
							                	<option value="Y" <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='Y'?'selected':''?>>Yes</option>
							                </select></th> -->
							                </tr>
							                  <tr>
							                	<th colspan="6" style="color: #F5F6FA">None</th>
							                </tr>
							            </table>
					             	</div>
					             	<div class="col-md-6">
					             		<table class="table table-bordered disabled-input">
							                <tr>
							                <th colspan="5" class="text-center">Payment</th>
							                </tr>
							                <tr>
							                <th>Crown</th>
							                <th class="text-center">Preparation</th>
							                <th class="text-center"><input type="radio" name="crown_payment" class="" value="P" <?php echo isset($plan['crown_payment']) && $plan['crown_payment']=='P'?'checked':'' ?>></th>
							                <th class="text-center">Seating</th>
							                <th class="text-center"><input type="radio" name="crown_payment" class="" value="S" <?php echo isset($plan['crown_payment']) && $plan['crown_payment']=='S'?'checked':'' ?>></th>
							                </tr>
							                <tr>
							                <th>Orthodontics</th>
							                <th colspan="4">
							                	<select class="form-control" name="orthodontics_payment">
							                		<option value="1" <?php echo isset($plan['orthodontics_payment']) && $plan['orthodontics_payment']==1?'selected':''?>>Monthly</option>
							                		<option value="2" <?php echo isset($plan['orthodontics_payment']) && $plan['orthodontics_payment']==2?'selected':''?>>Quarterly</option>
							                	</select>
							                </tr>
							            </table>
					             	</div>
					             </div>
					             
					            
					        </div>
					    </div>  
					    <br>
					    
					    <div class="row">
					    	<div class="col-md-6">
					    		<table class="table table-bordered disabled-input">
					    			<tr>
					    				<th></th>
					    				<th>Name</th>
						            	<th>Date</th>
					    			</tr>
						            <tr>
						                <th>
						                    Verified By:
						                </th>
						                <th><input type="text" name="" class="form-control" value="<?php echo isset($users[$patient['updatedby']])?$users[$patient['updatedby']]:''?>" readonly=""></th>
						                <th><input type="text" name="" class="form-control" value="<?php echo $patient['lastupdate']?>" readonly=""></th>
						            </tr>
					        	</table>
					    	</div>
					    	<div class="col-md-6">
					    		 <?php if(!empty($agent)){ ?>
						        <table class="table table-bordered disabled-input">
						        	 <tr>
						                <th></th>
						                <th>Agent Name</th>
						                <th>Agent Id</th>
						                <th>Entered By</th>
						                <th>Entered Date</th>
						                <td></td>
						                </tr>
							            <tr>
						                <th>
						                    Insurance Agent:
						                </th>
						                <th><input type="text" name="" class="form-control" value="<?php echo isset($agent['insurance_agentname'])?$agent['insurance_agentname']:''?>" readonly=""></th>
						                <th><input type="text" name="" class="form-control" value="<?php echo isset($agent['insurance_agentid'])?$agent['insurance_agentid']:''?>" readonly=""></th>
						                <th><input type="text" name="" class="form-control" value="<?php echo isset($users[$agent['createdby']])?$users[$agent['createdby']]:''?>" readonly=""></th>
						                <th><input type="text" name="" class="form-control" value="<?php echo isset($agent['createdon'])?$agent['createdon']:''?>" readonly=""></th>
						            </tr>
						        </table>
						<?php } ?>
					    	</div>
					        
					    </div>
					   
					</div>
		        </div>
		        <div class="row">
			  		<div class="col-12">
			  			<div class="form-group">
				            <button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Save</button>
			    			<a href="<?php echo WEB_URL.'dashboard/index';?>" class="btn pl-3 pr-3 btn-danger">Return to the Dashboard</a>
				        </div>
			  		</div>
		        </div>
		    </div>
	  	</div>
	<?php echo form_close();?>
</div>
<div class="modal fade" id="myModal_pop" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" >
			<div class="card-header">
		      <div class="row">
		        <!-- div class="col-12">
		          <h6 class="text-primary m-0" style="font-size: 12px;color: green!important">Insurance plan was last updated by user on date</h6>
		        </div> -->
		      </div>
		    </div>
			<div class="modal-body">
				<p>Insurance Plan was last verified by <?php echo isset($users[isset($plan['updatedby'])?$plan['updatedby']:0])?$users[$plan['updatedby']]:'None'?> On <?php echo isset($plan['updatedon'])?$plan['updatedon']:'None' ?></p>
		    </div>
		    <div class="modal-footer">
	        	 <a class="btn pl-3 pr-3 btn-danger" class="btn btn-default" data-dismiss="modal" aria-label="Close">Close</a>
    		</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
<script type="text/javascript">
   $(window).on('load', function() {
       $('#myModal_pop').modal('show');
    });
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
</script>

<script>
	$( function() {
    $('.datepicker').datepicker({
    	 format: 'mm/dd/yyyy',
    });

  } );


	function CdtCodesid(e)
	{
		var id=$(e).val();
		var desc=$(e).find(':selected').attr('data-desc');
		var treatmenttypeid=$(e).find(':selected').attr('data-treatmenttypeid');
		if (treatmenttypeid==1) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[1])?$percentage[1]:'0'?>");
		}
		if (treatmenttypeid==2) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[2])?$percentage[2]:'0'?>");
		}
		if (treatmenttypeid==3) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[3])?$percentage[3]:'0'?>");
		}
		if (treatmenttypeid==4) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[4])?$percentage[4]:'0'?>");
		}
		if (treatmenttypeid==5) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[5])?$percentage[5]:'0'?>");
		}
		if (treatmenttypeid==6) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[6])?$percentage[6]:'0'?>");
		}
		if (treatmenttypeid==7) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[7])?$percentage[7]:'0'?>");
		}
		if (treatmenttypeid==8) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[8])?$percentage[8]:'0'?>");
		}
		if (treatmenttypeid==9) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[9])?$percentage[9]:'0'?>");
		}
		if (treatmenttypeid==10) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[10])?$percentage[10]:'0'?>");
		}
		if (treatmenttypeid==11) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[11])?$percentage[11]:'0'?>");
		}
		if (treatmenttypeid==12) {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val("<?php echo isset($percentage[12])?$percentage[12]:'0'?>");
		}
		if (treatmenttypeid=='') {
			$(e).closest('.cdtcodes').find('.coverage_percentage').val(0);
		}

		var test=$(e).closest('.cdtcodes').find('.cdtid_desc').html(desc);

		if (id==140) {
			var test=$(e).closest('.cdtcodes').find('.coverage_percentage').attr("readonly", "readonly"); 
		}

	}

	function CdtCodesidUpdate(e,id)
	{	
		var desc=$(e).find(':selected').attr('data-desc-update');
		var test=$(e).closest('.cdtcodes-update').find('.cdtid_desc_update'+id).html(desc);

		if (id==140) {
			var test=$(e).closest('.cdtcodes-update').find('.coverage_percentage'+id).attr("readonly", "readonly"); 
		}
		var treatmenttypeid=$(e).find(':selected').attr('data-treatmenttypeid');
		console.log(treatmenttypeid);
		if (treatmenttypeid==2) {
			$(e).closest('.cdtcodes-update').find('.coverage_percentage'+id).val(100);
			$(e).closest('.cdtcodes-update').find('.coverage_percentage'+id).removeAttr("readonly");
		}
	}

	function addRow(e)
	{	
		var $tr    = $(e).closest('.tr_clone');
		var $clone = $tr.clone();
		$clone.find(':text').val('');
		$clone.find('.cdtid_desc ').html('None');
		console.log($clone);
		$tr.after($clone);
	}

	function changeAllowed(e)
	{
		var id = $(e).val();
		console.log(id);
		if (id==1) 
		{
			$('.allowed_frequency_months_new').val('Calendar Months');

		}else if(id==2)
		{
			$('.allowed_frequency_months_new').val('Continous Months');

		}else if(id==3)
		{
			$('.allowed_frequency_months_new').val('Plan Months');
		}
	}

	function coveragePercentageNew(e)
	{
		// var value=$(e).val()
		// if (value=='00') {
		// 	$(e).hide();
		// 	$(e).closest('.cdtcodes-update').find('.coverage_percentage_hide').show();
		// }
		
		// if (value=='00') {
		// 	$(e).hide();
		// 	$(e).closest('.cdtcodes').find('.coverage_percentage_hide').show();
		// }
	}

	function coveragePercentage(e)
	{

	}

	function addInsurance(e)
	{
		var weburl = $('meta[name="weburl"]').attr('content');
		var plansid = $('#insurance_plans_id').val()
		var patientid = $('#patientid').val();
		$.get(weburl + 'dashboard/addInsurance?plansid='+plansid+'&patientid='+patientid, function (d) {
			console.log(d);
			$('#ajx_content').html(d);
			$('#myModal').modal('show');
		});
	}

	function employerId(e)
	{
		var employerId= $(e).val();
		var plan_employer= '<?php echo isset($plan['insurance_id'])?$plan['insurance_id']:0?>';
		var weburl = $('meta[name="weburl"]').attr('content');
		$.get(weburl + 'dashboard/getInsurance?employerId='+employerId+'&selected='+plan_employer, function (d) {
			$('#insurance-dropdown').html(d);

			// $('#ajx_content').html(d);
			// $('#myModal').modal('show');
		});
		
	}

	function insuranceId(e)
	{
		var insurance= $(e).val();
		var employerid= $('#employerid').val();
		var plan_insuranceId= '<?php echo isset($plan['insurance_plans_id'])?$plan['insurance_plans_id']:0?>';
		var weburl = $('meta[name="weburl"]').attr('content');
		$.get(weburl + 'dashboard/getPlans?insurance_id='+insurance+'&selected='+plan_insuranceId+'&employerid='+employerid, function (d) {
			$('#plans-id').html(d);
		});
	}

	function predeterminationNeeded(e)
	{	
		if (e==1) {
			$("#predetermination-req").attr("readonly", "readonly"); 
		}else{
			 $("#predetermination-req").removeAttr("readonly");
		}
	}

	function changePlansid(e)
	{
	
		var weburl = $('meta[name="weburl"]').attr('content');
		var plansid = $(e).val();
		var patientid = $('#patientid').val();
		var selected = "<?php echo isset($_GET['plansid'])?$_GET['plansid']:'';?>";

		if (plansid != selected) {
			window.location.href = weburl+'dashboard/editpatient?id='+patientid+'&plansid='+plansid;
		}
	}

	function addRowHistory(e)
	{
		var $tr    = $(e).closest('.tr_clone_histroy');
		var $clone = $tr.clone();
		console.log($clone);
		$tr.after($clone);

	}

	function waitingNew(e)
	{
		// var id= $(e).val();
		// $(e).html('hii');

	}

	function copyPatientForm(e)
    {
        if($("#checkbox").prop('checked') == true){
            var first_name= $('.p_firstname').val();
            var last_name = $('.p_lastname').val();
            var dob = $('.p_dob').val();
            $('.s_firstname').val(first_name);
            $('.s_lastname').val(last_name);
            $('.s_dob').val(dob);
        }else{
             $('.s_firstname').val('');
            $('.s_lastname').val('');
            $('.s_dob').val('');
        }
    }


function insuranceBenefits(e)
{
	var type= $(e).val();
	if (type=='calendar') {
		var date= $('#current_year').val();
		$('.effective_date').val(date);
		$(".effective_date").attr("readonly", "readonly"); 
	}else{
		$(".effective_date").removeAttr("readonly");
	}
}

</script>



