<!-- <link href="<?php echo WEB_PATH;?>css/sb-admin-2.css?cjv=<?php echo CSSJS_VERSION;?>" rel="stylesheet">
 --><!-- <link href="<?php echo WEB_PATH;?>css/style.css?cjv=<?php echo CSSJS_VERSION;?>" rel="stylesheet">
 -->	
<style type="text/css">
	.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}
.col-md {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 100%;
  }
  .col-md-auto {
    flex: 0 0 auto;
    width: auto;
    max-width: 100%;
  }
  .col-md-1 {
    flex: 0 0 8.33333%;
    max-width: 8.33333%;
  }
  .col-md-2 {
    flex: 0 0 16.66667%;
    max-width: 16.66667%;
  }
  .col-md-3 {
    flex: 0 0 25%;
    max-width: 25%;
  }
  .col-md-4 {
    flex: 0 0 33.33333%;
    max-width: 33.33333%;
  }
  .col-md-5 {
    flex: 0 0 41.66667%;
    max-width: 41.66667%;
  }
  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-md-7 {
    flex: 0 0 58.33333%;
    max-width: 58.33333%;
  }
  .col-md-8 {
    flex: 0 0 66.66667%;
    max-width: 66.66667%;
  }
  .col-md-9 {
    flex: 0 0 75%;
    max-width: 75%;
  }
  .col-md-10 {
    flex: 0 0 83.33333%;
    max-width: 83.33333%;
  }
  .col-md-11 {
    flex: 0 0 91.66667%;
    max-width: 91.66667%;
  }
  .col-md-12 {
    flex: 0 0 100%;
    max-width: 100%;
  }
  .table td, .table th {
	padding: .55rem;
	vertical-align: top;
	border-top: 1px solid #e3e6f0;
}
.table td, .table th {
	vertical-align: middle;
}
.table th {
    padding: 10px .35rem;
    background-color: #F5F6FA;
    color: #9c9fb3;
}

table .form-control, table .form-group .form-control {
    height: 27px;
    padding: 0 2px;
    font-size: 11px;
}
table.table th, table.table td {
    padding: 2px 4px;
    font-size: 12px;
}
.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #858796;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #e3e6f0;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #e3e6f0;
}

