<div class="container-fluid">
    <!--faucet-->
    <div class="row">
        <div class="col-lg-3"><?php require 'libs/ads/left_ads.php';?></div>
        <div class="col-lg-6">
            <h1 class="text-center"><?php echo ucfirst($surfName).' '. ucfirst($statisticsName);?></h1>
            <hr>
            
            <?php
            require 'libs/ads/top_ads.php';
            $FLuname = $_SESSION['FLuname'];
                    
            require 'libs/ads/faucet_top_ads.php';
            require 'user_id.php';
            require 'view/theme/'.$themeAction.'/top_bar.php';
            require 'libs/ads/surf_ads.php';
            require 'ctrl/surf/surf/surf_history/surf_history_table.php';
            require 'user_chart/user_chart.php';
            require 'libs/ads/bottom_ads.php';
            ?>
        </div>
        <div class="col-lg-3"><?php require 'libs/ads/right_ads.php';?></div>
    </div>
</div>