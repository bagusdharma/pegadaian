<!-- Begin Page Content -->
<div class="container-fluid">
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Profile <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if($this->session->flashdata('message_error')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('message_error'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php if($this->session->flashdata('message_update')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('message_update'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card mb-3" style="max-width: 540px;">
		<div class="row no-gutters">
			<div class="col-md-4">
				<img src="<?= base_url('assets/img/profile/').$user['image']?>" class="card-img img-fluid" alt="...">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h4 class="card-title font-weight-bold"> <?= $user['name']; ?> </h4>
					<hr class="sidebar-divider">
					<p class="card-text"> <?= $user['NIK']; ?> </p>
					<p class="card-text"><?= $user['email']; ?></p>
				</div>
				<div class="card-footer mt-2">
					<a href="<?= base_url(); ?>user/update_profile/<?= $user['id']?>"
						class="btn btn-md btn-outline-info float-right" data-toggle="modal"
						data-target="#editModal<?= $user['id']; ?>">Edit Profile</a>
					<a href="<?= base_url(); ?>user/change_password/<?= $user['id']?>"
						class="btn btn-md btn-outline-danger float-left" data-toggle="modal"
						data-target="#passModal<?= $user['id']; ?>">Change Password</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- MODAL EDIT Profile -->
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="editModal<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('user/edit')?>" class="form-group" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $user['id']; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="NIK">NIK</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="text" name="NIK" id="NIK" class="form-control" value="<?= $user['NIK']; ?>"
									readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="name">Email </label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="text" placeholder=" Masukkan Email" name="email" id="email"
									class="form-control" value="<?= $user['email']; ?>" readonly>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="name">Nama Profile</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="text" placeholder="Nama Profile" name="name" id="name" class="form-control"
									value="<?= $user['name']; ?>">
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-2 mt-2">Picture</div>
							<div class="col-sm-10 mt-2">
								<div class="row">
									<div class="col-sm-3 mt-2">
										<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>"
											class="img-thumbnail">
									</div>
									<div class="col-sm-9 mt-2">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="image" name="image">
											<label class="custom-file-label" for="image">Choose file</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Profile</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="passModal<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="passModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="passModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('user/change_password')?>" class="form-group" method="post"
				enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $user['id']; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="current_password">Current Password</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="password" required name="current_password" id="current_password"
									class="form-control">
							</div>

						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="new_password1">New Password</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="password" required name="new_password1" id="new_password1"
									class="form-control">
							</div>

						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="new_password2">Repeat Password</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="password" required name="new_password2" id="new_password2"
									class="form-control">
							</div>

						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
