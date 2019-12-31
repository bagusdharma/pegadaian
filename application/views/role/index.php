<div class="container">
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Role <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?= validation_errors(); ?>

	<div class="row mt-3">
		<div class="col-md-6">
		<button class="btn btn-primary">Tambah Pegawai</button>
		</div>
	</div>

	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th scope="col">#</th>
							<th scope="col">Nama Pegawai</th>
							<th scope="col">NIK</th>
							<th scope="col">Role Pegawai</th>
							<th scope="col">Status Pegawai</th>
							<th scope="col">Action</th>
							<!-- <th colspan="4" scope="col">Action</th> -->
						</tr>
					</thead>

					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($user_role as $ur) : ?>
						<tr>
							<th scope="row"><?= $i++;?></th>
							<td><?= $ur['name']; ?></td>
							<td><?= $ur['NIK']; ?></td>
							<td>
								<?php if($ur['role_id'] == 1):?>
								<a href="#" class="badge badge-info"> <?= $ur['role']; ?></a>
								<?php else: ?>
								<a href="#" class="badge badge-warning"> <?= $ur['role']; ?></a>
								<?php endif;?>
							</td>

							<td>
								<?php if($ur['is_active'] == 1):?>
								<a href="#" class="badge badge-success"> Active</a>

								<?php else: ?>
								<a href="#" class="badge badge-danger"> Not Active</a>

								<?php endif;?>
							</td>

							<td>
								<a href="<?= base_url(); ?>role/set_user/<?= $ur['id']?>"
									class="btn btn-sm btn-outline-primary" data-toggle="modal"
									data-target="#adminModal<?= $ur['id']; ?>">Setting User</a>
							</td>
						</tr>

						<?php endforeach ?>
					</tbody>

					<tfoot>
						<tr class="text-center">
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

</div>



<!-- Input Data Resi Surat -->

<?php foreach($data_user as $du) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="adminModal<?= $du['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adminModalLabel">Setting User Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('role/set_user')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $du['id']; ?>">
					<div class="container">
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="name">Nama Pegawai</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="name" id="name" placeholder="Nama Pegawai" class="form-control"
									value="<?= $du['name'] ?>" readonly>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="NIK">NIK Pegawai</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="NIK" id="NIK" placeholder="NIK Pegawai" class="form-control"
									value="<?= $du['NIK'] ?>" readonly>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="role_id">Jenis Role</label>
							</div>
							<div class="col-md-8">
								<select name="role_id" id="role_id" class="form-control">
									<option value="">-- Jenis Role Pegawai --</option>
									<?php foreach($role as $r): ?>
									<?php if($du['role_id'] == $r['id']):?>

									<option value="<?= $r['id'] ?>" selected><?= $r['role'] ?></option>
									<?php else:?>

									<option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>

									<?php endif;?>
									<?php endforeach;?>
								</select>
							</div>
						</div>

						<div class="mt-4">
							<?php if($du['is_active'] == 1):?>
							<input type="checkbox" id="is_active" name="is_active" value="1" checked> User Aktif
							<?php else:?>
								<input type="checkbox" id="is_active" name="is_active" value="1"> User Mati (Aktifkan User)
							<?php endif;?>
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Role Pegawai</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>