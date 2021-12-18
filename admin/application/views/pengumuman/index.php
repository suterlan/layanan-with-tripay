<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Pengumuman</h4>
                        <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#pengumumanModal">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Add Pengumuman
                        </button>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive mt-3">
                            <table id="pengumumanTable" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Pengumuman</th>
                                        <th>Text Pengumuman</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengumuman as $row) : {
                                    ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row['judul_pengumuman']; ?></td>
                                                <td><?= $row['text_pengumuman'];?></td>
                                                <td>
                                                    <a class="edit-pengumuman" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#pengumumanModalEdit"><button type="button" class="btn btn-inverse-info btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
                                                            <i class="ti-pencil"></i></button></a>
                                                    <a class="remove-pengumuman" data-id="<?= $row['id']; ?>"><button type="button" class="btn btn-inverse-danger btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
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


<!-- Modal Add Pengumuman-->
<div class="modal fade" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="pengumumanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <form action="<?= base_url('pengumuman/addPengumuman'); ?>" method="POST">
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Judul Pengumuman </label>
                            <div class="col-sm-8 mb-0">
                                <input name="judul_pengumuman" type="text" class="form-control" id="judul_pengumuman" placeholder="Judul Pengumuman" value="<?= set_value('judul_pengumuman'); ?>">
                                <?= form_error('judul_pengumuman', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Text Pengumuman</label>
                            <div class="col-sm-8 mb-0">
                                <input name="text_pengumuman" type="text" class="form-control" id="text_pengumuman" placeholder="Text Pengumuman" value="<?= set_value('text_pengumuman'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('text_pengumuman', '<small class="text-danger">', '</small>'); ?>
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
<!-- end modal add pengumuman -->

<!-- Modal Add Pengumuman-->
<div class="modal fade" id="pengumumanModalEdit" tabindex="-1" role="dialog" aria-labelledby="pengumumanModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <form action="<?= base_url('pengumuman/updatePengumuman'); ?>" method="POST">
                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Judul Pengumuman </label>
                            <div class="col-sm-8 mb-0">
                                <input name="id" type="hidden" class="form-control" id="id-pengumuman-edit">
                                <input name="judul_pengumuman" type="text" class="form-control" id="judul_pengumuman-edit" placeholder="Judul Pengumuman" value="<?= set_value('judul_pengumuman'); ?>">
                                <?= form_error('judul_pengumuman', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row mb-1">
                            <label class="col-sm-4">Text Pengumuman</label>
                            <div class="col-sm-8 mb-0">
                                <input name="text_pengumuman" type="text" class="form-control" id="text_pengumuman-edit" placeholder="Text Pengumuman" value="<?= set_value('text_pengumuman'); ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <?= form_error('text_pengumuman', '<small class="text-danger">', '</small>'); ?>
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
<!-- end modal add pengumuman -->

