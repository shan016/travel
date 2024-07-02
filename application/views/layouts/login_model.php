<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="loginmodal">
            <div class="modal-header">
                <h4 class="modal-title fs-6">Sign In</h4>
                <a href="#" class="text-muted fs-4" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-square-xmark"></i></a>
            </div>
            <div class="modal-body">
                <div class="modal-login-form py-4 px-md-3 px-0">
                    <form class="needs-validation" novalidate id="loginForm">
                        <div id="loginError" class="text-danger mt-2"></div>
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            <label>Email</label>
                            <div class="invalid-feedback">Please provide a email.</div>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <label>Password</label>
                            <div class="invalid-feedback">Please provide a email.</div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary full-width font--bold btn-lg">Log In</button>
                        </div>

                        <div class="modal-flex-item d-flex align-items-center justify-content-between mb-3">

                            <div class="modal-flex-last">
                                <a href="JavaScript:Void(0);" class="text-primary fw-medium">Forget Password?</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- End Modal -->