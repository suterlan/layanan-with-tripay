<div class="container">
</div class="row">
<div id="card-login">
    <div id="card-content" class="card-body">
        <div id="card-title-login">
            <b>Sign In</b>
        </div>
        <form role="form" method="POST" action="<?= base_url('auth'); ?>">
            <div class="form-group input-group-outline mt-5 mb-4">
                <input name="email" placeholder="Email" type="email" class="form-control" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group input-group-outline mb-3">
                <input name="password" placeholder="Password" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="text-center">
                <button type="submit" id="submit-btn" class="btn btn-lg w-100 mt-4 mb-1">Sign In</button>
            </div>
            <div class="mt-3 mb-4">
                <label>Belum punya akun? <a href="<?= base_url(''); ?>auth/registration"><b>Sign Up</b></a></label>
            </div>
        </form>
    </div>
</div>
</div>
</div>