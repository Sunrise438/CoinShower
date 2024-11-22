<?php

echo '<tr>';

if (isset($_GET['t'])){
    echo '<td>#'.$row["id"].'</td>';
    if ($row['status'] == 1){
        echo '<td><a class="fw-bold link-primary" href="users_info?token='.urlencode($row["email"]).'" target="_blank">'.$row["email"].'</a></td>';
    } else {
        echo '<td><a class="fw-bold link-dark" href="users_info?token='.urlencode($row["email"]).'" target="_blank">'.$row["email"].'</a></td>';
    }
    echo '<td>'.number_format($row["bal"],8) .'</td>';
    echo '<td>'.number_format($row["p_bal"],8) .'</td>';
    echo '<td>'.number_format($row['earned'] + $row['earned_surf'] +  $row['earned_shortlink'] + $row['earned_offerwall'] + $row['earned_buysell'],8).'</td>';
    echo '<td>'.number_format($row['ref_earned'] + $row['earned_surf_ref'] +  $row['earned_shortlink_ref'] + $row['earned_offerwall_ref'] + $row['earned_buysell_ref'],8).'</td>';
    echo '<td>'.$row["date"].'</td>';
    echo '<td><img src="image/flag/'.strtolower($row['country_code']).'.png" title="'. getCountryName($row['country_code']).'"/></td>';
    echo '<td>'.$row["login_ip"].'</td>';
    
} else {
    echo '<td>'.hrfFormat($row["COUNT(id)"]).'</td>';
    echo '<td><img src="image/flag/'.strtolower($row['country_code']).'.png" title="'. getCountryName($row['country_code']).'"/>'.' '. ucwords(getCountryName($row['country_code'])).'</td>';
    
}
              

echo '</tr>';