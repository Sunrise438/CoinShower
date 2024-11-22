<?php

//today faucet earned
function todayFaucetEarned($uname){
    $sql = "SELECT SUM(amount) FROM earn_history WHERE status = 1 AND email = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(amount)'];
}

//today shortlinks earned
function todayShortlinksEarned($uname){
    $sql = "SELECT SUM(amount) FROM shortlinks_history WHERE status = 1 AND uname = '$uname' AND date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['SUM(amount)'];
}