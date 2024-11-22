<?php 
    ob_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title id="title"></title>
        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="view/theme/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="icon" id="favicon" href="image/img/favicon.ico" >
        <script src="view/theme/js/main.js"></script>
        <script src="js/main.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        
    </head>
    <body style="max-width: 100%;">
        
    <?php
    require 'config/config.php';
    require 'lng/en.php';
    require 'libs/site_info.php';
    require 'libs/theme.php';
    require 'libs/fun/fun.php';
    
    ?>
<script>
    var title = '<?php echo $site_info_row['site_name'];?>';
    document.getElementById('title').innerHTML = title;
</script>

