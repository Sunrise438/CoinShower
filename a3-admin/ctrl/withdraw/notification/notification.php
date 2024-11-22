<?php

session_start();
if(isset($_SESSION['aemail'])){
    
    require '../../../config/config.php';
    require '../../../libs/site_info.php';
    require '../../../lng/en.php';
    require '../../../libs/fun/withdraw/withdraw_notification.php';
   
   $pending_approval_withdraw= pendingApprovalWithdraw();
   if ($pending_approval_withdraw > 0){
       ?>
            <div class="alert alert-success mt-3 mb-3">
                <a href="withdraw?t=withdraw" class="link-success"><strong><?php echo ucfirst($pendingName).' '.ucfirst($withdrawalName);?></strong> <span class="badge bg-success bg-gradient"><?php echo $pending_approval_withdraw;?></span></a>
            </div>
       <?php
   }

}?>