<div class="content-wrapper">
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body performane-indicator-card">
                    <div class="d-sm-flex">
                        <h4 class="card-title flex-shrink-1">Profile</h4>
                    </div>
                    <hr>
                    <div class="profile-setting">
                        <div class="pd-20 card-box mb-30">
                            <form id="cek1" method="post" action="">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control form-control-lg" type="text" name="nama" value="<?= $user['nama'] ?>" autocomplete="off">
                                    <span id="nama_error" class="text-danger"></span>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control form-control-lg" type="text" name="user" value="<?= $user['username'] ?>" autocomplete="off">
                                    <span id="user_error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" type="text" name="passw" value="" autocomplete="off">
                                    <small class="form-text text-muted">Hanya jika ingin merubah password.</small>
                                    <span id="user_error" class="text-danger"></span>
                                </div>

                                <div class="form-group mb-0">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Ubah Informasi">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $('#cek1').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>profile/ubah/",
            method: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                if (data.error) {
                    if (data.nama_error != '') {
                        $('#nama_error').html(data.nama_error);
                    } else {
                        $('#nama_error').html('');
                    }
                    if (data.user_error != '') {
                        $('#user_error').html(data.user_error);
                    } else {
                        $('#user_error').html('');
                    }
                } else {
                    // window.location.reload();
                    window.location.href = "<?= base_url('profile'); ?>";
                }
                $('#SimpanSoal').attr('disabled', false);
            }
        })
    });
</script>