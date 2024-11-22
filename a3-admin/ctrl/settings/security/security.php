<!-- admin settings cookies -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($securityName);?></h1>
            <?php  
                require 'security_fun.php';
                require 'security_data.php';
                require 'security_info.php';
            ?>
        </div>
    </div>
</div>