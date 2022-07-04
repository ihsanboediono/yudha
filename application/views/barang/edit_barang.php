<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Barang</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('barang/edit_barang/') . $brg['id_barang'] ?>">
                <div class="form-group row">
                    <label for="kayu" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <select name="kayu" class="js-example-basic-single" id="kayu" style="width:100%">
                            <option value="">- Pilih -</option>
                            <?php foreach ($kayunya as $kayu) : ?>
                                <option value="<?php echo $kayu['id_kayu'] ?>" <?= $brg['kayu_id'] == $kayu['id_kayu'] ? 'selected' : ''; ?>><?php echo $kayu['nama_kayu'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('kayu', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                    <div class="col-sm-9">
                        <select name="jenis" class="js-example-basic-single" id="jenis" style="width:100%">
                            <option value="">- Pilih -</option>
                            <?php foreach ($jenisnya as $jenis) : ?>
                                <option value="<?php echo $jenis['id_jenis'] ?>" <?= $brg['jenis_id'] == $jenis['id_jenis'] ? 'selected' : ''; ?>><?php echo $jenis['nama_jenis'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi..." value="<?= $brg['deskripsi_barang']; ?>">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga Barang</label>
                    <div class="col-sm-9">
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Barang..." value="<?= $brg['harga']; ?>">
                        <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-3 col-form-label">Stok Barang</label>
                    <div class="col-sm-9">
                        <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok..." value="<?= $brg['stok']; ?>">
                        <?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <!-- <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="status" id="status">
                            <option>---</option>
                            <option <?= $brg['status'] == "Ada" ? "selected" : "" ?>>Ada</option>
                            <option <?= $brg['status'] == "tidak ada" ? "selected" : "" ?>>Tidak Ada</option>
                        </select>
                    </div>
                    <?= form_error('status  ', '<small class="text-danger">', '</small>'); ?>

                </div> -->

                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('barang/edit_barang/') ?>">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('barang') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>