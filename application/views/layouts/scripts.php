<?php
$path = $this->config->config['asset_url'];
?>
<!-- Scripts --> 
        <script src="<?php echo $path; ?>scripts/jquery-3.4.1.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/chosen.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/slick.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/rangeslider.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/magnific-popup.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/jquery-ui.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/bootstrap-select.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/mmenu.js"></script>
        <script src="<?php echo $path; ?>scripts/tooltips.min.js"></script> 
        <script src="<?php echo $path; ?>scripts/color_switcher.js"></script>
        <script src="<?php echo $path; ?>scripts/jquery_custom.js"></script>
        <script src="<?php echo $path; ?>scripts/typed.js"></script>
        <script>
            var typed = new Typed('.typed-words', {
                strings: ["Hotels", " Restaurants", " Ticketing", " Resorts", " Halls"],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true
            });
        </script>
        <!--<script src="scripts/infobox.min.js"></script>-->
        <script src="<?php echo $path; ?>scripts/markerclusterer.js"></script> 
        <!--<script src="scripts/maps.js"></script>-->
        <script src="<?php echo $path; ?>scripts/quantityButtons.js"></script>
        <script src="<?php echo $path; ?>scripts/moment.min.js"></script>
        <script src="<?php echo $path; ?>scripts/daterangepicker.js"></script>
        <script>
        $(function() {
                $('#date-picker').daterangepicker({
                    "opens": "left",
                    singleDatePicker: false,
                    isInvalidDate: function (date) {
                        var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
                        var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
                        return date.isAfter(disabled_start) && date.isBefore(disabled_end);
                    }
                });
            });

            $('#date-picker').on('showCalendar.daterangepicker', function (ev, picker) {
                $('.daterangepicker').addClass('calendar-animated');
            });
            $('#date-picker').on('show.daterangepicker', function (ev, picker) {
                $('.daterangepicker').addClass('calendar-visible');
                $('.daterangepicker').removeClass('calendar-hidden');
            });
            $('#date-picker').on('hide.daterangepicker', function (ev, picker) {
                $('.daterangepicker').removeClass('calendar-visible');
                $('.daterangepicker').addClass('calendar-hidden');
            });

            function close_panel_dropdown() {
                $('.panel-dropdown').removeClass("active");
                $('.fs-inner-container.content').removeClass("faded-out");
            }
            $('.panel-dropdown a').on('click', function (e) {
                if ($(this).parent().is(".active")) {
                    close_panel_dropdown();
                } else {
                    close_panel_dropdown();
                    $(this).parent().addClass('active');
                    $('.fs-inner-container.content').addClass("faded-out");
                }
                e.preventDefault();
            });
            $('.panel-buttons button').on('click', function (e) {
                $('.panel-dropdown').removeClass('active');
                $('.fs-inner-container.content').removeClass("faded-out");
            });
            var mouse_is_inside = false;
            $('.panel-dropdown').hover(function () {
                mouse_is_inside = true;
            }, function () {
                mouse_is_inside = false;
            });
            $("body").mouseup(function () {
                if (!mouse_is_inside)
                    close_panel_dropdown();
            });
            
            $('#book').click(function(){
                var adult = $('#adult').val();
                var children = $('#children').val();
                $('#childrenval').val(children);
                $('#adultval').val(adult);
              }); 
        </script>
    </body>
</html>