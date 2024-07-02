<div id="main-wrapper">
<!-- ============================== Login Section ================== -->
<section class="py-5">
    <div class="container">

        <div class="row justify-content-center align-items-center m-auto">
            <div class="col-12">
                <div class="bg-mode shadow rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <!-- Vector Image -->
                        <div class="col-lg-6 d-flex align-items-center order-2 order-lg-1">
                            <div class="p-3 p-lg-5">
                                <img src="<?= $this->config->config['asset_url'] ?>assets/img/login.svg" class="img-fluid" alt="">
                            </div>
                            <!-- Divider -->
                            <div class="vr opacity-1 d-none d-lg-block"></div>
                        </div>

                        <!-- Information -->
                        <div class="col-lg-6 order-1">
                            <div class="p-3 p-sm-4 p-md-5">
                                <!-- Logo -->
                                <a href="<?= base_url() ?>">
                                    <img class="img-fluid mb-4" src="<?= $this->config->config['asset_url'] ?>assets/img/logo.png" width="70" alt="logo">
                                    
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 fs-2">Login</h1>
                                <p class="mb-0">Are you new here?
                                    <a href="<?php echo base_url('register') ?>" class="fw-medium text-primary"> Create an account</a></p>

                                <!-- Form START -->
                                <form class="mt-4 text-start needs-validation" method="post" novalidate>
                                    <div class="text-danger"><?php echo $error_msg ?></div>
                                    <div class="form py-4">
                                        <div class="form-floating mb-4">
                                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required="">
                                            <label>Email</label>
                                            <div class="invalid-feedback">Please provide a email.</div>
                                        </div>
                                        <div class="form-floating mb-4">
                                            <input type="password" class="form-control" id="password-field" name="password" placeholder="Password"  required="">
                                            <label>Password</label>
                                            <span class="toggle-password position-absolute top-50 end-0 translate-middle-y me-3 fa-regular fa-eye"></span>
                                            <div class="invalid-feedback">Please provide a password.</div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="loginSubmit" class="btn btn-primary full-width font--bold btn-lg" value="LOGIN">
                                        </div>

                                        <div class="modal-flex-item d-flex align-items-center justify-content-between mb-3">

                                            <div class="modal-flex-last">
                                                <a href="JavaScript:Void(0);" class="text-primary fw-medium">Forget Password?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Copyright -->
                                    <div class="text-primary-hover mt-3 text-center"> Copyrights ©2023 Daleem.com.</div>
                                </form>
                                <!-- Form END -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================== Login Section End ================== -->
</div>     
