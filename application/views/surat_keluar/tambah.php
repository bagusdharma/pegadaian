<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Tambah Surat Keluar
				</div>
				<div class="card-body">

					<?php if (validation_errors() ) : ?>
					<div class="alert alert-danger" role="alert">
						<?= validation_errors(); ?>
					</div>
					<?php endif ?>

					<form action="" method="post">
						<div class="form-group">
							<label for="no_surat">Nomor Surat</label>
							<input type="number" name ="no_surat" class="form-control" placeholder="Nomor Surat" id="no_surat">
						</div>
						<div class="form-group">
							<label for="jenis_id">Jenis Surat</label>
                            <select name="jenis_id" id="jenis_id" class="form-control">
                                <option value="">--- Pilih Jenis Surat ---</option>
                               <?php foreach($jenis_surat as $js) : ?>
                                <option value="<?= $js['id']; ?>"><?= $js['nama_jenis']; ?> (<?= $js['kode_jenis']; ?>)</option>
                                <?php endforeach ?>
                            </select>
						</div>
						<div class="form-group">
							<label for="bagian_id">Kode Unit Bagian</label>
							<select name="bagian_id" id="bagian_id" class="form-control">
                                <option value="">--- Pilih Unit Bagian ---</option>
                               <?php foreach($kode_bagian as $kb) : ?>
                                <option value="<?= $kb['id']; ?>"><?= $kb['nama_bagian']; ?> (<?= $kb['kode_bagian']; ?>)</option>
                                <?php endforeach ?>
                            </select>
						</div>
						<div class="form-group">
							<label for="alamat_tujuan">Alamat Tujuan</label>
							<input type="text" name ="alamat_tujuan" class="form-control" placeholder="Alamat Tujuan Surat" id="alamat_tujuan">
						</div>
						<div class="form-group">
							<label for="perihal">Perihal</label>
							<input type="text" name ="perihal" class="form-control" placeholder="PERIHAL Surat" id="perihal">
						</div>

						<a href="<?= base_url('surat_keluar'); ?>" class="btn btn-danger float-left">Kembali</a>
						<button type="submit" name="tambah" class="btn btn-info float-right">Tambah Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
