<!-- ref -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($referralsName);?></h1>
            <?php
                //ref
                require 'libs/fun/user/user_info.php';
                require 'libs/fun/user/today_earned.php';
                require 'ref_data.php';
            ?>
        </div>
    </div>
</div>