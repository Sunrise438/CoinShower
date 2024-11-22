<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($faviconName).' ('. ucfirst($optionalName).')';?></div>
                    <img src="<?php echo $site_info_row['site_url'];?>/image/img/favicon.ico">
                    <p class="text-secondary"><?php echo ucfirst($onlySupportIcoFileName);?> (Ex : favicon.ico)</p>
                </div>
                    <?php 
                    require 'favicon_data.php';
                    require 'favicon_form.php';
                    ?>
            </li>
            
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>
