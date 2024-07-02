<div class="row align-items-center justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
        <button class="btn btn-dark fw-medium full-width d-block d-lg-none" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDashboard" aria-controls="offcanvasDashboard"><i
                class="fa-solid fa-gauge me-2"></i>Dashboard Navigation</button>
        <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
             id="offcanvasDashboard" aria-labelledby="offcanvasScrollingLabel">
            <div class="offcanvas-header gray-simple">
                <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <ul class="user-Dashboard-longmenu">
                    <li><a href="<?= base_url('profile') ?>"><i class="fa-regular fa-id-card me-2"></i>My Profile</a></li>
                    <li class="active"><a href="<?= base_url('dashboard') ?>"><i class="fa-solid fa-ticket me-2"></i>My Booking</a></li>
                    <li><a href="#"><i class="fa-solid fa-wallet me-2"></i>Payment Details</a></li>
                    <li><a href="<?= base_url('logout') ?>"><i class="fa-solid fa-power-off me-2"></i>Sign Out</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>