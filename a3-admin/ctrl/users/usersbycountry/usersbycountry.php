<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucwords($usersName.' '.$byName.' '.$countryName);?></h1>
            <?php
                require 'usersbycountry_statistics/usersbycountry_statistics_fun.php';
                require 'usersbycountry_statistics/usersbycountry_statistics.php';
                require 'usersbycountry_map.php';
                require 'usersbycountry_data.php';;
            ?>
        </div>
    </div>
</div>