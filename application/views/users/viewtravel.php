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
                        if($model->booking_status == 'paid') {
                            echo '<span class="badge bg-light-success text-success fw-medium text-uppercase">'.$model->booking_status.'</span>';
                            echo ' <a href="'.base_url('bus/pdf/'.$model->booking_id).'" target="_blank" ><i class="fa-solid fa-download me-2"></i></a>';
                        }else {
                            echo '<span class="badge bg-light-warning text-warning fw-medium text-uppercase">'.$model->booking_status.'</span>';

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
                                            <p class="text-muted mb-0 lh-2">#<?= $model->travel_number ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Date</p>
                                            <p class="text-muted mb-0 lh-2"><?= date('d M Y', strtotime($model->date_booking)) ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Total Amount</p>
                                            <p class="text-muted mb-0 lh-2">YEM<?= $model->total_amount ?></p>
                                        </div>
                                    </li>
                                    <li class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                        <div class="d-block">
                                            <p class="text-dark fw-medium lh-2 mb-0">Payment Mode</p>
                                            <p class="text-muted mb-0 lh-2"><?= $model->payment_mode ?></p>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-user me-2"></i>Guest[s]</h4>
                        
                    </div>
                    <div class="car-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Passport Number</th>
                                    <th scope="col">Telephone</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($passengers)) {
                                    $nopassenger = 1;
                                    foreach($passengers as $passenger) {

                                        echo '<tr>
                                            <th>'.$nopassenger++ .'</th>
                                            <td>'.$passenger->fullname.'</td>
                                            <td>'.$passenger->passport_number.'</td>
                                            <td>'.$passenger->telephone.'</td>
                                            <td>'.$passenger->address.'</td>   
                                        </tr>';
                                    }
                                }else {
                                    
                                }
                                ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-ticket me-2"></i>Reservation Summary</h4>
                    </div>
                    <div class="car-body">
                        <div class="flights-accordion">
                            <div class="flights-list-item bg-white border rounded-3 p-2">
                                <div class="row gy-4 align-items-center justify-content-between">

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="label bg-light-primary text-primary me-2">Departure</span>
                                                    <span class="text-muted text-sm"><?= date('d M Y', strtotime($schdual->depature_date)) ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="row gx-lg-5 gx-3 gy-4 align-items-center">

                                                    <div class="col-sm-auto">
                                                        <div class="d-flex align-items-center justify-content-start">

                                                            <div class="d-end fl-title ps-2">
                                                                <div class="text-dark fw-medium"><?= $schdual->transportation_name ?></div>
                                                                <div class="text-sm text-muted"><?= $typeclass ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="row gx-3 align-items-center">
                                                            <div class="col-auto">
                                                                <div class="text-dark fw-bold"><?= date('H:i', strtotime($schdual->depature_time)) ?></div>
                                                                <div class="text-muted text-sm fw-medium"><?= $schdual->from_station ?></div>
                                                            </div>

                                                            <div class="col text-center">
                                                                <div class="busLine departure">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                                <div class="text-muted text-sm fw-medium mt-3">Direct</div>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="text-dark fw-bold"><?= date('H:i', strtotime($schdual->arrival_time)) ?></div>
                                                                <div class="text-muted text-sm fw-medium"><?= $schdual->to_station ?></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-auto">
                                                        <div class="text-dark fw-medium">13H 5M</div>
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
                
                <div class="text-center d-flex align-items-center justify-content-center">
                    <a href="<?php echo base_url() . 'dashboard' ?>" class="btn btn-md btn-light-success fw-semibold mx-2">Back</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->