<?php
class Format {
    use \app\core\traits\Formatter;
}

$formatter = new Format();
$files = \app\models\File::Do()->getAllFiles();
?>

<?php foreach ($files as $file) { ?>
<div class="modal fade" id="fileModal<?php echo $file['id']; ?>" tabindex="-1" aria-labelledby="fileModal<?php echo $file['id']; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModal<?php echo $file['id']; ?>"><?php echo $file['title']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    Do you want to download <?php echo $file['title']; ?> file?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="/download/counter/<?php echo $file['id']; ?>" class="btn btn-success">Download</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModal">Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo \app\core\Routes::getPathByName('upload'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" <?php if ($errors->hasErrorName('title')) { echo "is-invalid"; }?> name='title' id='title' placeholder=''>
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
                            <input type="text" class="form-control" <?php if ($errors->hasErrorName('fileName')) { echo "is-invalid"; }?> name='fileName' id='fileName' placeholder=''>
                            <label for="fileName">File Name</label>
                        </div>
                        <?php if ($errors->hasErrorName('fileName')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('fileName') as $error) { ?>
                                        <li><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="form-floating my-2">
                            <input type="text" class="form-control" <?php if ($errors->hasErrorName('price')) { echo "is-invalid"; }?> name='price' id='price' placeholder=''>
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
                        <div class="mt-3">
                            <label for="file" class="form-label">Choose your file</label>
                            <input class="form-control mb-2" type="file" <?php if ($errors->hasErrorName('file')) { echo "is-invalid"; }?> id="file" name="file">
                        </div>
                        <?php if ($errors->hasErrorName('file')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('file') as $error) { ?>
                                        <li><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" value="Upload">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<?php include \app\core\App::$root . "/view/modals/logoutModal.php"; ?>


<?php if ($errors->hasError()) { ?>
    <script type="application/javascript">
        new bootstrap.Modal(document.getElementById('uploadModal'), {}).show()
    </script>
<?php } ?>

<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-8 h-80-vh border rounded-3 bg-light">
            <?php if (\app\core\Auth::getInstance()->isLogin()) {?>
            <div class='d-flex justify-content-between align-items-center mx-5 my-3 mb-0'>
                <h4 class="text-center text-success ">
                    Dear <span class="fw-bold"><?php echo \app\core\Auth::getInstance()->getName(); ?></span>, enjoy unlimited files from all over the world
                </h4>
                <div class="d-flex align-items-center">
                    <a href="<?php echo \app\core\Routes::getPathByName('uploads'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Dashboard">
                        <i class="bi bi-person-lines-fill fs-3 text-warning"></i>
                    </a>
                    <button class="bg-light border-0 p-0" type="button" data-bs-toggle="modal" data-bs-target="#uploadModal" title="Upload">
                        <i class="bi bi-cloud-arrow-up fs-2 mx-2 text-primary"></i>
                    </button>
                    <button class="bg-light border-0 p-0" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal" title="Logout">
                        <i class="bi bi-x-circle fs-3 text-danger"></i>
                    </button>
                </div>
            </div>
            <?php } else { ?>
            <div class='d-flex justify-content-center mx-5 my-3 mb-0'>
                <div class='d-flex w-50'>
                    <a href="<?php echo \app\core\Routes::getPathByName('sign in'); ?>" class="btn btn-outline-success rounded-0 rounded-start w-50 m-0">Sign in</a>
                    <a href="<?php echo \app\core\Routes::getPathByName('sign up'); ?>" class="btn btn-outline-success rounded-0 rounded-end border-start-0 w-50 m-0">Sign up</a>
                </div>
            </div>
            <?php } ?>
            <div class='px-5 py-3'>
                <div class="row row-cols-3">
                    <?php foreach ($files as $file) { ?>
                    <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#fileModal<?php echo $file['id']; ?>">
                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <img src="<?php echo $file['image_url']; ?>" class="rounded-3 bg-dark h-100 w-100" style="object-fit: contain;">
                                </div>
                                <div class="col-8">
                                    <div><?php echo $file['title']; ?></div>
                                    <div><?php echo $file['firstname'] . ' ' . $file['lastname']; ?></div>
                                    <div class="row">
                                        <div class='col'><?php echo $formatter->formatSize($file['size']); ?></div>
                                        <div class='col'><?php echo $file['type']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>