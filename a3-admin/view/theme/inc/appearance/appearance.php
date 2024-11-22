<!-- admin appearance  -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($appearanceName);?></h1>
            <?php
            require 'ctrl/settings/appearance/appearance.php';
            if (isset($_GET['settings'])){
                if (is_file('../view/theme/'.$themeAction.'/settings.php')){
                    require '../view/theme/'.$themeAction.'/settings.php';
                }
            }else if (isset($_GET['activate'])){
                if (is_dir('../view/theme/'.$_GET['activate'].'/')){
                    require __DIR__.'/activate_blade.php';
                }
                
            } else {
                require __DIR__.'/appearance/new/new.php';
                require __DIR__.'/appearance/appearance.php';
            }
            ?>
        </div>
    </div>
</div>