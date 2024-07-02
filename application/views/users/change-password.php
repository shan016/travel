<?php
$this->load->helper('home');
?>
<!--Sliders Section-->
<section>
    <div class="bannerimg cover-image bg-background3" data-bs-image-src="<?= $this->config->config['asset_url'] ?>assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">Change Password</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Sliders Section-->

<!--User Dashboard-->
<section class="sptb">
    <div class="container">
        <div class="row">
            <?php $this->load->view('layouts/usermenu'); ?>
            
            
            <div class="col-xl-9 col-lg-12 col-md-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="card-body">
                        <?php $this->load->view('layouts/alert_message'); ?>
                        
                        <form action="" method="post">
                                <div class="form-group">
                                    <label class="form-label text-dark">Old Password</label>
                                    <input type="password" class="form-control" name="oldPassword" placeholder="Old Password" required>
                                    <?php echo form_error('old-password','<p class="help-block help-block-error text-danger">','</p>'); ?> 
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Password</label>
                                    <input type="password" class="form-control" name="newPassword" placeholder="Password" required>
                                    <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Confirm Password</label>
                                    <input type="password" class="form-control" name="cNewPassword" placeholder="Confirm Password" required>
                                    <?php echo form_error('conf_password','<p class="help-block text-danger">','</p>'); ?>
                                </div>

                                <div class="form-footer mt-2">
                                    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-block">
                                </div>
                                </form>  
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
		<!--User Dashboard-->