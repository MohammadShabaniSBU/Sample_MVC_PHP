<!-- Logout Modal -->
<?php include \app\core\App::$root . "/view/modals/logoutModal.php"; ?>

<div class="d-flex justify-content-between align-items-center p-2">
    <div class="fw-bold fs-4">
        <?php echo \app\core\Auth::getInstance()->getName(); ?>
    </div>
    <div>
        <a href="<?php echo \app\core\Routes::getPathByName('home'); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Home">
            <i class="bi bi-house-fill fs-3 text-info"></i>
        </a>
        <button class="bg-light border-0 p-0" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal" title="Logout">
            <i class="bi bi-x-circle fs-3 text-danger"></i>
        </button>
    </div>
</div>
<hr>