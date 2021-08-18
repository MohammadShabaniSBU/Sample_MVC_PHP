<?php
$settings = \app\models\Settings::Do()->getSettings();
?>

<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-10 h-80-vh border rounded-3 bg-light">
            <div class="row h-100">
                <?php include \app\core\App::$root . '/view/dashboard/components/sidebar.php';  ?>
                <div class="col-10 h-100">
                    <?php include \app\core\App::$root . '/view/dashboard/components/headbar.php';  ?>

                    <div class='p-2 h-75'>
                        <div class="h-100">
                            <div class="row">
                                <div class="col-4">
                                    <h3>
                                        Types
                                    </h3>
                                    <hr>
                                    <form class="form-floating my-2" action="<?php echo \app\core\Routes::getPathByName('addType'); ?>" method="post">
                                        <input class="form-control <?php echo $errors->hasError() && $errors->hasErrorName('type') ? 'is-invalid' : ''; ?>" type="text" id="type" placeholder="" name="type">
                                        <label for="type">Enter a new type</label>
                                        <?php if ($errors->hasError() && $errors->hasErrorName('type')) { ?>
                                        <div class="alert alert-danger py-0 mt-2">
                                            <ul class="my-0" style="font-size: smaller">
                                                <?php foreach ($errors->getError('type') as $error) { ?>
                                                <li>
                                                    <?php echo $error;?>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php } ?>
                                        <input class="btn btn-success my-2" type="submit" value="Add Type">
                                    </form>

                                    <div class="overflow-auto" style="height: 40vh;" >
                                        <ul class="list-group list-group-flush">
                                            <?php foreach ($settings['types'] as $type) { ?>
                                                <li class="list-group-item">
                                                    <?php echo $type['value']; ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h3>
                                        File Size
                                    </h3>
                                    <hr>
                                    <form action="<?php echo \app\core\Routes::getPathByName('resetSize'); ?>" method="post">
                                        <div class="form-floating my-2">
                                            <input type="number" class="form-control <?php echo $errors->hasError() && $errors->hasErrorName('maxSize') ? 'is-invalid' : ''; ?>" name="maxSize" id="maxSize" placeholder="" value="<?php echo $settings['maxSize']['value']; ?>">
                                            <label for="maxSize">Max size for files to upload (bytes)</label>
                                        </div>
                                        <?php if ($errors->hasError() && $errors->hasErrorName('maxSize')) { ?>
                                            <div class="alert alert-danger">
                                                <?php foreach ($errors->getError('maxSize') as $error) { ?>
                                                    <ul>
                                                        <?php echo $error;?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <div class="form-floating my-2">
                                            <input type="number" class="form-control <?php echo $errors->hasError() && $errors->hasErrorName('maxUploadSize') ? 'is-invalid' : ''; ?>" name="maxUploadSize" id="maxUploadSize" placeholder="" value="<?php echo $settings['maxUploadSize']['value']; ?>">
                                            <label for="maxUploadSize">Max size that each user can upload in a day (bytes)</label>
                                        </div>
                                        <?php if ($errors->hasError() && $errors->hasErrorName('maxUploadSize')) { ?>
                                            <div class="alert alert-danger">
                                                <?php foreach ($errors->getError('maxUploadSize') as $error) { ?>
                                                    <ul>
                                                        <?php echo $error;?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <input class="btn btn-success" value="Save Changes" type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>