<!-- Page Wrapper -->
<div id="wrapper">
	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion box-shd shadow" id="accordionSidebar">
		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center py-3 mb-2" href="<?php echo WEB_URL.'dashboard';?>">
			<img src="<?php echo WEB_IMG_PATH;?>image/login.png" style='height: 37px;width: 45px;' class="img-fluid">
		</a>
		<!-- Divider -->
		<?php
		$leftMenu = $accessMenu;//$this->session->userdata('menu');
		foreach($leftMenu as $main_menu) {
			$sub_menu = FALSE;
			if(count($main_menu['sub_menu']) > 0){
				$sub_menu = TRUE;
			}
			?>
			<li class="nav-item">
				<?php
				if(!$sub_menu) {
					?>
					<a class="nav-link"
					   href="<?php echo WEB_URL . $main_menu['controller'] . '/' . $main_menu['method']; ?>">
						<i class="material-icons"><?php echo $main_menu['menu_icon'];?></i>
						<span><?php echo $main_menu['name']; ?></span>
					</a>
					<?php
				}else {
					$sub_menu_arr = $main_menu['sub_menu'];
					?>
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?php echo str_replace(' ','',$main_menu['name']);?>" aria-expanded="true" aria-controls="collapseUtilities">
						<i class="material-icons"><?php echo $main_menu['menu_icon'];?></i>
						<span><?php echo $main_menu['name']; ?></span>
					</a>
					<div id="<?php echo str_replace(' ','',$main_menu['name']);?>" class="collapse border-0" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">							
							<?php
							foreach($sub_menu_arr as $sub_menu) {
								?>								
								<a class="collapse-item" href="<?php echo WEB_URL . $sub_menu['controller'] . '/' . $sub_menu['method']; ?>">
									<?php echo $sub_menu['name'];?></a>
								<?php
							}
							?>
						</div>
					</div>
					<?php
				}
				?>
			</li>
			<?php
		}
		?>
		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline mt-3">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>
		<div class="col-12 text-center d-table">
			<small class="text-white py-5 d-block">Powered by kynadental</small>
		</div>
	</ul>
	<!-- End of Sidebar -->
