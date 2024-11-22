<?php

/*
 * get earning by days
 */
function getEarningByDays($days, $type, $option = NULL){
    $uname = test_input($_SESSION['uname']);
    $day = getLastDays($days);
    $day_start =  getBeforeDay($days);
    $earned_arr = array();
    if ($type == 'faucet'){
        if ($option != 'ref'){
            $where = "WHERE uname = '$uname' AND status = 1 AND date > '$day_start'";
        } else {
            $where = "WHERE ref_uname = '$uname' AND status = 1 AND date > '$day_start'";
        }
        $table = "faucet_history";
    }elseif ($type == 'surf'){
        if ($option != 'ref'){
            $where = "WHERE uname = '$uname' AND status = 1 AND date > '$day_start'";
        } else {
            $where = "WHERE ref_uname = '$uname' AND status = 1 AND date > '$day_start'";
        }
        $table = "surf_history";
    }elseif ($type == 'shortlinks'){
        if ($option != 'ref'){
            $where = "WHERE uname = '$uname' AND status = 1 AND date > '$day_start'";
        } else {
            $where = "WHERE ref_uname = '$uname' AND status = 1 AND date > '$day_start'";
        }
        $table = "shortlinks_history";
    }elseif ($type == 'offerwall'){
        if ($option != 'ref'){
            $where = "WHERE uname = '$uname' AND status = 1 AND date > '$day_start'";
        } else {
            $where = "WHERE ref_uname = '$uname' AND status = 1 AND date > '$day_start'";
        }
        $table = "offerwall_history";
    } else {
        return;
    }
    if ($type != 'offerwall'){
        $sql = "SELECT COUNT(amount) AS earned, DATE(date) AS day FROM  $table "
            . " $where GROUP BY DATE(date)";
    } else {
        $sql = "SELECT COUNT(reward) AS earned, DATE(date) AS day FROM  $table "
            . " $where GROUP BY DATE(date)";
    }
    
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $row_arr[$row['day']] = $row['earned'];
            $i++;
        }
        
        foreach ($day AS $value){
            if (isset($row_arr[$value])){
                $earned_arr[$value] = $row_arr[$value];
            } else {
                $earned_arr[$value] = 0;
            }
        }
        return $earned_arr;
    } else {
        foreach ($day AS $value){
            if (isset($row_arr[$value])){
                $earned_arr[$value] = 0;
            } else {
                $earned_arr[$value] = 0;
            }
        }
        return $earned_arr;
    }
}

/*
 * payments
 */
function getPayments($page, $order_type, $order){
    $page = getPage($page);
    if ($order_type != NULL && $order != NULL){
        $where = "ORDER BY $order_type $order";
    } else {
        $where = "";
    }
    $page_limit = $GLOBALS['site_info_row']['page_limit'];
    $sql = "SELECT * FROM withdraw_history $where LIMIT $page,$page_limit";
    $result = $GLOBALS['conn']->query($sql);
    $row_arr = array();
    $i = 0;
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $row_arr[$i] = $row;
            $i++;
        }
        return array('rows' => 100000, 'result' => $row_arr);
    } else {
        return 0;
    }
}

/*
 * total eaned
 */
function totalEarned(){
    return number_format($GLOBALS['site_info_row']['total_faucet_amount'] + $GLOBALS['site_info_row']['total_surf_amount'] + $GLOBALS['site_info_row']['total_shortlinks_amount'] + $GLOBALS['site_info_row']['total_offerwall_amount'],$GLOBALS['site_info_row']['truncate_currency']);
}

/*
 * total tasks
 */
function totalTasks(){
    return $GLOBALS['site_info_row']['total_tasks_faucet'] + $GLOBALS['site_info_row']['total_tasks_surf'] + $GLOBALS['site_info_row']['total_tasks_shortlinks'] + $GLOBALS['site_info_row']['total_tasks_offerwall'];
}