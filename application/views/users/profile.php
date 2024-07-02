<?php
$this->load->helper('home');
?>

<!-- ============================ Booking Page ================================== -->
<section class="pt-5 gray-simple position-relative">
    <div class="container">

        <?php $this->load->view('layouts/usermenu_mobile'); ?>

        <div class="row align-items-start justify-content-between gx-xl-4">
            <?php $this->load->view('layouts/usermenu_mini'); ?>
            

            <div class="col-xl-8 col-lg-8 col-md-12">

                <!-- Personal Information -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-file-invoice me-2"></i>Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-start">

                            

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="<?= $user['fullname'] ?>">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email ID</label>
                                    <input type="text" class="form-control" value="<?= $user['email'] ?>">
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" class="form-control" value="<?= $user['phone'] ?>">
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-envelope-circle-check me-2"></i>Update Your Email</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="update your new email">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="text-end">
                                    <a href="#" class="btn btn-md btn-primary mb-0">Update Email</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-lock me-2"></i>Update Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-start">

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Old Password</label>
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="*********">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="text-end">
                                    <a href="#" class="btn btn-md btn-primary mb-0">Change Password</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->