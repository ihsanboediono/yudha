<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Data jenis <a href="<?= base_url('jenis/tambah_jenis') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
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
                    foreach ($jns as $jenis) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $jenis['nama_jenis'] ?></td>
                            <td><?= $jenis['deskripsi_jenis'] ?></td>
                            <td><a href="<?= base_url('jenis/edit_jenis/') . $jenis['id_jenis'] ?>"><i class="icon-note menu-icon"></i></a>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('jenis/hapus_jenis/') . $jenis['id_jenis'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>