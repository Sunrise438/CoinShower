 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucfirst($accountName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            require 'ctrl/account/account.php';
            if (empty($_SESSION['uname'])){
                require __DIR__.'/account_change_uname_form.php';
            } else {
                require 'libs/country.php';
                require __DIR__.'/account_blade.php';
            }
            ?>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>
