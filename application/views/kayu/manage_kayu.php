<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        
        <div class="card-body">
            <h4 class="card-title">Manage Data Kayu <a href="<?= base_url('kayu/tambah_kayu') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th colspan="2" width='10%'>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($ky as $kayu) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $kayu['nama_kayu'] ?></td>
                            <td><?= $kayu['deskripsi_kayu'] ?></td>
                            <td><a href="<?= base_url('kayu/edit_kayu/') . $kayu['id_kayu'] ?>"><i class="icon-note menu-icon"></i></a>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('kayu/hapus_kayu/') . $kayu['id_kayu'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>