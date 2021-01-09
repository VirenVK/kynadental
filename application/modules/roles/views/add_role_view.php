<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
		</div>
		<div class="card-body">
			<form action="" method="POST" class="user">
				<div class="row">
					<div class="col-6">
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Department <star>*</star></label>
								<?php
									echo form_dropdown('id_department',$department,'',"class='form-control' id='id_department' ");
									echo form_error('id_department');
								?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Role Name <star>*</star></label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Role Name" value="<?php echo set_value('name');?>">
								<?php echo form_error('name');?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<label>Status <star>*</star></label>
								<input type="radio" name="is_active" id="is_active" value="Y">&nbsp;Enable&nbsp;
								<input type="radio" name="is_active" id="is_active" value="N" checked >&nbsp;Disable
								<?php echo form_error('is_active');?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-default panel-custom" >
							<h5 class="panel-heading card-title">Menu</h5>
							<div class="panel-body" >
								<div id="navbarCollapse" class="navbar-collapse">
									<ul  class="list-unstyled" style="list-style-type:none">
										<?php
										foreach($menus as $val){
											?>
											<li>
												<input type="checkbox" value="<?php echo $val['id_menu'];?>"  name="roles[]" >&nbsp;&nbsp;<?php echo $val['name'];?>
												<ul style="list-style-type:none">
													<?php
													$sub_menu = $val['sub_menu'];
													if(!empty($sub_menu)) {
														foreach ($sub_menu as $vv) {
															?>
															<li><input type="checkbox"
																	   value="<?php echo $vv['id_menu']; ?>"
																	   name="roles[]">&nbsp;&nbsp;<?php echo $vv['name']; ?>
																<ul class="list-inline"
																	style="list-style-type:none;margin-left:15px;">
																	<?php
																	$menu_option = $vv['menu_option'];
																	foreach ($menu_option as $vvv) {
																		?>
																		<li><input type="checkbox"
																				   value="<?php echo $vvv['id_menu']; ?>"
																				   name="roles[]">&nbsp;&nbsp;<?php echo $vvv['name']; ?>
																		</li>
																		<ul class="list-inline"
																			style="list-style-type:none;margin-left:15px;">
																			<?php
																			$sub_menu_option = $vvv['sub_menu_option'];
																			foreach ($sub_menu_option as $vvvv) {
																				?>
																				<li><input type="checkbox"
																						   value="<?php echo $vvvv->id_menu; ?>"
																						   name="roles[]">&nbsp;&nbsp;<?php echo $vvvv->name; ?>
																				</li>

																				<?php
																			}
																			?>
																		</ul>
																		<?php
																	}
																	?>
																</ul>
															</li>
															<?php
														}
													}
													?>

												</ul>
											</li>
											<?php
										}
										?>
									</ul>
								</div>
							</div>
						</div>
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>">
						<div class="form-group ">
							<div class="col-sm-12">
								<button type="submit" name="submit" value="submit" class="btn btn-primary">
									Save
								</button>
								<a href="<?php echo WEB_URL.'roles/allRoles';?>" class="btn btn-danger">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>

</div>
<script>
	$(document).ready(function () {
		$( document ).ready(function() {
			$("input[type=checkbox]").click(function () {
				if(this.checked) {
					$(this).parents('li').children("input[type=checkbox]").prop('checked', true);
				}
				if(!this.checked){
					var count=0;
					$(this).parent('li').parent().parent('li').each(function () {
						if($(this).find('input[type=checkbox]').is(':checked')){
							count++;

						}
						if(count===0){
							$(this).prop('checked',false);
						}
					});
				};
				$(this).parent().find("input[type=checkbox]").prop('checked',this.checked);
			})
		});

	})
</script>
