<?php
/*
 * delete surf
 */
function deleteSurf($surf_id){
    $uname = test_input($_SESSION['uname']);
    $surf_info = surfInfoById($surf_id);
    if ($surf_info != 0){
       $sql = "DELETE FROM surf WHERE id = '$surf_id' AND uname = '$uname' ";
        if ($GLOBALS['conn']->query($sql) === TRUE){
            if ($surf_info['balance'] > 0){
                $amount = $surf_info['balance'];
                updateUserBal('p_bal', $amount);
            }
            return 1;
        } else {
            return 0;
        }
    }else {
        return 0;
    }
}

/*
 * active surf
 */
function activeSurf($surf_id, $status){
    $uname = test_input($_SESSION['uname']);
    $sql = "UPDATE surf SET active = '$status' WHERE id = '$surf_id' AND uname = '$uname' ";
    if ($GLOBALS['conn']->query($sql) === TRUE){
        return 1;
    } else {
        return 0;
    }
}