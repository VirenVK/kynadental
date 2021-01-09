<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4 valid-form">
		<div class="card-header">
			<div class="row">
				<div class="col-6">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-6 text-right">
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'employee/allEmployee';?>">Back</a>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2 col-12">
							<img src="<?php echo WEB_IMG_PATH.$employee['user_icon']; ?>" class=" img-responsive" alt="no image"  style="width:153px">
						</div>
						<div class="col-md-10 col-12">
							<div style="font-size: 35px; color:#ea6565">
								<?php echo $employee['first_name'].' '.$employee['last_name'];?>
							</div>

							<div class="row" style="padding:0px">
								<div class="col-2 font-login-head">
									<div for="name" class=""><b>Email:  </b></div>
								</div>
								<div class="col-4 font-login-type">
									<b><?php echo $employee['email'];?></b>
								</div>

								<div class="col-2 font-login-head">
									<div for="name" class=""><b>Mobile no.:  </b></div>
								</div>
								<div class="col-4 font-login-type">
									<b><?php echo $employee['phone'];?></b>
								</div>

								<div class="col-2 font-login-head">
									<div for="name" class=""><b>Nationality:  </b></div>
								</div>
								<div class="col-4 font-login-type">
									<b><?php echo $employee['nationality'];?></b>
								</div>

								<div class="col-2 font-login-head">
									<div for="name" class=""><b>DOB:  </b></div>
								</div>
								<div class="col-4 font-login-type">
									<b><?php echo $employee['dob'];?></b>
								</div>

								<div class="col-2 font-login-head">
									<div for="name" class=""><b>Address:  </b></div>
								</div>
								<div class="col-4 font-login-type">
									<b><?php echo $employee['address1'].' '.$employee['city1'].' '.$employee['state1'].' '.$employee['country1'].' '.$employee['pin_code1']; ?></b>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-6">
									<form action="" method="POST">
										<input type="hidden" name="id_user" value="<?php echo $employee['id_user'];?>">
										<div class="form-group">
											<label for="email" class="col-form-label">Email: </label> &nbsp;<?php echo $employee['email'];?>
										</div>
										<div class="form-group">
											<label for="password" class="col-form-label">Password: </label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password">
											<?php echo form_error('password');?>
										</div>
										<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
										<div class="form-group">
											<button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Login</button>
											<a href="<?php echo WEB_URL.'employee/allEmployee';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
