<!-- payments -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"><?php require 'libs/ads/left_ads.php';?></div>
        <div class="col-lg-6">
            <h1 class="text-center"><?php echo ucfirst($paymentsName);?></h1>
            <hr>
            
            <?php require 'payments_table.php';?>
        </div>
        <div class="col-lg-3"><?php require 'libs/ads/right_ads.php';?></div>
    </div>
</div>