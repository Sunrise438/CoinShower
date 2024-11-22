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
        $order_type = 'FLid';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'FLdate';
    }elseif ($_GET['o'] == 'amount') {
        $order_type = 'FLamount';
    }elseif ($_GET['o'] == 'status') {
        $order_type = 'FLstatus';
    }else {
        $order_type = 'FLid';
    }
    
} else {
    $order_type = 'FLid';
}


$nsql = "SELECT COUNT(FLid) FROM fldeposit_history WHERE FLemail = '$FLuname' ";
$sql = "SELECT * FROM fldeposit_history WHERE FLemail = '$FLuname' ORDER BY $order_type $order LIMIT $page,$page_limit";


$pagename = 'deposit';

//pages
require 'interface/pager.php';

$result = $conn->query($sql);