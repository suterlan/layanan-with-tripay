<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen User</h4>
                        <button type="button" class="btn btn-primary btn-icon-text" data-toggle="modal" data-target="#userModal">
                            <i class="ti-plus btn-icon-prepend"></i>
                            Add User
                        </button>
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive mt-3">
                            <table id="userTable" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Role Id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($userData as $row) : {
                                    ?>
                                            <tr>

                                                <td class="py-1"><img src="<?= base_url('assets/dist/images/profile/' . $row['image']); ?>" alt="image"></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['username']; ?></td>

                                                <td><?= $row['role_id']; ?></td>
                                                <td>
                                                    <a class="edit" data-id="<?= $row['id']; ?>" data-toggle="modal" data-target="#userModalEdit"><button type="button" class="btn btn-inverse-info btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
                                                            <i class="ti-pencil"></i></button></a>
                                                    <a class="remove" data-id="<?= $row['id']; ?>"><button type="button" class="btn btn-inverse-danger btn-icon" style="padding-right: 1rem; padding-left: 0.8rem;">
                                                            <i class="ti-trash"></i></button></a>
                                                </td>

                                            </tr>
                                    <?php
                                        }
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


<!-- Modal Add User-->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <form action="<?= base_url('user/addUser'); ?>" method="POST">
                        <div class="form-group row">
                            <label class="col-sm-3">Nama </label>
                            <div class="col-sm-9">
                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Username</label>
                            <div class="col-sm-9">
                                <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3  ">Confirm Password</label>
                            <div class="col-sm-9">
                                <input name="password2" type="password" class="form-control" id="password2" placeholder="Confirm Password">
                            </div>
                        </div>
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
<!-- end modal add user -->

<!-- MODAL EDIT USER -->
<!-- Modal Add User-->
<div class="modal fade" id="userModalEdit" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 20px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- content modal -->
                <div class="container-fluid">
                    <?php echo form_open_multipart('user/updateUser'); ?>
                    <div class="form-group row">
                        <input id="id-edit" name="id" type="hidden" class="form-control">
                        <label class="col-sm-3">Nama </label>
                        <div class="col-sm-9">
                            <input id="nama-edit" name="nama" type="text" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Ganti Foto</label>
                        <div class="col-sm-9">
                            <input id="image" name="image" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Username</label>
                        <div class="col-sm-9">
                            <input id="username-edit" name="username" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-check form-check-danger">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Ganti Password
                            <i class="input-helper"></i></label>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input id="password-edit" name="password" type="password" class="form-control" minlength="8" disabled>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-warning btn-icon-text" data-dismiss="modal">
                        <i class="ti-close btn-icon-prepend"></i>
                        Close
                    </button>
                    <button type="submit" class="btn btn-outline-primary btn-icon-text">
                        <i class="ti-save btn-icon-prepend"></i>
                        Submit
                    </button>
                </div>
                <!-- end content modal -->
            </div>
        </div>
    </div>
</div>
<!-- end modal add user -->