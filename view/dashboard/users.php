
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
                                <th scope="col">Uploaded Time</th>
                                <th scope="col">Price</th>
                                <th scope="col">Count of Download</th>
                                <th scope="col">Download</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>25</td>
                                <td>
                                    <a href="">
                                        <i class="bi bi-cloud-download fs-5 text-success"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href=""  data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="bi bi-pencil fs-5 text-primary"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="bi bi-trash fs-5 text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>