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
    if ($_GET['o'] == 'id'){
        $order_type = 'id';
    }elseif ($_GET['o'] == 'ref_email') {
        $order_type = 'ref_email';
    }elseif ($_GET['o'] == 'faucet') {
       $order_type = 'faucet_amount';       
    }elseif ($_GET['o'] == 'surf') {
       $order_type = 'surf_amount';     
    }elseif ($_GET['o'] == 'shortlinks') {
       $order_type = 'shortlinks_amount';
    }elseif ($_GET['o'] == 'offerwall') {
       $order_type = 'offerwall_amount'; 
    }elseif ($_GET['o'] == 'refbuysell') {
       $order_type = 'buysell_amount';
    }elseif ($_GET['o'] == 'price') {
        $order_type = 'buysell_price';
    }elseif ($_GET['o'] == 'action') {
        $order_type = 'buysell_status';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }else {
        $order_type = 'id';
    }
    
} else {
        $order_type = 'id';
    
}

$user_id = $user_info['id'];
$where = "WHERE uname = '$user_id'";
$order = "ORDER BY $order_type $order";
$result = selectTable('ref', '*', $page, $where, $order);
