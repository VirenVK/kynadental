<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-10">
					<h6 class="font-weight-bold text-primary m-0"><?php if(isset($pvalue['title'])){ echo $pvalue['title'];}?></h6>
				</div>
				<div class="col-sm-2 text-right">
					<a class="btn btn-sm btn-outline-primary" href="#">Add New</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<form action="" method="POST" id="searchForm" autocomplete="off">
						<input type="hidden" name="post_url" id="post_url" value="<?php echo $post_url;?>">
						<input type="hidden" id='page_num' name='page_num' value='1'>

						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="email">Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?php if(isset($searchVal['name'])){ echo $searchVal['name'];}?>" placeholder="Name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 text-right">
								<button type="button" class="btn btn-secondary pl-5 pr-5 btnPaginationSearch" id="reset" aria-hidden="true"> Reset </button>

								<button type="button" class="btn btn-primary pl-5 pr-5 btnPaginationSearch" id="search"> Search </button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover" width="100%" cellspacing="0">
					<thead>
					<tr>
						<th class="border-0">Company Code</th>
						<th class="border-0">Company Name</th>
						<th class="border-0">City</th>
						<th class="border-0" style="width:250px;">Option</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if(!empty($company)) {
						foreach($company as $val){
							?>
							<tr>
								<td><?php echo $val['comp_short_name'];?></td>
								<td><?php echo $val['name'];?></td>
								<td><?php echo $val['city'];?></td>
								<td>
									<a class="btn btn-sm btn-outline-primary" href="<?php echo WEB_URL.'company/editCompany?company='.encrypt_url($val['id_company']); ?>">
										<!-- <i class="material-icons" data-toggle="tooltip" title="Edit">mode_edit</i> -->Edit
									</a>&nbsp;
									<a href="<?php echo WEB_URL.'company/manageCompanyCode?company='.encrypt_url($val['id_company']);?>" class="btn btn-sm btn-outline-primary">
										<span class="text">Manage Company Code</span>
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
			<?php $this->load->view('ajaxmodel/popup_model_view');?>
		</div>
	</div>
</div>
