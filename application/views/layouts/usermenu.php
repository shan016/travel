<?php
$path = base_url().'templates/ulisting/';
?>
<div class="col-xl-3 col-lg-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Welcome</h3>
        </div>
        <div class="card-body text-center item-user">
            <div class="profile-pic">
                <div class="profile-pic-img">
                    <span class="bg-success dots" data-bs-toggle="tooltip"data-bs-placement="top" title="online"></span>
                    <img src="<?php echo $this->avatar->avatar($this->session->userdata('name')); ?>" class="brround" alt="user">
                </div>
                <a href="userprofile.html" class="text-dark"><h4 class="mt-3 mb-0 font-weight-semibold"><?= $this->session->userdata('name'); ?></h4></a>
            </div>
        </div>
        <aside class="app-sidebar doc-sidebar my-dash">
            <div class="app-sidebar__user clearfix">
                <ul class="side-menu">

                    <li>
                        <a class="side-menu__item" href="<?php echo base_url().'dashboard' ?>"><i class="side-menu__icon si si-user"></i><span class="side-menu__label">Dashboard</span></a>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item active" data-bs-toggle="slide" href="#"><i class="side-menu__icon si si-briefcase"></i><span class="side-menu__label"> My Booking</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="#"> Active</a></li>
                            <li><a class="slide-item" href="#l"> Past</a></li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon si si-settings"></i><span class="side-menu__label"> Settings </span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="<?php echo base_url('change-password') ?>">Change Password</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="side-menu__item" href="<?= base_url('logout') ?>"><i class="side-menu__icon si si-power"></i><span class="side-menu__label">Logout</span></a>
                    </li>
                </ul>
            </div>
        </aside>
    </div>

</div>