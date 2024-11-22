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
    }elseif ($_GET['o'] == 'tot') {
        $order_type = 'COUNT(id)';
    }elseif ($_GET['o'] == 'ac') {
        $order_type = 'bal';
    }elseif ($_GET['o'] == 'pb') {
        $order_type = 'p_bal';
    }elseif ($_GET['o'] == 'earn') {
        $order_type = 'earned, earned_surf, earned_shortlink, earned_offerwall, earned_buysell';
    }elseif ($_GET['o'] == 'ref_earn') {
        $order_type = 'ref_earned, earned_surf_ref, earned_shortlink_ref, earned_offerwall_ref, earned_buysell_ref';
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }elseif ($_GET['o'] == 'country') {
        $order_type = 'country_code';
    }elseif ($_GET['o'] == 'ip') {
        $order_type = 'login_ip';
    }else {
        if (isset($_GET['t'])){
            $order_type = 'id';
        } else {
           $order_type = 'COUNT(id)'; 
        }
    }
    
} else {
    if (isset($_GET['t'])){
        $order_type = 'id';
    } else {
       $order_type = 'COUNT(id)'; 
    }
    
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'active'){
        $where = 'WHERE status = 1';
    }elseif ($_GET['t'] == 'ban'){
        $where = 'WHERE status = 0';
    }elseif ($_GET['t'] == 'today'){
        $where = 'WHERE date > CURDATE()';
    } else {
        $where = 'GROUP BY country_code';
    }
    
} else {
    $where = 'GROUP BY country_code';
}

if (empty($_GET['t'])){
    
    $nsql = "SELECT COUNT(id) FROM users $where ";
    $sql = "SELECT COUNT(id), country_code FROM users $where ORDER BY $order_type $order";
    
} else {
    $nsql = "SELECT COUNT(id) FROM users $where ";
    $sql = "SELECT * FROM users $where ORDER BY $order_type $order LIMIT $page,$page_limit";
}

$pagename = 'usersbycountry';

//pages
require 'interface/pager_parameter.php';


$result = $conn->query($sql);