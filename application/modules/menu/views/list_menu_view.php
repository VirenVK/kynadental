<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'menu/addMenu';?>">Add New</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="border-0">Menu Id</th>
						<th class="border-0">Name</th>
						<th class="border-0">Controller</th>
						<th class="border-0">Method</th>
						<th class="border-0 text-center">Display Order</th>
						<th class="border-0">Menu Icon</th>
						<th class="border-0 text-center">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
						if(!empty($allMenu)) {
							foreach($allMenu as $am){
								?>
								<tr>
									<td><?php echo $am['id_menu'];?></td>
									<td><?php echo $am['name'];?></td>
									<td><?php echo $am['controller'];?></td>
									<td><?php echo $am['method'];?></td>
									<td class="text-center"><?php echo $am['display_orders'];?></td>
									<td><?php echo $am['menu_icon'];?></td>
									<td class="text-center">
										<div class="dropdown dropleft">
											<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
												Action
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="<?php echo WEB_URL.'menu/editMenu/'.$am['id_menu'];?>">Edit</a>
											</div>
										</div>
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
