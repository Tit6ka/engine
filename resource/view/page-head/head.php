<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="author" content="dvketdeat">
        <title><?=$title;?></title>
        <link href="/resource/assets/img/union.png" rel="shortcut icon">
        <link href="/resource/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/resource/assets/css/toastr.min.css" rel="stylesheet">
        <link href="/resource/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="/resource/assets/css/site.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    <header class="navbar navbar-default">
        <nav class="navbar navbar-nav-main">
            <div class="navbar-toggle-span toggle-aside"><i class="fa fa-bars"></i></div>
            <div class="navbar-logo-span"><img src="/resource/assets/img/union.png">Union RolePlay</div>
            <div class="navbar-toggle-span toggle-collapse" data-toggle="collapse" data-target=".nav-toggle-collapses"><i class="fa fa-bars"></i></div>
            <ul class="nav navbar-nav navbar-collapse nav-toggle-collapses collapse">
                <li>
                    <a href="#" data-toggle="dropdown">Статистика</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Основное</li>
                        <li><a href="#">Настройки</a></li>
                        <li><a href="#">Личный кабинет</a></li>
                        <li><a href="#">Донат</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Выход</a></li>
                    </ul>
                </li>
                <li><a href="bootstraptheme.php">Вход</a></li>
                <li>
                    <a href="#" data-toggle="dropdown">Jamie_Test</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-header">Основное</li>
                        <li><a href="#">Настройки</a></li>
                        <li><a href="#">Личный кабинет</a></li>
                        <li><a href="#">Донат</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Выход</a></li>
                    </ul>
                </li>
            </ul>
            <div style="clear: both"></div>
        </nav>
    </header>

    <aside class="aside-bar full">
        <ul class="aside-bar-ul">
            <li><a href="/" class="active"><i class="fa fa-home fa-fw"></i><span class="fadeIn">Главная</span></a></li>
            <li><a href="/forum"><i class="fa fa-commenting-o fa-fw"></i><span class="fadeIn">Форум</span></a></li>
            <li><a href="/profile"><i class="fa fa-user fa-fw"></i><span class="fadeIn">Профиль</span></a></li>
            <li>
                <a href="#" data-toggle-ul="1" class="toggle-ul">
                    <i class="fa fa-pie-chart fa-fw"></i>
                    <span class="fadeIn">Мониторинг</span>
                </a>
                <ul data-toggle-ul-s="1" class="slideLeft">
                    <li><a href="/monitorign/server"><i class="fa fa-server fa-fw"></i><span class="fadeIn">Статус серверов</span></a></li>
                    <li><a href="/monitorign/online"><i class="fa fa-users fa-fw"></i><span class="fadeIn">Игроки онлайн</span></a></li>
                    <li><a href="/monitorign/rating"><i class="fa fa-area-chart fa-fw"></i><span class="fadeIn">Рейтинги</span></a></li>
                    <li><a href="/monitorign/found"><i class="fa fa-briefcase fa-fw"></i><span class="fadeIn">Организации</span></a></li>
                </ul>
            </li>
            <li><a href="/map"><i class="fa fa-map-marker fa-fw"></i><span class="fadeIn">Карта</span></a></li>
            <li>
                <a href="#" data-toggle-ul="2" class="toggle-ul ">
                    <i class="fa fa-usd fa-fw"></i>
                    <span class="fadeIn">Деньги</span>
                </a>
                <ul data-toggle-ul-s="2" class="slideLeft">
                    <li><a href="/donate"><i class="fa fa-money fa-fw"></i><span class="fadeIn">Донат</span></a></li>
                    <li><a href="/sart"><i class="fa fa-gamepad fa-fw"></i><span class="fadeIn">Азарт</span></a></li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle-ul="3" class="toggle-ul ">
                    <i class="fa fa-users fa-fw"></i>
                    <span class="fadeIn">Общение</span>
                </a>
                <ul data-toggle-ul-s="3" class="slideLeft">
                    <li><a href="/chat"><i class="fa fa-comment fa-fw"></i><span class="fadeIn">Чат</span></a></li>
                    <li><a href="/radio"><i class="fa fa-volume-up fa-fw"></i><span class="fadeIn">Радио</span></a></li>
                </ul>
            </li>
            <li class="aside-bar-li-empty"><hr></li>
            <li><a href="/start"><i class="fa fa-keyboard-o fa-fw"></i><span class="fadeIn">Как начать играть</span></a></li>
            <li><a href="/about"><i class="fa fa-info fa-fw"></i><span class="fadeIn">О нас</span></a></li>
            <li><a href="/issue"><i class="fa fa-life-ring fa-fw"></i><span class="fadeIn">Тех. поддержка</span></a></li>
        </ul>
        <div class="aside-bar-controller">
            <span><i class="fa fa-hand-o-up"></i></span>
            <span><i class="fa fa-hand-o-down"></i></span>
        </div>
    </aside>
        <?include $content;?>
    </body>

    <script src="/resource/assets/js/jquery.min.js"></script>
    <script src="/resource/assets/js/bootstrap.min.js"></script>
    <script src="/resource/assets/js/toastr.min.js"></script>
    <script src="/resource/assets/js/jquery.slimscroll.min.js"></script>
    <script src="/resource/assets/js/site.js"></script>
</html>