<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($codeName);?></h1>
            <?php
                require __DIR__.'/code_fun.php';
                require __DIR__.'/code_data.php';
                require __DIR__.'/code_select.php';
            ?>
        </div>
    </div>
</div>