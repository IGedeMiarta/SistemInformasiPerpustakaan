<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900">Ubah Password</h1>
                            <h5 class="mb-4"><?php echo $this->session->userdata('reset_email'); ?></h5>
                        </div>
                        <form class="user" method="post" action="<?php echo base_url('auth/ubahpassword') ?>">
                            <div class="form-group row mt-5">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password Baru">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');  ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Ubah Password
                            </button>
                        </form>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>