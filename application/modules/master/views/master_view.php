<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-6 col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['page_sub_title'])){ echo $pvalue['page_sub_title'];}?></h6>
				</div>
				<div class="col-6 col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'master/addMaster?mcode='.$mcode;?>">Add New</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<?php $this->load->view('theme/message_view');?>
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
						<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th class="border-0">Name</th>
									<th class="border-0" style="width:150px;">Status</th>
									<th class="border-0" style="width:150px;">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
							if(!empty($results)) {
								foreach ($results as $val) {
									?>
									<tr>
										<td><?php echo $val['name'];?></td>
										<td>
											<?php
											if ($val['is_active'] == "Y") {
												?>
												<i class="fas fa-check-circle text-success" aria-hidden="true"
												   data-toggle="tooltip" title="Active"></i>
											<?php } else {
												?>
												<i class="fas fa-times-circle text-danger" aria-hidden="true"
												   data-toggle="tooltip" title="In Active"></i>
											<?php }
											?>
										</td>
										<td>
											<a href="<?php echo WEB_URL . 'master/editMaster?mcode='.$mcode.'&id='.$val['id']; ?>"
											   class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip"
											   data-placement="left" title="Edit">
												<i class="fas fa-edit"></i>
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
	</div>

</div>
<!-- /.container-fluid -->
