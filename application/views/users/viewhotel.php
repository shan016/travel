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

                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-ticket me-2"></i>Invoice</h4>
                        <div class="text-right">
                        <?php
                        if($booking->checkin_status == 'Completed') {
                            echo '<span class="badge bg-light-success text-success fw-medium text-uppercase">'.$booking->checkin_status.'</span>';
                            echo ' <a href="'.base_url('hotel/pdf/'.$bookingid).'" target="_blank" ><i class="fa-solid fa-download me-2"></i></a>';
                        }else {
                            echo '<span class="badge bg-light-warning text-warning fw-medium text-uppercase">'.$booking->checkin_status.'</span>';

                        }
                        ?>
                        </div>
                    </div>
                    <div class="car-body">

                        <div class="d-flex justify-content-center flex-column mb-4">
                            <div class="">
                                <ul class="row align-items-center g-3 m-0 p-0">
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Order Invoice</p>
                                            <p class="text-muted mb-0 lh-2">#<?= $booking_ref ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Date</p>
                                            <p class="text-muted mb-0 lh-2"><?= date('d M Y', strtotime($date_booking)) ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Total Amount</p>
                                            <p class="text-muted mb-0 lh-2">YEM<?= $amount ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Payment Mode</p>
                                            <p class="text-muted mb-0 lh-2"><?= $payment_type ?></p>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-user me-2"></i>Guest</h4>
                        
                    </div>
                    <div class="car-body">

                        <div class="d-flex justify-content-center flex-column mb-4">
                            <div class="">
                                <ul class="row align-items-center justify-content-start g-3 m-0 p-0">


                                    <li class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Full Name</p>
                                            <p class="text-muted mb-0 lh-2"><?= $guest_name ?></p>
                                        </div>
                                    </li>

                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Phone</p>
                                            <p class="text-muted mb-0 lh-2"><?= $guest_tel ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Email</p>
                                            <p class="text-muted mb-0 lh-2"><?= $guest_email ?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-ticket me-2"></i>Reservation Summary</h4>
                    </div>
                    <div class="car-body">
                        <div class="side-block card rounded-2 p-3">
                            <div class="mid-block rounded-2 border br-dashed p-2 mb-3">
                                <div class="row align-items-center justify-content-between g-2 mb-4">
                                    <div class="col-9">
                                        <h3><?php echo $model->name_ar ?></h3>
                                        <p class="text-muted-2 text-sm text-uppercase fw-medium mb-1"><?php echo $model->address ?> <?php echo $model->tel ?></p>
                                    </div>
                                    <div class="col-3">
                                        <h4 class="mb-0">Room NO - <?php echo $model->room_no ?> </h4>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-between g-2 mb-4">
                                    <div class="col-6">
                                        <div class="gray rounded-2 p-2">
                                            <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-In</span>
                                            <p class="text-dark fw-semibold lh-base text-md mb-0"><?= date('d M Y', strtotime($booking->checkin)) ?></p>
                                            <span class="text-dark text-md">2:00 PM – 12:00 AM</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="gray rounded-2 p-2">
                                            <span class="d-block text-muted-3 text-sm fw-medium text-uppercase mb-2">Check-Out</span>
                                            <p class="text-dark fw-semibold lh-base text-md mb-0"><?= date('d M Y', strtotime($booking->checkout)) ?></p>
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
                
                <div class="text-center d-flex align-items-center justify-content-center">
                    <a href="<?php echo base_url() . 'dashboard' ?>" class="btn btn-md btn-light-success fw-semibold mx-2">Back</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->