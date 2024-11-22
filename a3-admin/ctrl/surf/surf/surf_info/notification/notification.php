<?php

session_start();
if(isset($_SESSION['aemail'])){
    
    require '../../../../../config/config.php';
    require '../../../../../libs/site_info.php';
    require '../../../../../lng/en.php';
    require '../../../../../libs/fun/surf/surf_notification.php';
   
   $pending_approval_surf = pendingApprovalSurf();
   if ($pending_approval_surf > 0){
       ?>
            <div class="alert alert-success mt-3 mb-3">
                <a href="surf?t=pending" class="link-success"><strong><?php echo ucfirst($pendingSurfAdsApprovalName);?></strong> <span class="badge bg-success bg-gradient"><?php echo $pending_approval_surf;?></span></a>
            </div>
       <?php
   }
   
   $pending_delete_surf = pendingDeleteSurf();
   if ($pending_delete_surf > 0){
       ?>
            <div class="alert alert-danger mt-3 mb-3">
                <a href="surf?t=delete" class="link-danger"><strong><?php echo ucfirst($pendingSurfAdsDeleteName);?></strong> <span class="badge bg-danger bg-gradient"><?php echo $pending_delete_surf;?></span></a>
            </div>
       <?php
   }
}?>