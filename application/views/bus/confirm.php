<!-- ============================ Booking Page ================================== -->
<style>
    .enumber{display: none;}
    .otp{display: none;}
</style>


<section class="pt-4 gray-simple position-relative">
    <div class="container">
        <div class="row">
            <?php if($this->session->flashdata('alert')): ?>
            <div class="alert alert-<?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('alert'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
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

        

        <form class="needs-validation" novalidate id="myForm" action="<?php echo base_url('/bus/store'); ?>" method="POST">    
            <input name="id" value="<?= $model->schdual_id; ?>" type="hidden">
            <input name="goingfrom" value="<?= $goingfrom; ?>" type="hidden">
            <input name="goingto" value="<?= $goingto; ?>" type="hidden">
            <input name="departure" value="<?= $departure; ?>" type="hidden">
            <input name="datereturn" value="<?= $datereturn; ?>" type="hidden">
            <input name="occupant" value="<?= $occupant; ?>" type="hidden">
            
        <div class="row align-items-start">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="row align-items-start">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card p-3 mb-xl-3 mb-lg-3">

                            <!-- Booking Info -->

                            <div class="flight-boxyhc mt-4">
                                <h4 class="fs-5">Booking Detail</h4>
                                <div class="flights-accordion">
                                    <div class="flights-list-item bg-white border rounded-3 p-2">
                                        <div class="row gy-4 align-items-center justify-content-between">

                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="label bg-light-primary text-primary me-2">Departure</span>
                                                            <span class="text-muted text-sm"><?= date('d M Y', strtotime($model->depature_date)) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <div class="row gx-lg-5 gx-3 gy-4 align-items-center">

                                                            <div class="col-sm-auto">
                                                                <div class="d-flex align-items-center justify-content-start">

                                                                    <div class="d-end fl-title ps-2">
                                                                        <div class="text-dark fw-medium"><?= $model->transportation_name ?></div>
                                                                        <div class="text-sm text-muted"><?= $model->typeclass ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="row gx-3 align-items-center">
                                                                    <div class="col-auto">
                                                                        <div class="text-dark fw-bold"><?= date('H:i', strtotime($model->depature_time)) ?></div>
                                                                        <div class="text-muted text-sm fw-medium"><?= $model->from_station ?></div>
                                                                    </div>

                                                                    <div class="col text-center">
                                                                        <div class="busLine departure">
                                                                            <div></div>
                                                                            <div></div>
                                                                        </div>
                                                                        <div class="text-muted text-sm fw-medium mt-3">Direct</div>
                                                                    </div>

                                                                    <div class="col-auto">
                                                                        <div class="text-dark fw-bold"><?= date('H:i', strtotime($model->arrival_time)) ?></div>
                                                                        <div class="text-muted text-sm fw-medium"><?= $model->to_station ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-auto">
                                                                <div class="text-dark fw-medium"><?= $hours ?> <?= $minutes ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        <?php
                        $total = $model->fare_amount * $occupant;
                        
                        for($n=1; $n <= $occupant; $n++){
                            echo '<div class="card mb-3">
                                <div class="card-header">
                                    <h4>Guest '.$n.'</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Full Name</label>
                                                <input type="text" name="fullname[]" class="form-control" placeholder="Name" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Telephone</label>
                                                <input type="text" name="telephone[]" class="form-control" placeholder="123456" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address[]" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Passport Number</label>
                                                <input type="text" name="passport_number[]" class="form-control" placeholder="Passport Number" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                        

                         <div class="card mt-3">
                             <div class="card-header">
                                 <h4 class="fs-5">Booking Detail</h4>
                             </div>                             
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
                        <div class="side-block card rounded-2 p-3 mb-3">

                            <div class="bott-block d-block mb-3">
                                <h5 class="fw-semibold fs-6">Your Price Summary</h5>
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium mb-0">Price</span>
                                        <span class="fw-semibold">YEM <?= $model->fare_amount ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium mb-0">Total Discount<span
                                                class="badge rounded-1 text-bg-danger smaller mb-0 ms-2">0% off</span></span>
                                        <span class="fw-semibold">-YEM0.00</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="fw-medium text-success mb-0">Total Price ( <?= $occupant ?> pax)</span>
                                        <span class="fw-semibold text-success">YEM <?= $total ?></span>
                                        <input id="fare_amount" name="fare_amount" value="<?= $total ?>" type="hidden">
                                    </li>
                                </ul>
                            </div>
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

