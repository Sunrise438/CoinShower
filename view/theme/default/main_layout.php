<div class="container-fluid mt-3 mb">
    
    
    <?php 
        require requireStatistics();
        require __DIR__.'/inc/layout/login_blade.php';
        require __DIR__.'/inc/layout/tasks_blade.php';
        
        $grid = $site_info_row['faucet_action'] + $site_info_row['surf_action'] + $site_info_row['shortlinks_action'] + $site_info_row['offerwall_action'];
        
        if ($grid == 4){
            $grid_s = 6;
        }elseif ($grid == 3) {
            $grid_s = 4;
        }elseif ($grid == 2) {
            $grid_s = 6;
        }elseif ($grid == 1) {
            $grid_s = 12;
        }
    ?>

    <div class="container">
        <div class="row">
        <?php if ($site_info_row['faucet_action']){?>
            
            <div class="<?php echo 'col-lg-'.$grid_s;?> p-3">
                <div class="row border border border-2 mt-2 mb-2 p-3">
                    <div class="col-lg-4">
                        <p class="text-center"><img class="rounded-circle" src="image/img/faucet.png" height="100px"></p>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="text-center text-dark">
                            <?php echo strtoupper($selectedCoin).' '.ucfirst($faucetName);?>
                        </h2>
                        <p class="text-center text-secondary"><?php echo ucfirst($claimFreeCryptoCurrenciesName);?></p>
                    </div>
                </div>
            </div>
        
        <?php }
            if ($site_info_row['surf_action']){?>
            
            <div class="<?php echo 'col-lg-'.$grid_s;?> p-3">
                <div class="row border border border-2 mt-2 mb-2 p-3">
                    <div class="col-lg-4">
                        <p class="text-center"><img class="rounded-circle" src="image/img/surf.png" height="100px"></p>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="text-center text-dark">
                            <?php echo ucfirst($surfName);?>
                        </h2>
                        <p class="text-center text-secondary"><?php echo ucfirst($earnFreeCryptoByViewingAdsName);?></p>
                    </div>
                </div>
            </div>
        
        <?php }
            if ($site_info_row['shortlinks_action']){?>
            
            <div class="<?php echo 'col-lg-'.$grid_s;?> p-3">
                <div class="row border border border-2 mt-2 mb-2 p-3">
                    <div class="col-lg-4">
                        <p class="text-center"><img class="rounded-circle" src="image/img/shortlinks.png" height="100px"></p>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="text-center text-dark">
                            <?php echo ucfirst($shortlinksName);?>
                        </h2>
                        <p class="text-center text-secondary"><?php echo ucfirst($getFreeCryptoByViewingLinksName);?></p>
                    </div>
                </div>
            </div>
        
        <?php }
        
            if ($site_info_row['offerwall_action']){?>
            
            <div class="<?php echo 'col-lg-'.$grid_s;?> p-3">
                <div class="row border border border-2 mt-2 mb-2 p-3">
                    <div class="col-lg-4">
                        <p class="text-center"><img class="rounded-circle" src="image/img/offerwall.png" height="100px"></p>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="text-center text-dark">
                            <?php echo ucfirst($offerwallName);?>
                        </h2>
                        <p class="text-center text-secondary"><?php echo ucfirst($getFreeCryptoByDoingSmallTasksName);?></p>
                    </div>
                </div>
            </div>
        
        <?php }?>
        </div>
    </div>
    
</div>