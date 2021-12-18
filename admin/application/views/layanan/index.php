<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Layanan</h4>
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#layananModal">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Add Layanan
                        </button>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive mt-3">
                            <table id="layananTable" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($layanan as $row) : {
                                    ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row['nama_layanan']; ?></td>
                                                <td><?= number_format($row['harga'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <a class="edit-layanan" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#layananModalEdit"><button type="button" class="btn btn-inverse-info btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
                                                            <i class="ti-pencil"></i></button></a>
                                                    <a class="remove-layanan" data-id="<?= $row['id']; ?>"><button type="button" class="btn btn-inverse-danger btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
                                                            <i class="ti-trash"></i></button></a>
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


<!-- Modal Add Layanan-->
<div class="modal fade" id="layananModal" tabindex="-1" role="dialog" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <form action="<?= base_url('layanan/addLayanan'); ?>" method="POST">
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Nama Layanan </label>
                            <div class="col-sm-8 mb-0">
                                <input name="nama_layanan" type="text" class="form-control" id="nama_layanan" placeholder="Nama Layanan" value="<?= set_value('nama_layanan'); ?>">
                                <?= form_error('nama_layanan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Harga</label>
                            <div class="col-sm-8 mb-0">
                                <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga" value="<?= set_value('harga'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Harga Coret</label>
                            <div class="col-sm-8 mb-0">
                                <input name="harga_del" type="text" class="form-control" id="harga_del" placeholder="Harga yang dicoret" value="<?= set_value('harga_del'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('harga_del', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 1 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur1" type="text" class="form-control" id="fitur1" value="<?= set_value('fitur1'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 2 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur2" type="text" class="form-control" id="fitur2" value="<?= set_value('fitur2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 3 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur3" type="text" class="form-control" id="fitur3" value="<?= set_value('fitur3'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 4 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur4" type="text" class="form-control" id="fitur4" value="<?= set_value('fitur4'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 5 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur5" type="text" class="form-control" id="fitur5" value="<?= set_value('fitur5'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 6 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur6" type="text" class="form-control" id="fitur6" value="<?= set_value('fitur6'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 7 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur7" type="text" class="form-control" id="fitur7" value="<?= set_value('fitur7'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 8 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur8" type="text" class="form-control" id="fitur8" value="<?= set_value('fitur8'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 9 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur9" type="text" class="form-control" id="fitur9" value="<?= set_value('fitur9'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 10 </label>
                            <div class="col-sm-8 mb-1">
                                <input name="fitur10" type="text" class="form-control" id="fitur10" value="<?= set_value('fitur10'); ?>">
                            </div>
                        </div><hr>

                        <button type="button" class="btn btn-outline-warning btn-icon-text" data-dismiss="modal">
                            <i class="ti-close btn-icon-prepend"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text">
                            <i class="ti-save btn-icon-prepend"></i>
                            Submit
                        </button>
                    </form>
                </div>
                <!-- end content modal -->
            </div>
        </div>
    </div>
</div>
<!-- end modal add layanan -->

<!-- Modal Edit Layanan-->
<div class="modal fade" id="layananModalEdit" tabindex="-1" role="dialog" aria-labelledby="layananModalEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Layanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <form action="<?= base_url('layanan/updateLayanan'); ?>" method="POST">
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Nama Layanan </label>
                            <div class="col-sm-8">
                                <input id="id-layanan-edit" name="id" type="hidden" class="form-control">
                                <input name="nama_layanan" type="text" class="form-control" id="nama-layanan-edit">
                                <?= form_error('nama_layanan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Harga</label>
                            <div class="col-sm-8">
                                <input name="harga" type="text" class="form-control" id="harga-layanan-edit" placeholder="Harga" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Harga Coret</label>
                            <div class="col-sm-8 mb-0">
                                <input name="harga_del" type="text" class="form-control" id="harga_del-edit" placeholder="Harga yang dicoret" value="<?= set_value('harga_del'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('harga_del', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 1 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur1" type="text" class="form-control" id="fitur1-edit" value="<?= set_value('fitur1'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 2 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur2" type="text" class="form-control" id="fitur2-edit" value="<?= set_value('fitur2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 3 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur3" type="text" class="form-control" id="fitur3-edit" value="<?= set_value('fitur3'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 4 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur4" type="text" class="form-control" id="fitur4-edit" value="<?= set_value('fitur4'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 5 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur5" type="text" class="form-control" id="fitur5-edit" value="<?= set_value('fitur5'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 6 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur6" type="text" class="form-control" id="fitur6-edit" value="<?= set_value('fitur6'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 7 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur7" type="text" class="form-control" id="fitur7-edit" value="<?= set_value('fitur7'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 8 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur8" type="text" class="form-control" id="fitur8-edit" value="<?= set_value('fitur8'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 9 </label>
                            <div class="col-sm-8 mb-0">
                                <input name="fitur9" type="text" class="form-control" id="fitur9-edit" value="<?= set_value('fitur9'); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Fitur 10 </label>
                            <div class="col-sm-8 mb-1">
                                <input name="fitur10" type="text" class="form-control" id="fitur10-edit" value="<?= set_value('fitur10'); ?>">
                            </div>
                        </div><hr>
                        
                        <button type="button" class="btn btn-outline-warning btn-icon-text" data-dismiss="modal">
                            <i class="ti-close btn-icon-prepend"></i>
                            Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary btn-icon-text ">
                            <i class="ti-save btn-icon-prepend"></i>
                            Submit
                        </button>
                    </form>
                </div>
                <!-- end content modal -->
            </div>
        </div>
    </div>
</div>
<!-- end modal Edit layanan -->