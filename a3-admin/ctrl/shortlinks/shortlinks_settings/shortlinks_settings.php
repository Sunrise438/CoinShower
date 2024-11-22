<!-- admin dashboard shortlinks settings -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($shortlinksName).' '. ucfirst($settingsName);?></h1>
            <?php
            require __DIR__.'/shortlinks_settings_data.php';
            require __DIR__.'/shortlinks_settings_action_form.php';
            ?>
        </div>
    </div>
</div>
