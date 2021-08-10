<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModal">Upload</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
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
                        <div class="form-floating">
                            <select class="form-select" name="type" id="type">
                                <option selected value="-1">Choose the type of your file</option>
                                <option value="zip">*.zip</option>
                                <option value="pdf">*.pdf</option>
                                <option value="mp4">*.mp4</option>
                                <option value="png">*.png</option>
                                <option value="mp3">*.mp3</option>
                            </select>
                            <label for="type">Type</label>
                        </div>
                        <div class="mt-3">
                            <label for="file" class="form-label">Choose your file</label>
                            <input class="form-control" type="file" id="file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-8 h-80-vh border rounded-3 bg-light">

<!--            <div class='d-flex justify-content-between align-items-center mx-5 my-3 mb-0'>-->
<!--                <h4 class="text-center text-success ">-->
<!--                    Dear user, enjoy unlimited files from all over the world-->
<!--                </h4>-->
<!--                <div class="d-flex align-items-center">-->
<!--                    <button class="bg-light border-0 p-0" type="button" data-bs-toggle="modal" data-bs-target="#uploadModal" title="Upload">-->
<!--                        <i class="bi bi-cloud-arrow-up fs-2 mx-2 text-primary"></i>-->
<!--                    </button>-->
<!--                    <a href="" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">-->
<!--                        <i class="bi bi-x-circle fs-3 text-danger"></i>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->

            <div class='d-flex justify-content-center mx-5 my-3 mb-0'>
                <div class='d-flex w-50'>
                    <a href="/signIn" class="btn btn-outline-success rounded-0 rounded-start w-50 m-0">Sign in</a>
                    <a href="/signUp" class="btn btn-outline-success rounded-0 rounded-end border-start-0 w-50 m-0">Sign up</a>
                </div>
            </div>


            <div class='px-5 py-3'>
                <div class="row row-cols-3">
                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="row">
                                        <div class='col'>size</div>
                                        <div class='col'>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col my-2">
                        <div class="border border-success rounded-3 p-2">
                            <div class="row">
                                <div class="col-4">
                                    <div class="w-100 ratio ratio-1x1 rounded-3 bg-dark" ></div>
                                </div>
                                <div class="col-8">
                                    <div>title</div>
                                    <div>owner</div>
                                    <div class="d-flex justify-content-between">
                                        <div>size</div>
                                        <div>type</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>