<div class="table-responsive">
	<table id="dataTable" class="table table-hover" width="100%" cellspacing="0">
		<thead>
		<tr>
			<th class="border-0">Role</th>
			<th class="border-0">Name</th>
			<th class="border-0">Email</th>
			<th class="border-0">Mobile No.</th>
			<th class="border-0 text-center">Option</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if(!empty($employee)) {
			foreach($employee as $emp){
				?>
				<tr>
					<td><?php echo $emp['role_name'];?></td>
					<td><?php echo $emp['first_name'].' '.$emp['last_name'];?></td>
					<td><?php echo $emp['email'];?></td>
					<td><?php echo $emp['phone'];?></td>
					<td class="text-center">
						<div class="dropdown dropleft">
							<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo WEB_URL.'employee/editEmployee?id='.encrypt_url($emp['id_user']);?>">Edit</a>
								<a class="dropdown-item" href="<?php echo WEB_URL.'employee/mngCompCode?empid='.$emp['id_user'];?>">Company Code</a>
								<?php
								if($emp['id_login'] == 0) {
									?>
									<a class="dropdown-item"
									   href="<?php echo WEB_URL . 'employee/loginEmployee/' . $emp['id_user']; ?>">Create
										Login</a>
									<?php
								}
									?>
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
