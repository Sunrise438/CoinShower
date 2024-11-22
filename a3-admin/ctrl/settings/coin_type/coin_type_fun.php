<?php

/*
 * get payments currency
 */
function getPaymentsCurrency($order_type = '', $order=''){
    if ($order_type != '' && $order != ''){
        $where = "ORDER BY $order_type $order";
    } else {
        $where = "ORDER BY method, currency ASC";
    }
    $page_limit = $GLOBALS['site_info_row']['page_limit'];
    $sql = "SELECT * FROM payments_currency $where ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $menu_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $menu_arr[$i] = $row;
            $i++;
        }
        return $menu_arr;
    } else {
        return 0;
    }
}

/*
 * change payments currency
 */
function changePaymentsCurrencyStatus($id, $value, $dep_status, $wid_status){
    $sql = "UPDATE payments_currency SET "
            . "rate = '$value', "
            . "dep_status = '$dep_status', "
            . "wid_status = '$wid_status' "
            . "WHERE id = '$id'";
    if($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}