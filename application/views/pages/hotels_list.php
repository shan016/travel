<!-- ============================ Hero Banner  Start================================== -->
<div class="py-5 bg-primary position-relative">
    <div class="container">

        <!-- Search Form -->
        <form action="<?php echo base_url('hotel'); ?>" method="get">
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="search-wrap position-relative">
                    <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">

                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="row gy-3 gx-md-3 gx-sm-2">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                    <div class="form-group mb-0">
                                        <label class="text-light text-uppercase opacity-75">Where</label>
                                        <select class="goingto form-control fw-bold" name="city" required="">
                                            <?php
                                            foreach ($citys as $city) {
                                                $selected = ($selectcity == $city->id) ? 'selected' : '';
                                                echo '<option value="' . $city->id . '" '.$selected.'>' . $city->name_en . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-0">
                                        <label class="text-light text-uppercase opacity-75">Checkin & Checkout</label>
                                        <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out" name="checkout" id="hotelcheckinout" readonly="readonly" value="<?= $checkout ?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-12">
                            <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group mb-0">
                                        <label class="text-light text-uppercase opacity-75">Guests & Rooms</label>
                                        <div class="booking-form__input guests-input mixer-auto">
                                            <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                            <div class="guests-input__options" id="guests-input-options">
                                                <div>
                                                    <span class="guests-input__ctrl minus" id="adults-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-adults"><?= $select_no_adults ?></span>Adults</span>
                                                    <span class="guests-input__ctrl plus" id="adults-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                                <div>
                                                    <span class="guests-input__ctrl minus" id="children-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-children"><?= select_no_children ?></span>Children</span>
                                                    <span class="guests-input__ctrl plus" id="children-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                                <div>
                                                    <span class="guests-input__ctrl minus" id="room-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-room"><?= $select_no_rooms ?></span>Rooms</span>
                                                    <span class="guests-input__ctrl plus" id="room-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="no_adults" id="guests-count-adults-text" readonly="readonly" value="<?= $select_no_adults ?>">
                                        <input type="hidden" name="no_children" id="guests-count-children-text" readonly="readonly" value="<?= $select_no_children ?>">   
                                        <input type="hidden" name="no_rooms" id="guests-count-room-text" readonly="readonly" value="<?= $select_no_rooms ?>">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-whites text-primary full-width fw-medium"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- </row> -->
        </form>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Hotel Details Start ================================== -->
<section class="pt-3 gray-simple">
    <div class="container">
        <div class="row">

            <!-- Breadcrumb -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('hotel') ?>" class="text-primary">Hotels</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $hotel->name_ar ?></li>
                    </ol>
                </nav>
            </div>

            <!-- Gallery & Info -->
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card border-0 p-3 mb-4">

                    <div class="crd-heaader d-md-flex align-items-center justify-content-between">
                        <div class="crd-heaader-first">
                            <div class="d-inline-flex align-items-center mb-1">
                                <span class="label bg-light-success text-success">Health Protected</span>
                                <div class="d-inline-block ms-2">
                                    <i class="fa fa-star text-warning text-xs"></i>
                                    <i class="fa fa-star text-warning text-xs"></i>
                                    <i class="fa fa-star text-warning text-xs"></i>
                                    <i class="fa fa-star text-warning text-xs"></i>
                                    <i class="fa fa-star text-warning text-xs"></i>
                                </div>
                            </div>
                            <div class="d-block">
                                <h4 class="mb-0"><?= $hotel->name_ar ?></h4>
                                <div class="">
                                    <p class="text-md m-0">
                                        <i class="fa-solid fa-location-dot me-2"></i> <?= $hotel->address ?>
                                        <a href="#" class="text-primary fw-medium ms-2">Show on Map</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="crd-heaader-last my-md-0 my-2">
                            <div class="drix-wrap d-flex align-items-center">
                                <div class="drix-first pe-2">
                                    <div class="text-dark fw-semibold fs-4"><?= $hotel->tel ?></div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="galleryGrid typeGrid_3 mt-2">

                        <div class="galleryGrid__item relative d-flex">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-1.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-1.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>

                        <div class="galleryGrid__item">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-2.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-2.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>
                        <div class="galleryGrid__item">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-3.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-3.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>
                        <div class="galleryGrid__item">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-4.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-4.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>
                        <div class="galleryGrid__item">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-5.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-5.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>
                        <div class="galleryGrid__item">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-6.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-6.jpg" alt="image" class="rounded-2 img-fluid"></a>
                        </div>
                        <div class="galleryGrid__item position-relative">
                            <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-7.jpg" data-lightbox="roadtrip"><img src="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-7.jpg" alt="image" class="rounded-2 img-fluid"></a>
                            <div class="position-absolute end-0 bottom-0 mb-3 me-3">
                                <a href="<?= $this->config->config['asset_url'] ?>assets/img/hotel/hotel-7.jpg" data-lightbox="roadtrip"
                                   class="btn btn-md btn-whites fw-medium text-dark"><i class="fa-solid fa-caret-right me-1"></i>8
                                    More Photos</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- Rooms Details -->
            <div class="col-xl-12 col-lg-12 col-md-12">

                <!-- Single Room Option -->
                <?php
                $btnbook = '';

                foreach($models as $model) {
                    if(!empty($selectcity)) {
                        if ($this->session->userdata('isUserLoggedIn')) {
                            $btnbook = '<div class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                                    <div class="prcrounce-sngbuttons d-flex mb-2">
                                                        <a href="'.base_url('hotel/details/'.$model->rooms_id).'?city='.$selectcity.'&checkout='.$checkout.'&no_adults='.$select_no_adults.'&no_children='.$select_no_children.'&no_rooms='.$select_no_rooms.'" class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">Book at This Price</a>
                                                    </div>
                                                </div>';
                        }else {
                            $btnbook = '<div class="prcrounce-groups-button d-flex flex-column align-items-start align-items-md-end mt-3">
                                                    <div class="prcrounce-sngbuttons d-flex mb-2">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#login" class="btn btn-sm btn-light-primary rounded-1 fw-medium px-4">Book at This Price</a>
                                                    </div>
                                                </div>';
                        }
                    }
                    $ameneties = '';
                    foreach(explode(',', $model->ameneties) as $li) {
                        $ameneties .= '<li class="col-12"><span class="text-muted-2 text-md"><i class="fa-solid fa-mug-saucer me-2"></i>'.$li.'</span></li>';
                    }
                    echo '<div class="card mb-4">
                    <div class="card-header">
                        <h6 class="fw-semibold mb-0">'.$model->name_ar.' '.$model->room_no.'</h6>
                    </div>

                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <div class="roomavls-groups">
                                    <div class="roomavls-thumb mb-2">
                                        <img src="'.$model->img.'" class="img-fluid rounded-2" alt="">
                                    </div>
                                    <div class="roomavls-caps">
                                        <div class="roomavls-escols d-flex align-items-start mb-2">
                                            <span class="label bg-light-purple text-purple me-2">King Bed</span><span
                                                class="label bg-light-purple text-purple">3 Sleeps</span>
                                        </div>
                                        <div class="roomavls-lists">
                                            <ul class="row align-items-center gx-2 gy-1 mb-0 p-0">
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-brands fa-bity me-2"></i>City View</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-ban-smoking me-2"></i>Non-Smoking</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-vector-square me-2"></i>1800sqft | 6 Floor</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-wifi me-2"></i>Free Wi-Fi</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-bath me-2"></i>Private Bathroom</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-snowflake me-2"></i>Air Conditioning</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-cash-register me-2"></i>Refrigerator</span></li>
                                                <li class="col-6"><span class="text-muted-2 text-md"><i class="fa-solid fa-tty me-2"></i>Telephone</span></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-8">

                                <!-- Single Item -->
                                <div class="d-block border br-dashed rounded-2 px-3 py-3 mb-3">
                                    <div class="d-flex align-items-sm-end justify-content-between flex-sm-row flex-column">
                                        <div class="typsofrooms-wrap">
                                            <div class="d-flex align-items-center">
                                                <h6 class="fs-6 fw-semibold mb-1 me-2">Ameneties</h6>
                                                <a href="#" class="text-muted fs-6"><i class="fa-solid fa-circle-question"></i></a>
                                            </div>
                                            <div class="typsofrooms-groups d-flex align-items-start">
                                                <div class="typsofrooms-brk1 mb-4">
                                                    <ul class="row align-items-center g-1 mb-0 p-0">'.$ameneties.'</ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="typsofrooms-action col-auto">
                                            <div class="prcrounce-groups">
                                                <div class="d-flex align-items-center justify-content-start justify-content-sm-end">
                                                    <div class="text-dark fw-semibold fs-4">YEM '.$model->price.'</div>
                                                </div>
                                            </div>
                                            '.$btnbook.'
                                        </div>
                                    </div>
                                </div>
                                <!-- / Single Item -->

                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>


            </div>


        </div>
    </div>
</section>
<!-- ============================ Hotel Detail End ================================== -->


<?php $this->load->view('layouts/login_model'); ?>