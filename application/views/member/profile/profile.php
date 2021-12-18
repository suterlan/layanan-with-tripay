<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4 pl-3">
    <h4 class="h4 mb-0 text-gray-800"><?= $title; ?></h4>
</div>

<!-- Content Row -->
<div class="container d-flex justify-content-center">
    <div class="card-profile p-3 py-4">
        <div class="text-center"> <img src="<?= base_url('assets/member/img/profile/') . $member['image']; ?>" width="100" class="rounded-circle">
            <h2 class="mt-2"><?= $member['nama']; ?></h2> <span class="mt-1 clearfix"><u><?= $member['email']; ?></u></span>
            <span class="mt-2"><?= $member['alamat']; ?></span>
            <div class="card-tengah">
                <div class="mt-2">
                    <p class="tgl">Bergabung sejak :</p>
                </div>
                <div class="row mt-1 mb-3">
                    <div class="col-md-4">
                        <span class="tgl"><?= date('d', $member['date_created']); ?></span>
                    </div>
                    <div class="col-md-4">
                        <span class="tgl"><?= date('F', $member['date_created']); ?></span>
                    </div>
                    <div class="col-md-4">
                        <span class="tgl"><?= date('Y', $member['date_created']); ?></span>
                    </div>
                </div>
            </div>
            <div class="social-buttons mt-5"> <button class="neo-button"><i class="fa fa-facebook fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-linkedin fa-1x"></i></button> <button class="neo-button"><i class="fa fa-google fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-youtube fa-1x"></i> </button> <button class="neo-button"><i class="fa fa-twitter fa-1x"></i> </button> </div>
            <div class="profile mt-5"><a href="<?= base_url('member/editProfile'); ?>"> <button class="profile_button px-5">Edit Profile</button></a> </div>
        </div>
    </div>
</div>