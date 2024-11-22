<!-- seo -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo strtoupper($seoName);?></h1>
            <?php  
                require 'seo_info.php';
                require 'seo_data.php';
                require 'seo_form.php'
            ?>
        </div>
    </div>
</div>