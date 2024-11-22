<?php
/*
 * get payments method
 */
function getPaymentsMethod($method = NULL){
    if ($method == NULL){
        $where = "";
    } else {
        $where = "WHERE type = '$method'";
    }
    $sql = "SELECT * FROM api_key $where";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        if ($method == NULL){
            $row_arr = array();
            $i = 0;
            while ($row = $result->fetch_assoc()){
                $row_arr[$i] = $row;
                $i++;
            }
            return $row_arr;
        } else {
            $row = $result->fetch_assoc();
            return $row;
        }
        
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