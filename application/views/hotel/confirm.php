<!-- ============================ Booking Page ================================== -->

<style>
    .enumber{display: none;}
    .otp{display: none;}
    .offline{display: none;}
</style>
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
                        <div class="step completed" data-target="#step-2">
                            <div class="text-center">
                                <button type="button" class="step-trigger mb-0" id="steppertrigger2">
                                    <span class="bs-stepper-circle">2</span>
                                </button>
                                <h6 class="bs-stepper-label d-none d-md-block">Enter your details</h6>
                            </div>
                        </div>
                        <div class="line"></div>

                        <!-- Step 3 -->
                        <div class="step active" data-target="#step-3">
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


        <form class="needs-validation" novalidate id="myForm" action="<?php echo base_url('/hotel/store'); ?>" method="POST">    
            <input name="roomid" value="<?= $model->rooms_id; ?>" type="hidden">
            <input name="city" value="<?= $selectcity; ?>" type="hidden">
            <input name="checkin" value="<?= $datecheckin; ?>" type="hidden">
            <input name="checkout" value="<?= $datecheckout; ?>" type="hidden">
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
                        <h4>Guest Information</h4>

                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input name="full_name" id="full_name" type="text" class="form-control" value="<?= $this->session->userdata('name'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input name="email" id="email" type="text" class="form-control" value="<?= $email; ?>" required>
                                    </div>
            
                                    <div class="form-group">
                                        <label class="form-label">Mobile</label>
                                        <input name="phone" id="phone" type="number" class="form-control" value="<?= $phone; ?>" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <h4>Payment Information</h4>
                        
                        <div class="card mt-3">
                            <div class="card-body row">                                
                                <div class="col-xl-4 col-lg-4 col-md-4 single-paymntCardsoption d-block position-relative mb-2">
                                    <div class="paymnt-line d-flex align-items-center justify-content-start">
                                        <div class="position-relative text-center">
                                            <div class="form-check lg mb-0">
                                                <input class="form-check-input" type="radio" name="payment" value="ewallet" id="ewallet" onclick="redirectToUrl(this)">
                                                <label class="form-check-label" for="ewallet"></label>
                                            </div>
                                        </div>
                                        <div class="paymnt-line-caps d-flex align-items-center justify-content-start">
                                            <div class="paymnt-caps-icons d-inline-flex">
                                                <i class="fa-solid fa-wallet text-primary fs-1"></i>
                                            </div>
                                            <div class="paymnt-caps-details ps-2">
                                                <span class="text-uppercase d-block fw-semibold text-md text-dark lh-2 mb-0">E-Wallet</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-4 col-lg-4 col-md-4  single-paymntCardsoption d-block position-relative mb-2">
                                    <div class="paymnt-line d-flex align-items-center justify-content-start">
                                        <div class="position-relative text-center">
                                            <div class="form-check lg mb-0">
                                                <input class="form-check-input" type="radio" name="payment" value="paypal" id="paypal" onclick="redirectToUrl(this)">
                                                <label class="form-check-label" for="paypal"></label>
                                            </div>
                                        </div>
                                        <div class="paymnt-line-caps d-flex align-items-center justify-content-start">
                                            <div class="paymnt-caps-icons d-inline-flex">
                                                <i class="fa-brands fa-cc-paypal text-info fs-1"></i>
                                            </div>
                                            <div class="paymnt-caps-details ps-2">
                                                <span class="text-uppercase d-block fw-semibold text-md text-dark lh-2 mb-0">PayPal</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 single-paymntCardsoption d-block position-relative mb-2">
                                    <div class="paymnt-line d-flex align-items-center justify-content-start">
                                        <div class="position-relative text-center">
                                            <div class="form-check lg mb-0">
                                                <input class="form-check-input" type="radio" name="payment" value="offline" id="Offline" required="" onclick="redirectToUrl(this)">
                                                <label class="form-check-label" for="Offline"></label>
                                            </div>
                                        </div>
                                        <div class="paymnt-line-caps d-flex align-items-center justify-content-start">
                                            <div class="paymnt-caps-icons d-inline-flex">
                                                <i class="fa-solid fa-money-bill-wave text-success fs-1"></i>
                                            </div>
                                            <div class="paymnt-caps-details ps-2">
                                                <span class="text-uppercase d-block fw-semibold text-md text-dark lh-2 mb-0">Fund Transfer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <div class="card-body">
                                 
                                 <div class="col-xl-6 col-lg-6 col-md-6 enumber">
                                     <div>
                                         <label class="form-label">E-Wallet No</label>
                                         <div class="input-group">
                                             <input class="form-control border-end-0 border" type="text" placeholder="E-Wallet No" name="enumber" id="enumber" required>
                                             <span class="input-group-append">
                                                 <button id="sendotp" class="btn btn-info border-start-0 border shi" type="button">
                                                     Send
                                                 </button>
                                             </span>
                                         </div>
                                     </div>
                                 </div>
                                 

                                 <div class="col-xl-6 col-lg-6 col-md-6 otp">
                                     <div class="form-group">
                                         <label class="form-label">OTP</label>
                                         <input name="otp" id="otp" type="number" class="form-control bold ps-1 " placeholder="OTP">
                                     </div>
                                 </div>
                                
                                <div class="col-xl-12 col-lg-12 col-md-12 offline">
                                    <h4>Account Name: دليلكم للسفريات والسياحه (Daleelcom for Travel & Tour)</h4>
                                    <h4>Account Number: 1231013</h4>
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

            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="text-center d-flex align-items-center justify-content-center mt-4">
                    <button type="submit" class="btn btn-md btn-primary fw-semibold">Submit & Confirm<i class="fa-solid fa-lock ms-2"></i></button>
                    
                </div>
            </div>
        </div>
        </form>    
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->

<script>
function redirectToUrl(radioBtn) {
    var type = radioBtn.value;
    if(type == 'ewallet') {
        $('.enumber').show();
        $('#enumber').attr('required', true);
    }else {
        $("#enumber").removeAttr("required");
        $("#otp").removeAttr("required");
        $('.enumber').hide();
        $('.otp').hide();
    }
    
    if(type == 'offline') {
        $('.offline').show();
    }else {
        $('.offline').hide();
    }
}


</script>
