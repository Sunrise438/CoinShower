<?php
/*
 * get payments method
 */
function getPaymentsMethod($type = NULL){
    if ($type != NULL){
        if ($type == 'withdraw'){
            $where = "WHERE wid_action = 1";
        }elseif ($type == 'deposit') {
            $where = "WHERE dep_action = 1";
        }
    }
    $sql = "SELECT * FROM api_key $where";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $row_arr[$row['type']] = $row;
            $i++;
        }
        return $row_arr;
    } else {
        return 0;
    }
}

$withdraw_method = getPaymentsMethod('withdraw');
$deposit_method = getPaymentsMethod('deposit');

/*
 * list payments currency
 */
function getPaymentsCurrency($method, $type){
    if ($type == 'withdraw'){
        $type = "AND wid_status = 1";
    } else if($type == 'deposit'){
        $type = "AND dep_status = 1";
    } else {
        $type = "";
    }
    $sql = "SELECT * FROM payments_currency WHERE method = '$method' $type ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $row_arr[$row['currency']] = $row;
            $i++;
        }
        return $row_arr;
    } else {
        return 0;
    }
}

/*
 * calculate currency value
 */
function calculatePaymentsCurrencyValue($method, $currency, $amount){
    $sql = "SELECT rate FROM payments_currency "
            . "WHERE currency = '$currency' AND method = '$method'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $amount*$GLOBALS['selectedCoin_value']/$row['rate'];
    } else {
        return 0;
    }
}

/*
 * calculate site currency value
 */
function calculatePaymentsSiteCurrencyValue($method, $currency, $amount){
    $sql = "SELECT rate FROM payments_currency "
            . "WHERE currency = '$currency' AND method = '$method'";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $amount/$row['rate']*$GLOBALS['selectedCoin_value'];
    } else {
        return 0;
    }
}