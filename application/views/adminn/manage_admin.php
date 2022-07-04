<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Manage Data Admin <a href="<?= base_url('adminn/edit_admin') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Edit</a></h4>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'> No. </th>
                        <th> Username </th>
                        <th> Password </th>
                    </tr>
                </thead>
                <tbody>

                    <?php $a = 1;
                    foreach ($adm as $admin) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $admin['username'] ?></td>
                            <td><?= $admin['katasandi'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
