<div class="col-2 h-100 border-end border-success pe-0">
    <a href="<?php echo \app\core\Routes::getPathByName('uploads'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Uploaded Files
    </a>
    <a href="<?php echo \app\core\Routes::getPathByName('downloads'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Downloaded Files
    </a>
    <?php if (\app\core\Auth::getInstance()->isAdmin()) { ?>
    <a href="<?php echo \app\core\Routes::getPathByName('requests'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Requested Files
    </a>
    <a href="<?php echo \app\core\Routes::getPathByName('user management'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Users Management
    </a>
    <a href="<?php echo \app\core\Routes::getPathByName('settings'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Settings
    </a>
    <?php } ?>
    <a href="<?php echo \app\core\Routes::getPathByName('profile'); ?>" class="btn btn-outline-success border-0 border-bottom w-100 text-start rounded-0 fs-5">
        Profile
    </a>
</div>