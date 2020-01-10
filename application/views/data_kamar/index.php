<div class="container">

<!-- 'flash' diambil dari controller tadi ada namanya flash -->
<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Kamar <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<!-- <div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>data_kamar/tambah_kamar" class="btn btn-info" data-toggle="modal"
				data-target="#exampleModal">Tambah Kamar </a>
		</div>
	</div> -->

	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h1 class="m-2 font-weight-bold text-center text-black-50">Asrama A</h1>
						</div>
                        <div class="card-body">
                        <a href="<?= base_url('data_kamar/asrama_a') ?>" class="btn btn-primary">Lihat Data Kamar</a>
                        </div>
					</div>
				</div>
                <div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h1 class="m-2 font-weight-bold text-center text-black-50">Asrama B</h1>
						</div>
                        <div class="card-body">
                        <a href="<?= base_url('data_kamar/asrama_b') ?>" class="btn btn-primary">Lihat Data Kamar</a>
                        </div>
					</div>
				</div>
                <div class="col-md-4">
					<div class="card">
						<div class="card-header bg-success py-3">
							<h1 class="m-2 font-weight-bold text-center text-black-50">Asrama C</h1>
						</div>
                        <div class="card-body">
                        <a href="<?= base_url('data_kamar/asrama_c') ?>" class="btn btn-primary">Lihat Data Kamar</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Tambah data kamar -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kamar Asrama</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('data_kamar/tambah_kamar'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="no_kamar">Nomor Kamar</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="no_kamar" id="no_kamar" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="asrama_id">Asrama</label>
						</div>
						<div class="col-md-8">
							<select name="asrama_id" id="asrama_id" class="form-control">
							<option value="">-- Pilih Asrama --</option>
							<?php foreach($asrama as $a): ?>
								<option value="<?= $a['id']; ?>"><?= $a['nama_asrama']; ?></option>
							<?php endforeach;?>
							</select>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
			</form>

		</div>
	</div>
</div>