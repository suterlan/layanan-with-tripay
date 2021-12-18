<div class="container-fluid">

    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow-sm p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h2><b>Detail Transaksi</b></h2>
                </div>
                <div class="card-content ">
                    <div class="mb-4 mx-auto">No Ref. <b><?= $detail['reference']; ?></b></div>

                    <div class="mb-2 mx-auto">Kode Pembayaran :</div>
                    <div class="mb-4 text-primary alert alert-warning">
                        <h4><b><?= $detail['pay_code']; ?></b></h4>
                    </div>
                    <div class="mb-2 mx-auto">Nominal yang akan dibayarkan :</div>
                    <div class="mb-4 text-danger">
                        <h1><b><u>Rp. <?= number_format($detail['amount'], 0, ',', '.'); ?></u></b></h1>
                    </div>
                </div>
                <div class="alert alert-danger" role="alert">
                    Segera lakukan pembayaran sebelum <p><?= date('d M Y H:i:s', $detail['expired_time']); ?></p>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardCaraPembayaran" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Cara Pembayaran </h6>
                    </a>

                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseCardCaraPembayaran">
                        <div class="card-body">
                            <?php foreach ($detail['instructions'] as $value) :
                            ?>
                                <ul>
                                    <h5 class="alert alert-primary"><?= $value['title']; ?> :</h5>

                                    <?php
                                    foreach ($value['steps'] as $step) :
                                    ?>
                                        <li class="text-dark"><?= $step; ?></li>
                                    <?php
                                    endforeach; ?>

                                </ul>
                            <?php
                            endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>