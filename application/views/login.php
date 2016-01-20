<div class="modal fade" id="logModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-uppercase text-center">Login</h4>
            </div>
            <div class="modal-body">
                <form class="form" id="logForm" role="form" method="post" action="/login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <input type="text" class="form-control" id="logEmail" name="login" placeholder="Електронна адреса" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="logPassword" name="password" placeholder="Пароль" required autocomplete="off">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Запам'ятати мене
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" form="logForm" class="btn btn-success btn-block">Вхід</button>
            </div>
        </div>
    </div>
</div>
