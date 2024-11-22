<?php
//user total referrals
function userTotalRef($user_id){
    $sql = "SELECT COUNT(id) FROM ref WHERE uname = '$user_id' ";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(id)'];
}