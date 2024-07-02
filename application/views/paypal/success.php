<?php
$this->load->helper('home');
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
            <div class="utf_booking_listing_section_form margin-bottom-40">
                <h3><i class="sl sl-icon-paper-plane"></i> Payment Successful</h3>
                <h2>Your payment was successful, thank you for purchase.</h2>
    <p>Item Number :<?php echo $item_number; ?></p>
    <p>TXN ID: <?php echo $txn_id; ?></p>
    <p>Amount Paid :  <strong>$<?php echo $payment_amt . ' ' . $currency_code; ?></strong></p>
    <p>Payment Status : <strong><?php echo $status; ?></strong></p>
    <a href="<?php echo base_url(); ?>" class="button utf_booking_confirmation_button margin-top-20 margin-bottom-10">Home</a>
            </div>

        </div>

    </div>
</div>