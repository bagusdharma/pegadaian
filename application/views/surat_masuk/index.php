<div class="container">
	<!-- 'flash' diambil dari controller tadi ada namanya flash -->
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Surat Masuk <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

    <div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>surat_masuk/tambah" class="btn btn-primary" data-toggle="modal"
				data-target="#exampleModal">Tambah Surat Masuk</a>
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
							<th scope="col" width="19%">Nomor Berkas</th>
							<th scope="col" width="19%">Pengirim</th>
							<th scope="col" width="19%">Tanggal</th>
							<th scope="col" width="19%">Perihal</th>
							<th scope="col" width="19%">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php $i=1; ?>
						<?php foreach($surat_masuk as $sm) : ?>
						<tr>
							<td scope="row"><?= $i++;?></td>
                            <td>
                            
                            </td>
							<!-- <td> <?php foreach($nomor_surat as $ns) : ?>
								<?php if($sk['no_surat'] === $ns['nomor_surat']) : ?>
								<?= $ns['nomor_surat']. " / " .$ns['jenis_surat']."-00029.0".$ns['kode']."/".date("Y") ?>
								<?php endif; ?>

								<?php endforeach;?>
							</td> -->
							<td><?= $sm['pengirim_berkas']; ?></td>
							<td><?= $sm['tanggal_suratmasuk']; ?></td>
							<td><?= $sm['perihal_suratmasuk']; ?></td>
							<td>
								<a href="<?= base_url(); ?>surat_masuk/hapus/<?= $sm['id_suratmasuk']?>"
									class="btn btn-sm btn-danger" onclick="return confirm('yakin ?')">Hapus</a>
								<a href="<?= base_url(); ?>surat_masu/edit/<?= $sm['id_suratmasuk']?>"
									class="btn btn-sm btn-success" data-toggle="modal"
									data-target="#editModal<?= $sm['id_suratmasuk']; ?>">Edit Surat</a>
								<!-- perhatikan ini ngambil id dari tiap data tulis di data-target=""-->
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal"
									data-target="#detailModal<?= $sm['id_suratmasuk']; ?>">Detail Surat</a>
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


<!-- Tambah data surat Masuk -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('surat_masuk/tambah'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="no_berkas">Nomor Surat Masuk</label>
						</div>
						<div class="col-md-8">
							<input type="number" name="no_berkas" id="no_berkas" placeholder="Masukkan Nomor Surat Masuk. Misal (10)" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="full_number">Full Surat Masuk</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="full_number" id="full_number" placeholder="Masukkan Lanjutan Nomor Surat. Misal (00029/03)" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="pengirim_berkas">Pengirim</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="pengirim_berkas" id="pengirim_berkas" placeholder="Pengirim Surat Masuk (Asal Surat)" class="form-control">
						</div>
					</div>
                    <div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="perihal_suratmasuk">Perihal</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="perihal_suratmasuk" id="perihal_suratmasuk" placeholder="Perihal Surat Masuk" class="form-control">
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

