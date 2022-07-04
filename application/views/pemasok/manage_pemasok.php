<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            
            <h4 class="card-title">Manage Data Pemasok <a href="<?= base_url('pemasok/tambah_pemasok') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'> No. </th>
                        <th> Nama </th>
                        <th> Alamat </th>
                        <th> No. Telepon </th>
                        <th> Deskripsi </th>
                        <th colspan="2" width='10%'>
                            <center> Aksi </center>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $a = 1;
                    foreach ($pmsk as $pemasok) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $pemasok['nama_pengguna'] ?></td>
                            <td><?= $pemasok['alamat'] ?></td>
                            <td><?= $pemasok['no_telp'] ?></td>
                            <td><?= $pemasok['deskripsi_pengguna'] ?></td>
                            <td><a href="<?= base_url('pemasok/edit_pemasok/') . $pemasok['id_pengguna'] ?>"><i class="icon-note menu-icon"></i></a></td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('pemasok/hapus_pemasok/') . $pemasok['id_pengguna'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>