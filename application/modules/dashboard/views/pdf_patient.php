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
	/*padding: .55rem;*/
	vertical-align: top;
/*	border-top: 1px solid #e3e6f0;
*/}
.table td, .table th {
	vertical-align: middle;
}
.table th {
/*    padding: 10px .35rem;
*/    /*background-color: #F5F6FA;*/
    color: #23263c;
}

table .form-control, table .form-group .form-control {
    height: 27px;
    /*padding: 0 2px;*/
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

 /* padding: 0.75rem;*/
  vertical-align: top;

}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #e3e6f0;

}

.table tbody + tbody {
/*  border-top: 2px solid #e3e6f0;
*/

}
.table-bordered {
  border: 1px solid black;


}

th{
  border-top: 1px solid #e3e6f0;
  border-collapse: collapse;

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
/*  background-color: #fff;
*/  background-clip: padding-box;
  border: 1px solid #d1d3e2;
  border-radius: 0.35rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.font-size{
      font-weight: normal!important;
      text-align: center;
}
input{
  height: 10px;
  margin-top: -4px
}
</style>
<!-- Begin Page Content -->
  <!-- Page Heading -->
	  	
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
<div style=" position: fixed;
   left: -20;
   top: -30;
   width: 100%;
   font-size: 10px;
   text-align: center;">
    <?php
    if ($officeName['logo'] !='') { ?>
        <img src="<?php echo ROOT_PATH.$officeName['logo']?>" style="height: 100px;width:170px;float: left;margin-right: 10px;" >
    <?php } ?>
   <!-- ROOT_PATH -->
     <center style='font-size: 45px;margin-right: 30px' ><?php echo isset($officeName['officename'])?$officeName['officename']:'' ?></center>
     <center style='font-size: 20px;margin-right: 30px'><u>BENEFITS BREAKDOWN</u></center>
  </div>
<br>
<br>
<br>
<br>
  <span style="float: right;margin-top: -20px;font-size: 10px">Date Verifiled: <?php echo isset($agent['createdon'])?getDateFormatted($agent['createdon'],'m/d/y'):''?>  Agent Name: <?php echo isset($agent['insurance_agentname'])?$agent['insurance_agentname']:''?> @ <?php echo isset($agent['createdon'])?date('h:i',strtotime($agent['createdon'])):''?></span>
<div style="width: 100%;" >
<table class="table table-bordered" style="margin-right: -25px">
<tr>
<th>Patient Name :</th>
<th class="font-size"><?php echo $patient['p_firstname'].' '.$patient['p_lastname']?></th>
<th>DOB :</th>
<th class="font-size"><?php echo getDateFormatted($patient['p_dob'],'m/d/y')?></th>
<th>Subscriber's Name :</th>
 <?php
  //$patient['p_firstname']==$patient['s_firstname']
    if ($patient['p_firstname']==$patient['s_firstname'] && $patient['p_lastname']==$patient['s_lastname']) { ?>
      <th class="font-size">Same as Patient</th>
  <?php
    }else{ ?>
      <th class="font-size"><?php echo $patient['s_firstname'].' '.$patient['s_lastname'] ?></th>
  <?php
    }
  ?>
  <th>DOB :</th> 
  <?php
  //$patient['p_firstname']==$patient['s_firstname']
    if ($patient['p_firstname']==$patient['s_firstname'] && $patient['p_lastname']==$patient['s_lastname']) { ?>
      <th class="font-size">Same as Patient</th>
      
  <?php
    }else{ ?>
      <th class="font-size"><?php echo getDateFormatted($patient['s_dob'],'m/d/y')?></th>
  <?php
    }
  ?>  
</tr>
</table>
<table class="table table-bordered" style="margin-right: -25px">
<tr>
<th style="width: 10px">Employer :</th>
<th style="font-weight: normal!important;float: left;">
  <?php foreach ($employers as $pRow) { ?>
    <?php echo isset($plan['employer_id']) && $plan['employer_id'] == $pRow['employerid']?$pRow['employersname']:''; ?>
  <?php } ?>
</th>
<th style="width: 10px">Insurance :</th>
<th style="font-weight: normal!important;float: left;">
  <?php foreach ($insurance as $iRow) { ?>
    <?php echo isset($plan['insurance_id']) && $plan['insurance_id']==$iRow['insurance_id']?$iRow['insurancename']:''; ?>
  <?php } ?></th>
</tr>
</table>
</div>

<div style="width: 100%; top: 100;">
<div style="width: 38%; float:left">
<table class="table table-bordered" >	            	
  <tr>
    <th>Group#:</th>   
    <th class="font-size">
        <?php foreach ($insurance_plans as $pRow) { ?>
           	<?php echo isset($plan['insurance_plans_id']) && $plan['insurance_plans_id']==$pRow['insurance_plans_id']?$pRow['groupid']:''; ?>
        <?php } ?>
        <?php foreach ($plansgroup as $gRow) { ?>
          <?php echo isset($patientInsurance['subgroupid']) && $patientInsurance['subgroupid']==$gRow['subgroupid']?'- '.$gRow['subgroup']:''; ?>
        <?php } ?>
    </th>
    </tr>
    <tr>
    <th>Product Id:</th>
    <th class="font-size"><?php echo isset($plan['productid'])?$plan['productid']:''; ?></th>
    </tr>
    <tr>
    <th>Fee Schedule:</th>
    <th class="font-size">
        <?php foreach ($feeschedule as $fRow) { ?>
           	<?php echo isset($plan['feescheduleid']) && $plan['feescheduleid']==$fRow['feescheduleid']?$fRow['name']:''; ?>
        <?php } ?>
    </th>
    </tr>
    <tr>
    <th>Member Id:</th>
    <th class="font-size"><?php echo isset($patientInsurance['memberid'])?$patientInsurance['memberid']:''; ?></th>
    </tr>
    <tr>
    <th>Effective Date:</th>   
    <th class="font-size"><?php echo getDateFormatted(isset($patientInsurance['effective_date'])?$patientInsurance['effective_date']:'','m/d/y') ?></th>
    </tr>
    <tr>
    <th>Insurance cover</th>   
    <th class="font-size">
    	<?php echo isset($plan['insurance_benefits']) && $plan['insurance_benefits']=='plan'?'Plan Month':'Calendar Month'; ?>
    </th>
    </tr>
</table>
					            

					           
<table class="table table-bordered disabled-input" style="margin-top: -10px">
    <tr>
    <th col>Missing Tooth Clause</th>
    <th class="font-size" style="width: 40px"><?php echo isset($plan['missing_tooth_clause']) && $plan['missing_tooth_clause']=='1'?'Yes':'No' ?></th>
    </tr>
    <tr>
    <th>Predetermination Needed</th>
    <th class="font-size"><?php echo isset($plan['predetermination_needed']) && $plan['predetermination_needed']=='1'?'Yes':'No' ?></th>
    </tr>
    <tr>
    <th>Recommended Above</th>
    <th class="font-size" colspan="">$<?php echo isset($plan['predetermination_needed'])?$plan['predetermination_needed']:''?></th>
    </tr>
</table>	
  <div style="width: 100%;">
    <div style="width: 50%;float: left;">

      <table class="table table-bordered" style="margin-top: -10px">
    <tr>
    <th>Insurance Benefits</th>
    <th></th>
    </tr>
    <tr>
    <th>Maximum</th>   
    <th class="font-size">$<?php echo isset($getsubgroup['ind_limit_annual'])?floatval($getsubgroup['ind_limit_annual']):''; ?></th>
    </tr>
    <tr>
    <th>Remaining</th>
    <th class="font-size">$<?php echo isset($patientInsurance['ins_benefit_remaining'])?$patientInsurance['ins_benefit_remaining']:''; ?></th>
    </tr>
    <tr>
    <th style="text-align: center !important;">Deductions</th> 
    <th></th>  
    </tr>
    <tr>
    <th>Individual</th>   
    <th class="font-size">$<?php echo isset($getsubgroup['ind_deductible_annual'])?floatval($getsubgroup['ind_deductible_annual']):''; ?></th>
    </tr>
    <tr>
    <th>Remaining</th>   
    <th class="font-size">$<?php echo isset($patientInsurance['ind_ded_remaining'])?$patientInsurance['ind_ded_remaining']:''; ?></th>
    </tr>
    <tr>
    <th>Family</th>   
    <th class="font-size">$<?php echo isset($getsubgroup['family_deductible_annual'])?floatval($getsubgroup['family_deductible_annual']):''; ?></th>
    </tr>
    <tr>
    <th>Remaining</th>   
    <th class="font-size">$<?php echo isset($patientInsurance['family_ded_remaining'])?$patientInsurance['family_ded_remaining']:''; ?></th>
    </tr>
</table>

    </div>
    <div style="width: 48%;float: right;">
      <table class="table table-bordered disabled-input" style="margin-top: -10px">
      <tr>
      <th colspan="2" style="text-align: center !important;">Orthodontics</th>
      </tr>
      <tr>
      <th>Lifetime M.</th>
      <th style="text-align: center !important;" class="font-size">
        <?php echo isset($getsubgroup['orthodontics_lifetime_max'])?'$'.floatval($getsubgroup['orthodontics_lifetime_max']):''?>
      </th>
    </tr>
    <tr>
      <th>Age Limit</th>
      <th style="text-align: center !important;" class="font-size">
        <?php echo isset($plan['orthodontics_agelimit'])?$plan['orthodontics_agelimit']:''?>
      </th>
    </tr>
      <tr>
      <th>Ded. Applies</th>
      <th style="text-align: center !important;" class="font-size">
        <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='Y'?'Yes':'No'?>
        </th>
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
     <table class="table table-bordered disabled-input" style="margin-top: -10px">
        <tr>
        <th colspan=2 style="text-align: center !important;">Shares Frequency</th>
        </tr>
        <tr>
        <th>Limited Eval</th>
        <th style="text-align: center !important;" class="font-size"><?php echo isset($shares[140]['shares_freq_limit_exam']) && $shares[140]['shares_freq_limit_exam']==1?'Yes':'No' ?></th>
        </tr>
        <tr>
        <th>Perio Maint</th>
        <th style="text-align: center !important;" class="font-size"><?php echo isset($shares[4910]['shares_freq_perio_maint']) && $shares[4910]['shares_freq_perio_maint']==1?'Yes':'No' ?></th>
        </tr>
    </table> 
    </div>
  </div>
  <div style="width: 100%">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

      <table class="table table-bordered disabled-input" style="margin-top: -20px"  >
      <tr>
      <th colspan="5" style="text-align: center !important;">Downgrades</th>
      </tr>
      <tr>
      <th></th>
      <th colspan="2">Fillings</th>
      <th colspan="2">Crown</th>
      </tr>
      <tr>
      <th colspan="">Molar</th>
      <th colspan="2" class="font-size"><?php echo isset($plan['filling_molar_downgrades']) && $plan['filling_molar_downgrades']=='Y'?'Yes':'No' ?></th>
      <th colspan="2" class="font-size"><?php echo isset($plan['crown_molar_downgrades']) && $plan['crown_molar_downgrades']=='Y'?'Yes':'No' ?></th>
      </tr>
      <tr>
      <th colspan="">Premolar</th>
      <th colspan="2" class="font-size"><?php echo isset($plan['filling_premolar_downgrades']) && $plan['filling_premolar_downgrades']=='Y'?'Yes':'No' ?></th>
      <th colspan="2" class="font-size"><?php echo isset($plan['crown_premolar_downgrades']) && $plan['crown_premolar_downgrades']=='Y'?'Yes':'No' ?></th>
      </tr>
    </table>
     <table class="table table-bordered disabled-input" style="margin-top: -10px">
        <tr>
        <th colspan="5" style="text-align: center !important;">Payment</th>
        </tr>
        <tr>
        <th>Crown</th>
        <th colspan="" class="font-size">
          <?php
           echo isset($plan['crown_payment']) && $plan['crown_payment']=='P'?'Preparation':'Seating' ?>
        </th>
        <th>Orthodontics</th>
        <th class="font-size"><?php echo isset($plan['orthodontics_payment']) && $plan['orthodontics_payment']==1?'Monthly':'Quarterly'?></th>
        </tr>
      </table>
</div>
</div>

</div>
<div style="width: 60%; float:right">
   	<table class="table table-bordered">
        <tr>
        <th colspan=""></th>
        <th colspan="">Covers</th>
        <th>Ded.<br> Applies</th>
        <th colspan="" >Waiting</th>
        <th></th>
        <th colspan="" >Covers</th>
        <th>Ded.<br> Applies</th>
        <th colspan="">Waiting</th>
        </tr>
        <tr>
            <th>Prev/Diag</th>
            <th style="width: 5%" class="font-size"><?php echo isset($plan['preventive_percentage'])?$plan['preventive_percentage']:''?> %</th>
            <th ><input type="checkbox" name="preventive_deduction_applies" value="Y" <?php echo isset($plan['preventive_deduction_applies']) && $plan['preventive_deduction_applies']=='Y'?'checked':'' ?>></th>
            <th style="width: 5%" class="font-size">
                  <?php for ($i=0; $i < 25 ; $i++) { ?>
                    <?php echo isset($plan['preventive_waitingperiod']) && $plan['preventive_waitingperiod']==$i?$i:''?>
                  <?php } ?>
            </th> 

             <th>Rest-Ant</th>
            <th  style="width: 5%" class="font-size"><?php echo isset($plan['restorative_ant_percentage'])?$plan['restorative_ant_percentage']:''?> %</th>
            <th><input type="checkbox" name="restorative_post_ded_applies" value="Y" <?php echo isset($plan['restorative_post_ded_applies']) && $plan['restorative_post_ded_applies']=='Y'?'checked':'' ?>></th>
             <th style="width: 5%" class="font-size">
              <?php for ($i=0; $i < 25 ; $i++) { ?>
                <?php echo isset($plan['restorative_int_waitingperiod']) && $plan['restorative_int_waitingperiod']==$i?$i:''?>
              <?php } ?>
            </th>
          
        </tr>                  
        <tr>
            <th>Perio Maint.</th>
            <th class="font-size"><?php echo isset($plan['periomaint_percentage'])?$plan['periomaint_percentage']:''?>%</th>
             <th><input type="checkbox" name="perio_maintenance_ded_applies" value="Y" <?php echo isset($plan['perio_maintenance_ded_applies']) && $plan['perio_maintenance_ded_applies']=='Y'?'checked':'' ?>></th>
            <th style="width: 10%" class="font-size">
              <?php for ($i=0; $i < 25 ; $i++) { ?>
                <?php echo isset($plan['periomaint_waitingperiod']) && $plan['periomaint_waitingperiod']==$i?$i:''?>         
              <?php } ?>
            </th>  
            <th>Periodontics</th>
            <th  style="width: 5%" class="font-size"><?php echo isset($plan['periodontics_percentage'])?$plan['periodontics_percentage']:''?>%</th>
            <th><input type="checkbox" name="periodontics_deduction_applies" value="Y" <?php echo isset($plan['periodontics_deduction_applies']) && $plan['periodontics_deduction_applies']=='Y'?'checked':'' ?>></th>
             <th style="width: 5%" class="font-size">
                    <?php for ($i=0; $i < 25 ; $i++) { ?>
                        <?php echo isset($plan['periodontics_waitingperiod']) && $plan['periodontics_waitingperiod']==$i?$i:''?>
                    <?php } ?>
              </th>
      </tr>
        <tr>
          <th>Endodontics</th>
            <th  style="width: 5%" class="font-size"><?php echo isset($plan['endodontics_percentage'])?$plan['endodontics_percentage']:''?>%</th>
            <th><input type="checkbox" name="endodontic_deduction_applies" value="Y" <?php echo isset($plan['endodontic_deduction_applies']) && $plan['endodontic_deduction_applies']=='Y'?'checked':'' ?>></th>
             <th style="width: 5%" class="font-size">
              <?php for ($i=0; $i < 25 ; $i++) { ?>
                <?php echo isset($plan['endodontics_waitingperiod']) && $plan['endodontics_waitingperiod']==$i?$i:''?>
              <?php } ?>
            </th>
            
          <th>Implants</th>
            <th  style="width: 5%" class="font-size"><?php echo isset($plan['implants_percentage'])?$plan['implants_percentage']:''?> %</th>
            <th><input type="checkbox" name="implants_ded_applies" value="Y" <?php echo isset($plan['implants_ded_applies']) && $plan['implants_ded_applies']=='Y'?'checked':'' ?>></th>
             <th style="width: 5%" class="font-size">
              <?php for ($i=0; $i < 25 ; $i++) { ?>
                <?php echo isset($plan['implant_waitingperiod']) && $plan['implant_waitingperiod']==$i?$i:''?>
              <?php } ?>
            </th>
        </tr>
     <!--  <tr>
      <th>Basic</th>
      <th class="font-size"><?php echo isset($plan['basic_percentage'])?$plan['basic_percentage']:''?>%</th>
      <th><input type="checkbox" name="basic_ded_applies" value="Y" <?php echo isset($plan['basic_ded_applies']) && $plan['basic_ded_applies']=='Y'?'checked':'' ?>></th>
       <th style="width: 10%" class="font-size">
          <?php for ($i=0; $i < 25 ; $i++) { ?>
            <?php echo isset($plan['basic_waitingperiod']) && $plan['endodontics_waitingperiod']==$i?$i:''?>
          <?php } ?>
        </th>
      
      <th>Major</th>
      <th class="font-size"><?php echo isset($plan['major_percentage'])?$plan['major_percentage']:''?>%</th>
      <th><input type="checkbox" name="major_ded_applies" value="Y" <?php echo isset($plan['major_ded_applies']) && $plan['major_ded_applies']=='Y'?'checked':'' ?>></th>
       <th style="width: 10%" class="font-size">
          <?php for ($i=0; $i < 25 ; $i++) { ?>
            <?php echo isset($plan['major_waitingperiod']) && $plan['major_waitingperiod']==$i?$i:''?>
          <?php } ?>
    </th>
    </tr> -->
    <tr>
      <th>Rest-Post</th>
      <th class="font-size"><?php echo isset($plan['restorative_post_percentage'])?$plan['restorative_post_percentage']:''?>%</th>
        <th><input type="checkbox" name="restorative_post_ded_applies" value="Y" <?php echo isset($plan['restorative_post_ded_applies']) && $plan['restorative_post_ded_applies']=='Y'?'checked':'' ?>></th>
       <th style="width: 10%" class="font-size">
          <?php for ($i=0; $i < 25 ; $i++) { ?>
            <?php echo isset($plan['restorative_post_waitingperiod']) && $plan['restorative_post_waitingperiod']==$i?$i:''?>
          <?php } ?>
    </th>
      <th>Oral Surgery</th>
        <th  style="width: 5%" class="font-size"><?php echo isset($plan['oralsurgery_percentage'])?$plan['oralsurgery_percentage']:''?> %</th>
         <th><input type="checkbox" name="oralsurgery_ded_applies" value="Y" <?php echo isset($plan['oralsurgery_ded_applies']) && $plan['oralsurgery_ded_applies']=='Y'?'checked':'' ?>></th>
         <th style="width: 5%" class="font-size">
          <?php for ($i=0; $i < 25 ; $i++) { ?>
            <?php echo isset($plan['oralsurgery_waitingperiod']) && $plan['oralsurgery_waitingperiod']==$i?$i:''?>
            <?php } ?>
      </th>
    </tr>
    <tr>
     
      <th>Orthodontics</th>
        <th  style="width: 5%" class="font-size"><?php echo isset($plan['orthodontics_percentage'])?$plan['orthodontics_percentage']:''?> %</th>
         <th><input type="checkbox" name="orthodontics_deduction_applies" value="Y" <?php echo isset($plan['orthodontics_deduction_applies']) && $plan['orthodontics_deduction_applies']=='Y'?'checked':'' ?>></th>
         <th style="width: 5%" class="font-size">
          <?php for ($i=0; $i < 25 ; $i++) { ?>
            <?php echo isset($plan['orthodontics_waitingperiod']) && $plan['orthodontics_waitingperiod']==$i?$i:''?>
          <?php } ?>
      </th>
    </tr>
</table>

 <table class="table table-bordered disabled-input" style="margin-right: -25px">
  <tr>
    <th>Description</th>
    <th>Up to<br> Age</th>
    <th colspan="3">Allowed Frequency</th>
    <th>Months</th>
    <th>Insurance <br>Covers</th>
    </tr>

    <?php
    $single=array();
    $allowed_frequency_months='';
    if (isset($plan['allowed_frequency']) && $plan['allowed_frequency']==1) {
    	$allowed_frequency_months='Calendar';
    }else if (isset($plan['allowed_frequency']) && $plan['allowed_frequency']==2) {
    	$allowed_frequency_months='Continous';
    }else if(isset($plan['allowed_frequency']) && $plan['allowed_frequency']==3){
    	$allowed_frequency_months='Plan';
    }


    foreach ($insurancePlans as $key => $value) {
    	if ($value['cdtid'] == 1208 || $value['cdtid']==1351) {
    		$single[$value['cdtid']]=array(
          'to_age'=>$value['to_age'],
          'allowed_frequency'=>$value['allowed_frequency'],
          'allowed_frequency_months'=>'Calendar',//$allowed_frequency_months,
          'coverage_percentage'=>$percentage[$value['treatmenttypeid']],
          'allowed_frequency_duration_single'=>$value['allowed_frequency_duration'],
          'waiting'=>$value['waiting'],
          'treatmenttypeid'=>$value['treatmenttypeid']

          );
    	}
    }
    ?>
    <tr>
   <th>Fluoride</th>
    <th class="font-size">
    	<?php echo isset($single[1208]['to_age'])?$single[1208]['to_age']:''?>
    </th>
    <th class="font-size"><?php echo isset($single[1208]['allowed_frequency'])?$single[1208]['allowed_frequency']:''?></th>
    <th>Times in</th>
    <th class="font-size"><?php echo isset($single[1208]['allowed_frequency_duration_single'])?$single[1208]['allowed_frequency_duration_single']:''?></th>
    <th class="font-size">
    	<?php echo isset($single[1208]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>
	</th>
    <th class="font-size">
    	<?php echo isset($single[1208]['coverage_percentage'])?$single[1208]['coverage_percentage']:''?>
    </th>
    </tr>
    <tr>
    <th>Sealant</th>
    <th class="font-size">
    	<?php echo isset($single[1351]['to_age'])?$single[1351]['to_age']:''?>
    </th>
    <th class="font-size"><?php echo isset($single[1351]['allowed_frequency'])?$single[1351]['allowed_frequency']:''?></th>
     <th>Times in</th>
    <th class="font-size"><?php echo isset($single[1351]['allowed_frequency_duration_single'])?$single[1351]['allowed_frequency_duration_single']:''?></th>
    <th class="font-size">
    	<?php echo isset($single[1351]['allowed_frequency_months'])?$single[1208]['allowed_frequency_months']:''?>
	</th>
    <th style="width: 7%" class="font-size">
    	<?php echo isset($single[1351]['coverage_percentage'])?$single[1351]['coverage_percentage']:''?>
    </th>
    </tr>
</table>
<table class="table table-bordered disabled-input" style="margin-right: -25px">
    <tr>
      <th >Cdt Groups</th>
      <th colspan="3">Allowed Freq.</th>
      <th>Months</th>
      <th>Covers</th>
      <th>Waiting<br> Period</th>
    </tr>
  <?php                        
  foreach ($cdt_codes as $cdtcodes) {
  if ($cdtcodes['cdtgroups'] !='') {
  ?>
  <tr class="">
    <th st><?php echo $cdtcodes['cdtgroups']; ?></th>
    <th style="width: 10%" class="font-size"><?php echo isset($insurancePlans[$cdtcodes['cdtid']]['allowed_frequency'])?$insurancePlans[$cdtcodes['cdtid']]['allowed_frequency']:0?></th>
    <th style="width: 20%">Times in</th>
    <th style="width: 10%" class="font-size"><?php echo isset($insurancePlans[$cdtcodes['cdtid']]['allowed_frequency_duration'])?$insurancePlans[$cdtcodes['cdtid']]['allowed_frequency_duration']:0?></th>
    <th style="width: 70px;" class="font-size"><?php echo $allowed_frequency_months;?></th>
    <th style="width: 7%" class="font-size">
      <?php echo isset($percentage[$cdtcodes['treatmenttypeid']])?$percentage[$cdtcodes['treatmenttypeid']]:0;?>%
    </th>
    <th style="width: 7%" class="font-size">
      <?php echo isset($waitingPeriod[$cdtcodes['treatmenttypeid']])?$waitingPeriod[$cdtcodes['treatmenttypeid']]:0;?>
    </th>
  </tr>
  <?php }
  }
  ?>
</table>
</div>
</div>

<div style=" position: fixed;
   left: 0;
   bottom: 30;
   width: 100%;
   font-size: 10px;">

  <table>
    <p style="font-size: 10px">Notes: <?php echo isset($patient['freetexts'])?$patient['freetexts']:''; ?></p>
  </table>

</div>

<div style=" position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   font-size: 10px;
   text-align: center;">

  <p>This report is for information purposes only and is derived from the payer indicated above and is not a guarantee of payment
    <span style="float: right;">Date Revised : <?php echo $patient['lastupdate']?></span>
  </p>

</div>

		
<!-- /.container-fluid -->
<script type="text/javascript">
   $(window).on('load', function() {
       $('#myModal_pop').modal('show');
    });
    // $(".disabled-input input").attr('disabled','disabled');
    // $(".disabled-input select").attr('disabled','disabled');


    $(document).ready(function () {
    $('#checkbox1').change(function () {
        // if (!this.checked){
        // 	$(".disabled-input input").attr('disabled','disabled');
        //  	$(".disabled-input select").attr('disabled','disabled');
        // }
        // else {
        //     $(".disabled-input select").removeAttr('disabled');
        //     $(".disabled-input input").removeAttr('disabled');
        // }
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

