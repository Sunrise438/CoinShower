<?php


//gage name
if(isset($_GET['o']) && isset($_GET['q'])){
    $parameter = 'o='.$_GET['o'].'&q='.$_GET['q'].'&';
} else {
    $parameter = '&';
}

if (isset($_GET['t'])){
    if (isset($_GET['token'])){
        $parameter = $parameter.'t='.$_GET['t'].'&token='.$_GET['token'].'&';
    } else {
        $parameter = $parameter.'t='.$_GET['t'].'&';
    }
    
}


//check order
if (isset($_GET['q'])){
    if ($_GET['q'] == 'asc'){
        $order = 'ASC';
    } else {
        $order = 'DESC';
    }
    
} else {
    $order = 'DESC';
}

//check order type
if (isset($_GET['o'])){
    if ($_GET['o'] == 'id'){
        $order_type = 'id';
    }elseif ($_GET['o'] == 'amount') {
        $order_type = 'pay_amount';
    }elseif ($_GET['o'] == 'usd') {
        $order_type = 'usd_amount';
    }elseif ($_GET['o'] == 'view') {
        $order_type = 'view';
    }elseif ($_GET['o'] == 'limit') {
        $order_type = 'limit';
    }elseif ($_GET['o'] == 'link') {
        $order_type = 'link';
    }elseif ($_GET['o'] == 'shortlinks') {
        $order_type = 'shortlinks';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

$nsql = "SELECT COUNT(id) FROM shortlinks";
$sql = "SELECT * FROM shortlinks ORDER BY $order_type $order LIMIT $page,$page_limit";   

$pagename = 'shortlinks';

//pages
require 'interface/pager_parameter.php';

$result = $conn->query($sql);