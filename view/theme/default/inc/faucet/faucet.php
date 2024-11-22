 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo strtoupper($selectedCoin).' '. ucfirst($faucetName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            if (!$site_info_row['faucet_action']){
                header('location:dashboard');
            }
            require 'ctrl/faucet/faucet/faucet.php';
            if (checkClaimTime()){
                require __DIR__.'/faucet_claim_form.php';
            } else {
                require __DIR__.'/count_down_timer.php';
            }
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>

