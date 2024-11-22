<!-- admin dashboard table -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-xl-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-xl-10">
            <h1 class=" fw-bold"><?php echo ucfirst($dashboardName);?></h1>
            <?php
                require 'ctrl/dashboard/dashboard.php';
                require requireStatistics();
                require __DIR__.'/dashboard_top_blade.php';
                require __DIR__.'/dashboard_notification_blade.php';
            ?>
        </div>
    </div>
</div>