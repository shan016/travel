<?php
$this->load->helper('home');
?>
<style>
    .image-container {
        height: 200px; /* Set a fixed height for the container */
        overflow: hidden; /* Ensure images don't overflow */
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Resize the image to cover the container */
    }
</style>
<!-- ============================ Hero Banner  Start================================== -->
<div  id="carouselExampleAutoplaying" class="carousel slide carousel-fade mb-6" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active bg-cover" style="background:url(<?= $this->config->config['asset_url'] ?>assets/img/adenb.jpg)no-repeat;" data-overlay="6">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Starts Your Trip with <span class="position-relative z-4">Daleem<span
                                class="position-absolute top-50 start-50 translate-middle d-none d-md-block mt-4">
                                <svg width="185px" height="23px" viewBox="0 0 445.5 23">
                                <path class="fill-white opacity-7"
                                      d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z">
                                </path>
                                </svg>
                            </span></span></h1>
                    <p class="fs-5 fw-light">Take a little break from the work strss of everyday. Discover plan trip and
                        explore beautiful destinations.</p>

                </div>
            </div>
        </div>

        <div class="carousel-item bg-cover" style="background:url(<?= $this->config->config['asset_url'] ?>assets/img/sanaab.jpg)no-repeat;" data-overlay="6">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Explore The World <span class="position-relative z-4">Around<span
                                class="position-absolute top-50 start-50 translate-middle d-none d-md-block mt-4">
                                <svg width="185px" height="23px" viewBox="0 0 445.5 23">
                                <path class="fill-white opacity-7"
                                      d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z">
                                </path>
                                </svg>
                            </span></span> You</h1>
                    <p class="fs-5 fw-light">Take a little break from the work strss of everyday. Discover plan trip and
                        explore beautiful destinations.</p>

                </div>
            </div>
        </div>

        <div class="carousel-item bg-cover" style="background:url(<?= $this->config->config['asset_url'] ?>assets/img/socotrab.jpg)no-repeat;" data-overlay="6">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Discover Beautiful Place with <span class="position-relative z-4">Daleem<span
                                class="position-absolute top-50 start-50 translate-middle d-none d-md-block mt-4">
                                <svg width="185px" height="23px" viewBox="0 0 445.5 23">
                                <path class="fill-white opacity-7"
                                      d="M409.9,2.6c-9.7-0.6-19.5-1-29.2-1.5c-3.2-0.2-6.4-0.2-9.7-0.3c-7-0.2-14-0.4-20.9-0.5 c-3.9-0.1-7.8-0.2-11.7-0.3c-1.1,0-2.3,0-3.4,0c-2.5,0-5.1,0-7.6,0c-11.5,0-23,0-34.5,0c-2.7,0-5.5,0.1-8.2,0.1 c-6.8,0.1-13.6,0.2-20.3,0.3c-7.7,0.1-15.3,0.1-23,0.3c-12.4,0.3-24.8,0.6-37.1,0.9c-7.2,0.2-14.3,0.3-21.5,0.6 c-12.3,0.5-24.7,1-37,1.5c-6.7,0.3-13.5,0.5-20.2,0.9C112.7,5.3,99.9,6,87.1,6.7C80.3,7.1,73.5,7.4,66.7,8 C54,9.1,41.3,10.1,28.5,11.2c-2.7,0.2-5.5,0.5-8.2,0.7c-5.5,0.5-11,1.2-16.4,1.8c-0.3,0-0.7,0.1-1,0.1c-0.7,0.2-1.2,0.5-1.7,1 C0.4,15.6,0,16.6,0,17.6c0,1,0.4,2,1.1,2.7c0.7,0.7,1.8,1.2,2.7,1.1c6.6-0.7,13.2-1.5,19.8-2.1c6.1-0.5,12.3-1,18.4-1.6 c6.7-0.6,13.4-1.1,20.1-1.7c2.7-0.2,5.4-0.5,8.1-0.7c10.4-0.6,20.9-1.1,31.3-1.7c6.5-0.4,13-0.7,19.5-1.1c2.7-0.1,5.4-0.3,8.1-0.4 c10.3-0.4,20.7-0.8,31-1.2c6.3-0.2,12.5-0.5,18.8-0.7c2.1-0.1,4.2-0.2,6.3-0.2c11.2-0.3,22.3-0.5,33.5-0.8 c6.2-0.1,12.5-0.3,18.7-0.4c2.2-0.1,4.4-0.1,6.7-0.1c11.5-0.1,23-0.2,34.6-0.4c7.2-0.1,14.4-0.1,21.6-0.1c12.2,0,24.5,0.1,36.7,0.1 c2.4,0,4.8,0.1,7.2,0.2c6.8,0.2,13.5,0.4,20.3,0.6c5.1,0.2,10.1,0.3,15.2,0.4c3.6,0.1,7.2,0.4,10.8,0.6c10.6,0.6,21.1,1.2,31.7,1.8 c2.7,0.2,5.4,0.4,8,0.6c2.9,0.2,5.8,0.4,8.6,0.7c0.4,0.1,0.9,0.2,1.3,0.3c1.1,0.2,2.2,0.2,3.2-0.4c0.9-0.5,1.6-1.5,1.9-2.5 c0.6-2.2-0.7-4.5-2.9-5.2c-1.9-0.5-3.9-0.7-5.9-0.9c-1.4-0.1-2.7-0.3-4.1-0.4c-2.6-0.3-5.2-0.4-7.9-0.6 C419.7,3.1,414.8,2.9,409.9,2.6z">
                                </path>
                                </svg>
                            </span></span></h1>
                    <p class="fs-5 fw-light">Take a little break from the work strss of everyday. Discover plan trip and
                        explore beautiful destinations.</p>
                    
                </div>
            </div>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!-- ============================ Hero Search Start ================================== -->
