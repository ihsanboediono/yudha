<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Admin</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('adminn/edit_admin/') . $adm['id_admin'] ?>">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" value="<?= $adm['username'] ?>" class="form-control" id="exampleInputEmail2" placeholder="Username">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" name="katasandi" value="<?= $adm['katasandi'] ?>" class="form-control" id="exampleInputMobile" placeholder="Katasandi">
                        <?= form_error('katasandi', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('adminn/edit_admin/') ?>">Submit</button>
                <a class="btn btn-danger mr-2" href="<?= base_url('adminn') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>
