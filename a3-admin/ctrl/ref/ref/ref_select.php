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
    }elseif ($_GET['o'] == 'countid') {
        $order_type = 'COUNT(id)';
    }elseif ($_GET['o'] == 'ref') {
        $order_type = 'ref_uname';
    }elseif ($_GET['o'] == 'user') {
        $order_type = 'uname';
    }elseif ($_GET['o'] == 'username') {
        $order_type = 'uname';
    }elseif ($_GET['o'] == 'faucet') {
        if (isset($_GET['t'])){
           $order_type = 'faucet_amount';
        } else {
            $order_type = 'SUM(faucet_amount)';
        }
        
    }elseif ($_GET['o'] == 'surf') {
        if (isset($_GET['t'])){
           $order_type = 'surf_amount';
        } else {
            $order_type = 'SUM(surf_amount)';
        }
        
    }elseif ($_GET['o'] == 'shortlinks') {
        if (isset($_GET['t'])){
           $order_type = 'shortlinks_amount';
        } else {
            $order_type = 'SUM(shortlinks_amount)';
        }
        
    }elseif ($_GET['o'] == 'offerwall') {
        if (isset($_GET['t'])){
           $order_type = 'offerwall_amount';
        } else {
            $order_type = 'SUM(offerwall_amount)';
        }
        
    }elseif ($_GET['o'] == 'refbuysell') {
        if (isset($_GET['t'])){
           $order_type = 'buysell_amount';
        } else {
            $order_type = 'SUM(buysell_amount)';
        }
        
    }elseif ($_GET['o'] == 'amount') {
        if (isset($_GET['t'])){
            if ($_GET['t'] == 'today'){
                $order_type = 'SUM(amount)';
            } else {
                $order_type = 'amount';
            }
        } else {
            $order_type = 'amount';
        }
        
    }elseif ($_GET['o'] == 'date') {
        $order_type = 'date';
    }else {
        $order_type = 'id';
    }
    
} else {
    if (isset($_GET['t'])){
        $order_type = 'id';
    } else {
        $order_type = 'COUNT(id)';
    }
    
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'history'){
        $nsql = "SELECT COUNT(id) FROM ref";
        $sql = "SELECT * FROM ref ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'user') {
        require 'user_form.php';
        if (isset ($_GET['token'])){
            $uname = test_input($_GET['token']);
        } else {
            $uname = NULL;
        }
        
        if (isset ($_GET['req'])){
            $user_id = test_input($_GET['req']);
            $uname_info = userInfoByUsername($user_id);
            header('location:ref?t=user&token='.$uname_info['id']);
        }
        
        
        $nsql = "SELECT COUNT(id) FROM ref WHERE uname = '$uname' ";
        $sql = "SELECT * FROM ref WHERE uname = '$uname' "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    } else {
        $nsql = "SELECT COUNT(id) FROM ref";
        $sql = "SELECT * FROM ref ORDER BY $order_type $order LIMIT $page,$page_limit";
    }
    
    
    
} else {
    $nsql = "SELECT COUNT(DISTINCT uname) AS COUNTemail FROM ref ";
    $sql = "SELECT uname, COUNT(id), SUM(faucet_amount), SUM(surf_amount), SUM(shortlinks_amount), "
            . "SUM(offerwall_amount), SUM(buysell_amount) FROM ref "
            . "GROUP BY uname ORDER BY $order_type $order LIMIT $page,$page_limit";
    
}

$pagename = 'ref';

//pages
if (isset($_GET['t'])){
    if ($_GET['t'] == 'today'){
        require 'interface/pager_parameter_by_count_username.php';
    } else {
        require 'interface/pager_parameter.php';
    }
    
} else {
    require 'interface/pager_parameter_by_count_username.php';
}

$result = $conn->query($sql);