<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Data Barang <a href="<?= base_url('barang/tambah_barang') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Kayu</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <!-- <th>Status</th> -->
                        <th colspan="2" width='10%'>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($brg as $barang) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $barang['nama_kayu'] ?></td>
                            <td><?= $barang['nama_jenis'] ?></td>
                            <td><?= $barang['deskripsi_barang'] ?></td>
                            <td><?= $barang['harga'] ?></td>
                            <td><?= $barang['stok'] ?></td>
                            <!-- <td><?= $barang['status'] ?></td> -->
                            <td><a href="<?= base_url('barang/edit_barang/') . $barang['id_barang'] ?>"><i class="icon-note menu-icon"></i></a>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('barang/hapus_barang/') . $barang['id_barang'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>