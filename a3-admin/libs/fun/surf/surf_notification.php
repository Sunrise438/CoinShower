<?php

//new surf add require approve
//don't edit
   function pendingApprovalSurf(){
        $sql = "SELECT COUNT(id) FROM surf WHERE status = 0 OR  status = 2";
        $result = $GLOBALS['conn']->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
   }
   
   //pending delete
   //don't edit
   function pendingDeleteSurf(){
        $sql = "SELECT COUNT(id) FROM surf WHERE status = 5 ";
        $result = $GLOBALS['conn']->query($sql);
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
   }