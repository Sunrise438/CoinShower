<?php

echo '<tr>';
echo '<td class="fw-bold text-primary"><a href="surf_history?t=user&token='.urlencode($row["uname"]).'" target="_blank">#'.$row["id"].'</a></td>';
echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
$surf_info = surfInfoById($row["surf_id"]);
if ($surf_info != 0){
    echo '<td class="text-break">'. $surf_info['url'] .'</td>';

} else {
    echo '<tdclass="text-break"></td>';;
}

echo '<td>'.number_format($row["amount"],$site_info_row['truncate_currency']) .'</td>';
echo '<td>'. $row["date"] .'</td>';
echo '<td>'. $row["ref_uname"] .'</td>';
echo '</tr>';