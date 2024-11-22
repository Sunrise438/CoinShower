<!-- surf -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($shortlinksName).' '. ucfirst($historyName);?></h1>
            <?php
                //surf history
                require 'history_data.php';
            ?>
        </div>
    </div>
</div>