<div class="col-xl-4 col-lg-4 col-md-12">
                <div class="card rounded-2 me-xl-5 mb-4">
                    <div class="card-top bg-primary position-relative">
                        <div class="position-absolute end-0 top-0 mt-4 me-3">
                            <a href="login.html" class="square--40 circle bg-light-dark text-light">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </div>
                        <div class="py-5 px-3">
                            <div class="crd-thumbimg text-center">
                                <div class="p-2 d-flex align-items-center justify-content-center brd">
                                    <img src="<?php echo $this->avatar->avatar($this->session->userdata('name')); ?>" class="img-fluid circle" width="120" alt="">
                                </div>
                            </div>
                            <div class="crd-capser text-center">
                                <h5 class="mb-0 text-light fw-semibold"><?= $this->session->userdata('name'); ?></h5>
                               
                            </div>
                        </div>
                    </div>

                    <div class="card-middle px-4 py-5">
                        <div class="crdapproval-groups">

                            <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                <div class="crdapproval-item">
                                    <div class="square--50 circle bg-light-success text-success"><i
                                            class="fa-solid fa-envelope-circle-check fs-5"></i></div>
                                </div>
                                <div class="crdapproval-caps ps-2">
                                    <p class="fw-semibold text-dark lh-2 mb-0"><?= $this->session->userdata('email'); ?></p>
                                    <p class="text-md text-muted lh-1 mb-0">Email</p>
                                </div>
                            </div>

                            <div class="crdapproval-single d-flex align-items-center justify-content-start mb-4">
                                <div class="crdapproval-item">
                                    <div class="square--50 circle bg-light-success text-success"><i
                                            class="fa-solid fa-phone-volume fs-5"></i></div>
                                </div>
                                <div class="crdapproval-caps ps-2">
                                    <p class="fw-semibold text-dark lh-2 mb-0"><?= $this->session->userdata('phone'); ?></p>
                                    <p class="text-md text-muted lh-1 mb-0">Mobile Number</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>