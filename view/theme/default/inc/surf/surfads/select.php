<?php


/*
 * gage name
 */
if(isset($_GET['o']) && isset($_GET['q'])){
    $parameter = '&o='.$_GET['o'].'&q='.$_GET['q'].'&';
} else {
    $parameter = '';
}

if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $parameter = $parameter.'&t='.$_GET['t'].'&token='.$_GET['token'].'&';
    } else {
        $parameter = $parameter.'&='.$_GET['t'].'&';
    }
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
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }elseif ($_GET['o'] == 'campaign') {
        $order_type = 'surf_id';
    }elseif ($_GET['o'] == 'bal') {
        $order_type = 'balance';
    }elseif ($_GET['o'] == 'payout') {
        $order_type = 'payout';
    }elseif ($_GET['o'] == 'app') {
        $order_type = 'app_id';
    }elseif ($_GET['o'] == 'subid') {
        $order_type = 'sub_id';
    }elseif ($_GET['o'] == 'ip') {
        $order_type = 'ip';
    }elseif ($_GET['o'] == 'status') {
        $order_type = 'status';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

$result = getcampaignSurf($page, $order_type, $order);