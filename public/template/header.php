<?php session_start();?>
<!DOCTYPE html >
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Php Chat</title>

    <!-- Bootstrap -->

    <link href="public/css/login_style.css" rel="stylesheet" >
    <link href="public/css/chat.css" rel="stylesheet" >
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-route.js"></script>

    <script src="app.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body  ng-app="app" ng-controller="MainCtrl">
<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#chat">Chat App</a>
            </div>

            <ul class="nav navbar-nav navbar-right">



                <?php  if($_SESSION["login"]){ ?>
                    <li><a href=""><i class="fa fa-home"></i>  <span class="label label-info"><?php  echo $_SESSION["login"] ?></span></a></li>
                    <li><a href="" ng-click="destroy_session()" ><i class="fa fa-home"></i>  <span class="label label-danger"> Закончить сесию</span></a></li>
                <?php } else {?>

                <li><a href="#login"><i class="fa fa-shield"></i> Login</a></li>
                <li><a href="#register"><i class="fa fa-comment"></i> Register</a></li>
                <?php }?>
                <li><a href="#chat"><i class="fa fa-home"></i> Chat</a></li>
            </ul>
        </div>
    </nav>
</header>