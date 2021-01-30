<style type="text/css">
  .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.tablinks{
  color: white
}
.form-check-label{
  margin-top: 3px;
}
</style>

<div id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <div class="row">
          <div class="col-md-12">
            <div class="tab" style="background: #1abc9c">
                  <button class="tablinks" id="patientBenefits">Patient Benefits</button>
                  <button class="tablinks" id="treatmentPlan">Treatment Plans</button>
                  <button class="tablinks" >Claims</button>
                  <button class="tablinks" >Credentialing</button>
            </div>

          </div>
        </div>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>            
          </div>
              <?php $this->load->view('theme/message_view');?>

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl-12">
              <div class="card shadow mb-4">
                <div class="card-header">
                  <div class="row">
                    <div class="col-xl-12 col-md-12 mb-4">
                      <a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$_GET['patientid'];?>" style='float: right;' >Back</a>
                        <center><h5>PATIENT INFO</h5></center>
                        
                    </div>
                    <div class="col-xl-12">
                          <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group">
                               
                                <label for="name">First Name: </label>
                                <span class="text"><?php echo $patient["p_firstname"];?></span>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="email">Last Name: </label>
                                <span class="text"><?php echo $patient["p_lastname"];?></span>
                                
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <div class="form-group">
                                <label for="email">Date of Birth: </label>
                                <span class="text"><?php echo $patient["p_dob"];?></span>

                              </div>
                            </div>
                          </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
           <?php
            $attributes = array('id' => '', 'autocomplete'=>'off');
            $url='treatmentPlan/patientTrtmntPlan';
            echo form_open(WEB_URL.$url, $attributes);
            ?>
             <input type="hidden" name="patientid" value="<?php echo isset($_GET['patientid'])?$_GET['patientid']:0; ?>">
          <div class="row">
            <div class="col-xl-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                   <center><h5>Treatment Group</h5></center>
                  <ul class="list-group list-group-flush" id="treatmentGroup" style="height: 200px;overflow: scroll;">
                    <?php
                      if(!empty($treatmentGroups)) {
                        foreach($treatmentGroups as $tg){
                    ?>
                      <li class="list-group-item">
                        <input class="form-check-input" type="checkbox" name="treatmentGroup[]" value="<?php echo $tg->idtrtmnt_groups; ?>" aria-label="...">
                        <?php echo $tg->trtmnt_groupsdetails; ?>
                      </li>
                    <?php }}?>
                    </ul>
                    <br>
                    <div class="row">
                      <div class="col-sm-6">
                        <center><h6>Cdt Codes</h6></center>
                        <ul class="list-group list-group-flush" id="treatmentGroup" style="height: 200px;overflow: scroll;">
                        <?php
                          if(!empty($cdt_codes)) {
                            foreach($cdt_codes as $code){
                        ?>
                          <li class="list-group-item">
                            <input class="" type="checkbox" name="[]" onchange="cdt_codes('<?php echo $code->cdtid; ?>','<?php echo $code->cdt_codes; ?>')" value="<?php echo $code->cdtid; ?>" aria-label="...">
                            <?php echo $code->cdt_codes; ?>
                          </li>
                        <?php }}?>
                        </ul>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="name">Tooth</label>
                          <input type="text" name="tooth" id="name" class="form-control" placeholder="Tooth">
                        </div>
                         <div class="form-group">
                          <label for="email">Dentist</label>
                          <select class="form-control" name="iddentist">
                            <?php foreach ($dentist as $dent) { ?>
                              <option value="<?php echo $dent->iddentist;?>"><?php echo $dent->firstname.' '.$dent->lastname ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    
                    </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card shadow mb-4">
                <div class="card-header">
                  
                  <div class="card-body" id="cdtCodesMainDiv">
                  Please select treatment groups
                  </div>
                  <input type="submit" name="submit" id="submit" value="submit" style="float: right;display: none;" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php echo form_close();?>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
</div>
<script>
  $(function(){
    $("#example").dataTable();

     $("#changeOffice").change(function(){
     var id = $('#changeOffice').val();
     window.location.href = "<?php echo WEB_URL.'treatmentPlan/index?officeId='?>"+id;
    });

    $("#treatmentPlan").click(function(){
     var id = $('#changeOffice').val();
     window.location.href = "<?php echo WEB_URL.'treatmentPlan/index'?>";
    });    

    $("#patientBenefits").click(function(){
     window.location.href = "<?php echo WEB_URL.'dashboard/index'?>";
    });

    $("#treatmentGroup input:checkbox").click(function(){
      var checkedTrtmntGrp = document.getElementsByName('treatmentGroup[]');
      var len = checkedTrtmntGrp.length;
      var arrCheckedTrtmntGrp = [];
      var arrUncheckedTrtmntGrp = [];
      for (var i=0; i<len; i++) {
        checkedTrtmntGrp[i].checked ? arrCheckedTrtmntGrp.push(checkedTrtmntGrp[i].value) : arrUncheckedTrtmntGrp.push(checkedTrtmntGrp[i].value);
      }
      
      $.ajax({
        url:'<?=WEB_URL?>treatmentPlan/getCdtCodesByTrtmtGroupId',
        method: 'post',
        data: {treatmentGroupId: arrCheckedTrtmntGrp, remainingTrtmntGrpId: arrUncheckedTrtmntGrp},
        dataType: 'json',
        beforeSend: function () {
            jQuery('select#state-name').find("option:eq(0)").html("Please wait..");
        },
        success: function(response){
          var checkedTrtmntGrp = response.checkedTrtmntGrp;
          var htmlDiv = '';
            for (var i = 0; i < response.checkedTrtmntGrp.length; i++) {
              if(checkedTrtmntGrp[i].cdt_codes != null){
                htmlDiv +='<div class="form-check form-switch">';
                htmlDiv +='<input class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault" name="checkedTrtmntGrpCdtCode[]" value="'+checkedTrtmntGrp[i].cdtid+'" >';
                htmlDiv +='<label class="form-check-label" for="flexSwitchCheckDefault">'+checkedTrtmntGrp[i].cdt_codes+'</label>';
                htmlDiv +='</div>';
              }
            }
            jQuery("#cdtCodesMainDiv").html(htmlDiv);

            var uncheckedTrtmntGrp = response.uncheckedTrtmntGrp;
            var htmlDiv1 = '';
            for (var i = 0; i < response.uncheckedTrtmntGrp.length; i++) {
              if(uncheckedTrtmntGrp[i].cdt_codes != null){
                htmlDiv1 +='<div class="form-check form-switch">';
                htmlDiv1 +='<input class="form-check-input" type="checkbox" checked id="flexSwitchCheckDefault" name="uncheckedTrtmntGrpCdtCode[]" value="'+uncheckedTrtmntGrp[i].cdtid+'" >';
                htmlDiv1 +='<label class="form-check-label" for="flexSwitchCheckDefault">'+uncheckedTrtmntGrp[i].cdt_codes+'</label>';
                htmlDiv1 +='</div>';
              }
            }
            jQuery("#remainingTrtmntGrpDiv").html(htmlDiv1);

            $('#submit').show();
        }
      });

    });
  });

  function cdt_codes(id,code)
  {
    var checked=$('.form-check-input'+id).val();
    if (checked > 0) {
      $('.form-check-input2'+id).html('');
      return
    }
    var htmlDiv1 = '';
    var val = this.checked ? this.value : '';
     htmlDiv1 +='<div class="form-check form-switch form-check-input2'+id+'">';
     htmlDiv1 +='<input class="form-check-input form-check-input'+id+'" type="checkbox" checked id="flexSwitchCheckDefault" name="checkedTrtmntGrpCdtCode[]" value="'+id+'" >';
     htmlDiv1 +='<label class="form-check-label" for="flexSwitchCheckDefault">'+code+'</label>';
     htmlDiv1 +='</div>';

     jQuery("#cdtCodesMainDiv").append(htmlDiv1);

  }
 
  
  </script>
