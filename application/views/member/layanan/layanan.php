<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Layanan</h1>
        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="row">
        <?php foreach ($layanan as $layanan) : {
                ?>
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-header bg-gradient-primary py-3">
                    <h6 class="m-0 font-weight-bold text-gray-100"><?= $layanan['nama_layanan']; ?></h6>
                </div>
                <div class="card-body">
                    <h5 class="text-gray-700 text-center"><del>Rp. <?= number_format($layanan['harga_del'], 0, ',', '.'); ?> </del></h5>
                    <h3 class="text-gray-900 mb-3 text-center">Rp. <?= number_format($layanan['harga'], 0, ',', '.'); ?></h3>
                    <p class=" mb-0"><b><?= $layanan['fitur1'];?></b></p>
                    <p class=" mb-0"><?= $layanan['fitur2'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur3'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur4'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur5'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur6'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur7'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur8'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur9'];?></p>
                    <p class=" mb-0"><?= $layanan['fitur10'];?></p><hr>
                    <a href="<?= base_url('transaksi/getPaymentChannels/' . $layanan['id']); ?>"><button type="submit" class="btn btn-primary" style="float: right;">Pesan Sekarang</button>
                    </a>
                </div>
            </div>
        </div>
        <?php }
                endforeach; ?>
    </div>
</div>