<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
    <div class="col-lg">
    <?php if(validation_errors()) : ?>
    <div class="alert alert-danger" role="alert"> 
      <?= validation_errors(); ?>
      </div>
    <?php endif;?>

    <?= $this->session->flashdata('message'); ?>

    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Sub Menu</a>
        <table class="table table-hover">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Title Menu</th>
                <th scope="col">Menu</th>
                <th scope="col">url</th>
                <th scope="col">icon</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </thead>

            <tbody>
                <?php $i=1; ?>
                <?php foreach($subMenu as $sm) : ?>
                 <tr>   
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $sm['title_menu'];?></td>
                    <td><?= $sm['menu'];?></td>
                    <td><?= $sm['url'];?></td>
                    <td><?= $sm['icon'];?></td>
                    <td> <?php if($sm['is_active']==1) : ?>
                        <span class="badge badge-pill badge-success">Active</span>
                        
                        <?php else: ?>        
                        <span class="badge badge-pill badge-danger">Not Active</span>
                        
                        <?php endif; ?>
                    </td>

                    <td>
                    <a href="" class="badge badge-warning">Edit</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
      <div class="modal-body">
            <div class="form-group">
            <input type="text" name="title_menu" id="title_menu" class="form-control" placeholder="Sub Menu Title..">
            </div>
            <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                    <option value="">Select Menu</option>
                <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
            <input type="text" name="url" id="url" class="form-control" placeholder="Url ..">
            </div>
            <div class="form-group">
            <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon (HTML) ..">
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active" checked>
                <label class="form-check-label" for="is_active">
                    Active ? 
                </label>
                </div>
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