<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'roles/addRole';?>">Add Roles</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="border-0">Department</th>
						<th class="border-0">Name</th>
						<th class="border-0 text-center" style="width:120px;">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($roles)) {
						foreach($roles as $val) {
							?>
							<tr>
								<td><?php echo $val['dept_name'];?></td>
								<td><?php echo $val['role_name'];?></td>
								<td class="text-center">
									<a href="<?php echo WEB_URL.'roles/editRole/'.$val['id_role'];?>" class="btn btn-sm btn-outline-primary">
										<span class="text">Manage Role</span>
									</a>
								</td>
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

</div>
<!-- /.container-fluid -->
