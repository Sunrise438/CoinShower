<?php

echo '<tr>';
              
echo '<td class="fw-bold text-primary"><a href="shortlinks_history?t=user&token='.urlencode($row["uname"]).'" target="_blank">#'.$row["id"].'</a></td>';
echo '<td>'.$row["date"].'</td>';
echo '<td class="fw-bold text-primary"><a href="users_info?token='.urlencode($row["uname"]).'" target="_blank">'.$row["uname"].'</a></td>';
echo '<td><b>'.number_format($row["amount"], 8).' '.strtoupper($selectedCoin).'</b></td>';

if ($row["status"] == 1){
    echo '<td class="text-success fw-bold">'. ucfirst($paidName).'</td>';
} else {
    echo '<td class="text-secondary fw-bold">'. ucfirst($unpaidName).'</td>';
}

echo '<td class="fw-bold text-primary"><a href="users_info?token='.urlencode($row["ref_uname"]).'" target="_blank">'.$row["ref_uname"].'</a></td>';

echo '</tr>';