<div class="container">
	<!-- 'flash' diambil dari controller tadi ada namanya flash -->
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Surat <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

    <?php if($this->session->flashdata('message_gagal')) : ?>
	<div class="row mt-2">
		<div class="col-md-6">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Error!!!</strong> <?= $this->session->flashdata('message_gagal'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
    <div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>surat/tambah" class="btn btn-primary" data-toggle="modal"
				data-target="#exampleModal">Tambah Surat</a>
		</div>
	</div>
<?php endif;?>

	<div class="card shadow mb-4 mt-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th scope="col" >#</th>
							<th scope="col">Nomor Surat</th>
							<th scope="col">Alamat Surat</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Perihal</th>
                            <th scope="col">Jenis Surat</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php $i=1; ?>
						<?php foreach($surat as $s) : ?>
						<tr class="text-center">
							<td scope="row"><?= $i++;?></td>
							<td> <?= $s['no_berkas']. " / " .$s['full_number']; ?>
							</td>
							<td><?= $s['alamat_surat']; ?></td>
							<td><?= $s['tanggal_surat']; ?></td>
							<td><?= $s['perihal_surat']; ?></td>
                            <td>
                                <?php if($s['jenis_surat'] == 1):?>
								<a href="#" class="badge badge-success"> Surat Masuk </a>

								<?php else: ?>
								<a href="#" class="badge badge-info"> Surat Keluar</a>

								<?php endif;?>
                            </td>
							<td>
							<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
							
								<a href="<?= base_url(); ?>surat/hapus/<?= $s['id_surat']?>"
									class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin ?')"> <span class="fas fa-fw fa-trash"></span> </a>
								<a href="<?= base_url(); ?>surat/edit/<?= $s['id_surat']?>"
									class="btn btn-sm btn-outline-warning" data-toggle="modal"
									data-target="#editModal<?= $s['id_surat']; ?>"><span class="fas fa-fw fa-edit"></span></a>
							<?php endif;?>
								<!-- perhatikan ini ngambil id dari tiap data tulis di data-target=""-->
								<button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal"
									data-target="#detailModal<?= $s['id_surat']; ?>"><span class="fas fa-fw fa-info-circle"></span></a>
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


<!-- Tambah data surat -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('surat/tambah'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="no_berkas">Nomor Surat</label>
						</div>
						<div class="col-md-8">
							<input required type="number" min="1" name="no_berkas" id="no_berkas" placeholder="Awal Nomor Surat (contoh: 10)" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="full_number">Full Surat</label>
						</div>
						<div class="col-md-8">
							<input required type="text" name="full_number" id="full_number" placeholder="Lanjutan (contoh: S.00029.03/2020)" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="alamat_surat">Alamat Surat</label>
						</div>
						<div class="col-md-8">
							<input required type="text" name="alamat_surat" id="alamat_surat" placeholder="Alamat Surat" class="form-control">
						</div>
					</div>
                    <div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="perihal_surat">Perihal</label>
						</div>
						<div class="col-md-8">
							<input required type="text" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" class="form-control">
						</div>
					</div>
                    <div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="jenis_surat">Jenis Surat</label>
						</div>
						<div class="col-md-8">
                            <select required name="jenis_surat" id="jenis_surat" class="form-control">
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option value="1">Surat Masuk</option>
                            <option value="2">Surat Keluar</option>
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


<!-- Detail Surat  -->

<?php foreach($surat as $s) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="detailModal<?= $s['id_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail Surat</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat/detail')?>" class="form-group" method="post">
				<div class="modal-body">
					<div class="container">

                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <label for="no_berkas">Nomor Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly type="text" value="<?= $s['no_berkas']. " / " .$s['full_number'];?>" name="no_berkas" id="no_berkas" placeholder="Awal Nomor Surat (contoh: 10)" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="alamat_surat">Alamat Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly value="<?= $s['alamat_surat'];?>" type="text" name="alamat_surat" id="alamat_surat" placeholder="Alamat Surat" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="perihal_surat">Perihal</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly value="<?= $s['perihal_surat'];?>" type="text" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="tanggal_surat">Tanggal Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly value="<?= $s['tanggal_surat'];?>" type="date" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" class="form-control">
                            </div>
                        </div>
                        

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="jenis_surat">Jenis Surat</label>
							</div>
							<div class="col-md-8 mt-2">
								<select name="jenis_surat" id="jenis_surat" class="form-control" readonly>
									<?php if($s['id_surat'] == 1) : ?>
									<option value="<?= $s['id_surat']; ?>" selected>Surat Masuk</option>
                                    <?php else: ?>
                                        <option value="<?= $s['id_surat']; ?>">Surat Keluar</option>
									<?php endif; ?>
								</select>
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



<!-- MODAL EDIT SURAT  -->

<?php foreach($surat as $s) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="editModal<?= $s['id_surat']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Surat </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat/edit')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id_surat" value="<?= $s['id_surat']; ?>">
					<div class="container">
						
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <label for="no_berkas">Nomor Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input required type="number" value="<?= $s['no_berkas'];?>" name="no_berkas" id="no_berkas" placeholder="Awal Nomor Surat (contoh: 10)" class="form-control">
                            </div>
                        </div>
                    <div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="full_number">Full Surat</label>
						</div>
						<div class="col-md-8">
							<input required type="text" value="<?= $s['full_number'];?>" name="full_number" id="full_number" placeholder="Lanjutan (contoh: S.00029.03/2020)" class="form-control">
						</div>
					</div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="alamat_surat">Alamat Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input required value="<?= $s['alamat_surat'];?>" type="text" name="alamat_surat" id="alamat_surat" placeholder="Alamat Surat" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="perihal_surat">Perihal</label>
                            </div>
                            <div class="col-md-8">
                                <input required value="<?= $s['perihal_surat'];?>" type="text" name="perihal_surat" id="perihal_surat" placeholder="Perihal Surat" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 mt-2">
                                <label for="tanggal_surat">Tanggal Surat</label>
                            </div>
                            <div class="col-md-8">
                                <input readonly value="<?= $s['tanggal_surat'];?>" type="date" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" class="form-control">
                            </div>
                        </div>
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="jenis_surat">Jenis Surat</label>
							</div>
							<div class="col-md-8 mt-2">
								<select name="jenis_surat" id="jenis_surat" class="form-control" readonly>
									<?php if($s['id_surat'] == 1) : ?>
									<option value="<?= $s['id_surat']; ?>" selected>Surat Masuk</option>
                                    <?php else: ?>
                                        <option value="<?= $s['id_surat']; ?>">Surat Keluar</option>
									<?php endif; ?>
								</select>
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