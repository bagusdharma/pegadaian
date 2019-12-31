<div class="container">
	<?php if($this->session->flashdata('message_lpj')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				LPJ <strong>Berhasil</strong> <?= $this->session->flashdata('message_lpj'); ?>
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
			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#lpjModal">Tambah LPJ</a>
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
							<th scope="col">Surat Otorisasi Kegiatan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($lpj as $l) : ?>
						<tr>
							<th scope="row"><?= $i++;?></th>
							<td><?= $l['nama_kegiatan']; ?></td>
                            <td><?= "Rp. " . number_format($l['surat_otorisasi'], 0, "," , ".") . ",-" ; ?></td>
							<td> <a href="<?= base_url('lpj/detail_kegiatan') ?>" class="btn btn-sm btn-outline-info">Detail Termin Kegiatan LPJ</a> 
							<a href="<?= base_url(); ?>lpj/hapus_lpj/<?= $l['id_lpj'] ?>"
									class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin ?')">Hapus Kegiatan LPJ</a>
								<a href="<?= base_url(); ?>lpj/edit_lpj/<?= $l['id_lpj'] ?>"
									class="btn btn-sm btn-outline-warning" data-toggle="modal"
									data-target="#editModal<?= $l['id_lpj']; ?>">Edit Kegiatan LPJ</a>  
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

<!-- Tambah LPJ -->
<!-- Modal -->
<div class="modal fade" id="lpjModal" tabindex="-1" role="dialog" aria-labelledby="lpjModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="lpjModalLabel">Tambah LPJ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('lpj/tambah_lpj'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4">
							<label for="nama_kegiatan">Nama Kegiatan</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label for="surat_otorisasi">Surat Otorisasi Kegiatan</label>
						</div>
						<div class="col-md-8 mt-2">
							<input type="number" name="surat_otorisasi" id="surat_otorisasi" placeholder="Masukkan Hanya Angka (1374191)" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah LPJ</button>
				</div>
			</form>

		</div>
	</div>
</div>

<!-- MODAL EDIT LPJ -->

<?php foreach($lpj as $l) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="editModal<?= $l['id_lpj']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit LPJ Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('lpj/edit_lpj')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id_lpj" value="<?= $l['id_lpj']; ?>">
					<div class="container">
					<div class="row">
						<div class="col-md-4">
							<label for="nama_kegiatan">Nama Kegiatan</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="<?= $l['nama_kegiatan']; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<label for="surat_otorisasi">Surat Otorisasi Kegiatan</label>
						</div>
						<div class="col-md-8 mt-2">
							<input type="number" name="surat_otorisasi" id="surat_otorisasi" placeholder="Masukkan Hanya Angka" class="form-control" value="<?= $l['surat_otorisasi']; ?>">
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
<?php endforeach; ?>