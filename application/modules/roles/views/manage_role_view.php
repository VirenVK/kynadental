<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST" class="user">
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0">
						<label>Role Name <star>*</star></label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Role Name" value="<?php echo set_value('name');?>">
						<?php echo form_error('name');?>
					</div>
				</div>
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
				<div class="form-group row">
					<div class="col-sm-2 mb-2 mb-sm-0">
						<button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary">
							Submit
						</button>
						<a href="<?php echo WEB_URL.'roles/allRoles';?>" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
