 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucwords($createName.' '.$surfName.' '.$campaignName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            if (!$site_info_row['surf_action']){
                header('location:dashboard');
            }
            require 'ctrl/surf/addsurf/addsurf.php';
            require __DIR__.'/addsurf/addsurf.php';
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>