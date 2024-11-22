<div class="row mt-2 mb-2">
    <div class="col-lg-8">
        <ol class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucfirst($maintenanceName).' '. ucfirst($modeName);?></div>
                    <?php 
                        if ($site_info_row['maintenance_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require 'maintenance_data.php';
                    require 'maintenance_form.php';
                    ?>
            </li>
        </ol>
    </div>
    <div class="col-lg-4"></div>
</div>
