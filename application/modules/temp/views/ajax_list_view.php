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
<!-- pagination start-->
<div class="row" style="margin-top: 10px;">
	<div class="col-md-12 text-left">
		<?php
		if(isset($pagination)){
			echo $pagination;
		}
		?>
	</div>
</div>
<!-- pagination end-->
