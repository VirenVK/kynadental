<div class="container-fluid">
	<!-- Page Heading -->
	<?php echo form_open(WEB_URL.'department/editDepartment?department='.encrypt_url($department['id_department']));?>
		<input type="hidden" name="id_department" value="<?php echo $department['id_department'];?>">
		<div class="card shadow mb-4 valid-form">
			<div class="card-header">
				<div class="row">
					<div class="col-6">
						<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
					</div>
					<div class="col-6 text-right">
						<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'department/allDepartment';?>">Back</a>
					</div>
				</div>
			</div>
			<?php $this->load->view('theme/message_view');?>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="dept_short_name" class="col-form-label"> Department
								<small data-toggle="tooltip" title="Code">
									<i class="fa fa-question-circle" aria-hidden="true"></i>
								</small>
							</label>
							<input type="text" class="form-control" id="dept_short_name" name="dept_short_name" placeholder="Code" value="<?php echo $department['dept_code'];?>">
							<?php echo form_error('dept_short_name');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="name" class="col-form-label">Department Name<span> *</span></label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Department Name" style="text-transform: capitalize;" value="<?php echo $department['name'];?>">
							<?php echo form_error('name');?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Update</button>
							<a href="<?php echo WEB_URL.'department/allDepartment';?>" class="btn btn-danger pl-3 pr-3">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close();?>
</div>
