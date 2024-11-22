<?php

if ($row['status'] == 1){
    echo '<tr>';
} else {
    echo '<tr class="fw-bold bg-danger">';
}
              
echo '<td>#'.$row["id"].'</td>';
if ($row['status'] == 1){
    echo '<td><a class="fw-bold link-primary" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["uname"].'</a></td>';
} else {
    echo '<td><a class="fw-bold link-dark" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["uname"].'</a></td>';
}
if ($row['status'] == 1){
    echo '<td><a class="fw-bold link-primary" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["email"].'</a></td>';
} else {
    echo '<td><a class="fw-bold link-dark" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["email"].'</a></td>';
}
echo '<td>'.number_format($row["bal"],$site_info_row['truncate_currency']) .'</td>';
echo '<td>'.number_format($row["p_bal"],$site_info_row['truncate_currency']) .'</td>';
echo '<td>'.number_format($row['earned_faucet'] + $row['earned_surf'] +  $row['earned_shortlink'] + $row['earned_offerwall'] + $row['earned_buysell'],$site_info_row['truncate_currency']).'</td>';
echo '<td>'.number_format($row['earned_faucet_ref'] + $row['earned_surf_ref'] +  $row['earned_shortlink_ref'] + $row['earned_offerwall_ref'] + $row['earned_buysell_ref'],$site_info_row['truncate_currency']).'</td>';
echo '<td>'.$row["date"].'</td>';
echo '<td><img src="image/flag/'.strtolower($row['country_code']).'.png" title="'. getCountryName($row['country_code']).'"/></td>';
echo '<td>'.$row["login_ip"].'</td>';
echo '</tr>';