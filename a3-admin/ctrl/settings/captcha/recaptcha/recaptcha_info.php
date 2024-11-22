<?php require 'recaptcha_data.php';?>
<div class="row mt-3 mb-2">
    <div class="col-lg-12">
        <h4>
            <?php echo ucfirst($googleName).' '. $reCaptchaName.' v2';?>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModalrecap">
                <i class="bi bi-pencil-square"></i>
            </button>
        </h4>
        
        <div class="row">
            <div class="col-lg-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($keyName);?></div>
                            <span class="badge bg-primary bg-gradient text-dark"><?php echo $grecap_site_key;?></span>
                        </div>   
                    </li>
                </ol>
            </div>
        </div>
                
        <div class="row">
            <div class="col-lg-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo ucfirst($secretName).' '. ucfirst($keyName);?></div>
                            <span class="badge bg-primary bg-gradient text-dark"><?php echo $grecap_secret_key;?></span>
                        </div>           
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start mb-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo ucfirst($actionName);?></div>
                            
                                <?php 
                                if ($grecap_action == 1){
                                    echo '<span class="badge bg-primary bg-gradient text-dark">'.ucfirst($enabledName).'</span>';
                                } else {
                                    echo '<span class="badge bg-secondary bg-gradient text-dark">'.ucfirst($disabledName).'</span>';
                                }
                                ?>
                        </div> 
                        <?php require 'recaptcha_form_action.php';?>
                    </li>
                </ol>
            </div>
            <div class="col-lg-6">
                
            </div>
        </div>
        
    </div>
</div>
<?php require 'recaptcha_form_modal.php';?>