<div class="container">
	<!-- 'flash' diambil dari controller tadi ada namanya flash -->
	<?php if($this->session->flashdata('message_termin')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Termin <strong>Berhasil</strong> <?= $this->session->flashdata('message_termin'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>


    <div class="col-md-4">
			<a href="" class="btn btn-info" data-toggle="modal"
				data-target="#terminModal">Tambah Termin </a>
		</div>

	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h6 class="font-weight-bold text-center text-black-50">LPJ</h6>
						</div>
						<div class="card-body">
							<a href="<?= base_url('lpj/all_lpj') ?>" class="btn btn-primary">Lihat LPJ</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h6 class="font-weight-bold text-center text-black-50">Nama Kegiatan LPJ</h6>
						</div>
						<div class="card-body">
							<a href="<?= base_url('lpj/detail_kegiatan') ?>" class="btn btn-primary">Lihat Kegiatan LPJ</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h6 class=" font-weight-bold text-center text-black-50">Termin</h6>
						</div>
						<div class="card-body">
							<a href="<?= base_url('') ?>" class="btn btn-primary">Lihat Termin</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tambah Termin -->

<!-- Modal -->
<div class="modal fade" id="terminModal" tabindex="-1" role="dialog" aria-labelledby="terminModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="terminModalLabel">Tambah Termin Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('lpj/tambah_termin'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="nama_termin">Termin Kegiatan</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nama_termin" id="nama_termin" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Termin</button>
				</div>
			</form>

		</div>
	</div>
</div>

