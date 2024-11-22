<?php
//gage name
if(isset($_GET['o']) && isset($_GET['q'])){
    $parameter = 'o='.$_GET['o'].'&q='.$_GET['q'].'&';
} else {
    $parameter = '';
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
    }elseif ($_GET['o'] == 'email') {
        $order_type = 'uname';
    }elseif ($_GET['o'] == 'login') {
        $order_type = 'log_token';
    }elseif ($_GET['o'] == 'status') {
        $order_type = 'status';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }elseif ($_GET['o'] == 'country') {
        $order_type = 'country_code';
    }elseif ($_GET['o'] == 'ip') {
        $order_type = 'login_ip';
    }else {
        $order_type = 'date';
    }
    
} else {
    $order_type = 'date';
    
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'active'){
        $where = 'WHERE status = 1';
    }elseif ($_GET['t'] == 'ban'){
        $where = 'WHERE status = 0';
    }elseif ($_GET['t'] == 'today'){
        $where = 'WHERE date > CURDATE()';
    } else {
        $where = '';
    }
    
} else {
    $where = '';
}

$nsql = "SELECT COUNT(id) FROM log_tok $where ";
$sql = "SELECT * FROM log_tok $where ORDER BY $order_type $order LIMIT $page,$page_limit";

$pagename = 'users_login_session';

//pages
require 'interface/pager_parameter.php';


$result = $conn->query($sql);