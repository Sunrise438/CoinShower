<!-- admin dashboard menu -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class=" fw-bold"><?php echo ucwords($coinsName.' '.$typeName);?></h1>
            <?php
                require 'ctrl/settings/coin_type/coin_type.php';
                require __DIR__.'/coin_type_blade.php';
                require __DIR__.'/change/change_form_modal.php';
            ?>
        </div>
    </div>
</div>