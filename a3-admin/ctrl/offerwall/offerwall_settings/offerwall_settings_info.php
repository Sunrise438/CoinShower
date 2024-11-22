<div class="row">
    <div class="col-xl-6">
        <ul class="list-group">
        <!-- surf status -->
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($offerwallName.' '.$statusName);?></div>
                    <?php 
                        if ($site_info_row['offerwall_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                    require __DIR__.'/offerwall_settings_form_action.php';
                    ?>
            </li>
        </ul>
    </div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-lg-4">
        <?php 
            require 'offerwall_settings_activate_form.php'; 
        ?>
    </div>
    <div class="col-lg-6"></div>
</div>

<div class="row mt-3 mb-3">
    <div class="col-lg-12">
        <?php 
            require 'offerwall_api/offerwall_api.php';
        ?>
    </div>
</div>

<script src="ctrl/offerwall/offerwall_settings/js/js.js"></script>