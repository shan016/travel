<!-- ============================ Hero Banner  Start================================== -->
<div class="py-5 bg-primary position-relative">
    <div class="container">

        <!-- Search Form -->
        <div class="row justify-content-center align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="search-wrap position-relative">
                    <div class="row align-items-end gy-3 gx-md-3 gx-sm-2">

                        <div class="col-xl-8 col-lg-7 col-md-12">
                            <div class="row gy-3 gx-md-3 gx-sm-2">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                                    <div class="form-group mb-0">
                                        <label class="text-light text-uppercase opacity-75">Where</label>
                                        <select class="goingto form-control fw-bold" name="leaving[]" multiple="multiple">
                                            <option value="ny">New York</option>
                                            <option value="sd">San Diego</option>
                                            <option value="sj">San Jose</option>
                                            <option value="ph">Philadelphia</option>
                                            <option value="nl">Nashville</option>
                                            <option value="sf">San Francisco</option>
                                            <option value="hu">Houston</option>
                                            <option value="sa">San Antonio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group mb-0">
                                        <label class="text-light text-uppercase opacity-75">Checkin & Checkout</label>
                                        <input type="text" class="form-control fw-bold" placeholder="Check-In & Check-Out"
                                               id="checkinout" readonly="readonly">
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
                                                    <span class="guests-input__ctrl minus" id="adults-subs-btn"><i
                                                            class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-adults">1</span>Adults</span>
                                                    <span class="guests-input__ctrl plus" id="adults-add-btn"><i
                                                            class="fa-solid fa-plus"></i></span>
                                                </div>
                                                <div>
                                                    <span class="guests-input__ctrl minus" id="children-subs-btn"><i
                                                            class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-children">0</span>Children</span>
                                                    <span class="guests-input__ctrl plus" id="children-add-btn"><i
                                                            class="fa-solid fa-plus"></i></span>
                                                </div>
                                                <div>
                                                    <span class="guests-input__ctrl minus" id="room-subs-btn"><i
                                                            class="fa-solid fa-minus"></i></span>
                                                    <span class="guests-input__value"><span id="guests-count-room">0</span>Rooms</span>
                                                    <span class="guests-input__ctrl plus" id="room-add-btn"><i
                                                            class="fa-solid fa-plus"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                    <div class="form-group mb-0">
                                        <button type="button" class="btn btn-whites text-primary full-width fw-medium"><i
                                                class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- </row> -->

    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->

<!--Sliders Section-->
<div class="header-2">
    <div class="banner-1 cover-image sptb-2 bg-background" data-bs-image-src="../assets/images/banners/tour.jpg">
        <div class="header-text1 mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                        <div class="text-center text-white ">
                            <h1 class=""><span class="font-weight-bold"><?= $counts ?></span> Hotels</h1>
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /header-text -->
    </div>
</div>
<!--/Sliders Section-->
<!--Breadcrumb-->
<div class="bg-white border-bottom">
    <div class="container">
        <div class="page-header">
            <h4 class="page-title">Hotel List</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hotel List</li>
            </ol>
        </div>
    </div>
</div>
<!--/Breadcrumb-->

<section class="sptb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <!--Add lists-->
                <div class="card mb-lg-0">
                    <div class="card-body">
                        <div class="item2-gl ">
                            <div class="item2-gl-nav d-block  d-sm-flex">
                                <h6 class="mb-0 mt-2"><?php echo 'Showing '.$current_page.' to '.$current_count.' of ' .$counts ?> entries</h6>
                                <ul class="nav item2-gl-menu ms-auto">
                                    <li class="" ><a href="#tab-11" class="active show" data-bs-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
                                    <li><a href="#tab-12" data-bs-toggle="tab" class="" title="Grid"><i class="fa fa-th"></i></a></li>
                                </ul>
                                <div class="d-flex select2-sm mt-3 mt-sm-0">
                                    <label class="me-2 mt-1 mb-sm-1 w-100">Sort By:</label>
                                    <select name="item" class="form-control select2 w-70">
                                        <option value="1">Latest</option>
                                        <option value="2">Oldest</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-11">
                                    
                                    
                                    <?php 

                                        foreach($models as $model) {
                                            if (strlen($model->descr_ar) > 200) {
                                                $des = substr($model->descr_ar, 0, 200) . " ...";
                                            } else {
                                                $des = $model->descr_ar;
                                            }


                                            
                                            echo '<div class="card overflow-hidden">
                                                <div class="d-md-flex">
                                                    <div class="item-card9-img">
                                                        <div class="item-card9-imgs">
                                                            <a href="'.base_url('hotel/lists/'.$model->id).'"></a>
                                                            <img src="'.$model->img.'" alt="img" class="cover-image">
                                                        </div>

                                                    </div>
                                                    <div class="card mb-0 border-0">
                                                        <div class="card-body ">
                                                            <div class="item-card9">
                                                                <a href="'.base_url('hotel/lists/'.$model->id).'">Spain</a>
                                                                <a href="'.base_url('hotel/lists/'.$model->id).'" class="text-dark"><h4 class="font-weight-bold mt-1">'.$model->name_ar.'</h4></a>
                                                                <p class="mb-0 leading-tight">'.$model->address.'</p>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer py-4">
                                                            <div class="item-card9-footer d-flex">
                                                                <div class="item-card9-cost">
                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">'.$model->tel.'</h4>
                                                                </div>
                                                                <div class="ms-auto">
                                                                    <div class="block">
                                                                        <div class="rating-star sm my-rating-5" data-stars="4s">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    ?>

                                </div>
                                
                                <div class="tab-pane" id="tab-12">
                                    <div class="row">
                                        
                                        
                                        <?php 

                                        foreach($models as $model) {
                                            if (strlen($model->descr_ar) > 200) {
                                                $des = substr($model->descr_ar, 0, 200) . " ...";
                                            } else {
                                                $des = $model->descr_ar;
                                            }


                                            
                                            echo '<div class="col-lg-6 col-md-12 col-xl-4">
                                            <div class="card overflow-hidden">
                                                <div class="item-card9-img">
                                                    <div class="item-card9-imgs">
                                                        <a href="'.base_url('hotel/lists/'.$model->id).'"></a>
                                                        <img src="'.$model->img.'" alt="img" class="cover-image">
                                                    </div>

                                                </div>
                                                <div class="card-body">
                                                    <div class="item-card9">
                                                        <a href="travel.html" class="text-dark mt-2"><h4 class="font-weight-bold mt-1">'.$model->name_ar.'</h4></a>
                                                        <p>'.$des.'</p>
                                                        <div class="item-card9-desc">
                                                            <a href="#" class="me-4"><span class=""><i class="fa fa-map-marker text-muted me-1"></i>'.$model->address.'</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="item-card9-footer d-flex">
                                                        <div class="item-card9-cost">
                                                            <h4 class="text-dark font-weight-semibold mb-0 mt-0">'.$model->tel.'</h4>
                                                        </div>
                                                        <div class="ms-auto">
                                                            <div class="block">
                                                                <div class="rating-star sm my-rating-5" data-stars="4s">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        }
                                    ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="center-block text-center">
                            <?php echo $links; ?>

                        </div>
                    </div>
                </div>
                <!--Add lists-->
            </div>

        </div>
    </div>
</section>