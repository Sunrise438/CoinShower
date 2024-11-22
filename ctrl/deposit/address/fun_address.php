<?php

function getDepositAddress(){
    $FLemail = test_input($_SESSION['FLuname']);
    $sql = "SELECT * FROM fldep_address WHERE FLemail='$FLemail'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
    
}

function createDepositAddress(){
            
    if (getDepositAddress() == 0){
        $FLemail = test_input($_SESSION['FLuname']);
        $site_info_row = $GLOBALS['site_info_row'];
        $ipn_url = $site_info_row['FLsite_url'].'/cpayments_ipn.php';
        $gen_address = getCoinpaymentsCallbackAddress($GLOBALS['selectedCoin'], $ipn_url);
        $dep_address = $gen_address['address'];

        if (isset($gen_address['dest_tag'])){
            $dest_tag = $gen_address['dest_tag'];
        } else {
            $dest_tag = '';
        }
        
        $sql = "INSERT INTO fldep_address (FLemail, FLaddress, FLdest_tag) "
                . "VALUES('$FLemail', '$dep_address', '$dest_tag')";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}
