<div class="row">
    <div class="col-lg-6">
        <ol class="list-group">
            
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($countryName.' '.$codeName.' '.$checkName);?></div>
                    <?php 
                        if ($site_info_row['country_code_check_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require 'security_country_code_check_action_form.php';
                    ?>
            </li>

        </ol>
    </div>
    <div class="col-lg-6"></div>
</div>
