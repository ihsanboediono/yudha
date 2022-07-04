<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Konsumen</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('konsumen/edit_konsumen/') . $knsmn['id_pengguna'] ?>">
                <div class=" form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="id_pengguna" value="<?= $knsmn['id_pengguna'] ?>" id="id_pengguna">
                        <input type="text" name="nama" value="<?= set_value('nama') != null ? set_value('nama') : $knsmn['nama_pengguna'] ?>" class="form-control" id="exampleInputUsername2" placeholder="Nama Barang...">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat" value="<?= set_value('alamat') != null ? set_value('nama') : $knsmn['alamat'] ?>" class="form-control" id="exampleInputEmail2" placeholder="Deskripsi...">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" name="no_telp" value="<?= set_value('no_telp') != null ? set_value('nama') : $knsmn['no_telp'] ?>" class="form-control" id="exampleInputMobile" placeholder="Jumlah...">
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>

                <a class="btn btn-danger mr-2" href="<?= base_url('konsumen') ?>">Batal</a>
                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('konsumen/edit_konsumen/') ?>">Submit</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('input[name="no_telp"]').on('keyup focusin focusout ', function(event) {
            if (event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
                return value.replace(/\D/g, "");
            });
            console.log(event.which);
        });



    });
</script>