<?php
// pay for referrals
$surf_ref_amount = $surf_price/100*$earn_surf_ref_commission;
$surf_ref_amount = number_format($surf_ref_amount,10);

$refok = 0;
//check referrals info
$ref_info = refInfo($uname);

if ($ref_info !== 0){
    //check referrals info
    $ref_owener_id = $ref_info['email'];
    $ref_owener_info = userInfoById($ref_owener_id);
    $ref_owener_uname = $ref_owener_info['email'];
    $ref_uname = $ref_info['ref_email'];
    
    $refok = 1;
    
}


if ($refok == 1){
    
    //update ref bal
    updateUserBal($ref_owener_uname, 'bal', $surf_ref_amount);
    
    //update ref surf bal
    updateUserBal($ref_owener_uname, 'ref_surf', $surf_ref_amount);
    
    //update ref row
    updateRefBal($uname, 'surf', $surf_ref_amount);
    
    //update ref in history
    changeSurfHistoryReferral($ref_owener_uname);
    
    //update site total earning
    updateSiteInfoEarning('ref_surf', $surf_ref_amount);
    
    //update user rating from ref
    updateRatingRef($ref_owener_uname, 'surf');
}

