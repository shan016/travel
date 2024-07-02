<?php
$this->load->helper('home');
?>
<!--Sliders Section-->
<section>
    <div class="bannerimg cover-image bg-background3" data-bs-image-src="<?= $this->config->config['asset_url'] ?>assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1 class="">My Dashboard</h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">My Dashboard</li>
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
                <div class="card ">
                    <div class="card-body">
                        <div class="support">
                            <div class="row text-white">
                                <div class="col-xl-6 col-lg-12 col-md-12 border-end">
                                    <div class="support-service bg-warning">
                                        <i class="fas fa-receipt"></i>
                                        <h6>0</h6>
                                        <p>Pending Booking</p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 border-end">
                                    <div class="support-service bg-success">
                                        <i class="fas fa-receipt"></i>
                                        <h6>0</h6>
                                        <p>Active Booking</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest 10 Booking</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Booking ID</th>
                                        <th>Category</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#INV-348</td>
                                        <td>Restaurant</td>
                                        <td>07-12-2018</td>
                                        <td class="font-weight-semibold fs-16">$89</td>
                                        <td>17-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1" data-bs-toggle="tooltip" data-bs-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
                <div class="card mb-0">
                    <div class="card-header">
                        <h3 class="card-title">Pending Payments</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive border-top">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Invoice ID</th>
                                        <th>Category</th>
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                        <th>Due Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#INV-348</td>
                                        <td>Restaurant</td>
                                        <td>07-12-2018</td>
                                        <td class="font-weight-semibold fs-16">$89</td>
                                        <td>17-12-2018</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white mb-1" data-bs-toggle="tooltip" data-bs-original-title="View"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
		<!--User Dashboard-->