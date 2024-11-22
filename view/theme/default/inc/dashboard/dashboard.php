 <div class="row">
    <div class="col-xl-2"><?php require requireSideBar();?></div>
    <div class="col-xl-10">
        <div class="col-xl-12"><h2><?php echo ucwords($overviewName);?></h2></div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireTopCode();?>
        </div>
        <div class="col-xl-12">
            <?php 
            $uname = test_input($_SESSION['uname']);
            require requireUserInfo();
            $user_info = userInfoByUsername($uname);
            require __DIR__.'/info/info.php';
            require __DIR__.'/chart/chart.php';
            ?>
            <div class="row">
                <div class="col-xl-8"><?php require 'chart/chart.php';?></div>
            </div>
        </div>
        <div class="col-xl-12 mt-3 mb-3">
            <?php require requireBottomCode();?>
        </div>
    </div>
</div>

