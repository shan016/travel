<!--Sliders Section-->
<section>
    <div class="bannerimg cover-image bg-background3" data-bs-image-src="../assets/images/banners/banner2.jpg">
        <div class="header-text mb-0">
            <div class="container">
                <div class="text-center text-white ">
                    <h1><?php echo $model->name_ar ?></h1>
                    <ol class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('hotel/lists/'.$model->hot_id) ?>"><?php echo $model->name_ar ?></a></li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Confirmation</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/Sliders Section-->
<style>
    .otp{display: none;}
</style>
<!--Add posts-section-->
<section class="sptb">
    <div class="container">
        <div class="row ">
            <div class="col-lg-8 col-md-12 col-md-12">
                <form action="<?php echo base_url('/hotel/store'); ?>" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Confirmation</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" value="Jacob Smith">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email Address" value="JacobSmith@spruko.com">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group mb-0">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" placeholder="Number" value="1252543562">
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Payments</h3>
                    </div>
                    <div class="card-body">
                        <div class=" border p-5">
                            <div class="panel panel-primary">
                                <div class=" tab-menu-heading border-0 ps-0 pe-0 pt-2">
                                    <div class="tabs-menu1 ">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <li><a href="#tab5" class="active" data-bs-toggle="tab">E-Wallet</a></li>
                                            <li><a href="#tab6" data-bs-toggle="tab">Pay-pal</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body ps-0 pe-0 border-0 pb-0">
                                    <div class="tab-content">
                                        
                                        <div class="tab-pane active " id="tab5">
                                            <div class="form-group">
                                                <label class="form-label">Your E-Wallet Number</label>
                                                <input type="text" class="form-control" id="enumber">
                                            </div>
                                            
                                            <div class="form-group otp">
                                                <label class="form-label">OTP (<small>Please Check you whatsapp</small>)</label>
                                                <input type="number" class="form-control" id="name1" placeholder="123456">
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        <div class="tab-pane " id="tab6">
                                            <h6 class="font-weight-semibold">Paypal is easiest way to pay online</h6>
                                            <p><a href="#" class="btn btn-primary"><i class="fa fa-paypal"></i> Log in my Paypal</a></p>
                                            <p class="mb-0"><strong>Note:</strong> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row clearfix mb-0">
                                <div class="col-lg-12">
                                    <div class="checkbox checkbox-info">
                                        <label class="custom-control mt-4 mb-0 form-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked>
                                            <span class="custom-control-label text-dark ps-2">I agree with the Terms and Conditions.</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                         <button id="book" class="btn btn-success">Submit No</button>
                    </div>
                </div>
                    
                </form>
            </div>
            
            <div class="col-lg-4 col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h2><?php echo $model->room_no.' - '. $model->name_ar ?></h2>
                        <h4><?php echo $model->address ?><br><?php echo $model->tel ?></h4>

                        <p><?php echo $model->descr ?></p>
                        
                        
                        <p><?php echo $model->ameneties;?></p>

                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="mb-0">Check-in</p>
                                <h4 class="font-weight-semibold mb-0">Fri, Dec 8, 2023</h4>
                                <p class="mt-0">3:00 PM – 12:00 AM</p>
                            </div>
                            <div class="col-lg-6">
                                <p class="mb-0">Check-out</p>
                                <h4 class="font-weight-semibold mb-0">Fri, Dec 8, 2023</h4>
                                <p class="mt-0">3:00 PM – 12:00 AM</p>
                            </div>
                            <p class="mb-0">Total length of stay:</p>
                            <h4 class="font-weight-semibold mt-0">1 night</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="product-item-wrap d-flex">
                            <div class="product-item-price">
                                <span class="newprice text-dark">YEM <?= $model->price ?></span>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</section>
<!--/Add posts-section-->

