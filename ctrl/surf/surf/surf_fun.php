<?php
/*
 * get surf
 */
function getSurf(){
    $uname = test_input($_SESSION['uname']);
    $user_info = userInfoByUsername($uname);
    $user_info_rating = $user_info['rating'];
    $min_surf_balance = $GLOBALS['site_info_row']['surf_min_bal'];
     $ads =  "SELECT * FROM surf WHERE 
               NOT EXISTS
                 (SELECT * FROM surf_history WHERE date > CURDATE() AND uname = '$uname' AND 
                     surf_history.surf_id = surf.id  ) 
                 AND active = 1 AND balance > $min_surf_balance AND status = 1 
                 AND r_min <= $user_info_rating ORDER BY price  DESC";
    $result = $GLOBALS['conn']->query($ads);
    if ($result->num_rows > 0) {
        $row_arr = array();
        $i = 0;
        while ($row = $result->fetch_assoc()){
            $row_arr[$i] = $row;
            $i++;
        }
        return $row_arr;
    } else {
        return 0;
    }
}

/*
 * get surf by id
 */
function getSurfById($id){
    $uname = test_input($_SESSION['uname']);
    $user_info = userInfoByUsername($uname);
    $user_info_rating = $user_info['rating'];
    $min_surf_balance = $GLOBALS['site_info_row']['surf_min_bal'];
     $ads =  "SELECT * FROM surf WHERE 
               NOT EXISTS
                 (SELECT * FROM surf_history WHERE date > CURDATE() AND uname = '$uname' AND 
                     surf_history.surf_id = surf.id  ) 
                 AND active = 1 AND balance > $min_surf_balance AND status = 1 AND NOT uname = '$uname'
                 AND r_min <= $user_info_rating 
                 AND id = '$id' ";
    $result = $GLOBALS['conn']->query($ads);

    //echo $conn->error;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return 0;
    }
}

/*
 * check surf cookie
 */
function checkSurfCookie(){
    if ($GLOBALS['grecap_action']){
        $uname = test_input($_SESSION['uname']);
        if (empty($_COOKIE[md5($GLOBALS['site_info_row']['site_name'].$uname.'surf')])){     
            return 0;
         } else {
             return 1;
        }
    } else {
        return 1;
    }
}

/*
 * set surf cookie
 */
function setCookieSurf(){
    $uname = test_input($_SESSION['uname']);
    $cookie_name = $GLOBALS['site_info_row']['site_name'].$uname.'surf';
    $cookie_name = md5($cookie_name);
    $cookie_value = $GLOBALS['site_info_row']['site_name'].$uname.'surfVal';
    $cookie_value = md5($cookie_value);
    setcookie($cookie_name, $cookie_value, time()+ 300);
}