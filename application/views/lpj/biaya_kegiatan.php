<div class="container">
	<?php if($this->session->flashdata('message_biaya')) : ?>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				Biaya Kegiatan <strong>Berhasil</strong> <?= $this->session->flashdata('message_biaya'); ?>
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
			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#biayaModal">Tambah Kegiatan</a>
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
                            <!-- <th scope="col">Termin Kegiatan</th> -->
                            <th scope="col">Item Kegiatan</th>
                            <th scope="col">Nama Biaya Kegiatan</th>
                            <th scope="col">Harga Kegiatan</th>
							<th scope="col">Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						<?php $i=1; ?>
						<?php foreach($biaya_kegiatan as $bk) : ?>
						<tr>
							<th scope="row"><?= $i++;?></th>
							<?php foreach($detail_kegiatan as $dk):?>
							<?php if($dk['id_kegiatan']===$bk['kegiatan_id']):?>
                            <td><?= $dk['nama_kegiatan'] ?> (<?= $dk['nama_termin'] ?>) </td>
							<?php endif;?>
							<?php endforeach;?>
                            <td><?= $bk['nama_item_rekap'] ?></td>
                            <td><?= $bk['nama_biaya_kegiatan'] ?></td>
                            <td><?= "Rp. " . number_format($bk['harga_item_kegiatan'], 0, "," , ".") . ",-" ; ?></td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
						</tr>

						<?php endforeach ?>
					</tbody>

					<tfoot>
                     <tr class="text-center">
                        </tr>
                        
						<tr class="text-center">
                            <td colspan="7">
                            
                            <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
									data-target="#totalModal">Total Biaya Keseluruhan</button>

							<?php foreach($biaya_kegiatan as $b):?>
							<?php $id = $this->uri->segment(3); 
							if($b['kegiatan_id'] === $id):?>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
									data-target="#detailModal<?= $b['item_biaya_id']; ?>">Total Biaya <?= $b['nama_item_rekap'] ?></button>
                            <?php endif;?>
							<?php endforeach;?>

							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

    <a href="<?= base_url('lpj/all_lpj') ?>" class="btn btn-danger">Kembali Ke LPJ</a>
</div>



<!-- Tambah Biaya Kegiatan -->
<!-- Modal -->
<div class="modal fade" id="biayaModal" tabindex="-1" role="dialog" aria-labelledby="biayaModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="biayaModalLabel">Tambah Rekap Biaya Kegiatan per Termin </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('lpj/tambah_rekap_kegiatan'); ?>" method="post" class="form-group">
				<div class="modal-body"> 

				 <div class="row">
						<div class="col-md-4">
							<label for="kegiatan_id">Nama Kegiatan</label>
						</div>
						<div class="col-md-8">
							<select name="kegiatan_id" id="kegiatan_id" class="form-control">
                                <option value=""></option>
                                <?php foreach($detail_kegiatan as $dk): ?>
                                    <option value="<?= $dk['id_kegiatan'] ?>"><?= $dk['nama_kegiatan'] ?> (<?= $dk['nama_termin'] ?>)</option>
                                <?php endforeach; ?>
                            </select>
						</div>
                    </div>
                                       
                    <div class="row">
						<div class="col-md-4">
							<label for="item_biaya_id">Item Biaya Kegiatan</label>
						</div>
						<div class="col-md-8">
							<select name="item_biaya_id" id="item_biaya_id" class="form-control">
                                <option value=""></option>
                                <?php foreach($item as $i): ?>
                                    <option value="<?= $i['id_item'] ?>"><?= $i['nama_item_rekap'] ?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
                    </div>
                    
                    <div class="row">
						<div class="col-md-4">
							<label for="nama_biaya_kegiatan">Nama Biaya Kegiatan</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" name="nama_biaya_kegiatan" id="nama_biaya_kegiatan">
						</div>
                    </div>
                    
                    <div class="row">
						<div class="col-md-4">
							<label for="harga_item_kegiatan">Harga Item Kegiatan</label>
						</div>
						<div class="col-md-8">
							<input type="number" class="form-control" name="harga_item_kegiatan" id="harga_item_kegiatan">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Rekap Biaya</button>
				</div>
			</form>

		</div>
	</div>
</div>


<!-- Total Biaya Kegiatan -->
<!-- Modal -->
<?php foreach($total_biaya as $tb): ?>
<div class="modal fade" id="totalModal" tabindex="-1" role="dialog" aria-labelledby="totalModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="totalModalLabel">Total Biaya Seluruhnya</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="post" class="form-group">
				<div class="modal-body">
                    
                    <div class="row ">
						<div class="col-md-4 mt-2">
							<label for="total_biaya">Total Biaya</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" name="total_biaya" id="total_biaya" readonly value="<?= "Rp. " . number_format($tb['total'], 0, "," , ".") . ",-" ; ?>">
						</div>
                    </div>
                    
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>

		</div>
	</div>
</div>
<?php endforeach;?>


<!-- Total per Item  -->

<?php foreach($total_biaya_item as $ti) : ?>
<!-- Modal -->
<!-- perhatikan ini masukin id data ke modal = tulis di id="" -->
<div class="modal fade" id="detailModal<?= $ti['item_biaya_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Total Biaya Per Item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<!-- Perhatikan ini actionnya buat form sebelum modal body-->
			<form action="<?= base_url('lpj/biaya_kegiatan')?>" class="form-group" method="post">
				<div class="modal-body">
					<div class="container">

						<!-- <div class="row mt-3">
							<div class="col-md-4">
								<label for="kegiatan_id">Nama Kegiatan</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly
									value="<?= $ti['kegiatan_id'] ?>">
							</div>
						</div> -->
						<!-- <div class="row mt-3">
							<div class="col-md-4">
								<label for="item_biaya_id">Nama Item</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly value="<?= $ti['item_biaya_id'] ?>">
							</div>
						</div> -->
						<div class="row mt-3">
							<div class="col-md-4 mt-2">
								<label for="total_item">Total Harga</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly
									value="<?= "Rp. " . number_format($ti['total_item'], 0, "," , ".") . ",-" ; ?>">
							</div>
						</div>

						<!-- <div class="row mt-3">
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
						</div> -->
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

