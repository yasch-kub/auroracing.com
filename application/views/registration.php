<div class="modal fade" id="regModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase text-center">{{ dict.registration }}</h4>
            </div>
            <div class="modal-body">
                <form class="form" id="regForm" role="form" method="post" action="/registration" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <input type="text" class="form-control" id="regLogin" name="login" placeholder="{{ dict.login }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="regEmail" name="email" placeholder="{{ dict.email }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="regPassword" name="password" placeholder="{{ dict.password }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="regConfirmPassword" name="passwordConfirm" placeholder="{{ dict.passwordConfirm }}" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" form="regForm" data-sitekey="6Leg6RUTAAAAAHY8bKVLStBZX5EUI-SLgRCypUKj"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button form="regForm" type="submit" class="btn btn-success btn-block">{{ dict.registration }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
