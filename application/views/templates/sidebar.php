	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
			<div class="sidebar-brand-icon">
        <img src="<?= base_url('assets/img/corpu.png'); ?>" alt="The Gade" class="img-fluid">
				<!-- <i class="fas fa-laugh-wink"></i> -->
			</div>
			<div class="sidebar-brand-text mx-3">The Gade Learning Center</div>
		</a>

		<!-- Divider -->
        <hr class="sidebar-divider">

          <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
      <?php if($this->session->userdata('role_id') == 1) : ?>
        <a class="nav-link" href="<?= base_url(''); ?>">
      <?php endif;?>
      <?php if($this->session->userdata('role_id') == 2) : ?>
        <a class="nav-link" href="<?= base_url(''); ?>">
      <?php endif;?>
      <?php if($this->session->userdata('role_id') == 3) : ?>
        <a class="nav-link" href="<?= base_url(''); ?>">
      <?php endif;?>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>E-LPJ</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>  
            <a class="collapse-item" href="<?= base_url('lpj') ?>">LPJ The Gade</a>
            <a class="collapse-item" href="">Laporan LPJ Tahunan</a>
          </div>
        </div>
      </li> -->
      <?php if($this->session->userdata('role_id') == 3) : ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true" aria-controls="collapseRole">
          <i class="fas fa-fw fa-check-square"></i>
          <span>Role Management</span>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="<?= base_url('role'); ?>">Data Admin</a>
          </div>
        </div>
      </li>
      <?php endif;?>

      <?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>

         <!-- Heading -->
      <div class="sidebar-heading">
        Management
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat" aria-expanded="true" aria-controls="collapseSurat">
          <i class="fas fa-fw fa-envelope"></i>
          <span>E-Surat</span>
        </a>
        <div id="collapseSurat" class="collapse" aria-labelledby="headingSurat" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <!-- <a class="collapse-item" href="<?= base_url('surat_masuk'); ?>">Surat Masuk</a> -->
            <!-- <a class="collapse-item" href="<?= base_url('surat_keluar'); ?>">Surat Keluar</a> -->
            <a class="collapse-item" href="<?= base_url('surat'); ?>">Agenda</a> 
            <a class="collapse-item" href="<?= base_url('surat_perjalanan'); ?>">Surat Ekspedisi</a> 
          
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRooms" aria-expanded="true" aria-controls="collapseRooms">
          <i class="fas fa-fw fa-hotel"></i>
          <span>E-Rooms</span>
        </a>
        <div id="collapseRooms" class="collapse" aria-labelledby="headingRooms" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('data_kamar'); ?>">Data Kamar</a>
          </div>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="true" aria-controls="collapseEvent">
          <i class="fas fa-fw fa-calendar"></i>
          <span>E-Event</span>
        </a>
        <div id="collapseEvent" class="collapse" aria-labelledby="headingEvent" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('evencal'); ?>">Calendar Event</a>
          </div>
        </div>
      </li> -->

      <?php endif;?>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Logout
		</div>

		<li class="nav-item">
			<a class="nav-link" href="<?= base_url('auth/logout');?>">
				<i class="fas fa-fw fa-sign-out-alt"></i>
				<span>LOG OUT</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->
