                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <!-- admin settings -->
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-lg-2">
           <?php require 'view/theme/side_menu.php'; ?>
        </div>
        <div class="col-lg-10">
            <h1 class="text-center fw-bold"><?php echo ucfirst($settingsName);?></h1>
            <?php
                require 'maintenance/maintenance.php';
                require 'site_info/site_info.php';
                require 'favicon/favicon.php';
                require 'page/page_limit/page_limit.php';
                if (is_dir('../install/')){
                    if (get_url_hostname($_SERVER['SERVER_NAME']) != 'localhost'){
                        deleteDirectory('../install/');
                    }
                }
            ?>
        </div>
    </div>
</div>