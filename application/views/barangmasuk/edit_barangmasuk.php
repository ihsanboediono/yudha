<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Barang Masuk</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('barangmasuk/edit_barangmasuk/') . $brgmsk['idbarang_masuk'] ?>">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="<?= $brgmsk['nama'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskrispi" value="<?= $brgmsk['deskripsi'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" name="jumlah" value="<?= $brgmsk['jumlah'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_masuk" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputMobile" placeholder="">
                        <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Waktu Masuk</label>
                    <div class="col-sm-9">
                        <input type="time" name="waktu_masuk" value="<?= $brgmsk['waktu_masuk'] ?>" class="form-control" id="exampleInputMobile" placeholder="">
                        <?= form_error('waktu_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('barangmasuk/edit_barangmasuk/') ?>">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('barangmasuk') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>