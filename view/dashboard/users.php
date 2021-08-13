<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" class="form-floating">
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name='title' id='title' placeholder=''>
                        <label for="title">Title</label>
                    </div>
                    <div class="form-floating my-2">
                        <input type="text" class="form-control" name='price' id='price' placeholder=''>
                        <label for="price">Price</label>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    Are you sure to delete this file?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Activation Modals -->
<?php $users = \app\models\User::Do()->getAllUsers(); foreach ($users as $user) { ?>

<div class="modal fade" id="activationModal<?php echo $user['id'];?>" tabindex="-1" aria-labelledby="activationModal<?php echo $user['id'];?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activationModal<?php echo $user['id'];?>"><?php echo $user['firstname'] . ' ' . $user['lastname'];?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    Are you sure to <?php echo $user['status'] ? 'disactive' : 'active'; ?> <span class="fw-bold"><?php echo $user['firstname'] . ' ' . $user['lastname'];?></span>?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="/changeUserStatus/<?php echo $user['id']; ?>" method="post">
                        <input type="hidden" value="<?php echo $user['status'] ? 'disactive' : 'active'; ?>" name="action">
                    <input type="submit" class="btn btn-<?php echo $user['status'] ? 'danger' : 'success'; ?>" value="<?php echo $user['status'] ? 'Disactive' : 'Active'; ?>">
                </form>
            </div>
        </div>
    </div>
</div>


<?php } ?>


<?php
    function getColorType(string $type) {
        switch ($type) {
            case 'admin':
                return 'danger';
            case 'normal':
                return 'primary';

        }
    }
?>

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
                                <th scope="col">Firstname</th>
                                <th scope="col">Lastname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach ($users as $user) { ?>
                            <tr>
                                <th scope="row"><?php echo $i++;?></th>
                                <td><?php echo $user['firstname']; ?></td>
                                <td><?php echo $user['lastname']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td>
                                    <div class="bg-<?php echo getColorType($user['type'])?> rounded text-light">
                                        <?php echo $user['type']; ?>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-<?php echo $user['status'] ? 'success' : 'danger'; ?> py-0" data-bs-toggle="modal" data-bs-target="#activationModal<?php echo $user['id'];?>">
                                        <?php echo $user['status'] ? 'Active' : 'Disactive'; ?>
                                    </button>
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