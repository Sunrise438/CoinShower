<?php require 'turnstile_data.php';?>
<div class="row mt-3 mb-2">
    <div class="col-lg-12">
        <h4>
            <?php echo ucfirst($turnstileName).' '. strtoupper($captchaName);?>
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModalturnstile">
                <i class="bi bi-pencil-square"></i>
            </button>
        </h4>
        
        <div class="row">
            <div class="col-lg-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold"><?php echo ucfirst($siteNameName).' '. ucfirst($keyName);?></div>
                            <span class="badge bg-primary bg-gradient text-dark"><?php echo $turnstile_site_key;?></span>
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
                            <span class="badge bg-primary bg-gradient text-dark"><?php echo $turnstile_secret_key;?></span>
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
                                if ($turnstile_action == 1){
                                    echo '<span class="badge bg-primary bg-gradient text-dark">'.ucfirst($enabledName).'</span>';
                                } else {
                                    echo '<span class="badge bg-secondary bg-gradient text-dark">'.ucfirst($disabledName).'</span>';
                                }
                                ?>
                        </div> 
                        <?php require 'turnstile_form_action.php';?>
                    </li>
                </ol>
            </div>
            <div class="col-lg-6">
                
            </div>
        </div>
        
    </div>
</div>
<?php require 'turnstile_form_modal.php';?>