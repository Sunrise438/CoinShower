<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($usersName);?></h1>
            <?php
                require 'users_statistics/users_statistics_fun.php';
                require 'users_statistics/users_statistics.php';
                require 'users_data.php';;
            ?>
        </div>
    </div>
</div>