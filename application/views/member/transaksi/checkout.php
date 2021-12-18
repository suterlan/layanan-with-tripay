<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">1. Pilih Metode Pembayaran</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="container">
        <div class="row">
            <form action="<?= base_url('transaksi/request'); ?>" method="POST">
                <input type="hidden" name="id" class="form-control" value="<?= $member['id']; ?>">
                <input type="hidden" name="id_layanan" class="form-control" value="<?= $layanan['id']; ?>">
                <input type="hidden" name="nama_layanan" class="form-control" value="<?= $layanan['nama_layanan']; ?>">
                <input type="hidden" name="harga" class="form-control" value="<?= $layanan['harga']; ?>">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <div class="col-md-12">
                        <?php
                        foreach ($metodeBayar as $value) :
                        ?>
                            <label class="btn btn-outline-info mb-3 mr-4">
                                <div class="card-body">
                                    <input type="radio" name="channel_code" id="option1" value="<?= $value['code']; ?>"> <?= $value['name']; ?>
                                </div>
                                <img src="<?= $value['icon_url']; ?>" alt="briva">
                            </label>

                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
                <button class="btn btn-primary btn-md" type="submit">Buat Tagihan Pembayaran</button>
            </form>
        </div>
    </div>
</div>