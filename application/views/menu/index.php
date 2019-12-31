<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>') ?>

    <?= $this->session->flashdata('message'); ?>

    <div class="row">
    <div class="col-lg-6">
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Action</th>
            </thead>

            <tbody>
                <?php $i=1; ?>
                <?php foreach($menu as $m) : ?>
                 <tr>   
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $m['menu'];?></td>

                    <td>
                    <a href="" class="badge badge-success">Edit</a>
                    <a href="" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>

                <tr></tr>
            </tbody>

        </table>
    </div>
    </div>

	
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" name="menu" id="menu" class="form-control" placeholder="Menu Name..">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>