<?php

echo '<tr>';
echo '<td class="fw-bold text-primary"><a href="history?t=user&token='.urlencode($row["uname"]).'" target="_blank">'.$row["COUNT(id)"].'</a></td>';
echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
echo '<td>'.number_format($row["SUM(amount)"],$site_info_row['truncate_currency']) .'</td>';
echo '</tr>';