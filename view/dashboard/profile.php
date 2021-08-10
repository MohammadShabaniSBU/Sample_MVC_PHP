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
                    <div class='my-5 mt-3 p-2 me-4'>
                        <h3>Your Info</h3>
                        <form>
                            <div class="row d-flex align-items-center">
                                <div class="col-2">
                                    <div class="w-100 ratio ratio-1x1 rounded bg-primary position-relative text-center">
                                        <div class="position-absolute top-100 start-50 translate-middle">
                                            <input type="file" style="position: relative; opacity: 0; z-index: -1"  id="change-image">
                                            <label class="bg-success px-2 rounded" for="change-image" style="cursor: pointer">
                                                <i class="bi bi-camera fs-2 text-light"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="row row-cols-2">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input class="form-control my-2" type="text" id="firstname" placeholder="">
                                                <label for="firstname">Firstname</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input class="form-control my-2" type="text" id="lastname" placeholder="">
                                                <label for="lastname">Lastname</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input class="form-control my-2 w-100" type="text" id="email" placeholder="">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end w-100">
                                                <input class="btn btn-success" type="submit" value="Save changes">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h3 class="mt-4">Your Password</h3>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                                    <label for="password">Password</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" placeholder="">
                                    <label for="password-confirmation">Password Confirmation</label>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-2">
                                <div class="form-floating">
                                    <input type="submit" class="btn btn-success my-2" value="Change Password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>