<?php


/*
 * gage name
 */
if(isset($_GET['o']) && isset($_GET['q'])){
    $parameter = '&o='.$_GET['o'].'&q='.$_GET['q'].'&';
} else {
    $parameter = '';
}
/*
 * check order
 */
if (isset($_GET['q'])){
    if ($_GET['q'] == 'asc'){
        $order = 'ASC';
    } else {
        $order = 'DESC';
    }
    
} else {
    $order = 'DESC';
}

/*
 * check order type
 */
if (isset($_GET['o'])){
    if ($_GET['o'] == 'coin'){
        $order_type = 'currency';
    }elseif ($_GET['o'] == 'value') {
        $order_type = 'rate';
    }elseif ($_GET['o'] == 'method') {
        $order_type = 'method';
    }elseif ($_GET['o'] == 'dep_status') {
        $order_type = 'dep_status';
    }elseif ($_GET['o'] == 'wid_status') {
        $order_type = 'wid_status';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

$result = getPaymentsCurrency($order_type, $order);