<div class="search-explore-wrap">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="search-wrap with-label overio">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="fliore">
                                <div class="rounded-top-3 d-inline-flex overflow-hidden">
                                    <ul class="nav nav-tabs simple-tabs medium border-0 justify-content-center" id="tour-pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#hotels"><i class="fa-solid fa-hotel me-2"></i>Hotels</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#flights"><i class="fa-solid fa-jet-fighter me-2"></i>Flight</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#bus"><i class="fa-solid fa-bus me-2"></i>Bus</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content bg-white rounded-bottom-3 shadow-wrap p-3">
                                    <div class="tab-pane show active" id="hotels">
                                        <form action="<?php echo base_url('hotel'); ?>" class="mt-4 text-start needs-validation" method="get" novalidate>    
                                        <div class="row gy-3 gx-md-3 gx-sm-2">
                                            <div class="col-xl-8 col-lg-7 col-md-12">
                                                <div class="row gy-3 gx-md-3 gx-sm-2">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <select class="goingto form-control fw-bold hdd-arrow" name="city" required="">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($citys as $city) {
                                                                 echo '<option value="'.$city->id.'">'.$city->name_en.'</option>';    
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out" name="checkout" id="hotelcheckinout" value='<?php echo date('Y-m-d') ?> to <?php echo date("Y-m-d", time() + 86400) ?>'>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-5 col-md-12">
                                                <div class="row gy-3 gx-md-3 gx-sm-2">
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                                        <div class="form-group mb-0">
                                                            <div class="booking-form__input guests-input mixer-auto">
                                                                <button name="guests-btn" id="guests-input-btn">1 Guest</button>
                                                                <div class="guests-input__options" id="guests-input-options">
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="adults-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                                        <span class="guests-input__ctrl plus" id="adults-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="children-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-children">0</span>Children</span>
                                                                        <span class="guests-input__ctrl plus" id="children-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                    <div>
                                                                        <span class="guests-input__ctrl minus" id="room-subs-btn"><i class="fa-solid fa-minus"></i></span>
                                                                        <span class="guests-input__value"><span id="guests-count-room">1</span>Rooms</span>
                                                                        <span class="guests-input__ctrl plus" id="room-add-btn"><i class="fa-solid fa-plus"></i></span>
                                                                    </div>
                                                                </div>
                                                                 <input type="hidden" name="no_adults" id="guests-count-adults-text" readonly="readonly">
                                                                 <input type="hidden" name="no_children" id="guests-count-children-text" readonly="readonly">   
                                                                 <input type="hidden" name="no_rooms" id="guests-count-room-text" readonly="readonly">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div class="form-group mb-0">
                                                            <button type="submit" class="btn btn-primary full-width fw-medium"><i
                                                                    class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>	
                                        </form>
                                    </div>
                                    
                                    <div class="tab-pane" id="flights">
                                        <form action="<?php echo base_url('flight'); ?>" class="mt-4 text-start needs-validation" method="get" novalidate>    
                                        <div class="row gx-lg-2 g-3">
                                            <div class="col-xl-5 col-lg-5 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <select class="leaving form-control fw-bold hdd-arrow" placeholder="Going From" name="goingfrom" required="">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($citys as $city) {
                                                                 echo '<option value="'.$city->id.'">'.$city->name_en.'</option>';    
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                        <div class="btn-flip-icon mt-md-0">
                                                            <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-groupp hdd-arrow mb-0">
                                                            <select class="goingto form-control fw-bold hdd-arrow" name="goingto" required="">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($citys as $city) {
                                                                 echo '<option value="'.$city->id.'">'.$city->name_en.'</option>';    
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" name="departure" value="<?= date('Y-M-d') ?>" placeholder="Departure.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" name="datereturn" placeholder="Return.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-2 col-lg-2 col-md-12">
                                                <div class="form-groupp hdd-arrow mb-0">
                                                    <select class="occupant form-control fw-bold" name="occupant">        
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary full-width fw-medium"><i
                                                                    class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                </div>
                                            </div>

                                        </div>
                                        </form>    
                                    </div>
                                    
                                    <div class="tab-pane" id="bus">
                                        <form action="<?php echo base_url('bus'); ?>" class="mt-4 text-start needs-validation" method="get" novalidate>    
                                        <div class="row gx-lg-2 g-3">
                                            <div class="col-xl-5 col-lg-5 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                                        <div class="form-group hdd-arrow mb-0">
                                                            <select class="leaving form-control fw-bold hdd-arrow" placeholder="Going From" name="goingfrom" required="">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($citys as $city) {
                                                                 echo '<option value="'.$city->id.'">'.$city->name_en.'</option>';    
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                        <div class="btn-flip-icon mt-md-0">
                                                            <button class="p-0 m-0 text-primary"><i class="fa-solid fa-right-left"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-groupp hdd-arrow mb-0">
                                                            <select class="goingto form-control fw-bold hdd-arrow" name="goingto" required="">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($citys as $city) {
                                                                 echo '<option value="'.$city->id.'">'.$city->name_en.'</option>';    
                                                                }
                                                                ?>
                                                                
                                                            </select>
                                                            <div class="invalid-feedback">Please select city.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-4 col-lg-4 col-md-12">
                                                <div class="row gy-3 gx-lg-2 gx-3">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" name="departure" value="<?= date('Y-M-d') ?>" placeholder="Departure.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="form-group mb-0">
                                                            <input class="form-control fw-bold choosedate" type="text" name="datereturn" placeholder="Return.." readonly="readonly">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-2 col-lg-2 col-md-12">
                                                <div class="form-groupp hdd-arrow mb-0">
                                                    <select class="occupant form-control fw-bold" name="occupant">        
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-xl-1 col-lg-1 col-md-12">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-primary full-width fw-medium"><i
                                                                    class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                                </div>
                                            </div>

                                        </div>
                                        </form>    
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
<!-- ============================ Hero Search End ================================== -->


<section>
    <div class="container">

        <div class="row align-items-center justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-11 col-sm-12">
                <div class="secHeading-wrap text-center mb-5">
                    <h2>Recommended Hotels & Restaurants</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center gy-4 gx-xl-4 gx-lg-3 gx-md-4 gx-4">
            
            <?php
            foreach($service_hotels as $shotel) {
                $checkout = date('Y-m-d').'+to+'.date('Y-m-d', strtotime(' +1 day'));
                $select_no_adults = 1;$select_no_children=0;$select_no_rooms=1;
                echo '<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="pop-touritem">
                    <a href="'.base_url('hotel/lists/'.$shotel->id).'?city='.$destination.'&checkout='.$checkout.'&no_adults='.$select_no_adults.'&no_children='.$select_no_children.'&no_rooms='.$select_no_rooms.'" class="card rounded-3 border m-0">
                        <div class="flight-thumb-wrapper">
                            <div class="popFlights-item-overHidden image-container">
                                <img src="'.$shotel->img.'" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="touritem-middle position-relative p-3">
                            <div class="touritem-flexxer">
                                <h4 class="city fs-title m-0 fw-bold">
                                    <span>'.$shotel->name_ar.'</span>
                                </h4>

                            </div>
                            
                        </div>
                    </a>
                </div>
            </div>';
                
            }
            ?>

        </div>

    </div>
</section>



<section>
    <div class="container">

        <div class="row g-4 justify-content-between">

            <div class="col-xl-4 col-lg-4 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="<?= $this->config->config['asset_url'] ?>assets/img/discount-1.jpg" alt="image">
                    </div>

                    <div class="cardOffer-content p-5">
                        <p class="text-light fw-medium m-0">Family Package</p>
                        <h4 class="fs-1 text-light">Save $80 For 3 Night</h4>
                        <div class="d-inline-flex align-items-center justify-content-center py-2 px-4 cpnCode rounded-2">
                            <span class="text-light fw-bold me-2">Code:</span><span class="text-warning fw-medium">WELCOME</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="<?= $this->config->config['asset_url'] ?>assets/img/discount-2.jpg" alt="image">
                    </div>

                    <div class="cardOffer-content p-5">
                        <p class="text-light fw-medium m-0">Hot Summer Sale</p>
                        <h4 class="fs-1 text-light">Upto US$50 Discount</h4>
                        <div class="d-inline-flex align-items-center justify-content-center py-2 px-4 cpnCode rounded-2">
                            <span class="text-light fw-bold me-2">Code:</span><span class="text-success fw-medium">WELCOME</span>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-4 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="<?= $this->config->config['asset_url'] ?>assets/img/discount-3.jpg" alt="image">
                    </div>

                    <div class="cardOffer-content p-5">
                        <p class="text-light fw-medium m-0">Hot Summer Sale</p>
                        <h4 class="fs-1 text-light">Upto US$50 Discount</h4>
                        <div class="d-inline-flex align-items-center justify-content-center py-2 px-4 cpnCode rounded-2">
                            <span class="text-light fw-bold me-2">Code:</span><span class="text-success fw-medium">WELCOME</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>


    </div>
</section>


<!-- ============================ Advertisement Start ================================== -->
<section>
    <div class="container">

        <div class="row g-4 justify-content-between">

            <div class="col-xl-4 col-lg-6 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="https://daleelcom.news/media/flights_schedules/385245c55c8d54d057fd265f4f018751.jpg" alt="image">
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="https://daleelcom.news/media/flights_schedules/dd6ebbf80cdcaf1409ca1d6a38c1578e.jpg" alt="image">
                    </div>

                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 py-3">
                <div class="cardOffer cursor rounded-3 position-relative z-0">
                    <div class="cardOffer-image ratio ratio-full">
                        <img class="img-fluid object-fit" src="https://daleelcom.news/media/flights_schedules/dd6ebbf80cdcaf1409ca1d6a38c1578e.jpg" alt="image">
                    </div>

                </div>
            </div>

        </div>


    </div>
</section>
<!-- ============================ Advertisement End ================================== -->




            