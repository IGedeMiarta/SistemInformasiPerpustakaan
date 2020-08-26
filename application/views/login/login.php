<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?= base_url() . 'img/logo.png' ?>" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="<?= base_url('login'); ?>">
                <span class="login100-form-title mb-n5">
                    Halaman Login
                </span>
                <?php echo $this->session->flashdata('messege'); ?>

                <div class="wrap-input100 validate-input mt-n5" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <!-- <div class="p-t-12">
                    <span class="txt1">
                        Coba Hitung:
                    </span>
                </div>
                <div class="wrap-input100 validate-input mt-n5" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" id="email" name="email" placeholder="Jawaban">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </span>
                </div> -->

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <!-- <div class="text-center p-t-12">
                    <span class="txt1">
                        Lupa
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div> -->

                <div class="text-center p-t-136">
                    <a class="txt2" href="<?php echo base_url('auth/registration'); ?>">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>