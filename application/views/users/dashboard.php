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
                        <h4><i class="fa-solid fa-ticket me-2"></i>Bookings Hotels</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amout</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($bookings)) {
                                    $nobooking = 1;
                                    foreach($bookings as $booking) {
                                        if($booking->checkin_status == 'Completed') {
                                            $status = '<span class="badge bg-light-success text-success fw-medium text-uppercase">'.$booking->checkin_status.'</span>';
                                        }else {
                                            $status = '<span class="badge bg-light-warning text-warning fw-medium text-uppercase">'.$booking->checkin_status.'</span>';
                                            
                                        }
                                        echo '<tr>
                                            <th>'.$nobooking++ .'</th>
                                            <td>'.$booking->booking_ref.'</td>
                                            <td>'.date('d M Y', strtotime($booking->date_booking)).'</td>
                                            <td>'.$status.'</td>
                                            <td><span class="text-md fw-medium text-dark">'.$booking->amount.'</span></td>
                                            <td><a href="'.base_url('booking/hotel/'.$booking->id).'" class=""><i class="fa-solid fa-eye me-2"></i></a></td>    
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
                        <h4><i class="fa-solid fa-ticket me-2"></i>Transports</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amout</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($travels)) {
                                    $nobooking = 1;
                                    foreach($travels as $travel) {
                                        if($travel->booking_status == 'paid') {
                                            $status = '<span class="badge bg-light-success text-success fw-medium text-uppercase">'.$travel->booking_status.'</span>';
                                        }else {
                                            $status = '<span class="badge bg-light-warning text-warning fw-medium text-uppercase">'.$travel->booking_status.'</span>';
                                            
                                        }
                                        echo '<tr>
                                            <th>'.$nobooking++ .'</th>
                                            <td>'.$travel->travel_number.'</td>
                                            <td>'.date('d M Y', strtotime($travel->date_booking)).'</td>
                                            <td>'.$status.'</td>
                                            <td><span class="text-md fw-medium text-dark">'.$travel->total_amount.'</span></td>
                                            <td><a href="'.base_url('booking/transport/'.$travel->booking_id).'" class=""><i class="fa-solid fa-eye me-2"></i></a></td>    
                                        </tr>';
                                    }
                                }else {
                                    
                                }
                                ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->