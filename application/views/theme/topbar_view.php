<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
  </button>
  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto menu_hover">
    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1" style="display:none;">
      <a class="nav-link" href="<?php echo WEB_URL.'inbox/inboxList';?>" id="messagesDropdown">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">7</span>
      </a>
    </li>
    
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
      <img class="img-profile rounded-circle" src="<?php echo WEB_IMG_PATH.'image/avatar.png'; ?>">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?php echo WEB_URL.'users/changePassword';?>">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?php echo WEB_URL.'login/logout';?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- End of Topbar -->
