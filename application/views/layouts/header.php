<body class="">
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>
    
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="<?= base_url() ?>"><img src="<?= $this->config->config['asset_url'] ?>assets/img/logo.png" class="logo" alt=""></a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">
                            <li class="active"><a href="<?= base_url() ?>"><i class="fa-solid fa-home me-2"></i>Home</a></li>
                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            <?php
                            if ($this->session->userdata('isUserLoggedIn')) {
                                echo '<li class="">
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fdprocessedid="ksefy3">
                                        <img src="'. $this->avatar->avatar($this->session->userdata('name')).'" class="img-fluid" alt="">
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX" style="">
                                        <div class="drp_menu_headr">
                                            <h4>Hi, '.$this->session->userdata('name').'</h4>
                                            
                                        </div>
                                        <ul>
                                            <li class=""><a href="'.base_url('profile').'"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
                                            <li class=""><a href="'.base_url('dashboard').'"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
                                            <li class=""><a href="'. base_url('logout') . '"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>';
                                
                            } else {
                                echo '<li>
                                        <a href="' . base_url('register') . '" class="text-dark"><i class="fa fa-user me-1"></i> <span>Register</span></a>
                                    </li>
                                    <li>
                                        <a href="' . base_url('login') . '" class="text-dark"><i class="fa fa-sign-in me-1"></i> <span>Login</span></a>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->