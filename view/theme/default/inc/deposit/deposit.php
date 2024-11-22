 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucwords($depositName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            require 'ctrl/deposit/deposit.php';
            if (isset($_GET['t'])){
                require showDepositMethod(test_input($_GET['t']));
            } else {
                require __DIR__.'/deposit_method_list_blade.php';
            }
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>