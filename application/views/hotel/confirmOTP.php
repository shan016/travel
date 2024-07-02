<!-- ============================ Booking Page ================================== -->

<style>
    .enumber{display: none;}
</style>
<section class="pt-4 gray-simple position-relative">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4><i class="fa-solid fa-wallet me-2"></i>Confirm Payment</h4>
                    </div>
                    <div class="card-body">
                        <h5><?php echo $message ?></h5>
                        <form class="needs-validation" novalidate method="POST">    
                            <h6>Verification Code</h6>
                            <label class="form-label">Please enter the 6-digit verification code we sent via WhatsApp:</label>
                            <input type="number" name="otp" class="form-control mb-2" placeholder="OTP" required="">
                            <button type="submit" name="send" class="btn btn-md btn-primary fw-medium">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


       
    </div>
</section>
<!-- ============================ Booking Page End ================================== -->

