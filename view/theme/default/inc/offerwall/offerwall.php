 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucfirst($offerwallName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_offerwall_top.php';?>
        </div>
        <div class="col-xl-12">
            <?php 
            if (!$site_info_row['offerwall_action']){
                header('location:dashboard');
            }
            require 'ctrl/offerwall/offerwall.php';
            if (empty($_GET['offer'])) {
                require __DIR__.'/offerwall_list_blade.php';
            }
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_offerwall_bottom.php';?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>