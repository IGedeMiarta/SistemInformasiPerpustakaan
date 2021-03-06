<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url() . 'img/logo.png' ?>" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="<?= base_url('auth/forgot_password'); ?>">
                <span class="login100-form-title mb-n5">
                    Lupa Password?
                </span>
                <?php echo $this->session->flashdata('messege'); ?>

                <div class="wrap-input100 validate-input mt-n5" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Reset Password
                    </button>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="<?php echo base_url('login'); ?>">
                        Kembali Ke Login
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>