.table tbody + tbody {
  border-top: 2px solid #e3e6f0;
}
.table-bordered {
  border: 1px solid #e3e6f0;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #e3e6f0;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}
.form-control {
  display: block;
  width: 100%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #6e707e;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #d1d3e2;
  border-radius: 0.35rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
<!-- Begin Page Content -->
  <!-- Page Heading -->
	  	
		    <?php
		    	$employerid = isset($plan['employer_id'])?$plan['employer_id']:0;
		    	$plan['employer_id'] = isset($_GET['employerid']) && $_GET['employerid']>0?$_GET['employerid']:$employerid;

		    	$percentage=array(
	            	1=>isset($plan['diagnostics_percentage'])?$plan['diagnostics_percentage']:'',
	            	2=>isset($plan['preventive_percentage'])?$plan['preventive_percentage']:'',
	            	3=>isset($plan['restorative_percentage'])?$plan['restorative_percentage']:'',
	            	4=>isset($plan['endodontics_percentage'])?$plan['endodontics_percentage']:'',
	            	5=>isset($plan['periodontics_percentage'])?$plan['periodontics_percentage']:'',
	            	6=>isset($plan['prosthodonticsremovable_percentage'])?$plan['prosthodonticsremovable_percentage']:'',
	            	7=>isset($plan['implants_percentage'])?$plan['implants_percentage']:'',
	            	8=>isset($plan['prosthodontics_fixed_percentage'])?$plan['prosthodontics_fixed_percentage']:'',
	            	9=>isset($plan['oralsurgery_percentage'])?$plan['oralsurgery_percentage']:'',
	            	10=>isset($plan['orthodontics_percentage'])?$plan['orthodontics_percentage']:'',
	            	11=>isset($plan['adjunctivegenservices_percentage'])?$plan['adjunctivegenservices_percentage']:'',
	            	12=>isset($plan['maxillofacialprosthetics_percentage'])?$plan['maxillofacialprosthetics_percentage']:'',
				);
		    ?>
		    <?php $this->load->view('theme/message_view');?>
					   
					    <div class="row">
					        <div class="col-md-4 col-sm-12">
					      
					            <table class="table table-bordered" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					            	<b style="font-size: 11px;">Patient was last verified by <?php echo isset($users[$patient['updatedby']])?$users[$patient['updatedby']]:''?> On <?php echo $patient['lastupdate']?></b>
					            	<tr>
					                <th>Employer:</th>   
					                <th>
					                	
				                       <?php foreach ($employers as $pRow) { ?>
				                            <?php echo isset($plan['employer_id']) && $plan['employer_id'] == $pRow['employerid']?$pRow['employersname']:''; ?>
				                        <?php } ?>
					                </th>
					                </tr>
					                <tr>
					                <th>Insurance:</th>
					                <th>
				                        <?php foreach ($insurance as $iRow) { ?>
				                           <?php echo isset($plan['insurance_id']) && $plan['insurance_id']==$iRow['insurance_id']?$iRow['insurancename']:''; ?>
				                        <?php } ?>
					                </th>
					                </tr>
					                 <tr>
					                <th>Group #:</th>   
					                <th>
					                	
					                		
				                            <?php foreach ($insurance_plans as $pRow) { ?>
				                                <?php echo isset($plan['insurance_plans_id']) && $plan['insurance_plans_id']==$pRow['insurance_plans_id']?$pRow['groupid']:''; ?>
				                            <?php } ?>
				                        </select>
					                </th>
					                </tr>
					                <tr>
					                <th>Product Id:</th>
					                <th><?php echo isset($plan['productid'])?$plan['productid']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Member Id:</th>
					                <th><?php echo isset($patientInsurance['memberid'])?$patientInsurance['memberid']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Effective Date:</th>   
					                <th><?php echo getDateFormatted(isset($patientInsurance['effective_date'])?$patientInsurance['effective_date']:'','m/d/y') ?></th>
					                </tr>
					                <tr>
					                <th>Insurance Benefit Coverage</th>   
					                <th class="disabled-input">
					                	<?php echo isset($plan['insurance_benefits']) && $plan['insurance_benefits']=='plan'?'Plan':'Calendar'; ?>
					                </th>
					                </tr>
					            </table>
					              <table class="table table-bordered" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					             	<th>Patient Name</th>
					                <th><?php echo $patient['p_firstname']?></th>
					                <th><?php echo $patient['p_lastname']?></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><?php echo getDateFormatted($patient['p_dob'],'m/d/y')?></th>
					                </tr>
					               
					                <tr>
					                <th>Subscriber's Name</th>
					                <th><?php echo $patient['s_firstname']?></th>
					                <th><?php echo $patient['s_lastname']?></th>
					                </tr>
					                <tr>
					                <th>Date of Birth</th>   
					                <th colspan="2"><?php echo getDateFormatted($patient['s_dob'],'m/d/y')?></th>
					                </tr>
					            </table>
					            <!--  <table class="table table-bordered">
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
					            </table> -->
					            <table class="table table-bordered" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th colspan="3" class="text-center">Insurance Benefits Details</th>
					                </tr>
					                <tr>
					                <th>Maximum</th>   
					                <th>$</th>
					                <th class="disabled-input"><?php echo isset($plan['ind_limit_annual'])?$plan['ind_limit_annual']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>
					                <th>$</th>
					                <th><?php echo isset($patientInsurance['ins_benefit_remaining'])?$patientInsurance['ins_benefit_remaining']:''; ?></th>
					                </tr>
					                <tr>
					                <th colspan="3" class="text-center">Deductions</th>   
					                </tr>
					                <tr>
					                <th>Individual Deductions</th>   
					                <th>$</th>
					                <th class="disabled-input"><?php echo isset($plan['ind_deductible_annual'])?$plan['ind_deductible_annual']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><?php echo isset($patientInsurance['ind_ded_remaining'])?$patientInsurance['ind_ded_remaining']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Family Deduction</th>   
					                <th>$</th>
					                <th class="disabled-input"><?php echo isset($plan['family_deductible_annual'])?$plan['family_deductible_annual']:''; ?></th>
					                </tr>
					                <tr>
					                <th>Remaining</th>   
					                <th>$</th>
					                <th><?php echo isset($patientInsurance['family_ded_remaining'])?$patientInsurance['family_ded_remaining']:''; ?></th>
					                </tr>
					            </table>
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
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
						                <th>Restorative</th>
						                <th><input type="checkbox" name="restorative_deduction_applies" value="Y" <?php echo isset($plan['restorative_deduction_applies']) && $plan['restorative_deduction_applies']=='Y'?'checked':'' ?>></th>
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
					            </table>
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th>Missing Tooth Clause</th>
					                <th>Y</th>
					                <th><input type="radio" name="missing_tooth_clause" value="1" <?php echo isset($plan['missing_tooth_clause']) && $plan['missing_tooth_clause']=='1'?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="missing_tooth_clause" value="0" <?php echo isset($plan['missing_tooth_clause']) && $plan['missing_tooth_clause']=='0'?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Predetermination Needed</th>
					                <th>Y</th>
					                <th><input type="radio" name="predetermination_needed" value="1" <?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='1'?'checked':'' ?> onclick="predeterminationNeeded(1)" ></th>
					                <th>N</th>
					                <th><input type="radio" name="predetermination_needed" value="0" <?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='0'?'checked':'' ?> onclick="predeterminationNeeded(0)"></th>
					                </tr>
					                <tr>
					                <th>Predetermination Rec.</th>
					                <th colspan="2">Above</th>
					                <th colspan="2"><?php echo isset($plan['predetermination_needed'])?$plan['predetermination_needed']:''?></th>
					                </tr>
					            </table>
					             <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th colspan="5" class="text-center">Downgrades</th>
					                </tr>
					                <tr>
					                <th>Fillings</th>
					                <th>Y</th>
					                <th><input type="radio" name="filling_downgrades" value="Y" <?php echo isset($plan['filling_downgrades']) && $plan['filling_downgrades']=='Y'?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="filling_downgrades" value="N" <?php echo isset($plan['filling_downgrades']) && $plan['filling_downgrades']=='N'?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Crown Molar Downgrades</th>
					                <th>Y</th>
					                <th><input type="radio" name="crown_downgrades" value="Y" <?php echo isset($plan['crown_downgrades']) && $plan['crown_downgrades']=='Y'?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="crown_downgrades" value="N" <?php echo isset($plan['crown_downgrades']) && $plan['crown_downgrades']=='N'?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Crown Premolar Downgrades</th>
					                <th>Y</th>
					                <th><input type="radio" name="crown_premolar_downgrades" value="Y" <?php echo isset($plan['crown_premolar_downgrades']) && $plan['crown_premolar_downgrades']=='Y'?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="crown_premolar_downgrades" value="N" <?php echo isset($plan['crown_premolar_downgrades']) && $plan['crown_premolar_downgrades']=='N'?'checked':'' ?>></th>
					                </tr>
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
					             <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th colspan="6" class="text-center">Shares Frequency</th>
					                </tr>
					                <tr>
					                <th>D0140 <input type="hidden" name="shares_cdtid[]" value="140"></th>
					                <th>Limited oral evaluation – problem focused</th>
					                <th>Y</th>
					                <th><input type="radio" name="shares_freq_limit_exam" class="" value="1" <?php echo isset($shares[140]['shares_freq_limit_exam']) && $shares[140]['shares_freq_limit_exam']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="shares_freq_limit_exam" class="" value="0" <?php echo isset($shares[140]['shares_freq_limit_exam']) && $shares[140]['shares_freq_limit_exam']==0?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>D4910 <input type="hidden" name="shares_cdtid[]" value="4910"></th>
					                <th>Periodontal maintenance procedures</th>
					                <th>Y</th>
					                <th><input type="radio" name="shares_freq_perio_maint" class="" value="1" <?php echo isset($shares[4910]['shares_freq_perio_maint']) && $shares[4910]['shares_freq_perio_maint']==1?'checked':'' ?>></th>
					                <th>N</th>
					                <th><input type="radio" name="shares_freq_perio_maint" class="" value="0" <?php echo isset($shares[4910]['shares_freq_perio_maint']) && $shares[4910]['shares_freq_perio_maint']==0?'checked':'' ?>></th>
					                </tr>
					            </table>
					             <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th colspan="6" class="text-center">Orthodontics</th>
					                </tr>
					                <tr>
					                <th>Lifetime max</th>
					                <th style="width: 8%">
					                	 <?php echo isset($plan['orthodontics_lifetime_max'])?$plan['orthodontics_lifetime_max']:''?>

					                </th>
					                <th>Age Limit</th>
					                <th style="width: 8%">
					                	<?php echo isset($plan['orthodontics_agelimit'])?$plan['orthodontics_agelimit']:''?>
					                </th>
					                <th>Deduction Applies</th>
					                <th style="width: 19%">

					                	<?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='N'?'N':'Y'?>
					                	
					              </th>
					                </tr>
					            </table>
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th colspan="5" class="text-center">Payment</th>
					                </tr>
					                <tr>
					                <th>Crown</th>
					                <th>Preparation</th>
					                <th><input type="radio" name="crown_payment" class="" value="P" <?php echo isset($plan['crown_payment']) && $plan['crown_payment']=='P'?'checked':'' ?>></th>
					                <th>Seating</th>
					                <th><input type="radio" name="crown_payment" class="" value="S" <?php echo isset($plan['crown_payment']) && $plan['crown_payment']=='S'?'checked':'' ?>></th>
					                </tr>
					                <tr>
					                <th>Orthodontics</th>
					                <th colspan="4">
					                	<?php echo isset($plan['orthodontics_payment']) && $plan['orthodontics_payment']==1?'Monthly':'Quarterly'?>
					                		
<!-- 					                	<input type="text" class="form-control" name="orthodontics_payment" value="<?php echo isset($plan['orthodontics_payment'])?$plan['orthodontics_payment']:''?>"></th> -->
					                </tr>
					            </table>
					            <table class="table table-bordered" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
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
						                            	<?php foreach ($cdt_codes as $cdtcodes) { ?>
						                            		<?php echo $cdtcodes['cdtid']==$hRow['cdtid']?$cdtcodes['cdt_codes']:''?>
						                            <?php } ?>
				                        		 </th>
								                <!-- <th><input type="text" name="history_field[]" class="form-control" value="<?php echo $hRow['history_field']?>"></th> -->
								                <th><?php echo getDateFormatted($hRow['history_field_date1'],'m/d/y')?></th>
								                <th><?php echo getDateFormatted($hRow['history_field_date2'],'m/d/y')?></th>
								                <th><?php echo getDateFormatted($hRow['history_field_date3'],'m/d/y')?></th>
								                <th><?php echo getDateFormatted($hRow['history_field_date4'],'m/d/y')?></th>
								            </tr>
					               	<?php 
					               		}
						           	} ?>
						           <!-- 	<?php for ($i=0; $i < 6; $i++) { ?>
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
 				                <th><input type="text" name="history_field_date1[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date2[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date3[]" class="form-control datepicker"></th>
						                <th><input type="text" name="history_field_date4[]" class="form-control datepicker"></th>

					           		<?php } ?>
					               
						                </tr> -->
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
					        <div class="col-md-8 col-sm-12">
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					            	<b>Insurance Plan was last verified by <?php echo isset($users[isset($plan['updatedby'])?$plan['updatedby']:0])?$users[$plan['updatedby']]:'None'?> On <?php echo isset($plan['updatedon'])?$plan['updatedon']:'None' ?></b>
					                <tr>
						                <th>Preventive</th>
						                <th><?php echo isset($plan['preventive_percentage'])?$plan['preventive_percentage'].'%':''?></th>
						                <th>Periodontics</th>
					                	<th><?php echo isset($plan['periodontics_percentage'])?$plan['periodontics_percentage'].'%':''?></th>
					                 	<th>Prosthodontics Fixed</th>
					                	<th><?php echo isset($plan['prosthodontics_fixed_percentage'])?$plan['prosthodontics_fixed_percentage'].'%':''?></th>						                
						            </tr>
					               
					                <tr>
					                	<th>Diagnostics</th>
						                <th><?php echo isset($plan['diagnostics_percentage'])?$plan['diagnostics_percentage'].'%':''?></th>
						                <th>Prosthodontics,Removable</th>
						                <th><?php echo isset($plan['prosthodonticsremovable_percentage'])?$plan['prosthodonticsremovable_percentage'].'%':''?></th>
						                 <th>Oral Surgery</th>
						                <th><?php echo isset($plan['oralsurgery_percentage'])?$plan['oralsurgery_percentage'].'%':''?></th>
					            	</tr>
					            	<tr>
					            		<th>Restorative</th>
						                <th><?php echo isset($plan['restorative_percentage'])?$plan['restorative_percentage'].'%':''?></th>
					            	 <th>Maxillofacial Prosthetics</th>
						                <th><?php echo isset($plan['maxillofacialprosthetics_percentage'])?$plan['maxillofacialprosthetics_percentage'].'%':''?></th>
						                <th>Orthodontics</th>
						                <th><?php echo isset($plan['orthodontics_percentage'])?$plan['orthodontics_percentage'].'%':''?></th>
					                </tr>
					                <tr>
					                	<th>Endodontics</th>
						                <th><?php echo isset($plan['endodontics_percentage'])?$plan['endodontics_percentage'].'%':''?></th>
					                 	<th>Implants Services</th>
						               	<th><?php echo isset($plan['implants_percentage'])?$plan['implants_percentage'].'%':''?></th>
						               	<th>Adjunctivegen Services</th>
						               	<th><?php echo isset($plan['adjunctivegenservices_percentage'])?$plan['adjunctivegenservices_percentage'].'%':''?></th>
					                </tr>
					            </table>
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th>Allowed Frequency</th>
					                <th>Calendar</th>
					                <th><input type="radio" name="allowed_frequency" class="" value="1" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==1?'checked':'' ?> onclick='changeAllowed(this)' ></th>
					                <th>Continous</th>
					                <th><input type="radio" name="allowed_frequency" class="" value="2" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==2?'checked':'' ?> onclick='changeAllowed(this)'></th>
					                <th>Plan</th>
					                <th><input type="radio" name="allowed_frequency" class="" value="3" <?php echo isset($plan['allowed_frequency']) && $plan['allowed_frequency']==3?'checked':'' ?> onclick='changeAllowed(this)'></th>
					                </tr>
					            </table>
					             <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
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
					                		'procedure_level_single'=>$value['procedure_level'],
					                		'waiting'=>$value['waiting'],

					                		);
					                	}
					                }
					                ?>
					                <tr>
					                <th>D1208<input type="hidden" name="cdt_codes_id_single[]" value="1208"></th>
					                <th>Topical Application of Fluoride</th>
					                <th style="width: 8%">
					                	<?php echo isset($single[1208]['to_age'])?$single[1208]['to_age']:''?>
					                </th>
					                <th style="width: 4%"><?php echo isset($single[1208]['allowed_frequency'])?$single[1208]['allowed_frequency']:''?></th>
					                <th>Times in</th>
					                <th style="width: 4%"><?php echo isset($single[1208]['procedure_level_single'])?$single[1208]['procedure_level_single']:''?></th>
					                <th>
					                	<?php echo isset($single[1208]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>
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
					                	<?php echo isset($single[1208]['coverage_percentage'])?$single[1208]['coverage_percentage']:''?>
					                </th>
					               <!--  <th><input type="text" name="waiting_single[]" class="form-control" value="<?php echo isset($single[1208]['waiting'])?$single[1208]['waiting']:''?>"></th> -->
					                <th>%</th>
					                </tr>
					                <tr>
					                <th>D1351 <input type="hidden" name="cdt_codes_id_single[]" value="1351"></th>
					                <th>Sealant per tooth</th>
					                <th>
					                	<?php echo isset($single[1351]['to_age'])?$single[1351]['to_age']:''?>
					                </th>
					                <th><?php echo isset($single[1351]['allowed_frequency'])?$single[1351]['allowed_frequency']:''?></th>
					                 <th>Times in</th>
					                <th><?php echo isset($single[1351]['procedure_level_single'])?$single[1351]['procedure_level_single']:''?></th>
					                <th>
					                	<?php echo isset($single[1351]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>
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
					                	<?php echo isset($single[1351]['coverage_percentage'])?$single[1351]['coverage_percentage']:''?>
					                </th>
					              <!--   <th><input type="text" name="waiting_single[]" class="form-control" value="<?php echo isset($single[1208]['waiting'])?$single[1208]['waiting']:''?>"></th> -->
					                <th>%</th>
					                </tr>
					            </table>
					            <table class="table table-bordered disabled-input" style="width:100%;text-align: left;max-width: 400px;margin: 0 auto;border-collapse: collapse;border: 1px solid #E4E4F1;color: #9E9BB4;">
					                <tr>
					                <th>Code</th>
					                <th>Description</th>
					                <th colspan="3">Allowed Frequency</th>
					                <th style="width: 13%;"></th>
					                <th colspan="2">Insurance Covers</th>
					                <th>Waiting Period</th>
					                <td></td>
					                </tr>
					                <?php foreach ($insurancePlans as $rowP) {
					                 ?>
					                	<tr class="cdtcodes-update">
							                <th style="width: 84px;">
					                            <?php foreach ($cdt_codes as $cdtcodes) { ?>
					                            	<?php echo isset($rowP['cdtid']) && $cdtcodes['cdtid']==$rowP['cdtid']?$cdtcodes['cdt_codes']:'' ?>    
					                            <?php } ?>
				                        	</th>
							                <th  class="cdtid_desc_update<?php echo $rowP['cdtid'];?>" ><?php echo $rowP['cdt_codes_short']; ?></th>
							                <th style="width: 4%"><?php echo $rowP['allowed_frequency']; ?></th>
							                <th>Times in</th>
							                <th style="width: 4%"><?php echo $rowP['procedure_level']; ?></th>
							                <th style="width: 70px;">
							                	<?php echo $allowed_frequency_months;?>
							            	</th>
							                <th style="width: 7%">
								                <!-- <select class="form-control coverage_percentage<?php echo $rowP['cdtid'];?>" name="coverage_percentage[]">
							                		<option value="0" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==0?'selected':''; ?>>0</option>
							                		<option value="50" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==50?'selected':''; ?>>50</option>
							                		<option value="60" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==60?'selected':''; ?>>60</option>
							                		<option value="70" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==70?'selected':''; ?>>70</option>
							                		<option value="80" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==80?'selected':''; ?>>80</option>
							                		<option value="100" <?php echo isset($rowP['coverage_percentage']) && $rowP['coverage_percentage']==100?'selected':''; ?>>100</option>
							                		
								                </select> -->
							                	<?php echo isset($percentage[$rowP['treatmenttypeid']])?$percentage[$rowP['treatmenttypeid']]:''?>
							                </th>
							                <th>%</th>
							                <th style="width: 7%">
							                	<?php echo isset($rowP['waiting'])?$rowP['waiting']:''; ?>
							                </th>
						                </tr>
					                <?php } ?>
					            </table>
					        </div>
					    </div>  
					    <br>
					    
					    <div class="row">
					        <table class="table table-bordered disabled-input">
					            <tr>
					                <th>
					                    Verified By:
					                </th>
					                <th><?php echo isset($users[$patient['updatedby']])?$users[$patient['updatedby']]:''?></th>
					                <th><?php echo $patient['lastupdate']?></th>
					            </tr>
					        </table>
					    </div>
					    <?php if(!empty($agent)){ ?>
						    <div class="row">
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
						                <th><?php echo isset($agent['insurance_agentname'])?$agent['insurance_agentname']:''?></th>
						                <th><?php echo isset($agent['insurance_agentid'])?$agent['insurance_agentid']:''?></th>
						                <th><?php echo isset($users[$agent['createdby']])?$users[$agent['createdby']]:''?></th>
						                <th><?php echo isset($agent['createdon'])?$agent['createdon']:''?></th>
						            </tr>
						        </table>
						    </div>
						<?php } ?>
					</div>
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
		var plan_insuranceId= '<?php echo isset($plan['insurance_plans_id'])?$plan['insurance_plans_id']:0?>';
		var weburl = $('meta[name="weburl"]').attr('content');
		$.get(weburl + 'dashboard/getPlans?insurance_id='+insurance+'&selected='+plan_insuranceId, function (d) {
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

</script>

