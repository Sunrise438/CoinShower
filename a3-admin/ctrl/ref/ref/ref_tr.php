<?php

echo '<tr>';
              
echo '<td class="fw-bold text-primary"><a href="ref?t=user&token='.urlencode($row["uname"]).'" target="_blank">#'.$row["id"].'</a></td>';
echo '<td><a href="users_info?token='.$row['ref_uname'].'" target="_blank">'.$row['ref_uname'].'</a></td>';
$user_info = userInfoById($row['uname']);
echo '<td><a href="users_info?token='.$user_info['uname'].'" target="_blank">'.$user_info['uname'].'</a></td>';

if ($site_info_row['faucet_action'] == 1){
    echo '<td>'.number_format($row["faucet_amount"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['surf_action']){
    echo '<td>'.number_format($row["surf_amount"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['shortlinks_action']){
    echo '<td>'.number_format($row["shortlinks_amount"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['offerwall_action']){
    echo '<td>'.number_format($row["offerwall_amount"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['ref_market_action']){
    echo '<td>'.number_format($row["buysell_amount"],$site_info_row['truncate_currency']) .'</td>';
}


echo '<td>'.$row["date"].'</td>';
echo '</tr>';