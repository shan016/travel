<!-- ============================ Booking Page ================================== -->
<section class="py-4 gray-simple position-relative">
    <div class="container">

        <div class="row align-items-start">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card mb-3">
                    <div class="car-body px-xl-5 px-lg-4 py-lg-5 py-4 px-2">

                        <div class="d-flex align-items-center justify-content-center mb-3">
                            <div class="square--80 circle text-light bg-success"><i class="fa-solid fa-check-double fs-1"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column text-center mb-5">
                            <h3 class="mb-0">Your order was confirmed successfully!</h3>
                        </div>
                        <div class="d-flex align-items-center justify-content-center flex-column mb-4">
                            <div class="border br-dashed full-width rounded-2 p-3 pt-0">
                                <ul class="row align-items-center justify-content-start g-3 m-0 p-0">
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

                        <div class="text-center d-flex align-items-center justify-content-center">
                            <a href="<?php echo base_url().'dashboard' ?>" class="btn btn-md btn-light-success fw-semibold mx-2">Book Next Tour</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#invoice"
                               class="btn btn-md btn-light-primary fw-semibold mx-2">Download invoice</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>


<!-- ============================ Booking Page End ================================== -->
