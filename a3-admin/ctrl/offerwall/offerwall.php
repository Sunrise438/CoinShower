<!-- offerwall -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($offerwallName);?></h1>
            <?php
                //offerwall
                require 'libs/fun/user/user_info.php';
                require 'offerwall/earn_data/users_data.php';
                if (isset($_GET['t'])){
                    if ($_GET['t'] == 'clear'){
                        require 'clear/clear.php';
                    } else {
                        require 'offerwall_history/offerwall_history.php';
                    }
                    
                } else {
                    require 'offerwall/offerwall.php';
                }
            ?>
        </div>
    </div>
</div>