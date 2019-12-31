<div class="container">
	<?php if($this->session->flashdata('message_kegiatan')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Kegiatan Termin <strong>Berhasil</strong> <?= $this->session->flashdata('message_kegiatan'); ?>
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
			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#kegiatanModal">Tambah Kegiatan</a>
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
							<th scope="col">Nama Kegiatan LPJ</th>
							<th scope="col">Termin Kegiatan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($detail_kegiatan as $dk) : ?>
						<tr>
							<th scope="row"><?= $i++;?></th>
                            <td><?= $dk['nama_kegiatan'] ?></td>
                            <td><?= $dk['nama_termin'] ?></td>
                            <td>
                                <a href="<?= base_url('lpj/biaya_kegiatan/') . $dk['id_kegiatan'] ?>" class="btn btn-sm btn-info">Lihat Rekap Biaya</a>
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

    <a href="<?= base_url('lpj/all_lpj') ?>" class="btn btn-danger">Kembali Ke LPJ</a>
</div>



<!-- Tambah LPJ -->
<!-- Modal -->
<div class="modal fade" id="kegiatanModal" tabindex="-1" role="dialog" aria-labelledby="kegiatanModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="kegiatanModalLabel">Tambah Kegiatan per Termin </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('lpj/tambah_kegiatan'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<label for="nama_kegiatan_id">Nama Kegiatan</label>
						</div>
						<div class="col-md-8">
							<select name="nama_kegiatan_id" id="nama_kegiatan_id" class="form-control">
                                <option value=""></option>
                                <?php foreach($lpj as $l): ?>
                                    <option value="<?= $l['id_lpj'] ?>"><?= $l['nama_kegiatan'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label for="termin_id">Termin Kegiatan</label>
						</div>
						<div class="col-md-8">
							<select name="termin_id" id="termin_id" class="form-control">
                                <option value=""></option>
                                <?php foreach($termin as $t): ?>
                                    <option value="<?= $t['id_termin'] ?>"><?= $t['nama_termin'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Kegiatan</button>
				</div>
			</form>

		</div>
	</div>
</div>
