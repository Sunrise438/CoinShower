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
        if ($_GET['t'] == 'withdraw'){
            $order = 'ASC';
        } else {
            $order = 'DESC';
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
    }elseif ($_GET['o'] == 'coin') {
        $order_type = 'coin';
    }elseif ($_GET['o'] == 'address') {
        $order_type = 'address';
    }elseif ($_GET['o'] == 'status') {
        $order_type = 'status';
    }elseif ($_GET['o'] == 'method') {
        $order_type = 'method';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'withdraw'){
        $nsql = "SELECT COUNT(id) FROM withdraw_history WHERE status = 0 ";
        $sql = "SELECT * FROM withdraw_history WHERE status = 0 ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'history'){
        $nsql = "SELECT COUNT(id) FROM withdraw_history ";
        $sql = "SELECT * FROM withdraw_history ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'user') {
        require 'user_form.php';
        if (isset ($_GET['token'])){
            $uname = test_input($_GET['token']);
        } else {
            $uname = NULL;
        }
        
        $nsql = "SELECT COUNT(id) FROM withdraw_history WHERE uname = '$uname' ";
        $sql = "SELECT * FROM withdraw_history WHERE uname = '$uname' "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    } else {
        $nsql = "SELECT COUNT(id) FROM withdraw_history WHERE status = 0 ";
        $sql = "SELECT * FROM withdraw_history WHERE status = 0 ORDER BY $order_type $order LIMIT $page,$page_limit";
    }
    
    
    
} else {
    
    
}

$pagename = 'withdraw';

//pages
require 'interface/pager_parameter.php';

$result = $conn->query($sql);