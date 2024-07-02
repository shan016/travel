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
                                                    <span class="guests-input__value"><span id="guests-count-children"><?= $select_no_children ?></span>Children</span>
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

<!-- ============================ Searches List Start ================================== -->
<section class="gray-simple">
    <div class="container">
        <div class="row justify-content-between gy-4 gx-xl-4 gx-lg-3 gx-md-3 gx-4">

            <!-- Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="filter-searchBar bg-white rounded-3">
                    <div class="filter-searchBar-head border-bottom">
                        <div class="searchBar-headerBody d-flex align-items-start justify-content-between px-3 py-3">
                            <div class="searchBar-headerfirst">
                                <h6 class="fw-bold fs-5 m-0">Filters</h6>
                                <p class="text-md text-muted m-0">Showing <?= $counts ?> Hotels </p>
                            </div>
                            <div class="searchBar-headerlast text-end">
                                <a href="#" class="text-md fw-medium text-primary active">Clear All</a>
                            </div>
                        </div>
                    </div>

                    <div class="filter-searchBar-body">


                        <!-- Bed types -->
                        <div class="searchBar-single px-3 py-3 border-bottom">
                            <div class="searchBar-single-title d-flex mb-3">
                                <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Bed Type</h6>
                            </div>
                            <div class="searchBar-single-wrap">
                                <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                                    <li class="col-6">
                                        <input type="checkbox" class="btn-check" id="doublebed">
                                        <label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width" for="doublebed">1 Double
                                            Bed</label>
                                    </li>
                                    <li class="col-6">
                                        <input type="checkbox" class="btn-check" id="2bed">
                                        <label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width" for="2bed">2 Beds</label>
                                    </li>
                                    <li class="col-6">
                                        <input type="checkbox" class="btn-check" id="singlebed">
                                        <label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width" for="singlebed">1 Single
                                            Bed</label>
                                    </li>
                                    <li class="col-6">
                                        <input type="checkbox" class="btn-check" id="3beds">
                                        <label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width" for="3beds">3
                                            Beds</label>
                                    </li>
                                    <li class="col-6">
                                        <input type="checkbox" class="btn-check" id="kingbed">
                                        <label class="btn btn-sm btn-secondary rounded-1 fw-medium full-width" for="kingbed">King
                                            Bed</label>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <!-- Popular Filters -->
                        <div class="searchBar-single px-3 py-3 border-bottom">
                            <div class="searchBar-single-title d-flex mb-3">
                                <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Popular Filters</h6>
                            </div>
                            <div class="searchBar-single-wrap">
                                <ul class="row align-items-center justify-content-between p-0 gx-3 gy-2 mb-0">
                                    <li class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="fsq">
                                            <label class="form-check-label" for="fsq">Free Cancellation Available</label>
                                        </div>
                                    </li>

                                    <li class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="payh">
                                            <label class="form-check-label" for="payh">Pay At Hotel Available</label>
                                        </div>
                                    </li>
                                    <li class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="brks">
                                            <label class="form-check-label" for="brks">Free Breakfast Included</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <!-- Pricing -->
                        <div class="searchBar-single px-3 py-3 border-bottom">
                            <div class="searchBar-single-title d-flex mb-3">
                                <h6 class="sidebar-subTitle fs-6 fw-medium m-0">Pricing Range in YEM</h6>
                            </div>
                            <div class="searchBar-single-wrap">
                                <input type="text" class="js-range-slider" name="my_range" value="" data-skin="round"
                                       data-type="double" data-min="0" data-max="1000" data-grid="false">
                            </div>
                        </div>


                        

     
                    </div>
                </div>
            </div>

            <!-- All List -->
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <h5 class="fw-bold fs-6 mb-lg-0 mb-3"><?php echo 'Showing '.$current_page.' to '.$current_count.' of ' .$counts ?> entries</h5>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="d-flex align-items-center justify-content-start justify-content-lg-end flex-wrap">

                            <div class="flsx-first mt-sm-0 mt-2">
                                <ul class="nav nav-pills nav-fill p-1 small lights blukker bg-primary rounded-3 shadow-sm"
                                    id="filtersblocks" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active rounded-3" id="trending" data-bs-toggle="tab" type="button"
                                                role="tab" aria-selected="true">Our Trending</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-3" id="mostpopular" data-bs-toggle="tab" type="button"
                                                role="tab" aria-selected="false">Most Popular</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link rounded-3" id="lowprice" data-bs-toggle="tab" type="button" role="tab"
                                                aria-selected="false">Lowest Price</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center g-4 mt-2">

                    <!-- Single List -->
                    <?php
                    foreach($models as $model) {
                        if (strlen($model->descr_ar) > 200) {
                            $des = substr($model->descr_ar, 0, 200) . " ...";
                        } else {
                            $des = $model->descr_ar;
                        }
                        
                        $list = '';
                        if(count($model->ameneties) > 0) {
                            foreach($model->ameneties as $amenetie){
                                $list .= '<span class="ellipsis">'.$amenetie->name_en.'</span>';
                            }
                            
                        }
                        
                        echo '<div class="col-xl-12 col-lg-12 col-12">
                            <div class="card list-layout-block rounded-3 p-3">
                                <div class="row">

                                    <div class="col-xl-4 col-lg-3 col-md">
                                        <div class="cardImage__caps rounded-2 overflow-hidden h-100">
                                            <img class="img-fluid h-100 object-fit" src="'.$model->img.'" alt="image">
                                        </div>
                                    </div>

                                    <div class="col-xl col-lg col-md">
                                        <div class="listLayout_midCaps mt-md-0 mt-3 mb-md-0 mb-3">

                                            <h4 class="fs-5 fw-bold mb-1">'.$model->name_ar.'</h4>
                                            <p class="text-muted-2 text-md">'.$des.'</p>
                                            <ul class="row gx-2 p-0 excortio">
                                                <li class="col-auto">
                                                    <p class="text-muted-2 text-md"><a href="#" class="text-primary">Show on Map</a></p>
                                                </li>
                                            </ul>
                                            <div class="detail ellipsis-container mt-3">
                                                '.$list.'
                                            </div>

                                            
                                        </div>
                                    </div>

                                    <div
                                        class="col-xl-auto col-lg-auto col-md-auto text-right text-md-left d-flex align-items-start align-items-md-end flex-column">
                                        <div class="row align-items-center justify-content-start justify-content-md-end gx-2 mb-3">
                                            <div class="col-auto text-start text-md-end">
                                                <div class="text-md text-dark fw-medium">Exceptional</div>
                                                <div class="text-md text-muted-2">3,014 reviews</div>
                                            </div>
                                            <div class="col-auto">
                                                <div class="square--40 rounded-2 bg-primary text-light">4.8</div>
                                            </div>
                                        </div>

                                        <div class="position-relative mt-auto full-width">
                                            <div class="d-flex align-items-center justify-content-start justify-content-md-end">
                                                <div class="text-muted-2 fw-medium text-decoration-line-through me-2"></div>
                                                <div class="text-dark fw-bold fs-3">'.$model->price.'</div>
                                            </div>

                                            <div class="d-flex align-items-start align-items-md-end text-start text-md-end flex-column">
                                                <a href="'.base_url('hotel/lists/'.$model->id).'?city='.$selectcity.'&checkout='.$checkout.'&no_adults='.$select_no_adults.'&no_children='.$select_no_children.'&no_rooms='.$select_no_rooms.'" class="btn btn-md btn-primary full-width fw-medium px-lg-4">See Availability<i class="fa-solid fa-arrow-trend-up ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                    
                    <!-- /Single List -->

                    <!-- Offer Coupon Box -->
                    <div class="col-xl-12 col-lg12 col-md-12">
                        <img src="https://daleelcom.news/media/adv_banners/cb3f18d5a8677bffb946b429c5271eae1.jpg" class="responsive-navbar">
                        
                    </div>



                    <div class="col-xl-12 col-lg-12 col-12">
                        <div class="pags card py-2 px-5">
                            
                            <nav aria-label="Page navigation example">
                                <?php echo $links; ?>
                            </nav>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- ============================ Searches List End ================================== -->

