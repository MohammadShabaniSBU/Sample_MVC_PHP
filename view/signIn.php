<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-3">
            <div class="border border-4 rounded-3 bg-white border-success">
                <div class="px-4 py-2">
                    <h2 class="text-success text-center mb-5">Sign In</h2>
                    <?php if ($errors->hasErrorName('signIn')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $errors->getError('signIn')[0]; ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($errorMessage)) { ?>
                        <div class="alert alert-danger">
                            <?php echo $errorMessage; ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($warningMessage)) { ?>
                        <div class="alert alert-warning">
                            <?php echo $warningMessage; ?>
                        </div>
                    <?php } ?>
                    <form action="/signIn" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="n">
                            <label for="email">Email</label>
                        </div>    
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="n">
                            <label for="password">Password</label>
                        </div>    
                        <input type="submit" class="btn btn-success my-3" value="Sign in" >   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>