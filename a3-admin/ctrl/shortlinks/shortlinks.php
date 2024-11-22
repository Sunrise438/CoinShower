<?php
    require 'shortlinks/shortlinks_data.php';
    $active_shortlink = activeShortlink();
    $today_total_shortlinks_views = todayTotalShortlinksViews();
    $today_total_shortlinks_views_ref = todayTotalShortlinksViewsRef();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2">
            <?php require 'view/theme/side_menu.php';?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center"><b><?php echo ucfirst($shortlinksName);?></b></h1>

            <hr>
         <?php    
         if (empty($_GET['t'])){
             require 'shortlinks_top.php';
             require 'shortlinks_table/shortlinks_table_data.php';

         } else {
             if ($_GET['t'] == 'shortlinks'){
                 require 'statistics/shortlinks/shortlinks.php';
             } else {
                 require 'shortlinks_top.php';
                 require 'statistics/statistics.php';

             }    

         }


        if (isset($_GET['a']) && isset($_GET['qid'])){
            $aid = htmlspecialchars(strip_tags(trim($_GET['qid'])));
            $aid = intval($aid);

            //if action pause or play
            if ($_GET['a'] == 'p' or $_GET['a'] == 's'){
                require 'action/action.php';
            }elseif ($_GET['a'] == 'e') {
                require 'action/edit.php';
            }elseif ($_GET['a'] == 'd') {
                require 'action/delete.php';
            }
        }


        if (isset($_GET['pa'])){
            require 'libs/fun/coin_value_usd.php';
            require 'pay_amount_update.php';
            //update coin value
            coinValuUSD();
            //update shortlinks value
            updateShortlinksValue();
            
            header('location:shortlinks');
        }
        ?>

        </div>
    </div>
</div>