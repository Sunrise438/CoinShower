<?php

echo '<tr>';
echo '<td class="fw-bold text-primary"><a href="offerwall?t=user&token='.urlencode($row["uname"]).'" target="_blank">#'.$row["id"].'</a></td>';
echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
echo '<td>'. $row["offerwall"] .'</td>';
echo '<td>'. $row["offer_name"] .'</td>';
echo '<td>'.number_format($row["reward"],$site_info_row['truncate_currency']) .'</td>';

if ($row['status'] == 0){
        echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
    }elseif ($row['status'] == 1) {
        echo '<td><span class="text-primary">'. $approvedName.'</span></td>';
    }elseif ($row['status'] == 2) {
        echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
    }elseif ($row['status'] == 3) {
        echo '<td><span class="text-danger">'. $rejectedName.'</span></td>';
    }elseif ($row['status'] == 4) {
        echo '<td><span class="text-warning">'. $cancelledName.'</span></td>';
    }elseif ($row['status'] == 5) {
        echo '<td><span class="text-danger">'. $pendingName.' '. $deleteName.'</span></td>';
}

echo '<td>'. $row["date"] .'</td>';
echo '<td>'. $row["ref_uname"] .'</td>';
echo '</tr>';