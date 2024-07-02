<?php
$path = $this->config->config['asset_url'];
?>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo $path; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/popper.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/dropzone.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/flatpickr.js"></script>
    <script src="<?php echo $path; ?>assets/js/flickity.pkgd.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/lightbox.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/rangeslider.js"></script>
    <script src="<?php echo $path; ?>assets/js/select2.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/counterup.min.js"></script>
    <script src="<?php echo $path; ?>assets/js/prism.js"></script>

    <script src="<?php echo $path; ?>assets/js/addadult.js"></script>
    <script src="<?php echo $path; ?>assets/js/custom.js"></script>
    <script src="<?php echo $path; ?>assets/js/validation.js"></script>
    <script src="//getbootstrap.com/docs/5.3/assets/js/validate-forms.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script>
$(document).ready(function(){
    $('#sendotp').on('click', function() {
        var amount = $("#fare_amount").val();
        var enumber = $("#enumber").val();
        $.ajax({
           url: '/bus/sendotp',
           type: 'POST',
           data: {amount: amount, enumber: enumber},
           dataType: 'json',
           success: function(response) {
               console.log(response);
                if (response.status === 'success') {
                    $('.otp').show();
                    $('#otp').attr('required', true);
                    alert(response.message);
                    
                } else {
                    $('.otp').hide();
                    $("#otp").removeAttr("required");
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
  $('#loginForm').submit(function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
      url: '/loginpopup',
      type: 'POST',
      data: formData,
      success: function(response){
        if(response == 'success') {
            location.reload();
            //window.location.href = 'dashboard.php';
        } else {
          $('#loginError').html(response);
        }
      }
    });
  });
});
</script>

    </body>
</html>