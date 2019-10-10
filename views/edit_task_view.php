<div class="container">
    <form class="form-horizontal" style="margin-top: 55px;" action="/task/edit/<?php echo $data['id'];  ?>" method="post">
        <input type="hidden" class="form-control" name="id" value="<?php echo $data['res'][0]['id']?>">
        <input type="hidden" class="form-control" name="last_task" value="<?php echo $data['res'][0]['task']?>">
        <div class="form-group">
            <label for="inputEmail" class="col-xs-2 control-label">Имя пользователя:</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" placeholder="Введите имя" value="<?php echo $data['res'][0]['name']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-xs-2 control-label">Email:</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" name="email" placeholder="Введите email" value="<?php echo $data['res'][0]['email']?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="col-xs-2 control-label">Текст задания:</label>
            <div class="col-xs-8">
                <textarea rows="5" class="form-control" name="task" placeholder="Введите текст"><?php echo $data['res'][0]['task']?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2" for="defaultChecked2">Статус</label>
            <div class="col-xs-8">
            <input type="checkbox" class="custom-control-input" name="status"
                   <?php if($data['res'][0]['status']==1) echo 'checked'?>
                   >
            </div>

        </div>

        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-4">
                <button type="submit" class="btn btn-default">Сохранить</button>
            </div>
            <div class=" col-xs-4" style="color: red">
                <?php echo $data['error'] ?>
            </div>
        </div>
    </form>
</div>

<script>
    let ar = '<?php echo $data['res'][0]['task']; ?>';
    console.log(ar);
</script>

