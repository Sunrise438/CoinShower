<?php

//total today surf earned 
$sql = "SELECT COUNT(FLid), SUM(FLamount) FROM flsurf_history WHERE Flemail='$FLuname' AND FLdate > CURDATE()";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_claim_today_user = $row['COUNT(FLid)']; 
if (isset($row['SUM(FLamount)'])){
    $total_claim_amount_today_user = $row['SUM(FLamount)'];
} else {
    $total_claim_amount_today_user = 0;
}

//total today surf earned by referrals
$sql = "SELECT COUNT(FLid), SUM(FLamount) FROM flsurf_history WHERE FLref_email='$FLuname' AND FLdate > CURDATE()";
    $result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_claim_today_ref = $row['COUNT(FLid)'];
if (isset($row['SUM(FLamount)'])){
    $total_claim_amount_today_ref = $row['SUM(FLamount)'];
    $total_claim_amount_today_ref = $total_claim_amount_today_ref/100*$earn_surf_ref_commission;
} else {
    $total_claim_amount_today_ref = 0;
}

//user total surf earned 
$sql = "SELECT FLid, FLearned_surf, FLearned_surf_ref FROM flusers WHERE FLemail='$FLuname'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_user_earned = $row['FLearned_surf'];
$total_user_ref_earned = $row['FLearned_surf_ref'];
$user_id = $row['FLid'];