<div class="container">
	<?php if($this->session->flashdata('message')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Surat Perjalanan <strong>Berhasil</strong> <?= $this->session->flashdata('message'); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?= validation_errors(); ?>
	<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>surat_perjalanan/tambah" class="btn btn-primary" data-toggle="modal"
				data-target="#exampleModal"><span class="fas fa-fw fa-plus"></span>Tambah Surat Ekspedisi</a>
		</div>
		<div class="col-md-6">
			<a href="<?= base_url(); ?>Laporan_suratekspedisi" class="btn btn-success float-right" ><span class="fas fa-fw fa-print"></span> Cetak Surat Ekspedisi</a>
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
							<th scope="col">#</th>
							<th scope="col">Tanggal Pengiriman</th>
							<th scope="col">Alamat Pengiriman</th>
							<th scope="col">Isi Surat</th>
							<th scope="col">No Resi</th>
							<th scope="col">Tujuan Penerima</th>
							<th scope="col">Kurir</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($surat_perjalanan as $sp) : ?>
						<tr>
							<th scope="row"><?= $i++;?></th>
							<td><?= $sp['tanggal_pengiriman']; ?></td>
							<td><?= $sp['alamat_pengiriman']; ?></td>
							<td><?= $sp['isi_surat']; ?></td>
							<td>
							<?= $sp['no_resi']?>
								<!-- <a href="<?php site_url('cekresi.com/');?><?php echo $sp['no_resi']?>"><?= $sp['no_resi']?></a> -->
							</td>
							<td><?= $sp['tujuan_pengiriman']; ?></td>
							<td>
								<?php foreach($kurir as $k) : ?>
								<?php if ($sp['kurir_id'] === $k['id']) : ?>
								<img src="<?= base_url('assets/img/').$k['gambar_kurir']; ?>" class="img-fluid"
									width="50px" height="50px" alt="">

								<?php endif; ?>
								<?php endforeach;?>

							<td>
							<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
								<a href="<?= base_url(); ?>surat_perjalanan/input_resi/<?= $sp['id']?>"
									class="btn btn-sm btn-success" data-toggle="modal"
									data-target="#resiModal<?= $sp['id']; ?>">Input Resi</a>
							<?php endif;?>
								<!-- perhatikan ini ngambil id dari tiap data tulis di data-target=""-->
								<button type="button" class="btn btn-sm btn-info" data-toggle="modal"
									data-target="#detailModal<?= $sp['id']; ?>">Detail Surat</button>
							<?php if($this->session->userdata('role_id') == 1 || $this->session->userdata('role_id') == 3) : ?>
								<a href="<?= base_url(); ?>surat_perjalanan/hapus/<?= $sp['id']?>"
									class="btn btn-sm btn-danger" onclick="return confirm('yakin ?')">Hapus</a>
								<a href="<?= base_url(); ?>surat_perjalanan/edit/<?= $sp['id']?>"
									class="btn btn-sm btn-warning" data-toggle="modal"
									data-target="#editModal<?= $sp['id']; ?>">Edit Surat</a>
							<?php endif;?>
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

<!-- Sweet Alert Delete Data -->

<!-- <script>
  function deletedata(id)
  {
    swal({
      title: "Anda Yakin?",
      text: "Data <?php echo $row->nama; ?> Akan Dihapus Secara Permanen!",
      type: "warning",
      showCancelButton: true,
      // confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
          url: "<?php echo base_url('c_mahasiswa/DeleteMahasiswa/') ?>",
          type: "post",
          data: {id:id},
          success:function(){
            swal('Data Berhasil Di Hapus', ' ', 'success');
            $("#delete"+id).fadeTo("slow", 0.7, function(){
              $(this).remove();
            })

          },
          error:function(){
            swal('data gagal di hapus', 'error');
          }
      });
      
    });
  }
</script> -->

<!-- Tambah data surat perjalanan -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Surat Perjalanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('surat_perjalanan/tambah'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="alamat_pengirirman">Alamat Pengiriman</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="isi_surat">Isi Surat</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="isi_surat" id="isi_surat" class="form-control">
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mt-2">
							<label for="tujuan_pengirirman">Tujuan (Penerima)</label>
						</div>
						<div class="col-md-8">
							<input type="text" name="tujuan_pengiriman" id="tujuan_pengiriman" class="form-control">
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


<!-- Input Data Resi Surat -->

<?php foreach($surat_perjalanan as $sp) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="resiModal<?= $sp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="resiModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="resiModalLabel">Input Resi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat_perjalanan/inputResi')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $sp['id']; ?>">
					<div class="container">
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="no_resi">Nomor Resi</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="no_resi" id="no_resi" placeholder="Nomor Resi"
									class="form-control" value="<?= $sp['no_resi'] ?>">
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="jenis_id">Layanan Ekspedisi </label>
							</div>
							<div class="col-md-8 mt-3">
								<select name="kurir_id" id="jenis_id" class="form-control">
									<option value="">-- Jenis Layanan Ekspedisi --</option>
									<?php foreach($kurir as $k) : ?>
									<option value="<?= $k['id']; ?>"><?= $k['nama_kurir']; ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update Surat Resi</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>


<!-- Detail Surat Perjalanan -->

<?php foreach($surat_perjalanan as $sp) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="detailModal<?= $sp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail Surat Perjalanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat_perjalanan/detail')?>" class="form-group" method="post">
				<div class="modal-body">
					<div class="container">

						<div class="row mt-3">
							<div class="col-md-4">
								<label for="alamat_pengiriman">Alamat Pengiriman</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly
									value="<?= $sp['alamat_pengiriman'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="isi_surat">Isi Surat</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly value="<?= $sp['isi_surat'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="tanggal">Tanggal Pengiriman</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="date" class="form-control" readonly
									value="<?= $sp['tanggal_pengiriman'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="tujuan_pengiriman">Tujuan Pengiriman</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="text" class="form-control" readonly
									value="<?= $sp['tujuan_pengiriman'] ?>">
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-md-4">
								<label for="no_resi">No Resi</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly value="<?= $sp['no_resi'] ?>">
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="kurir_id">Layanan Ekspedisi</label>
							</div>
							<div class="col-md-8 mt-2">
								<select name="kurir_id" id="kurir_id" class="form-control" readonly>
									<?php foreach($kurir as $k) : ?>
									<?php if($k['id'] === $sp['kurir_id']) : ?>
									<option value="<?= $k['id']; ?>" selected><?= $k['nama_kurir']; ?>
									</option>

									<?php endif; ?>
									<?php endforeach; ?>
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



<!-- MODAL EDIT SURAT Perjalanan -->

<?php foreach($surat_perjalanan as $sp) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="editModal<?= $sp['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalLabel">Edit Surat Perjalanan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('surat_perjalanan/edit')?>" class="form-group" method="post">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $sp['id']; ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="alamat_pengirirman">Alamat Pengiriman</label>
							</div>
							<div class="col-md-8 mt-2">
								<input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" value="<?= $sp['alamat_pengiriman']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="isi_surat">Isi Surat</label>
							</div>
							<div class="col-md-8">
								<input type="text" name="isi_surat" id="isi_surat" class="form-control" value="<?= $sp['isi_surat']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 mt-2">
								<label for="tujuan_pengirirman">Tujuan (Penerima)</label>
							</div>
							<div class="col-md-8 mt-3">
								<input type="text" name="tujuan_pengiriman" id="tujuan_pengiriman" class="form-control" value="<?= $sp['tujuan_pengiriman']; ?>">
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

