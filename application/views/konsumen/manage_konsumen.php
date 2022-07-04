<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Data Konsumen <a href="<?= base_url('konsumen/tambah_konsumen/') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'> No. </th>
                        <th> Nama </th>
                        <th> Alamat </th>
                        <th> No. Telepon </th>
                        <th colspan="2" width='10%'>
                            <center> Aksi </center>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $a = 1;
                    foreach ($knsmn as $konsumen) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $konsumen['nama_pengguna'] ?></td>
                            <td><?= $konsumen['alamat'] ?></td>
                            <td><?= $konsumen['no_telp'] ?></td>
                            <td><a href="<?= base_url('konsumen/edit_konsumen/') . $konsumen['id_pengguna'] ?>"><i class="icon-note menu-icon"></i></a></td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('konsumen/hapus_konsumen/') . $konsumen['id_pengguna'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>