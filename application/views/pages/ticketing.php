

<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

            <!-- Sidebar Filter Options -->
            <div class="col-xl-3 col-lg-4 col-md-12">
                <img src="https://daleelcom.news/media/flights_schedules/8d4db2438b3405df63be52b50a9ecedc1.jpg" alt="" class="img-fluid mb-2">
                <img src="https://daleelcom.news/media/flights_schedules/08cfdffd34a0a1a9ff5276559fa379ab.jpg" alt="" class="img-fluid mb-2">
            </div>

            <!-- All Flight Lists -->
            <div class="col-xl-9 col-lg-8 col-md-12">

                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <h5 class="fw-bold fs-6 mb-lg-0 mb-3">Showing <?= $counts ?> Search Results</h5>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">

                            <div class="flsx-first mt-sm-0 mt-2">
                                <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm" id="filtersblocks" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active rounded-3" id="trending" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Our Trending</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-3" id="mostpopular" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Most Popular</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-3" id="lowprice" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Lowest Price</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center g-4 mt-2">
                    <!-- Single Flight -->
                    <?php

                        foreach ($models as $model) {
                            $datetime1 = new DateTime($model->depature_time);
                            $datetime2 = new DateTime($model->arrival_time);
                            if ($datetime1 !== false && $datetime2 !== false) {
                                $interval = $datetime1->diff($datetime2);
                                $hours = $interval->h.'H';
                                $minutes = $interval->i.'M';
                            }else {
                                $hours = '';
                                $minutes = '';
                            }
                            
                            if(!empty($goingfrom)) {
                                $btnbook = '<div class="flight-button-wrap">
                                            <a href="'.base_url('ticket/detailspayment/'.$model->schdual_id).'?goingfrom='.$goingfrom.'&goingto='.$goingto.'&departure='.$departure.'&datereturn='.$datereturn.'&occupant='.$occupant.'" class="btn btn-primary btn-md fw-medium full-width">Select<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                        </div>';
                                
                                if ($this->session->userdata('isUserLoggedIn')) {
                                    $btnbook = '<div class="flight-button-wrap">
                                            <a href="'.base_url('ticket/detailspayment/'.$model->schdual_id).'?goingfrom='.$goingfrom.'&goingto='.$goingto.'&departure='.$departure.'&datereturn='.$datereturn.'&occupant='.$occupant.'" class="btn btn-primary btn-md fw-medium full-width">Select<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                        </div>';
                                }else {
                                    $btnbook = '<div class="flight-button-wrap">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="btn btn-primary btn-md fw-medium full-width">Select<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                        </div>';
                                }
                            }
                            
                            
                            
                        echo '<div class="col-xl-12 col-lg12 col-md-12">
                            <div class="flights-accordion">
                            <div class="flights-list-item bg-white rounded-3 p-3">
                                <div class="row gy-4 align-items-center justify-content-between">

                                    <div class="col">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="label bg-light-primary text-primary me-2">Departure</span>
                                                    <span class="text-muted text-sm">'.date('d M Y', strtotime($model->depature_date)).'</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="row gx-lg-5 gx-3 gy-4 align-items-center">

                                                    <div class="col-sm-auto">
                                                        <div class="d-flex align-items-center justify-content-start">
                                                            <div class="d-end fl-title ps-2">
                                                                <div class="text-dark fw-medium">'.$model->transportation_name.'</div>
                                                                <div class="text-sm text-muted">'.$model->typeclass.'</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="row gx-3 align-items-center">
                                                            <div class="col-auto">
                                                                <div class="text-dark fw-bold">'.date('H:i', strtotime($model->depature_time)).'</div>
                                                                <div class="text-muted text-sm fw-medium">'.$model->from_station.'</div>
                                                            </div>

                                                            <div class="col text-center">
                                                                <div class="busLine departure">
                                                                    <div></div>
                                                                    <div></div>
                                                                </div>
                                                                <div class="text-muted text-sm fw-medium mt-3">Direct</div>
                                                            </div>

                                                            <div class="col-auto">
                                                                <div class="text-dark fw-bold">'.date('H:i', strtotime($model->arrival_time)).'</div>
                                                                <div class="text-muted text-sm fw-medium">'.$model->to_station.'</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-auto">
                                                        <div class="text-dark fw-medium">'.$hours.' '.$minutes.'</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-auto">
                                        <div class="d-flex items-center h-100">
                                            <div class="d-lg-block d-none border br-dashed me-4"></div>
                                            <div>
                                                <div class="d-flex align-items-center justify-content-md-end mb-3">
                                                    <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Free WiFi"><i class="fa-solid fa-wifi"></i></span>
                                                    <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Food Available"><i class="fa-solid fa-utensils"></i></span>
                                                    <span class="square--20 rounded text-xs text-muted border me-2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="One Cup Tea"><i class="fa-solid fa-mug-saucer"></i></span>
                                                </div>
                                                <div class="text-start text-md-end">
                                                    <span class="label bg-light-success text-success me-1">'.$model->available_seat.' Seats</span>
                                                    <div class="text-dark fs-3 fw-bold lh-base">YEM'.$model->fare_amount.'</div>
                                                </div>

                                                '.$btnbook.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                        }
                    ?>

                    
                    <?php
                    if(!empty($links)) {
                        echo '<div class="col-xl-12 col-lg-12 col-12">
                        <div class="pags card py-2 px-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination m-0 p-0">'.$links.'</ul>
                            </nav>
                        </div>
                    </div>';
                    }
                    ?>
                    

                </div>
            </div>

        </div>
    </div>
</section>
<?php $this->load->view('layouts/login_model'); ?>