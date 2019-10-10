<div class="container">
    <form class="form-horizontal" style="margin-top: 55px;" action="/account/login" method="post">
        <div class="form-group">
            <label for="inputEmail" class="col-xs-2 control-label">Адрес email:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="login" placeholder="Введите email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-xs-2 control-label">Пароль:</label>
            <div class="col-xs-8">
                <input type="password" class="form-control" name="pass" placeholder="Введите пароль">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-4">
                <button type="submit" class="btn btn-default">Войти</button>
            </div>
            <div class="col-xs-4" style="color: red">
                <?php echo $data['error']?>
            </div>
        </div>
    </form>
</div>