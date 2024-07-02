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
                            <div class="p-4 p-sm-7">
                                <!-- Logo -->
                                <a href="<?= base_url() ?>">
                                    <img class="img-fluid mb-4" src="<?= $this->config->config['asset_url'] ?>assets/img/logo.png" width="70" alt="logo">
                                </a>
                                <!-- Title -->
                                <h1 class="mb-2 fs-2">Create New Account</h1>
                                <p class="mb-0">Already a Member?<a href="<?php echo base_url('login') ?>" class="fw-medium text-primary"> Signin</a></p>

                                <!-- Form START -->
                                <form class="mt-4 text-start" method="post">
                                    <div class="text-danger"><?php echo $error_msg ?></div>
                                    <div class="form py-4">
                                        <div class="form-group">
                                            <label class="form-label text-dark">Name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="Enter name" value="<?php echo !empty($user['first_name'])?$user['first_name']:''; ?>" required>
                                            <?php echo form_error('first_name','<p class="help-block text-danger">','</p>'); ?>
                                            <div class="invalid-feedback">Please provide a name.</div>
                                        </div>  
                                        <div class="form-group">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo !empty($user['email'])?$user['email']:''; ?>" required>
                                            <?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>
                                            <div class="invalid-feedback">Please provide a email.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Mobile No</label>
                                            <input type="number" class="form-control" name="mobile" placeholder="12345" required>
                                            <?php echo form_error('mobile','<p class="help-block text-danger">','</p>'); ?>
                                            <div class="invalid-feedback">Please provide a mobile no.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Enter Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" id="password-field" name="password" placeholder="Password" required>
                                                <span class="fa-solid fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"></span>
                                                
                                                <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
                                                <div class="invalid-feedback">Please provide a password.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="conf_password" placeholder="*********">
                                            <?php echo form_error('conf_password','<p class="help-block text-danger">','</p>'); ?>
                                        </div>


                                        <div class="form-group">
                                            <button type="submit" name="signupSubmit" class="btn btn-primary full-width font--bold btn-lg">Create An Account</button>
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