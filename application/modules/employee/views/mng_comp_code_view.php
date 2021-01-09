<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<?php echo form_open(WEB_URL.'employee/mngCompCode?empid='.encrypt_url($employee['id_user']));?>
	<input type="hidden" name="id_user" id="id_user" value="<?php echo $employee['id_user'];?>">
	<div class="card shadow mb-4 valid-form">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6 col-8">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
				</div>
				<div class="col-md-6 col-4 text-right">
					<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'employee/allEmployee';?>">Back</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="col-12">
				<div class="form-group">
					<div class="row">
						<div class="col-md-1 col-6">
							<div for="name" class=""><b>Name </b></div>
						</div>
						<div class="col-md-2 col-6">
							: <?php echo $employee['first_name'];?>
						</div>
						<div class="col-md-1 col-6">
							<div for="name" class=""><b>Email </b></div>
						</div>
						<div class="col-md-2 col-6">
							: <?php echo $employee['email'];?>
						</div>
						<div class="col-md-1 col-6">
							<div for="name" class=""><b>Mobile No </b></div>
						</div>
						<div class="col-md-2 col-6">
							: <?php echo $employee['phone'];?>
						</div>
						<div class="col-md-1 col-6">
							<div for="name" class=""><b>Role </b></div>
						</div>
						<div class="col-md-2 col-6">
							: <?php echo $employee['role_name'];?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md-1 col-6">
							<div for="name" class=""><b>Address </b></div>
						</div>
						<div class="col-md-4 col-6">
							: <?php echo $employee['address1'].' '.$employee['city1'].' '.$employee['pin_code1'];?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4 valid-form">
		<div class="card-body">
			<div class="row">
				<?php
				if(!empty($compCodes)) {
					foreach($compCodes as $ccn){
						?>
						<div class="col-md-3 col-12">
							<input type="checkbox" name="id_company_code[]" <?php echo (in_array($ccn['id_company_code'], $codeMapping)) ? 'checked' : '' ?> value="<?php echo $ccn['id_company_code'];?>"> <?php echo $ccn['comp_code'];?> - <?php echo $ccn['company_name'];?>
						</div>
					<?php }
				}
				?>
			</div>
			<?php echo form_error('id_company_code[]');?>
			<div class="row">
				<div class="col-12 text-right">
					<div class="form-group">
						<button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Submit</button>
						<a href="<?php echo WEB_URL.'employee/allEmployee';?>" class="btn btn-danger pl-3 pr-3">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close();?>
</div>
<!-- /.container-fluid -->
