<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Layanan Video</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-6">

            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-header">
                    <h3 class="text-center" style="color: lightsalmon;">SOCIAL MEDIA MANAGEMENT</h3>
                </div>
                <div class="card-body">
                    <h5 class="text-gray-700 text-center"><del>Rp. <?= number_format($layanan['harga_del'], 0, ',', '.'); ?> </del></h5>
                    <h3 class="text-gray-900 mb-3 text-center">Rp. <?= number_format($layanan['harga'], 0, ',', '.'); ?></h3>
                    <li class="pl-3 ml-4"><b><?= $layanan['fitur1'];?></b></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur2'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur3'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur4'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur5'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur6'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur7'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur8'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur9'];?></li>
                    <li class="pl-3 ml-4"><?= $layanan['fitur10'];?></li>
                    <a href="<?= base_url('transaksi/getPaymentChannels/' . $layanan['id']); ?>"><button type="submit" class="btn btn-primary" style="float: right;">Pesan Sekarang</button>
                    </a>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Cara Memesan </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample" style="">
                    <div class="card-body">
                        <p class="text-danger">* Sebelum memilih pesanan pastikan lengkapi profil anda</p>
                        <p>- Pertama pilih layanan yang ingin dipesan</p>
                        <p>- Kemudian klik pesan sekarang</p>
                        <p>- Setelah itu akan ada pilihan metode pembayaran</p>
                        <p>- Pilih metode pembayaran sesuai yang anda inginkan</p>
                        <p>- kemudian klik button buat tagihan pembayaran</p>
                        <p>- Hubungi kami untuk transaksi lebih lanjut</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>