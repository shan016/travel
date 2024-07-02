<!-- ============================ Booking Page ================================== -->


<section class="pt-4 gray-simple position-relative">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div id="stepper" class="bs-stepper stepper-outline mb-5">
                    <div class="bs-stepper-header">
                        <!-- Step 1 -->
                        <div class="step completed" data-target="#step-1">
                            <div class="text-center">
                                <button type="button" class="step-trigger mb-0" id="steppertrigger1">
                                    <span class="bs-stepper-circle">1</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Your Selection</h6>
                            </div>
                        </div>
                        <div class="line"></div>

                        <!-- Step 2 -->
                        <div class="step active" data-target="#step-2">
                            <div class="text-center">
                                <button type="button" class="step-trigger mb-0" id="steppertrigger2">
                                    <span class="bs-stepper-circle">2</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Enter your details</h6>
                            </div>
                        </div>
                        <div class="line"></div>

                        <!-- Step 3 -->
                        <div class="step" data-target="#step-3">
                            <div class="text-center">
                                <button type="button" class="step-trigger mb-0" id="steppertrigger3">
                                    <span class="bs-stepper-circle">3</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Confirm your reservation</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="needs-validation" novalidate id="myForm" action="<?php echo base_url('hotel/detailspayment/'.$model->rooms_id); ?>" method="post">
            <input name="city" value="<?= $selectcity; ?>" type="hidden">
            <input name="checkout" value="<?= $checkout; ?>" type="hidden">
            <input name="no_adults" value="<?= $select_no_adults; ?>" type="hidden">
            <input name="no_children" value="<?= $select_no_children; ?>" type="hidden">
            <input name="no_rooms" value="<?= $select_no_rooms; ?>" type="hidden">

            
        <div class="row align-items-start">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row align-items-start">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card p-3 mb-xl-3 mb-lg-3">

                            <!-- Booking Info -->
                            <div class="card-box list-layout-block border br-dashed rounded-3 p-2">
                                <div class="row">

                                    <div class="col-xl-4 col-lg-3 col-md">
                                        <div class="cardImage__caps rounded-2 overflow-hidden h-100">
                                            <img class="img-fluid h-100 object-fit" src="<?php echo $model->img ?>" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-xl col-lg col-md">
                                        <div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">
                                            <div class="d-flex align-items-center justify-content-start">
                                                <div class="d-inline-block">
                                                    <i class="fa fa-star text-warning text-xs"></i>
                                                    <i class="fa fa-star text-warning text-xs"></i>
                                                    <i class="fa fa-star text-warning text-xs"></i>
                                                    <i class="fa fa-star text-warning text-xs"></i>
                                                    <i class="fa fa-star text-warning text-xs"></i>
                                                </div>
                                            </div>
                                            <h4 class="fs-5 fw-bold mb-1"><?php echo $model->name_ar ?></h4>
                                            <ul class="row g-2 p-0">
                                                <li class="col-auto">
                                                    <p class="text-muted-2 text-md"><?php echo $model->address ?> - <?php echo $model->tel ?></p>
                                                </li>

                                            </ul>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <?php
                            if ($this->session->userdata('isUserLoggedIn')) {
                                echo '<h4>'.$this->session->userdata('name').'</h4>';
                            }else {
                                echo '<div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="d-flex align-items-center justify-content-start py-3 px-3 rounded-2 bg-success mb-4">
                                        <p class="text-light fw-semibold m-0">
                                            <i class="fa-solid fa-user text-warning me-2"></i>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="text-white text-decoration-underline">Sign in</a> to book with your saved details or <a href="#" class="text-white text-decoration-underline">register</a> to manage your bookings on the go!
                                        </p>
                                    </div>
                                </div>';
                            }
                            ?>
                        <div class="card mt-3">
                            <div class="card-body">
                                
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input name="full_name" value="<?= $this->session->userdata('name'); ?>" type="text" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input name="email" value="<?= $this->session->userdata('email'); ?>" type="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Mobile</label>
                                            <input name="phone" value="<?= $this->session->userdata('phone'); ?>" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="side-block card rounded-2 p-3">
                            <h5 class="fw-semibold fs-6">Reservation Summary</h5>
                            <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
                                <div class="row align-items-center justify-content-between g-2 mb-4">
                                    <div class="col-6">
                                        <div class="gray rounded-2 p-2">
                                            <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                                            <p class="text-dark fw-semibold lh-base text-md mb-0"><?= date('d M Y', strtotime($datecheckin)) ?></p>
                                            <span class="text-dark text-md">2:00 PM – 12:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="gray rounded-2 p-2">
                                            <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                                            <p class="text-dark fw-semibold lh-base text-md mb-0"><?= date('d M Y', strtotime($datecheckout)) ?></p>
                                            <span class="text-dark text-md">12:00 AM – 12:00 PM</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between mb-4">
                                    <div class="col-12">
                                        <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">Total Length of Stay:</p>
                                        <div class="d-flex align-items-center">
                                            <div class="square--30 circle text-seegreen bg-light-seegreen">
                                                <i class="fa-regular fa-calendar"></i>
                                            </div>
                                            <span class="text-dark fw-semibold ms-2"><?php echo $days ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-12">
                                        <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1">You Selected</p>
                                        <div class="d-flex align-items-center flex-column">
                                            <p class="mb-0"><?php echo $model->room_no . ' - ' . $model->name_ar ?>. <a href="<?php echo base_url('hotel/lists/' . $model->hot_id) . '?city=' . $selectcity . '&checkout=' . $checkout . '&no_adults=' . $select_no_adults . '&no_children=' . $select_no_children . '&no_rooms=' . $select_no_rooms ?>" class="fw-medum text-primary">Change your Selection</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bott-block d-block mb-3">
                                <h5 class="fw-semibold fs-6">Your Price Summary</h5>
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium mb-0">Rooms & Offers</span>
                                        <span class="fw-semibold">YEM <?= $model->price ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium mb-0">Total Discount<span
                                                class="badge rounded-1 text-bg-danger smaller mb-0 ms-2">0% off</span></span>
                                        <span class="fw-semibold">-YEM0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium text-success mb-0">Total Price</span>
                                        <span class="fw-semibold text-success">YEM <?= $model->price ?></span>
                                    </li>
                                </ul>
                            </div>
                            

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="text-center d-flex align-items-center justify-content-center mt-4">
                    <button type="submit" class="btn btn-md btn-primary fw-semibold">Next: Final details<i class="fa-solid fa-arrow-right ms-2"></i></button>
                    
                </div>
            </div>
        </div>
        </form>    
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->

<?php $this->load->view('layouts/login_model'); ?>