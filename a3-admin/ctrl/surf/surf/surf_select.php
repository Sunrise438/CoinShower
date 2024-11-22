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
    }elseif ($_GET['o'] == 'username') {
        $order_type = 'uname';
    }elseif ($_GET['o'] == 'bal') {
        $order_type = 'balance';
    }elseif ($_GET['o'] == 'price') {
        $order_type = 'price';
    }elseif ($_GET['o'] == 'duration') {
        $order_type = 'duration';
    }elseif ($_GET['o'] == 'view') {
        $order_type = 'view';
    }else {
        $order_type = 'id';
    }
    
} else {
    $order_type = 'id';
}

$min_surf_balance = $site_info_row['surf_min_bal'];

if (isset($_GET['t'])){
    if ($_GET['t'] == 'surf'){
        $nsql = "SELECT COUNT(id) FROM surf";
        $sql = "SELECT * FROM surf ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'pending'){
        $nsql = "SELECT COUNT(id) FROM surf WHERE status = 0 OR  status = 2 ";
        $sql = "SELECT * FROM surf WHERE status = 0 OR  status = 2 ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'inactive'){
        $nsql = "SELECT COUNT(id) FROM surf WHERE active = 0";
        $sql = "SELECT * FROM surf WHERE active = 0 ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'active') {
        $nsql = "SELECT COUNT(id) FROM surf WHERE active = 1 AND balance > '$min_surf_balance' ";
        $sql = "SELECT * FROM surf WHERE active = 1 AND balance > '$min_surf_balance' "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'delete') {
        $nsql = "SELECT COUNT(id) FROM surf WHERE status = 5  ";
        $sql = "SELECT * FROM surf WHERE status = 5 "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'user') {
        require 'user_form.php';
        if (isset ($_GET['token'])){
            $uname = test_input($_GET['token']);
        } else {
            $uname = NULL;
        }
        
        $nsql = "SELECT COUNT(id) FROM surf WHERE uname = '$uname' ";
        $sql = "SELECT * FROM surf WHERE uname = '$uname' "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    } else {
        $nsql = "SELECT COUNT(id) FROM surf";
        $sql = "SELECT * FROM surf ORDER BY $order_type $order LIMIT $page,$page_limit";
    }
    
    
    
} else {
    
    
}

$pagename = 'surf';

//pages
require 'interface/pager_parameter.php';

$result = $conn->query($sql);