<!-- admin plugins -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($pluginsName);?></h1>
            <?php
            require 'ctrl/settings/plugins/plugins.php';
            require 'ctrl/settings/plugins/new/new.php';
            if (!isset($_GET['activate'])){
                require __DIR__.'/new_blade.php';
                require __DIR__.'/plugins_blade.php';
            } else {
                require __DIR__.'/activate_blade.php';
            }
            
            ?>
        </div>
    </div>
</div>