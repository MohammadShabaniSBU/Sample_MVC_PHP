<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-3">
            <div class="border border-4 rounded-3 bg-white border-success">
                <div class="px-4 py-2">
                    <h2 class="text-success text-center mb-5">Sign Up</h2>
                    <form action="/signUp" method='post'>
                        <div class="form-floating mb-3">
                            <input type="text" name="firstname" class="form-control <?php if ($errors->hasErrorName('firstname')) { echo "is-invalid"; }?> " id="firstname" placeholder="n">
                            <label for="firstname">Firstname</label>
                        </div>
                        <?php if ($errors->hasErrorName('firstname')) { ?>
                        <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                            <ul class="m-0">
                                <?php foreach ($errors->getError('firstname') as $error) { ?>
                                <li"><?php echo $error; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="form-floating mb-3">
                            <input type="text" name="lastname" class="form-control <?php if ($errors->hasErrorName('lastname')) { echo "is-invalid"; }?> " id="lastname" placeholder="n">
                            <label for="lastname">Lastname</label>
                        </div>
                        <?php if ($errors->hasErrorName('lastname')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('lastname') as $error) { ?>
                                        <li"><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control <?php if ($errors->hasErrorName('email')) { echo "is-invalid"; }?> " id="email" placeholder="n">
                            <label for="email">Email</label>
                        </div>
                        <?php if ($errors->hasErrorName('email')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('email') as $error) { ?>
                                        <li"><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control <?php if ($errors->hasErrorName('password')) { echo "is-invalid"; }?> " id="password" placeholder="n">
                            <label for="password">Password</label>
                        </div>
                        <?php if ($errors->hasErrorName('password')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('password') as $error) { ?>
                                        <li"><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="form-floating mb-3">
                            <input type="password" name="password-confirmation" class="form-control <?php if ($errors->hasErrorName('password-confirmation')) { echo "is-invalid"; }?> " id="password-confirmation" placeholder="n">
                            <label for="empassword-confirmationail">Password confirmation</label>
                        </div>
                        <?php if ($errors->hasErrorName('password-confirmation')) { ?>
                            <div class="alert alert-danger py-2 px-1" style="font-size: smaller">
                                <ul class="m-0">
                                    <?php foreach ($errors->getError('password-confirmation') as $error) { ?>
                                        <li"><?php echo $error; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <input type="submit" class="btn btn-success my-3" value="Sign up" >   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>