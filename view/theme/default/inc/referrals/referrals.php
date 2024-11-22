 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucfirst($referralsName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            require requireRefFun();
            require 'ctrl/ref/ref.php';
            require __DIR__.'/ref_info_blade.php';
            require __DIR__.'/ref/ref.php';
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>