<?php

/*
 * get campaign surf
 */
function getcampaignSurf($page = 0, $order_type=NULL, $order=NULL){
    $page = getPage($page);
    $uname = test_input($_SESSION['uname']);
    if ($order_type != NULL && $order != NULL){
        $where = "WHERE uname = '$uname' ORDER BY $order_type $order";
    } else {
        $where = "WHERE uname = '$uname'";
    }
    $rsql = "SELECT COUNT(id) FROM surf $where";
    $rresult = $GLOBALS['conn']->query($rsql);
    $rrow = $rresult->fetch_assoc();
    $rows = $rrow['COUNT(id)'];
    $page_limit = $GLOBALS['site_info_row']['page_limit'];
    $sql = "SELECT * FROM surf $where LIMIT $page,$page_limit";
    $result = $GLOBALS['conn']->query($sql);
    $row_arr = array();
    $i = 0;
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $row_arr[$i] = $row;
            $i++;
        }
        return array('rows' => $rows, 'result' => $row_arr);
    } else {
        return 0;
    }
}

/*
 * create pb to suef history
 */
function createSurfDeopitHistory($surf_id, $amount){
    $uname = test_input($_SESSION['uname']);
    $sql = "INSERT INTO surf_deposit (uname, surf_id, amount) "
            . "VALUES('$uname', '$surf_id', '$amount')";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * update surf balance
 */
function updateSurfBal($surf_id, $amount){
    $sql = "UPDATE surf SET balance = balance + $amount WHERE id = '$surf_id' ";
    if ($GLOBALS['conn']->query($sql)){
        return 1;
    } else {
        return 0;
    }
}

/*
 * surf deposit
 */
function updateSurfDeposit($surf_id, $amount){
    if ($amount <= $GLOBALS['user_info']['p_bal']){
        $uname = test_input($_SESSION['uname']);
        $ok = updateSurfBal($surf_id, $amount);
        if ($ok){
            updateUserBal('p_bal', -abs($amount));
            createSurfDeopitHistory($surf_id, $amount);
        }
    }
}