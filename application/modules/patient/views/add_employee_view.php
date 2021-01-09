<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
	<?php
	$attributes = array('id' => 'myform');
	echo form_open(WEB_URL.'employee/addEmployee',$attributes);
	?>
	  	<div class="card shadow mb-4 valid-form">
		    <div class="card-header">
		      <div class="row">
		        <div class="col-6">
		          <h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		        </div>
		        <div class="col-6 text-right">
		          <a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'employee/allEmployee';?>">Back</a>
		        </div>
		      </div>
		    </div>
		    <?php $this->load->view('theme/message_view');?>
		    <div class="card-body">
		        <div class="row">
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="fileToUpload">Choose file</label>
			              <input type="file" class="custom-file" id="fileToUpload" name="fileToUpload">
			              <?php echo form_error('fileToUpload');?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="first_name" class="col-form-label">First Name<span> *</span></label>
			              <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" style="text-transform: capitalize;" value="<?php echo set_value('first_name');?>">
			              <?php echo form_error('first_name');?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
		            	<div class="form-group">
			              	<label for="last_name" class="col-form-label">Last Name<span> *</span></label>
			              	<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" style="text-transform: capitalize;" value="<?php echo set_value('last_name');?>">
		              		<?php echo form_error('last_name');?>
		            	</div>
		          	</div>
		          	<div class="col-md-3 col-12">
		            	<div class="form-group">
				            <label for="email" class="col-form-label">Email<span> *</span></label>
				            <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email" value="<?php echo set_value('email');?>">
				            <?php echo form_error('email');?>
		            	</div>
		          	</div>
		          <div class="col-md-3 col-12">
		            <div class="form-group">
		              <label for="phone" class="col-form-label">Mobile No.<span> *</span></label>
		              <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Number" value="<?php echo set_value('phone');?>">
		              <?php echo form_error('phone');?>
		            </div>
		          </div>
		          <div class="col-md-3 col-12">
		            <div class="form-group">
		              <label for="alternate_number" class="col-form-label">Alternative Mobile No.</label>
		              <input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="Alternative Mobile No." value="<?php echo set_value('alternate_number');?>">
		              <?php echo form_error('alternate_number');?>
		            </div>
		          </div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="nationality" class="col-form-label">Nationality<span> *</span></label>
							<?php
							echo form_dropdown('nationality',$country,'',"class='form-control' id='nationality' ");
							echo form_error('nationality');
							?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="roles" class="col-form-label"> Role<star> *</star></label>
							<?php
								echo form_dropdown('roles',$roles,'',"id='roles' class='form-control'");
								echo form_error('roles')
							?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
						  <label for="dob" class="col-form-label">Date of Birth<span> *</span></label>
						  <input type="date" class="form-control" id="dob" name="dob" value="">
						  <?php echo form_error('dob');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<div for="gender" class="col-form-label">Gender<span> *</span></div>
							<div class="form-check-inline">
								<label class="form-check-label" for="gender">
									<input type="radio" class="form-check-input" id="gender" name="gender" value="M" checked>Male
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label" for="gender">
									<input type="radio" class="form-check-input" id="gender" name="gender" value="F">Female
								</label>
							</div>
						</div>
						<?php echo form_error('gender');?>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="department" class="col-form-label"> Department<star> *</star></label>
							<?php
								echo form_dropdown('department',$department,'',"id='department' class='form-control'");
								echo form_error('department')
							?>
						</div>
					</div>
		        </div>
		    </div>
	  	</div>
	  	<div class="card shadow mb-4 valid-form">
		  	<div class="card-header">
		      <div class="row">
		        <div class="col-12">
		          <h6 class="font-weight-bold text-primary m-0">Correspondence Address</h6>
		        </div>
		      </div>
		    </div>
		  	<div class="card-body">
		        <div class="row address">
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="country1" class="col-form-label">Country<span> *</span></label>
							<?php
							echo form_dropdown('country1',$country,set_value('country1'),"class='form-control' id='id_country' ");
							echo form_error('country1');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="state1" class="col-form-label">State<span> *</span></label>
							<?php
							echo form_dropdown('state1',array(''=>'Please Select'),set_value('state1'),"class='form-control' id='id_state' ");
							echo form_error('state1');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="city1" class="col-form-label">City<span> *</span></label>
							<?php
							echo form_dropdown('city1',array(''=>'Please Select'),set_value('city1'),"class='form-control' id='id_city' ");
							echo form_error('city1');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="pin_code" class="col-form-label">Pin Code<span> *</span></label>
			              <input type="text" class="form-control" id="pin_code" name="pin_code1" placeholder="Pin Code">
			              <?php echo form_error('pin_code1');?>
			            </div>
		          	</div>
		        </div>
		  		<div class="row">
		          	<div class="col-6">
			            <div class="form-group">
			              <label for="address1" class="col-form-label">Address<span> *</span></label>
			              <textarea class="form-control" id="address1" name="address1" placeholder="Address"></textarea>
			              <?php echo form_error('address1');?>
			            </div>
		          	</div>
		        </div>
		  	</div>
	  	</div>
	  	<div class="card shadow mb-4 valid-form">
		  	<div class="card-header">
		      <div class="row">
		        <div class="col-12">
		          <h6 class="font-weight-bold text-primary m-0">Permanent Address</h6>
		        </div>
		      </div>
		    </div>
		  	<div class="card-body">
		  		<div class="row address">
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="country2" class="col-form-label">Country<span> *</span></label>
							<?php
							echo form_dropdown('country2',$country,set_value('country2'),"class='form-control' id='id_country2' ");
							echo form_error('country2');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="state2" class="col-form-label">State<span> *</span></label>
							<?php
							echo form_dropdown('state2',array(''=>'Please Select'),set_value('state2'),"class='form-control' id='id_state2' ");
							echo form_error('state2');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="city2" class="col-form-label">City<span> *</span></label>
							<?php
							echo form_dropdown('city2',array(''=>'Please Select'),set_value('city2'),"class='form-control' id='id_city2' ");
							echo form_error('city2');
							?>
			            </div>
		          	</div>
		          	<div class="col-md-3 col-12">
			            <div class="form-group">
			              <label for="pin_code2" class="col-form-label">Pin Code<span> *</span></label>
			              <input type="text" class="form-control" id="pin_code2" name="pin_code2" placeholder="Pin Code">
			              <?php echo form_error('pin_code2');?>
			            </div>
		          	</div>
		        </div>
		  		<div class="row">
		          	<div class="col-6">
			            <div class="form-group">
			              <label for="address2" class="col-form-label">Address<span> *</span></label>
			              <textarea class="form-control" id="address2" name="address2" placeholder="Address"></textarea>
			              <?php echo form_error('address2');?>
			            </div>
		          	</div>
		        </div>
		        <div class="row">
			  		<div class="col-12">
			  			<div class="form-group">
				            <button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Save</button>
			    			<a href="<?php echo WEB_URL.'employee/allEmployee';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
				        </div>
			  		</div>
		        </div>
		  	</div>
	  	</div>
	<?php echo form_close(); ?>
</div>
<!-- /.container-fluid -->
