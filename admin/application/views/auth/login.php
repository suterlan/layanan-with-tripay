<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <h4>Az-Media | Administrator</h4>
                    <h6 class="font-weight-light">Sign in</h6>
                    <form class="pt-3" method="post" action="<?= base_url('auth'); ?>">
                        <div class="form-group">
                            <input name="username" type="text" class="form-control form-control-lg" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Password">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    Keep me signed in
                                </label>
                            </div>
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->