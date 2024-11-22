<?php

/*
 * totali users
 */
function totalUsers(){
    $sql = "SELECT COUNT(id) FROM users";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
    } else {
        return 0;
    }
}

/*
 * active users
 */
function activeUsers($period){
    if ($period == 'daily'){
        $period = "login_date > CURDATE()";
    } else {
        $period = '';
    }
    $sql = "SELECT COUNT(id) FROM users WHERE $period";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        return $row['COUNT(id)'];
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
