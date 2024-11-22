<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($surfName).' '. ucfirst($settingsName);?></h1>
            <?php
            require __DIR__.'/surf_settings_class.php';
            require __DIR__.'/surf_settings_data.php';
            require __DIR__.'/surf_settings_info.php';
            ?>
        </div>
    </div>
</div>
