<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($nameName);?></div>
                    <h5><span class="badge bg-primary text_dark"><?php echo $site_info_row['site_name'];?></span></h5>
                </div>
                    <?php 
                    require 'site_info_data.php';
                    require 'site_info_form_site_name.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($urlName);?></div>
                    <h5><span class="badge bg-primary text_dark"><?php echo $site_info_row['site_url'];?></span></h5>
                    <p class="text-secondary">Ex : https://exsample.com</p>
                </div>
                    <?php 
                    require 'site_info_form_site_url.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>

<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($logoName).'';?></div>
                    <img src="<?php echo $site_info_row['site_url']?>/image/img/logo.png" height="40px">
                    <?php 
                        if ($site_info_row['logo_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                    <p class="text-secondary"><?php echo ucfirst($onlySupportPngImageName);?> (Ex : logo.png)</p>
                </div>
                    <?php 
                    require 'site_info_logo_action_data.php';
                    require 'site_info_logo_data.php';
                    require 'site_info_form_logo.php';
                    ?>
            </li>
            
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>
