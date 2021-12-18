<div class="container">
</div class="row">
<div id="card">
    <div id="card-title">
        Registrasi
    </div>
    <div id="card-content" class="card-body">
        <form role="form" method="POST" action="<?= base_url('Auth/registration'); ?>">
            <div class="form-group input-group-outline mb-3">
                <input placeholder="Masukan Nama Lengkap..." type="text" id="nama" name="nama" class="form-control" onfocus="focused(this)" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group input-group-outline mb-3">
                <input placeholder="Email" type="email" id="email" name="email" class="form-control" onfocus="focused(this)" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group input-group-outline mb-3">
                <input placeholder="Password" type="password" id="password" name="password" class="form-control" onfocus="focused(this)" value="<?= set_value('password'); ?>">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class=" form-group input-group-outline mb-3">
                <input placeholder="Ulangi password" type="password" id="password2" name="password2" class="form-control" onfocus="focused(this)" value="<?= set_value('password2'); ?>">
            </div>
            <div class=" form-check form-check-info text-start ps-4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                <label class="form-check-label" for="flexCheckDefault">
                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" id="submit-btn" class="btn btn-lg w-100 mt-3 mb-0">Sign Up</button>
            </div>
            <div class="mt-3 mb-3">
                <label>Sudah punya akun ? <a href="<?= base_url(''); ?>auth"><b>Sign In</b></a></label>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<!-- <script>
    if (document.getElementById('nama') == '') {
        alert('Nama tidak boleh kosong!')
    }
    if (document.getElementById('email') == '') {
        alert('Email tidak boleh kosong!')
    }
    if (document.getElementById('password') == '') {
        alert('Password harus diisi!')
    }
</script> -->