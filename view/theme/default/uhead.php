<?php 
ob_start();
require 'libs/fun/fun/cookies/cookies.php';
require 'libs/site_info.php';
require 'view/language/en.php';
require 'libs/fun/fun.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $site_info_row['description'];?>">
        <meta name="keywords" content="<?php echo $site_info_row['keywords'];?>">
        <meta name="author" content="<?php echo $site_info_row['author'];?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="title"><?php echo $site_info_row['site_name'];?></title>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="stylesheet" href="view/theme/default/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="icon" id="favicon" href="image/img/favicon.ico" >
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit"></script>   
        <?php require_once requireHeadCode();?>
    </head>
    
    <body class="pt-5 mt-3">
<?php
    