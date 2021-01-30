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
                    <div class="col-sm-10">
                      <?php
                          $attributes = array('id' => '', 'autocomplete'=>'off');
                          $url=isset($_GET['officeId'])?'treatmentPlan/index?officeId='.$_GET['officeId']:'treatmentPlan/index';
                          echo form_open(WEB_URL.$url, $attributes);
                        ?>
                          <div class="row">
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" name="f_name" id="name" class="form-control" placeholder="First Name" value="<?php echo isset($_POST['f_name'])?$_POST['f_name']:''?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="email">Last Name</label>
                                <input type="text" name="l_name" id="" class="form-control" placeholder="Last Name" value="<?php echo isset($_POST['l_name'])?$_POST['l_name']:''?>">
                              </div>
                            </div>
                            <div class="col-sm-3">
                              <div class="form-group">
                                <label for="email">Date of Birth</label>
                                <input type="text" name="dob" id="email" class="form-control datepicker" placeholder="Date of Birth" value="<?php echo isset($_POST['dob'])?$_POST['dob']:''?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12 px-0">
                            <input type="submit" name="search" value="Search" class="btn btn-primary pl-3 pr-3">
                            <a href="<?php echo WEB_URL.'treatmentPlan/index'?>" class="btn btn-danger pl-3 pr-3" value="reset" aria-hidden="true"> Reset </a>
                      </div>
                    <?php echo form_close();?>
                    </div>
                    <div class="col-sm-2 text-right">
                      <div class="form-group">
                         <label for="email">Select Office</label>
                          <select class="form-control" id="changeOffice">
                            <?php foreach ($office as $row) { ?>
                                <option value="<?php echo $row['officeid']; ?>" <?php echo $this->id_office > 0 && $this->id_office==$row['officeid']?'selected':'' ?>><?php echo $row['officename']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
              <div class="col-xl-12 col-md-12 mb-4">
              <?php if ($patient_data==1) { ?>
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <center><h5>PATIENTS</h5></center>
                    <div class="table-responsive">
                      <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr> 
                          <th class="border-0">Id</th>
                          <th class="border-0">First Name</th>
                          <th class="border-0">Last Name </th>
                          <th class="border-0">Date of Birth</th>
                        </tr>
                        </thead>
                      <!--   onclick="window.location='<?php echo WEB_URL.'treatmentPlan/patientTrtmntPlan?patientid='.$pat['patientid']?>'" -->
                        <tbody>
                            <?php
                          if(!empty($allpatientdataentry)) {
                            foreach($allpatientdataentry as $pat){
                              ?>
                              <tr onclick="window.location='<?php echo WEB_URL.'treatmentPlan/allPatientTrtmntPlan?patientid='.$pat['patientid']?>'" style="cursor:pointer">
                                <td><?php echo $pat['patientid']?></td>
                                <td><?php echo $pat['p_firstname']?></td>
                                <td><?php echo $pat['p_lastname'];?></td>
                                <td><?php echo $pat['p_dob'];?></td>
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
                <?php } ?>
              </div>
        </div>
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
      var weburl = $('meta[name="weburl"]').attr('content');
       $.get(weburl + 'dashboard/setOfficeId?id='+id, function (d) {
        window.location.href = "<?php echo WEB_URL.'treatmentPlan/index'?>";
      });
    });

    $("#treatmentPlan").click(function(){
     var id = $('#changeOffice').val();
     window.location.href = "<?php echo WEB_URL.'treatmentPlan/index'?>";
    });    

    $("#patientBenefits").click(function(){
    //  var id = $('#changeOffice').val();
     window.location.href = "<?php echo WEB_URL.'dashboard/index'?>";
    });
  })

 
  
  </script>
