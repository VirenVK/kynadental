<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<form method="POST" action="" enctype="multipart/form-data">
		<input type="hidden" name="id_menu" value="<?php echo $getMenu['id_menu'];?>">
		<div class="card shadow mb-4 valid-form">
			<div class="card-header">
				<div class="row">
					<div class="col-6">
						<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
					</div>
					<div class="col-6 text-right">
						<a class="btn btn-sm btn-outline-secondary" href="<?php echo WEB_URL.'menu/allMenu';?>">Back</a>
					</div>
				</div>
			</div>
			<?php $this->load->view('theme/message_view');?>
			<div class="card-body">
				<div class="row">
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="name" class="col-form-label">Name<span> *</span></label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" style="text-transform: capitalize;" value="<?php echo $getMenu['name'];?>">
							<?php echo form_error('name');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="help_name" class="col-form-label">Hint<span> *</span></label>
							<input type="text" class="form-control" id="help_name" name="help_name" placeholder="Hint" style="text-transform: capitalize;" value="<?php echo $getMenu['help_name'];?>">
							<?php echo form_error('help_name');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="controller" class="col-form-label">Controller<span> *</span></label>
							<input type="text" class="form-control" id="controller" name="controller" placeholder="Controller" style="text-transform: capitalize;" value="<?php echo $getMenu['controller'];?>">
							<?php echo form_error('controller');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="method" class="col-form-label">Method<span> *</span></label>
							<input type="text" class="form-control" id="method" name="method" placeholder="Method" style="text-transform: capitalize;" value="<?php echo $getMenu['method'];?>">
							<?php echo form_error('method');?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="id_parent" class="col-form-label">Parent ID<span> *</span></label>
							<input type="text" class="form-control" id="id_parent" name="id_parent" placeholder="Parent ID" style="text-transform: capitalize;" value="<?php echo $getMenu['id_parent'];?>">
							<?php echo form_error('id_parent');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="level" class="col-form-label">Level<span> *</span></label>
							<input type="text" class="form-control" id="level" name="level" placeholder="Level" style="text-transform: capitalize;" value="<?php echo $getMenu['level'];?>">
							<?php echo form_error('level');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="display_orders" class="col-form-label">Display Order<span> *</span></label>
							<input type="text" class="form-control" id="display_orders" name="display_orders" placeholder="Display Order" style="text-transform: capitalize;" value="<?php echo $getMenu['display_orders'];?>">
							<?php echo form_error('display_orders');?>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="form-group">
							<label for="menu_icon" class="col-form-label">Menu Icon<span> *</span></label>
							<input type="text" class="form-control" id="menu_icon" name="menu_icon" placeholder="Menu Icon" style="text-transform: capitalize;" value="<?php echo $getMenu['menu_icon'];?>">
							<?php echo form_error('menu_icon');?>
						</div>
					</div>
				</div>
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary pl-3 pr-3" value="submit" name="submit">Update</button>
							<a href="<?php echo WEB_URL.'menu/allMenu';?>" class="btn pl-3 pr-3 btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- /.container-fluid -->
