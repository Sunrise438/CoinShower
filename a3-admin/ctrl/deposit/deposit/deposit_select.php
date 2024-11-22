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
    if (isset($_GET['t'])){
        if ($_GET['t'] == 'deposit'){
            $order = 'DESC';
        }elseif ($_GET['t'] == 'history'){
            $order = 'DESC';
        }elseif ($_GET['t'] == 'user'){
            $order = 'DESC';
        } else {
            $order = 'ASC';
        }
        
    } else {
        $order = 'DESC';
    }
    
}

//check order type
if (isset($_GET['o'])){
    if ($_GET['o'] == 'id'){
        $order_type = 'id';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }elseif ($_GET['o'] == 'username') {
        $order_type = 'uname';
    }elseif ($_GET['o'] == 'amount') {
        $order_type = 'amount';
    }elseif ($_GET['o'] == 'method') {
        $order_type = 'method';
    }elseif ($_GET['o'] == 'status') {
        $order_type = 'status';
    }elseif ($_GET['o'] == 'txid') {
        $order_type = 'tx_id';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'deposit'){
        $where = 'WHERE date > CURDATE()';
    }elseif ($_GET['t'] == 'history'){
        $where = '';
    }elseif ($_GET['t'] == 'user') {
        require 'user_form.php';
        if (isset ($_GET['token'])){
            $uname = test_input($_GET['token']);
            $where = "WHERE uname = '$uname'";
        } else {
            $where = '';
        }
        
    } else {
        $where = 'WHERE date > CURDATE()';
    }
}

$nsql = "SELECT COUNT(id) FROM deposit_history $where ";
$sql = "SELECT * FROM deposit_history $where ORDER BY $order_type $order LIMIT $page,$page_limit";


$pagename = 'deposit';

//pages
require 'interface/pager_parameter.php';

$result = $conn->query($sql);