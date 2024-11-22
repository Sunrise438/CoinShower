<?php
/*
 * is payment api
 * important
 */
function isPaymentsAPI($type){
    $sql = "SELECT id FROM api_key WHERE type = '$type' ";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        return 1;
    } else {
        return 0;
    }
}

/*
 * update payment api
 * important
 */
function updatePaymentsAPI($type, $row, $value){
    $sql = "UPDATE api_key SET $row = '$value' WHERE type = '$type' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}

/*
 * add payment api
 * important
 */
function addPaymentsAPI($type, $link = NULL){
    if (!isPaymentsAPI($type)){
        $sql = "INSERT INTO api_key (type, link) VALUES('$type', '$link') ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            return 1;
        } else {
            return 0;
        }
    } else {
        return 1;
    }
}

/*
 * remove payment api
 * important
 */
function removePaymentsAPI($type){
    $sql = "DELETE FROM api_key WHERE type = '$type' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}


/*
 * add payments currency
 */
function addPaymentsCurrency($currency, $method){
    $sql = "INSERT INTO payments_currency"
            . "(currency, method) VALUES('$currency', '$method')";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * remove payments currency
 */
function removePaymentsCurrency($method, $currency = NULL){
    if ($currency == NULL){
        $where = "WHERE method = '$method'";
    } else {
        $where = "WHERE method = '$method' AND currency = '$currency'";
    }
    $sql = "DELETE FROM payments_currency $where";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}