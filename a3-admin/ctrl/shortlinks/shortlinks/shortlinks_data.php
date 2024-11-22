<?php

//total shortlinks
function totalShortlinks(){
    $sql = "SELECT COUNT(id) FROM shortlinks";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row['COUNT(id)'];
}



//total active shortlink and earnable amount
function activeShortlink(){
    $sql = "SELECT COUNT(id), SUM(pay_amount), SUM(usd_amount) FROM shortlinks WHERE status=1";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}


//today shortlinks views
function todayTotalShortlinksViews(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM shortlinks_history WHERE date > CURDATE()";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}

//today referrals shortlinks views
function todayTotalShortlinksViewsRef(){
    $sql = "SELECT COUNT(id), SUM(amount) FROM shortlinks_history WHERE date > CURDATE() AND ref_uname IS NOT NULL";
    $result = $GLOBALS['conn']->query($sql);
    $row = $result->fetch_assoc();
    return $row;
}