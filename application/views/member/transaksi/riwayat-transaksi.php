<div class="main-panel">
    <div class="content">
        <div class="row">
            <div class="col lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Riwayat Transaksi</h4>
                        <!-- <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#layananModal">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Add Layanan
                        </button> -->
                        <div class="table-responsive mt-3 ">
                            <table id="layananTable" class="table table-striped table-hover table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>No Ref</th>
                                        <th>Nama Customer</th>
                                        <th>Merchant Ref</th>
                                        <th>Layanan Order</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($layanan as $row) :
                                        if ($row['customer_email'] == $member['email']) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= date('D/M/Y H:i:s', $row['created_at']); ?></td>
                                            <td><?= $row['reference']; ?></td>
                                            <td><?= $row['customer_name']; ?></td>
                                            <td><?= $row['merchant_ref']; ?></td>
                                            <td><?= $row['order_items'][0]['name']; ?></td>
                                            <td><?= number_format($row['amount'], 0, ',', '.'); ?></td>
                                            <td><span class="badge <?php
                                                                    if ($row['status'] == 'UNPAID') {
                                                                        echo 'badge-danger';
                                                                    } elseif($row['status']=='EXPIRED') {
                                                                        echo 'badge-warning';
                                                                    }else{
                                                                        echo 'badge-success';
                                                                    } ?>">
                                                    <?= mb_strtoupper($row['status']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>