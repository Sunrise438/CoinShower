 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucfirst($surfName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_surf_top.php';?>
        </div>
        <div class="col-xl-12">
            <?php 
            if (!$site_info_row['surf_action']){
                header('location:dashboard');
            }
            require 'ctrl/surf/surf/surf.php';
            if (checkSurfCookie()){
                 require __DIR__.'/surf_blade.php';
            } else {
                require __DIR__.'/recap_form.php';
            }
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require_once 'view/theme/'.$themeAction.'/inc/code/code_surf_bottom.php';?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>

