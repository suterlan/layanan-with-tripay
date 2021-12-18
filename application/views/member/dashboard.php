<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome, <?= $member['nama']; ?></h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
            <strong>Jangan Lupa!</strong> Lengkapi profil anda sebelum melakukan transaksi.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <!--Informasi :-->
        <div class="col-md-5">
            <div class="card shadow mb-4">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?= base_url('assets/member/img/slide/slide1.jpg');?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?= base_url('assets/member/img/slide/slide2.jpg');?>" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <?php foreach ($pengumuman as $key) : {
                ?>
        <div class="col-md-4 ml-auto">
            <div class="alert alert-warning shadow" role="alert">
                <?= $key['judul_pengumuman'];?> <hr><?= $key['text_pengumuman'];?> <br>
            </div>
        </div>
        <?php }
                endforeach; ?>
        
        <!-- Card Layanan -->
        <!-- <?php foreach ($layanan as $key) : {
                ?>
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header bg-gradient-primary py-3">
                            <h6 class="m-0 font-weight-bold text-gray-100"><?= $key['nama_layanan']; ?></h6>
                        </div>
                        <div class="card-body">
                            <h4 class="text-gray-900 p-3 m-0">Rp. <?= number_format($key['harga'], 0, ',', '.'); ?>/bln</h4>
                            <p>* deskripsi fitur</p>
                            <p>* deskripsi fitur</p>
                            <p>* deskripsi fitur</p>
                            <p>* deskripsi fitur</p>
                            <div class="py-10">
                                <button class="btn btn-outline-primary">Pesan</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
                endforeach; ?> -->
        <!-- End Layanan -->

        

    </div>
    <!-- end content row -->

</div>
<!-- /.container-fluid -->