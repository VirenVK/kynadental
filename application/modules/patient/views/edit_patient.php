<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
	<?php echo form_open(WEB_URL.'patient/editpatient?id='.$patient['patientid']);?>
	  	<div class="card shadow mb-4 valid-form">
		    <div class="card-header">
		      <div class="row">
		        <div class="col-md-6 col-sm-12">
		          <h6 class="font-weight-bold text-primary"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		        </div>
		        <div class="col-md-6 col-sm-12 text-right">
		          <a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'patient/allpatient';?>">Back</a>
		        </div>
		      </div>
		    </div>
		    <?php $this->load->view('theme/message_view');?>
		    <div class="card-body">
		        <div class="row">
					<div class="container-fluid">
					    <div class="row mb-3">
					        <div class="col-12">
					            <h2 class="font-weight-bold text-dark text-center">NORWALK DENTAL CARE </h2>
					        </div>
					        <div class="col-12">
					            <h4 class="font-weight-bold text-dark text-center"> BENEFITS BREAKDOWN </h4>
					            <hr>
					        </div>
					    </div>
					    <div class="row">
					        <div class="col-md-6 col-sm-12">
					            <table class="table table-bordered">
					                <tr>
					                <input type="hidden" name="patientid" value="<?php echo $patient['patientid'];?>">
					                <th>Patient Name</th>
					                <th><input type="text" name="p_firstname" class="form-control" value="<?php echo $patient['p_firstname']?>"></th>
					                <th><input type="text" name="p_lastname" class="form-control" value="<?php echo $patient['p_lastname']?>"></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><input type="text" name="p_dob" class="form-control" value="<?php echo $patient['p_dob']?>"></th>
					                </tr>
					                <tr>
					                <th>Subscriber's Name</th>
					                <th><input type="text" name="s_firstname" class="form-control" value="<?php echo $patient['s_firstname']?>"></th>
					                <th><input type="text" name="s_lastname" class="form-control" value="<?php echo $patient['s_lastname']?>"></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><input type="text" name="s_dob" class="form-control" value="<?php echo $patient['s_dob']?>"></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th>Insurance:</th>
					                <th>
					                	<select class="form-control" name="insurance_id">
				                            <?php foreach ($insurance as $iRow) { ?>
				                                <option value="<?php echo $iRow['insurance_id'];?>" <?php echo isset($patientInsurance['insurance_id']) && $patientInsurance['insurance_id']==$iRow['insurance_id']?'selected':''; ?>><?php echo $iRow['insurancename'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                 <tr>
					                <th>Group #:</th>   
					                <th>
					                	<select class="form-control" name="plansid">
				                            <?php foreach ($insurance_plans as $pRow) { ?>
				                                <option value="<?php echo $pRow['insurance_plans_id'];?>" <?php echo isset($patientInsurance['insurance_plans_id']) && $patientInsurance['insurance_plans_id']==$pRow['plansid']?'selected':''; ?>><?php echo $pRow['groupid'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                <tr>
					                <th>Employer:</th>   
					                <th>
					                	<select class="form-control" name="employerid">
				                            <?php foreach ($employers as $pRow) { ?>
				                                <option value="<?php echo $pRow['employerid'];?>" <?php echo isset($patientInsurance['employerid']) && $patientInsurance['employerid']==$pRow['employerid']?'selected':''; ?>><?php echo $pRow['employersname'];?></option>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                <tr>
					                <th>Member Id:</th>
					                <th><input type="text" name="memberid" class="form-control" value="<?php echo isset($patientInsurance['memberid'])?$patientInsurance['memberid']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Effective Date:</th>   
					                <th><input type="date" name="effective_date" class="form-control" value="<?php echo isset($patientInsurance['effective_date'])?$patientInsurance['effective_date']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Insurance Benefits</th>   
					                <th><input type="text" name="ins_benefit_remaining" class="form-control" class="form-control" value="<?php echo isset($patientInsurance['ins_benefit_remaining'])?$patientInsurance['ins_benefit_remaining']:''; ?>"></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="3" class="text-center">Insurance Benefits Details</th>
					                </tr>
					                <tr>
					                <th>Maximum</th>   
					                <th>$</th>
					                <th><input type="text" name="benefit_maximum" class="form-control" value="<?php echo isset($patientInsurance['benefit_maximum'])?$patientInsurance['benefit_maximum']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>
					                <th>$</th>
					                <th><input type="text" name="benefit_remaining" class="form-control" value="<?php echo isset($patientInsurance['benefit_remaining'])?$patientInsurance['benefit_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th colspan="3" class="text-center">Deductions</th>   
					                </tr>
					                <tr>
					                <th>Individual Deductions</th>   
					                <th>$</th>
					                <th><input type="text" name="individual_deductions" class="form-control" value="<?php echo isset($patientInsurance['ind_ded_remaining'])?$patientInsurance['ind_ded_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><input type="text" name="individual_remaining" class="form-control" value="<?php echo isset($patientInsurance['individual_remaining'])?$patientInsurance['individual_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Family Deduction</th>   
					                <th>$</th>
					                <th><input type="text" name="family_deduction" class="form-control" value="<?php echo isset($patientInsurance['family_ded_remaining'])?$patientInsurance['family_ded_remaining']:''; ?>"></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><input type="text" name="family_remaining" class="form-control" value="<?php echo isset($patientInsurance['family_remaining'])?$patientInsurance['family_remaining']:''; ?>"></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="4" class="text-center">Deduction Applies To</th>
					                </tr>
					                <tr>
					                <th>Preventive</th>
					                <th><input type="checkbox" name="applies_preventive" value="1" <?php echo isset($others['applies_preventive']) && $others['applies_preventive']==1?'checked':'' ?>></th>
					                <th>Diagnostics</th>
					                <th><input type="checkbox" name="applies_diagnostics" value="1" <?php echo isset($others['applies_diagnostics']) && $others['applies_diagnostics']==1?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Basic</th>
					                <th><input type="checkbox" name="applies_basic" value="1" <?php echo isset($others['applies_basic']) && $others['applies_basic']==1?'checked':'' ?>></th>
					                <th>Major</th>
					                <th><input type="checkbox" name="applies_major" value="1" <?php echo isset($others['applies_major']) && $others['applies_major']==1?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Endodontic</th>
					                <th><input type="checkbox" name="applies_endodontic" value="1" <?php echo isset($others['applies_endodontic']) && $others['applies_endodontic']==1?'checked':'' ?>></th>
					                <th>Periodontics</th>
					                <th><input type="checkbox" name="applies_periodontics" value="1" <?php echo isset($others['applies_periodontics']) && $others['applies_periodontics']==1?'checked':'' ?>></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th>Missing Tooth Clause</th>
					                <th>Y</th>
					                <th><input type="radio" name="missing_tooth_clause" value="1" <?php echo isset($others['missing_tooth_clause']) && $others['missing_tooth_clause']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="missing_tooth_clause" value="0" <?php echo isset($others['missing_tooth_clause']) && $others['missing_tooth_clause']==0?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Predetermination Needed</th>
					                <th>Y</th>
					                <th><input type="radio" name="predetermination_needed" value="1" <?php echo isset($others['predetermination_needed']) && $others['predetermination_needed']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="predetermination_needed" value="0" <?php echo isset($others['predetermination_needed']) && $others['predetermination_needed']==0?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Predetermination rec</th>
					                <th colspan="2">Above</th>
					                <th colspan="2"><input type="text" name="predetermination_rec" class="form-control" value="<?php echo isset($others['predetermination_rec'])?$others['predetermination_rec']:''?>"></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="2" class="text-center">History</th>
					                </tr>
					                <tr>
					                <th>FMX/PANO:</th>
					                <th><input type="text" name="fmx_pano" class="form-control" value="<?php echo isset($others['fmx_pano'])?$others['fmx_pano']:''?>"></th>
					                </tr>
					                <tr>
					                <th>SRP:</th>
					                <th><input type="text" name="srp" class="form-control" value="<?php echo isset($others['srp'])?$others['srp']:''?>"></th>
					                </tr>
					                <tr>
					                <th>Exam:</th>
					                <th><input type="text" name="exam" class="form-control" value="<?php echo isset($others['exam'])?$others['exam']:''?>"></th>
					                </tr>
					                <tr>
					                <th>Prophy:</th>
					                <th><input type="text" name="prophy" class="form-control" value="<?php echo isset($others['prophy'])?$others['prophy']:''?>"></th>
					                </tr>
					                <tr>
					                <th></th>
					                <th></th>
					                </tr>
					            </table>
					             <table class="table table-bordered">
					                <tr>
					                <th colspan="5" class="text-center">Downgards</th>
					                </tr>
					                <tr>
					                <th>Fillings</th>
					                <th>Y</th>
					                <th><input type="radio" name="fillings" value="1" <?php echo isset($others['fillings']) && $others['fillings']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="fillings" value="0" <?php echo isset($others['fillings']) && $others['fillings']==0?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Crown</th>
					                <th>Y</th>
					                <th><input type="radio" name="crown" value="1" <?php echo isset($others['crown']) && $others['crown']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="crown" value="0" <?php echo isset($others['crown']) && $others['crown']==0?'checked':'' ?>></th>
					                </tr>
					            </table>
					            <!-- <table class="table table-bordered">
					                <tr>
					                <th colspan="4" class="text-center">Miscellaneous</th>
					                </tr>
					                <tr>
					                <th>9222</th>
					                <th>General Anesthesia</th>
					                <th></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>9230</th>
					                <th>N<sub>2</sub>o</th>
					                <th></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>9944</th>
					                <th>Mouth Guards</th>
					                <th></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th></th>
					                <th></th>
					                <th></th>
					                <th>%</th>
					                </tr>
					            </table> -->
					        </div>
					        <div class="col-md-6 col-sm-12">
					            <table class="table table-bordered">
					                <tr>
					                <th>Preventive</th>
					                <th><input type="text" name="preventive" class="form-control" value="<?php echo isset($others['preventive'])?$others['preventive']:''?>"></th>
					                <th>%</th>
					                <th>Diagnostics</th>
					                <th><input type="text" name="diagnostics" class="form-control" value="<?php echo isset($others['diagnostics'])?$others['diagnostics']:''?>"></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>Basic</th>
					                <th><input type="text" name="basic" class="form-control" value="<?php echo isset($others['basic'])?$others['basic']:''?>"></th>
					                <th>%</th>
					                <th>Major</th>
					                <th><input type="text" name="major" class="form-control" value="<?php echo isset($others['major'])?$others['major']:''?>"></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>Restorative</th>
					                <th><input type="text" name="restorative" class="form-control" value="<?php echo isset($others['restorative'])?$others['restorative']:''?>"></th>
					                <th>%</th>
					                <th>Orthodontics</th>
					                <th><input type="text" name="orthodontics" class="form-control" value="<?php echo isset($others['orthodontics'])?$others['orthodontics']:''?>"></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>Periodontics</th>
					                <th><input type="text" name="periodontics" class="form-control" value="<?php echo isset($others['periodontics'])?$others['periodontics']:''?>"></th>
					                <th>%</th>
					                <th>Endodontics</th>
					                <th><input type="text" name="endodontics" class="form-control" value="<?php echo isset($others['endodontics'])?$others['endodontics']:''?>"></th>
					                <th>%</th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th>Allowed Frequency</th>
					                <th>Plan</th>
					                <th><input type="radio" name="allowed_frequency" class="form-control" value="1" <?php echo isset($others['allowed_frequency']) && $others['allowed_frequency']==1?'checked':'' ?>></th>
					                <th>Calender</th>
					                <th><input type="radio" name="allowed_frequency" class="form-control" value="2" <?php echo isset($others['allowed_frequency']) && $others['allowed_frequency']==2?'checked':'' ?>></th>
					                <th>Floating</th>
					                <th><input type="radio" name="allowed_frequency" class="form-control" value="3" <?php echo isset($others['allowed_frequency']) && $others['allowed_frequency']==3?'checked':'' ?>></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th>Code</th>
					                <th>Description</th>
					                <th colspan="3">Allowed Frequency</th>
					                <th>Month</th>
					                <th colspan="2">Coverage</th>
					                <th>Waiting</th>
					                </tr>
					                <?php for ($i=0; $i < 15 ; $i++) { ?>
						                <tr>
							                <th style="width: 84px;">
							                	<select class="form-control" name="cdt_codes_id[]">
							                	   <option value="0">Please Select</option>
					                            <?php foreach ($cdt_codes as $cdtcodes) { ?>
						                                <option value="<?php echo $cdtcodes['cdtid'];?>"><?php echo $cdtcodes['cdt_codes'];?>
						                                </option>
					                            <?php } ?>
				                        		</select>
				                        	</th>
							                <th><input type="text" name="description[]" class="form-control"></th>
							                <th><input type="text" name="code_allowed_frequency[]" class="form-control"></th>
							                <th>In</th>
							                <th><input type="text" name="procedure_level[]" class="form-control"></th>
							                <th style="width: 70px;"><select class="form-control" name="allowed_frequency_months">
							                	<option value="1">Month</option>
							                	<option value="12">Year</option>
							                </select></th>
							                <th><input type="text" name="coverage_percentage[]" class="form-control"></th>
							                <th>%</th>
							                <th><input type="text" name="waiting[]" class="form-control"></th>
						                </tr>
					                <?php } ?>
					            </table>
					            <table class="table table-bordered">
					            	  <tr>
					                <th colspan="2"></th>
					                <th>Up to Age</th>
					                <th>Age</th>
					                <th colspan="3">Month</th>
					                <th >Per</th>
					                </tr>
					                <tr>
					                <th>1278</th>
					                <th>Fluoride</th>
					                <th><input type="text" name="age_up_to" class="form-control" value="<?php echo isset($others['age_up_to'])?$others['age_up_to']:''?>"></th>
					                <th><input type="text" name="user_age" class="form-control" value="<?php echo isset($others['user_age'])?$others['user_age']:''?>"></th>
					                <th><input type="text" name="user_month" class="form-control" value="<?php echo isset($others['user_month'])?$others['user_month']:''?>"></th>
					                <th><select class="form-control" name="user_month_type">
					                	<option value="1" <?php echo isset($others['user_month_type']) && $others['user_month_type']==1?'selelcted':''?>>Month</option>
					                	<option value="12" <?php echo isset($others['user_month_type']) && $others['user_month_type']==12?'selelcted':''?>>Year</option>
					                </select></th>
					                <th><input type="text" name="user_per" class="form-control" value="<?php echo isset($others['user_per'])?$others['user_per']:''?>"></th>
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>1351</th>
					                <th>Sealants</th>
					                <th><input type="text" name="age_up_to_2" class="form-control" value="<?php echo isset($others['age_up_to_2'])?$others['age_up_to_2']:''?>"></th>
					                <th><input type="text" name="user_age_2" class="form-control" value="<?php echo isset($others['user_age_2'])?$others['user_age_2']:''?>"></th>
					                <th><input type="text" name="user_month_2" class="form-control" value="<?php echo isset($others['user_month_2'])?$others['user_month_2']:''?>"></th>
					                <th><select class="form-control" name="user_month_type_2">
					                	<option value="1" <?php echo isset($others['user_month_type_2']) && $others['user_month_type_2']==1?'selelcted':''?>>Month</option>
					                	<option value="12" <?php echo isset($others['user_month_type_2']) && $others['user_month_type_2']==12?'selelcted':''?>>Year</option>
					                </select></th>
					                <th><input type="text" name="user_per_2" class="form-control" value="<?php echo isset($others['user_per_2'])?$others['user_per_2']:''?>"></th>
					                <th>%</th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="6" class="text-center">Orthodontics</th>
					                </tr>
					                <tr>
					                <th>Lifetime max</th>
					                <th><input type="text" name="lifetime_max" class="form-control" value="<?php echo isset($others['lifetime_max'])?$others['lifetime_max']:''?>"></th>
					                <th>Age Limit</th>
					                <th><input type="text" name="age_limit" class="form-control" value="<?php echo isset($others['age_limit'])?$others['age_limit']:''?>"></th>
					                <th>Deduction Applies</th>
					                <th><select class="form-control" name="deduction_applies">
					                	<option value="no" <?php echo isset($others['deduction_applies']) && $others['deduction_applies']=='no'?'selelcted':''?>>No</option>
					                	<option value="yes" <?php echo isset($others['deduction_applies']) && $others['deduction_applies']=='yes'?'selelcted':''?>>Yes</option>
					                </select></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="5" class="text-center">Payment</th>
					                </tr>
					                <tr>
					                <th>Crown</th>
					                <th>Preparation</th>
					                <th><input type="radio" name="crown_payment" class="form-control" value="1" <?php echo isset($others['crown_payment']) && $others['crown_payment']==1?'checked':'' ?>></th>
					                <th>Seating</th>
					                <th><input type="radio" name="crown_payment" class="form-control" value="2" <?php echo isset($others['crown_payment']) && $others['crown_payment']==2?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Orthodontics</th>
					                <th colspan="4"><input type="text" name="orthodontics_payment" value="<?php echo isset($others['orthodontics_payment'])?$others['orthodontics_payment']:''?>"></th>
					                </tr>
					            </table>
					            <table class="table table-bordered">
					                <tr>
					                <th colspan="6" class="text-center">Shares Frequency</th>
					                </tr>
					                <tr>
					                <th>0140</th>
					                <th>Limited Exam</th>
					                <th>Y</th>
					                <th><input type="radio" name="shares_freq_limit_exam" class="form-control" value="1" <?php echo isset($others['shares_freq_limit_exam']) && $others['shares_freq_limit_exam']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="shares_freq_limit_exam" class="form-control" value="0" <?php echo isset($others['shares_freq_limit_exam']) && $others['shares_freq_limit_exam']==0?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>4910</th>
					                <th>Perio Maintenance</th>
					                <th>Y</th>
					                <th><input type="radio" name="shares_freq_perio_maint" class="form-control" value="1" <?php echo isset($others['shares_freq_perio_maint']) && $others['shares_freq_perio_maint']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="shares_freq_perio_maint" class="form-control" value="0" <?php echo isset($others['shares_freq_perio_maint']) && $others['shares_freq_perio_maint']==0?'checked':'' ?>></th>
					                </tr>
					            </table>
					        </div>
					    </div>  
					    <br>
					    <div class="row">
					        <table class="table table-bordered">
					            <tr>
					                <th>
					                    Verified By:
					                </th>
					                <th><input type="text" name="verified_by" class="form-control" value="<?php echo isset($others['verified_by'])?$others['verified_by']:''?>"></th>
					                <th><input type="text" name="verified_by_2" class="form-control" value="<?php echo isset($others['verified_by_2'])?$others['verified_by_2']:''?>"></th>
					            </tr>
					        </table>
					    </div>
					</div>
		        </div>
		        <div class="row">
			  		<div class="col-12">
			  			<div class="form-group">
				            <button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Save</button>
			    			<a href="<?php echo WEB_URL.'patient/allpatient';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
				        </div>
			  		</div>
		        </div>
		    </div>
	  	</div>
	<?php echo form_close();?>
</div>
<!-- /.container-fluid -->
<script>
	$('#dob').datetimepicker();
</script>

