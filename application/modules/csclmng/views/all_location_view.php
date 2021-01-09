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
					<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'csclmng/addLocation';?>">Add Location</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('theme/message_view');?>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="border-0">Location Name</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($cscs)) {
						foreach($cscs as $csc){
							?>
							<tr>
								<td><?php echo $csc['name'];?></td>
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
