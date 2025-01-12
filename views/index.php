<?php get_header('ITE Online Clearance - Login', [], 'loading authentication-bg authentication-bg-pattern');?>
    <div class="account-pages my-5">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <p class="h3">Login as</p>
                    </div>
                    <div class="row justify-content-between py-2">
                        <div class="col-3">
                            <div class="px-2 py-1 card text-center login-toggle" data-login-type="admin">Admin</div>
                        </div>
                        <div class="col-3">
                            <div class="px-2 py-1 card text-center login-toggle" data-login-type="teacher">Teacher</div>
                        </div>
                        <div class="col-3">
                            <div class="px-2 py-1 card text-center login-toggle" data-login-type="student">Student</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body p-4">
                            
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Sign In</h4>
                            </div>

                            <form id="loginForm" action="#">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" required="" id="password" placeholder="Enter your password">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();?>