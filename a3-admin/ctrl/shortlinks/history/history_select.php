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
        if (isset($_GET['t'])){
            if ($_GET['t'] == 'today'){
                $order_type = 'COUNT(id)';
            } else {
                $order_type = 'id';
            }
        } else {
            $order_type = 'id';
        }
        
    }elseif ($_GET['o'] == 'username') {
        $order_type = 'uname';
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
        if ($_GET['t'] == 'today'){
            $order_type = 'SUM(id)';
        } else {
            $order_type = 'id';
        }
    } else {
        $order_type = 'id';
    }
    
}

if (isset($_GET['t'])){
    if ($_GET['t'] == 'today'){
        //today surv view count by user
        $nsql = "SELECT COUNT(DISTINCT uname) AS COUNTemail FROM shortlinks_history WHERE date > CURDATE() ";
        $sql = "SELECT uname, COUNT(id), SUM(amount) FROM shortlinks_history WHERE date > CURDATE()"
                . "GROUP BY uname ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    }elseif ($_GET['t'] == 'user') {
        require 'user_form.php';
        if (isset ($_GET['token'])){
            $uname = test_input($_GET['token']);
        } else {
            $uname = NULL;
        }
        
        $nsql = "SELECT COUNT(id) FROM shortlinks_history WHERE uname = '$uname' ";
        $sql = "SELECT * FROM shortlinks_history WHERE uname = '$uname' "
                . "ORDER BY $order_type $order LIMIT $page,$page_limit";
        
    } else {
        $nsql = "SELECT COUNT(id) FROM shortlinks_history";
        $sql = "SELECT * FROM shortlinks_history ORDER BY $order_type $order LIMIT $page,$page_limit";
    }
    
    
    
} else {
    $nsql = "SELECT COUNT(id) FROM shortlinks_history";
    $sql = "SELECT * FROM shortlinks_history ORDER BY $order_type $order LIMIT $page,$page_limit";
    
}

$pagename = 'shortlinks_history';

//pages
if (isset($_GET['t'])){
    if ($_GET['t'] == 'today'){
        require 'interface/pager_parameter_by_count_username.php';
    } else {
        require 'interface/pager_parameter.php';
    }
    
} else {
    require 'interface/pager_parameter.php';
}

$result = $conn->query($sql);