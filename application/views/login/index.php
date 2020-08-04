<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url() . 'img/logo.png' ?>" alt="IMG">
            </div>

            <form class="login100-form validate-form">
                <span class="login100-form-title">
                    Halaman Login
                </span>
                <?php echo $this->session->flashdata('messege'); ?>
                <form class="user" method="post" action="<?= base_url('login'); ?>">
                    <div class="wrap-input100 validate-input form-group">
                        <input class="input100" type="text" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email') ?>">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span> <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="wrap-input100 validate-input form-group">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">

                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span><?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-136">
                        <a class="txt2" href="#">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>


            </form>
        </div>
    </div>
</div>