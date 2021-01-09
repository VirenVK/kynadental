<div class="table-responsive">
	<table id="dataTable" class="table table-hover" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th class="border-0">Department Code</th>
			<th class="border-0">Department Name</th>
			<th class="border-0 text-center">Option</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(!empty($department)) {
			foreach($department as $dd){
				?>
				<tr>
					<td><?php echo $dd['dept_code'];?></td>
					<td><?php echo $dd['name'];?></td>
					<td class="text-center">
						<div class="dropdown dropleft">
							<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo WEB_URL.'department/editDepartment?department='.encrypt_url($dd['id_department']); ?>">
								Edit</a>
							</div>
						</div>
					</td>
				</tr>
				<?php
			}
		} else { ?>
			<tr>
				<td colspan="6" style="text-align: center;"><?php echo "No Data Found"?></td>
			</tr>
		<?php } ?>
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
