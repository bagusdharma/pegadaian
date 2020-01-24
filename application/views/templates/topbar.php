
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

  				<!-- Topbar Search -->
  				<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  					<div class="input-group">
  						<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
  							aria-label="Search" aria-describedby="basic-addon2">
  						<div class="input-group-append">
  							<button class="btn btn-primary" type="button">
  								<i class="fas fa-search fa-sm"></i>
  							</button>
  						</div>
  					</div>
  				</form> -->

  				<!-- Topbar Navbar -->
  				<ul class="navbar-nav ml-auto">

  					<!-- Nav Item - Search Dropdown (Visible Only XS) -->
  					<li class="nav-item dropdown no-arrow d-sm-none">
  						<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
  							aria-haspopup="true" aria-expanded="false">
  							<i class="fas fa-search fa-fw"></i>
  						</a>
  						<!-- Dropdown - Messages -->
  						<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
  							aria-labelledby="searchDropdown">
  							<form class="form-inline mr-auto w-100 navbar-search">
  								<div class="input-group">
  									<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
  										aria-label="Search" aria-describedby="basic-addon2">
  									<div class="input-group-append">
  										<button class="btn btn-primary" type="button">
  											<i class="fas fa-search fa-sm"></i>
  										</button>
  									</div>
  								</div>
  							</form>
  						</div>
  					</li>
  					<div class="topbar-divider d-none d-sm-block"></div>

  					<!-- Nav Item - User Information -->
  					<li class="nav-item dropdown no-arrow">
  						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
  							aria-haspopup="true" aria-expanded="false">
  							<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'];?> ( <?= $user['NIK']; ?> )</span>
  							<img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/').$user['image']; ?>">
  						</a>
  						<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
  							aria-labelledby="alertsDropdown">
  							<h6 class="dropdown-header">
  								User Information
  							</h6>
  							<a class="dropdown-item d-flex align-items-center" href="<?= base_url('/user'); ?>">
  								<div class="mr-3">
  									<div class="icon-circle bg-primary">
  										<i class="fas fa-user-alt text-white"></i>
  									</div>
  								</div>
  								<div>
  									<div class="small text-gray-500"></div>
  									<span class="font-weight-bold">My Profile</span>
  								</div>
  							</a>
  							<a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout'); ?>">
  								<div class="mr-3">
  									<div class="icon-circle bg-danger">
  										<i class="fas fa-exclamation-triangle text-white"></i>
  									</div>
  								</div>
  								<div>
  									<div class="small text-gray-500"></div>
  									<span class="font-weight-bold">Log Out Account</span>
  								</div>
  							</a>

  						</div>
  					</li>


  				</ul>

  			</nav>
  			<!-- End of Topbar -->
