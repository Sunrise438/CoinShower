<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($faucetName);?></h1>
            <?php
                require requireUserInfo();
                require 'earn_data/users_data.php';
                require 'earn_info.php';
            ?>
        </div>
    </div>
</div>