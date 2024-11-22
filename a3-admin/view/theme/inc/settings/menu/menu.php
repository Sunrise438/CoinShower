<!-- admin dashboard menu -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class=" fw-bold"><?php echo ucwords($menuName);?></h1>
            <?php
                require 'ctrl/settings/menu/menu.php';
                require __DIR__.'/menu_blade.php';
            ?>
        </div>
    </div>
</div>