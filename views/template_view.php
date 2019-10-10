<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

    <script src="/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>

</head>
<body>

<section header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Тестовое задание MVC</a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if (isset($_SESSION['USERNAME'])){
                        echo '<li><a href="/account/logout">Выйти</a></li>';

                    }
                    else{
                        echo '<li><a href="/account/login">Войти</a></li>';
                    }
                    ?>

                </ul>
            </div>

        </div>
    </nav>


</section>

	<?php include 'views/'.$content_view; ?>



</body>
</html>