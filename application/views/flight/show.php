<?php
$this->load->helper('home');
?>


<div class="container">
    <div class="row utf_sticky_main_wrapper">
        <div class="col-lg-8 col-md-8">
            <div id="titlebar" class="utf_listing_titlebar">
                <div class="utf_listing_titlebar_title">
                    <h2><?php echo $model->transportation_name.' - '. $model->trsportation_travel_class_name_ar ?></h2>		   
                    <?php echo '<span>'.$model->stationfro.' <i class="fa fa-plane-departure"></i> '.$model->stationto.'</span>'?>	
                    <?php echo '<span><i class="fa fa-users"></i> '.$model->available_seat.'</span>
                                <span><i class="fa fa-map"></i> '.$model->transportation_type_name_ar.'</span>' ?>

                    <ul class="listing_item_social">
                        <li><a href="#" class="now_open">Open Now</a></li>
                    </ul>			
                </div>
            </div>



        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 col-md-4 margin-top-75 sidebar-search">
            <div class="verified-badge with-tip margin-bottom-30" data-tip-content="Listing has been verified and belongs business owner or manager."> <i class="sl sl-icon-check"></i> Now Available</div>
            
            <form action="<?php echo base_url('/hotel/store'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="roomid" value="<?php echo $model->transportation_schdual_id ?>">
                <input type="hidden" name="name" value="<?php echo $model->transportation_name.' - '. $model->trsportation_travel_class_name_ar ?>">
                <input type="hidden" name="amount" value="<?php echo $model->fare_amount ?>">
                <input type="hidden" name="img" value="<?php echo $model->simg ?>">
            <div class="utf_box_widget booking_widget_box">
                <h3><i class="fa fa-calendar"></i> Booking
                    <div class="price">
                        <span>YEM <?php echo $model->fare_amount ?></span>				
                    </div>
                </h3>
                <div class="row with-forms margin-top-0">
                    <div class="col-lg-12 col-md-12 select_date_box">
                        <input type="text" id="date-picker" placeholder="Select Date" readonly="readonly" name="book_date">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <div class="col-lg-12">
                        <div class="panel-dropdown">
                            <a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
                            <div class="panel-dropdown-content">
                                <div class="qtyButtons">
                                    <div class="qtyTitle">Adults</div>
                                    <input type="text" name="qtyInput" value="1"  id="adult">
                                </div>
                                <input type="hidden" name="adult" value="1" id="adultval">
                                <div class="qtyButtons">
                                    <div class="qtyTitle">Childrens</div>
                                    <input type="text" name="qtyInput" value="1" id="children">                                    
                                </div>
                                <input type="hidden" name="children" value="1" id="childrenval">
                            </div>
                        </div>
                    </div>

                </div>  
                <button id="book" class="utf_progress_button button fullwidth_block margin-top-5">Request Booking</button>
                <div class="clearfix"></div>
            </div>
            
            </form>
            
            <img src="https://daleelcom.news/media/flights_schedules/8d4db2438b3405df63be52b50a9ecedc1.jpg" alt="" class="img-fluid margin-top-35">
            

            

            <img src="https://daleelcom.news/media/flights_schedules/0486635439fa0268317d329a29e7b13f.jpg" alt="" class="img-fluid margin-top-35">

        </div>
    </div>
</div>