<div class="container">
	<style>
		.header {
			color: black;
		}
		.font-size{
			font-size:14px;
		}

	</style>

	<div class="row mb-3">
		<div class="col-md-6">
			<a href="<?= base_url(); ?>calendar/insert" class="btn btn-info" data-toggle="modal"
				data-target="#exampleModal"><span class="fa fas-fw fa-plus"></span> Tambah Event </a>
		</div>
	</div>
	<div id="calendar" class="header font-size">
	</div>
</div>

<!-- Tambah kalendar kegiatan -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Event Kegiatan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('calendar/insert'); ?>" method="post" class="form-group">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="title">Title Event</label>
						</div>
						<div class="col-md-8">
							<input type="text" required class="form-control" name="title" placeholder="Nama Event Kegiatan">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="color">Color</label>
						</div>
						<div class="col-md-8 mt-2">
							<input type="text" required class="form-control" name="color" id="color" placeholder="Color">
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="title">Start Date</label>
						</div>
						<div class="col-md-8 mt-2">
							<div class="form-group">
								<div class="input-group date" id="datetimepicker1" data-target-input="nearest">
									<input required placeholder="Start Event" type="text" class="form-control datetimepicker-input"
										data-target="#datetimepicker1" name="start">
									<div class="input-group-append" data-target="#datetimepicker1"
										data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 mt-2">
							<label for="title">End Date</label>
						</div>
						<div class="col-md-8 mt-2">
							<div class="form-group">
								<div class="input-group date" id="datetimepicker2" data-target-input="nearest">
									<input required placeholder="End Event" type="text" class="form-control datetimepicker-input"
										data-target="#datetimepicker2" name="end">
									<div class="input-group-append" data-target="#datetimepicker2"
										data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah Event</button>
				</div>
			</form>

		</div>
	</div>
</div>
