<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST" class="user">
				<input type="hidden" name="id_master_data" value="<?php echo $rows['id_master_data'];?>">
				<div class="form-group row">
					<div class="col-sm-3 mb-3 mb-sm-0">
						<label>Name<star>*</star></label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $rows['name'];?>">
						<?php echo form_error('name');?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-3 mb-3 mb-sm-0">
						<div class="form-group">
							<div for="status" class="col-form-label">Status<span> *</span></div>
							<div class="form-check-inline">
								<label class="form-check-label" for="status">
									<input type="radio" class="form-check-input" id="is_active" name="is_active" value="Y" <?php if($rows['is_active']=='Y'){ echo "checked";}?>>Active
								</label>
							</div>
							<div class="form-check-inline">
								<label class="form-check-label" for="status">
									<input type="radio" class="form-check-input" id="is_active" name="is_active" value="N" <?php if($rows['is_active']=='N'){ echo "checked";}?>>Inactive
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12 mb-2 mb-sm-0">
						<button type="submit" name="submit" value="submit" class="btn button-fsi btn-primary mr-2">
							Submit
						</button>
						<a href="<?php echo WEB_URL.$pvalue['back_url'];?>" class="btn button-fsi btn-danger">Cancel</a>
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
