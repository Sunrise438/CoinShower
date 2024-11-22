 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucfirst($shortlinksName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_shortlinks_top.php';?>
        </div>
        <div class="col-xl-12">
            <?php 
            if (!$site_info_row['shortlinks_action']){
                header('location:dashboard');
            }
            require 'ctrl/shortlinks/shortlinks.php';
            require __DIR__.'/shortlinks_blade.php';
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_shortlinks_bottom.php';?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>