<div class="container">
	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="container">
				<div class="row mt-2">
					<?php foreach($kamarA as $k):?>
					<div class="col-lg-4 mt-2">
						<div class="card text-center">
							<div class="card-header">
								<h6 class="m-2 font-weight-bold text-primary">Kamar <?= $k['no_kamar'] ?></h6>
							</div>
							<div class="card-body m-2">
								<div class="card-body">
									<!-- Ambil Kamar  -->
									<?php if($k['status'] == 0): ?>
									<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
									<div class="alert alert-info text-center" role="alert">
										<div class="row justify-content-center">
											<!-- <form action="<?= base_url(''); ?>data_kamar/ambilKamarA/<?= $k['id'] ?>" method="POST">
												<input type="hidden" name="id" value="<?= $k['id'] ?>">
												<input type="submit" class="btn btn-md btn-primary" value="Check-In">
											</form> -->
											<a href="<?= base_url(''); ?>data_kamar/ambilKamarA/<?= $k['id'] ?>"
												class="btn btn-md btn-primary" data-toggle="modal"
												data-target="#kamarModal<?= $k['id']; ?>">Check-In</a>
										</div>
									</div>
									<?php endif?>
									<?php else: ?>
									<div class="alert alert-success text-center" role="alert">
										Kamar Sudah Terisi oleh <strong> <?= $k['nama_penghuni_kamar'] ?></strong>
										<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
										<div class="row justify-content-center">
											<form action="<?= base_url(''); ?>data_kamar/resetKamarA/<?= $k['id']; ?>"
												method="POST">
												<input type="hidden" name="id" value="<?= $k['id']; ?>">
												<input type="submit" class="btn btn-md btn-danger" value="Check-Out">
											</form>
										</div>
										<?php endif;?>
									</div>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>

	<a href="<?= base_url('data_kamar') ?>" class="btn btn-primary font-weight-bold"><span
			class="fas fa-fw fa-arrow-left"></span> Kembali Ke Data Kamar</a>
</div>


<!-- Input Nama Penghuni Kamar -->

<?php foreach($kamarA as $k) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="kamarModal<?= $k['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="kamarModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="kamarModalLabel">Input Nama Penghuni Kamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url(''); ?>data_kamar/ambilKamarA/<?= $k['id'] ?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $k['id']; ?>">
					<div class="container">
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="nama_penghuni_kamar">Nama Penghuni Kamar</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="nama_penghuni_kamar" id="nama_penghuni_kamar"
									placeholder="Nama Penghuni Kamar" class="form-control"
									value="<?= $k['nama_penghuni_kamar'] ?>">
							</div>
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Penghuni Kamar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>