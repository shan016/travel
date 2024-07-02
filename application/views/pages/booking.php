<?php
$this->load->helper('home');

$returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
?>

<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>Choose Payment Option</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="index_1.html">Home</a></li>
              <li>Choose Payment Option</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>



<div class="container margin-bottom-75">
    <div class="row">
        <div class="col-lg-8 col-md-8 utf_listing_payment_section">
            <form action="<?php echo base_url('/hotel/store'); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="roomid" value="<?php echo $model->rooms_id ?>">
                <input type="hidden" name="checkin" value="<?php echo $sdate ?>">
                <input type="hidden" name="checkout" value="<?php echo $edate ?>">

                
            <div class="utf_booking_listing_section_form margin-bottom-40">
                <h3><i class="sl sl-icon-paper-plane"></i> Guest Information</h3>
                <div class="row">
                    <div class="col-md-6">
                        <label>Guest Name</label>
                        <input type="text" value="" placeholder="First Name" fdprocessedid="7bbx2m" name="guest_name">
                    </div>

                    <div class="col-md-6">
                        <div class="medium-icons">
                            <label>Guest Phone</label>
                            <input type="text" value="" placeholder="Phone" fdprocessedid="uv8zdi" name="guest_tel">
                        </div>
                    </div>
                </div>
            </div>

            <div class="utf_booking_payment_option_form">
                <h3><i class="sl sl-icon-credit-card "></i> Payment Method</h3>
                <div class="payment">

                    <div class="utf_payment_tab_block utf_payment_tab_block_active">
                        <div class="utf_payment_trigger_tab">
                            <input checked="" id="paypal" name="cardType" type="radio" value="paypal">
                            <label for="paypal">PayPal</label>
                            <img class="utf_payment_logo paypal" src="images/paypal_pay.png" alt=""> 
                        </div>
                        <div class="utf_payment_tab_block_content">
                            
                            <p>You will be Redirected to PayPal to Complete Payment.</p>
                        </div>
                    </div>			  			 

                </div>
                 <button id="book" class="button utf_booking_confirmation_button margin-top-20 margin-bottom-10">Confirm Now</button>	
            </div>
                
            </form>    
        </div>
        
        
        <div class="col-lg-4 col-md-4 margin-top-0 utf_listing_payment_section">
            <div class="utf_booking_listing_item_container compact utf_order_summary_widget_section">
                <div class="listing-item"> <img src="<?php echo $model->img ?>" alt="">
                    <div class="utf_listing_item_content">              
                        <h3><?php echo $model->room_no ?></h3>
                        <span><i class="fa fa-map-marker"></i> <?php echo $model->name_ar ?></span>
                        <span><i class="fa fa-phone"></i> <?php echo $model->tel ?></span>											
                    </div>
                </div>
            </div>
            <div class="boxed-widget opening-hours summary margin-top-0">
                <h3><i class="fa fa-calendar-check-o"></i> Booking Summary</h3>
                <ul>
                    <li>Check In <span><?= $sdate ?></span></li>
                    <li>Check Out <span><?= $edate ?></span></li>            
                    <li>Guests <span><?= $adult ?> Adults</span></li>
                    <li>Guests <span><?= $children ?> Childrens</span></li>
                    <li class="total-costs">Total Cost <span>YEM<?= $model->price ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>