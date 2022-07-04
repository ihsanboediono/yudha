<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Kayu</h4>
            <form class="forms-sample" method="POST" action="">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><b> Nama</b></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" id="exampleInputUsername2" placeholder="Nama Kayu" autofocus autocomplete="on" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><b> Deskripsi</b></label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi" class="form-control" id="exampleInputUsername2" placeholder="Deskripsi Kayu" rows="5" autofocus autocomplete="on"></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2 text-center">Submit</button>
                <a class="btn btn-danger mr-2 text-center" href="<?= base_url('kayu') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>