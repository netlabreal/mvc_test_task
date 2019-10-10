<div class="container">
    <form class="form-horizontal" style="margin-top: 55px;" action="/task/add" method="post">
        <input type="hidden" value="0" name="edit">
        <div class="form-group">
            <label for="inputEmail" class="col-xs-2 control-label">Имя пользователя:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" placeholder="Введите имя" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-xs-2 control-label">Email:</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" name="email" placeholder="Введите email" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-xs-2 control-label">Текст задания:</label>
            <div class="col-xs-8">
                <textarea rows="5" class="form-control" name="task" placeholder="Введите текст"></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-4">
                <button type="submit" class="btn btn-default">Сохранить</button>
            </div>
            <div class=" col-xs-4" style="color: red">
                <?php echo $data['error'] ?>
                <?php echo $data['message'];?>

            </div>
        </div>
    </form>
</div>

<script>

</script>