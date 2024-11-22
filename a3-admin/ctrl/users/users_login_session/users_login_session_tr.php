<?php

if ($row['status'] == 1){
    echo '<tr class="fw-bold bg-info">';
} else {
    echo '<tr>';
}
              
echo '<td>#'.$row["id"].'</td>';
if ($row['status'] == 1){
    echo '<td><a class="fw-bold link-dark" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["uname"].'</a></td>';
} else {
    echo '<td><a class="fw-bold link-primary" href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["uname"].'</a></td>';
}
echo '<td>'.$row["log_token"] .'</td>';
if ($row['status'] == 1){
    echo '<td>'. ucfirst($activeName) .'</td>';
} else {
    echo '<td>'. ucfirst($inactiveName) .'</td>';
}
echo '<td>'.$row["date"].'</td>';
echo '<td><img src="image/flag/'.strtolower($row['country_code']).'.png" title="'. getCountryName($row['country_code']).'"/></td>';
echo '<td>'.$row["login_ip"].'</td>';

echo '</tr>';