<div class="table-responsive">
	<!-- dataTable -->
	<table id="" class="table table-hover" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th class="border-0">Office Name</th>
			<th class="border-0">First Name</th>
			<th class="border-0">Last Name</th>
			<th class="border-0">DOB.</th>
			<th class="border-0 text-center">Option</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(!empty($employee)) {
			foreach($employee as $emp){
				?>
				<tr>
					<td><?php echo $emp['officename'];?></td>
					<td><?php echo $emp['p_firstname']?></td>
					<td><?php echo $emp['p_lastname'];?></td>
					<td><?php echo $emp['p_dob'];?></td>
					<td class="text-center">
						<div class="dropdown dropleft">
							<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo WEB_URL.'patient/editpatient?id='.encrypt_url($emp['patientid']);?>">Edit</a>
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
