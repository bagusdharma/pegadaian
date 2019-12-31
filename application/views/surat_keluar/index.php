<div class="container">
	<!-- 'flash' diambil dari controller tadi ada namanya flash -->
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Surat Keluar <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="row mt-2">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>surat_keluar/tambah" class="btn btn-primary">Tambah Surat Keluar</a>
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
							<th scope="col" width="5%">#</th>
							<th scope="col" width="19%">Nomor Surat</th>
							<th scope="col" width="19%">Alamat Tujuan</th>
							<th scope="col" width="19%">Tanggal</th>
							<th scope="col" width="19%">Perihal</th>
							<th scope="col" width="19%">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php $i=1; ?>
						<?php foreach($surat_keluar as $sk) : ?>
						<tr>
							<td scope="row"><?= $i++;?></td>
							<td> <?php foreach($nomor_surat as $ns) : ?>
								<?php if($sk['no_surat'] === $ns['nomor_surat']) : ?>
								<?= $ns['nomor_surat']. " / " .$ns['jenis_surat']."-00029.0".$ns['kode']."/".date("Y") ?>
								<?php endif; ?>

								<?php endforeach;?>
							</td>
							<td><?= $sk['alamat_tujuan']; ?></td>
							<td><?= $sk['tanggal_surat']; ?></td>
							<td><?= $sk['perihal']; ?></td>
							<td>
								<a href="<?= base_url(); ?>surat_keluar/hapus/<?= $sk['id']?>"
									class="btn btn-sm btn-danger" onclick="return confirm('yakin ?')">Hapus</a>
								<a href="<?= base_url(); ?>surat_keluar/edit/<?= $sk['id']?>"
									class="btn btn-sm btn-success" data-toggle="modal"
									data-target="#editModal<?= $sk['id']; ?>">Edit Surat</a>
								<!-- perhatikan ini ngambil id dari tiap data tulis di data-target=""-->
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal"
									data-target="#detailModal<?= $sk['id']; ?>">Detail Surat</a>
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

<!-- MODAL EDIT SURAT KELUAR -->

<?php foreach($surat_keluar as $sk) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="editModal<?= $sk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Surat Keluar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat_keluar/edit')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $sk['id']; ?>">
					<div class="container">
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="no_surat">Nomor Surat</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="no_surat" id="no_surat" placeholder="Nomor Surat"
									class="form-control" value="<?= $sk['no_surat'] ?>">
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="jenis_id">Jenis Surat</label>
							</div>
							<div class="col-md-8">
								<select name="jenis_id" id="jenis_id" class="form-control">
									<?php foreach($jenis_surat as $js) : ?>
									<?php if($js['id'] === $sk['jenis_id']) : ?>
									<option value="<?= $js['id']; ?>" selected><?= $js['nama_jenis']; ?>
										(<?= $js['kode_jenis']; ?>)</option>
									<?php else : ?>
									<option value="<?= $js['id']; ?>"><?= $js['nama_jenis']; ?>
										(<?= $js['kode_jenis']; ?>)</option>
									<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="jenis_id">Kode Bagian</label>
							</div>
							<div class="col-md-8">
								<select name="bagian_id" id="bagian_id" class="form-control">
									<?php foreach($kode_bagian as $kb) : ?>
									<?php if($kb['id'] === $sk['bagian_id']) : ?>
									<option value="<?= $kb['id']; ?>" selected><?= $kb['nama_bagian']; ?>
										(<?= $kb['kode_bagian']; ?>)</option>
									<?php else : ?>
									<option value="<?= $kb['id']; ?>"><?= $kb['nama_bagian']; ?>
										(<?= $kb['kode_bagian']; ?>)</option>
									<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="alamat_tujuan">Alamat Tujuan</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="alamat_tujuan" id="alamat_tujuan"
									placeholder="Alamat Tujuan Surat" class="form-control"
									value="<?= $sk['alamat_tujuan'] ?>">
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="perihal">Perihal</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="perihal" id="perihal" placeholder="PERIHAL"
									class="form-control" value="<?= $sk['perihal'] ?>">
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




<!-- MODAL DETAIL SURAT KELUAR -->
<?php foreach($surat_keluar as $sk) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="detailModal<?= $sk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail Surat Keluar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat_keluar/detail')?>" class="form-group" method="post">
				<div class="modal-body">
					<div class="container">
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="no_surat">Nomor Surat</label>
							</div>
							<div class="col-md-8">
								<?php foreach($nomor_surat as $ns) : ?>
								<?php if($sk['no_surat'] === $ns['nomor_surat']) : ?>
								<input type="text" class="form-control" readonly
									value="<?= $ns['nomor_surat']. " / " .$ns['jenis_surat']."-00029.0".$ns['kode']."/".date("Y") ?>">
								<?php endif; ?>
								<?php endforeach;?>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="alamat_tujuan">Alamat Tujuan</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly value="<?= $sk['alamat_tujuan'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="tanggal">Tanggal</label>
							</div>
							<div class="col-md-8">
								<input type="date" class="form-control" readonly value="<?= $sk['tanggal_surat'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="perihal">Perihal</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly value="<?= $sk['perihal'] ?>">
							</div>
						</div>
					</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

		</div>
	</div>
</div>
</div>
<?php endforeach; ?>
