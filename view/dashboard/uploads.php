<?php
class Format {
    use \app\core\traits\Formatter;
}
$format = new Format();

$files = \app\models\File::Do()->getFilesWithOwnerId(\app\core\Auth::getInstance()->getId());
?>

<?php foreach ($files as $file) { ?>
<!-- Edit Modal -->
<div class="modal fade" id="editModal<?php echo $file['id'];?>" tabindex="-1" aria-labelledby="editModal<?php echo $file['id'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="/edit/file/<?php echo $file['id'];?>" method="post" class="form-floating">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal<?php echo $file['id'];?>">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating my-2">
                    <input type="text" class="form-control" name='title' id='title' placeholder='' value="<?php echo $file['title'];?>">
                   <label for="title">Title</label>
                </div>
                <?php if ($errors->hasErrorName('title')) { ?>
                    <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                        <ul class="m-0">
                            <?php foreach ($errors->getError('title') as $error) { ?>
                                <li><?php echo $error; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <div class="form-floating my-2">
                   <input type="text" class="form-control" name='price' id='price' placeholder='' value="<?php echo $file['price'];?>">
                   <label for="price">Price</label>
                </div>
                <?php if ($errors->hasErrorName('price')) { ?>
                    <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                        <ul class="m-0">
                            <?php foreach ($errors->getError('price') as $error) { ?>
                                <li><?php echo $error; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" value="Save changes">
            </div>
        </div>
    </form>
  </div>
</div>

    <?php if ($errors->hasError() && $errorId == $file['id']) { ?>
        <script type="application/javascript">
            new bootstrap.Modal(document.getElementById('editModal<?php echo $file['id']; ?>'), {}).show()
        </script>
    <?php } ?>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal<?php echo $file['id'];?>" tabindex="-1" aria-labelledby="deleteModal<?php echo $file['id'];?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModal<?php echo $file['id'];?>">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>
            Are you sure to delete <span class="fw-bold"><?php echo $file['title'];?></span> file?
        </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post" action="/delete/file/<?php echo $file['id'];?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-10 h-80-vh border rounded-3 bg-light">
            <div class="row h-100">
                <?php include \app\core\App::$root . '/view/dashboard/components/sidebar.php';  ?>
                <div class="col-10">
                    <?php include \app\core\App::$root . '/view/dashboard/components/headbar.php';  ?>

                    <div class='p-2'>
                        <table class="table table-striped text-center">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Type</th>
                              <th scope="col">Size</th>
                              <th scope="col">Uploaded Time</th>
                              <th scope="col">Price</th>
                              <th scope="col">Status</th>
                              <th scope="col">Count of Download</th>
                              <th scope="col">Download</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $i = 1; foreach ($files as $file) { ?>
                            <tr>
                              <th scope="row"><?php echo $i++; ?></th>
                              <td><?php echo $file['title']; ?></td>
                              <td><?php echo $file['type']; ?></td>
                              <td><?php echo $format->formatSize($file['size']); ?></td>
                              <td><?php echo date('Y/m/d h:s:i' ,$file['uploaded_time']); ?></td>
                              <td><?php echo $file['price']; ?></td>
                              <td>
                                  <?php
                                    switch ($file['status']) {
                                        case 1:
                                            $color = 'success';
                                            $message = 'Confirmed';
                                            break;
                                        case 0:
                                            $color = 'warning';
                                            $message = 'Waiting';
                                            break;
                                        case -1:
                                            $color = 'danger';
                                            $message = 'Rejected';
                                            break;
                                    }
                                  ?>
                                  <div class="bg-<?php echo $color; ?> text-light rounded">
                                      <?php echo $message; ?>
                                  </div>
                              </td>
                              <td><?php echo $file['download_count']; ?></td>
                              <td>
                                <a href="/download/<?php echo $file['id'];?>">
                                    <i class="bi bi-cloud-download fs-5 text-success"></i>
                                </a>
                              </td>
                              <td>
                                <a href=""  data-bs-toggle="modal" data-bs-target="#editModal<?php echo $file['id'];?>">
                                    <i class="bi bi-pencil fs-5 text-primary"></i>
                                </a>
                              </td>
                              <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $file['id'];?>">
                                    <i class="bi bi-trash fs-5 text-danger"></i>
                                </a>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>