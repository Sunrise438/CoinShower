<?php

//new withdraw add require approve
//don't edit
   function pendingApprovalWithdraw(){
        $sql = "SELECT COUNT(id) FROM withdraw_history WHERE status = 0 ";
        $result = $GLOBALS['conn']->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
   }