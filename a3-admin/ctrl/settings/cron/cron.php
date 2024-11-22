<!-- admin settings cron job -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucwords($cronJobName);?></h1>
            <?php  
                require 'cron_info.php';
            ?>
        </div>
    </div>
</div>