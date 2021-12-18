<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<!-- Content Row -->
<div class="container">

    <?php echo form_open_multipart('member/editProfile'); ?>
    <div class="col-md-6 col-xs-12">
        <input type="hidden" class="form-control" name="id" value="<?= $member['id']; ?>" readonly>
        <div class="input-group mb-3">
            <input name="email" type="text" class="form-control" placeholder="Email" value="<?= $member['email']; ?>" readonly>
            <span class="input-group-text">@example.com</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
            <input name="nama" type="text" class="form-control" placeholder="Nama lengkap" aria-label="Nama lengkap" value="<?= $member['nama']; ?>">
            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text"><i class="fas fa-phone"></i></span>
            <input name="no_hp" type="number" class="form-control" placeholder="08xx-xxxx-xxxx" value="<?= $member['no_hp']; ?>">
            <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group mb-3">
            <label class="input-group-text">Foto</label>
            <input name="image" type="file" class="form-control">
        </div>

        <div class="input-group mb-5">
            <span class="input-group-text">Alamat</span>
            <textarea name="alamat" class="form-control" placeholder="Alamat lengkap..."><?= $member['alamat']; ?></textarea>
            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="input-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </div>



</div>