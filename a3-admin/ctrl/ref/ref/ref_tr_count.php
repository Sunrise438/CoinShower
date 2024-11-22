<?php

echo '<tr>';
echo '<td class="fw-bold text-primary"><a href="ref?t=user&token='.urlencode($row["uname"]).'" target="_blank">'.$row["COUNT(id)"].'</a></td>';
$user_info = userInfoById($row['uname']);
echo '<td><a href="users_info?token='.$user_info['uname'].'" target="_blank">'.$user_info['uname'].'</a></td>';

if ($site_info_row['faucet_action']){
    echo '<td>'.number_format($row["SUM(faucet_amount)"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['surf_action']){
    echo '<td>'.number_format($row["SUM(surf_amount)"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['shortlinks_action']){
    echo '<td>'.number_format($row["SUM(shortlinks_amount)"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['offerwall_action']){
    echo '<td>'.number_format($row["SUM(offerwall_amount)"],$site_info_row['truncate_currency']) .'</td>';
}

if ($site_info_row['ref_market_action']){
    echo '<td>'.number_format($row["SUM(buysell_amount)"],$site_info_row['truncate_currency']) .'</td>';
}

echo '</tr>';