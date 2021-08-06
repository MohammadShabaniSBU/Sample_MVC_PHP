<div class="row m-0">
    <div class="d-flex justify-content-center align-items-center h-100-vh">
        <div class="col-3">
            <div class="border border-4 rounded-3 bg-white border-success">
                <div class="px-4 py-2">
                    <h2 class="text-success text-center mb-5">Sign Up</h2>
                    <form action="/signUp" method='post'>
                        <div class="form-floating mb-3">
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="n">
                            <label for="firstname">Firstname</label>
                        </div>  
                        <div class="form-floating mb-3">
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="n">
                            <label for="lastname">Lastname</label>
                        </div>  
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="n">
                            <label for="email">Email</label>
                        </div>    
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="n">
                            <label for="password">Password</label>
                        </div>  
                        <div class="form-floating mb-3">
                            <input type="password" name="password-confirmation" class="form-control is-invalid" id="password-confirmation" placeholder="n">
                            <label for="empassword-confirmationail">Password confirmation</label>
                            <span class="text-danger fs-6 fst-italic ms-1 mt-1">it is an error</span>
                        </div>   
                        <input type="submit" class="btn btn-success my-3" value="Sign up" >   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>