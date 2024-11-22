<?php

require 'interface/page_limit.php';
    
    //create page 
$nsql = "SELECT COUNT(id) FROM shortlinks_history";

//gage name
$pagename = 'shortlinks_history';
//pages
require 'interface/pager.php';


// claim info
$sql = "SELECT * FROM shortlinks_history ORDER BY date DESC LIMIT $page,20";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
?>

<table  class="table table-striped table-hover">
    <thead>
      <tr>
          <th><?php echo ucfirst($idName);?></th>
          <th><?php echo ucfirst($emailName);?></th>
          <th><?php echo ucfirst($amountName);?></th>
          <th><?php echo ucfirst($linkName);?></th>
          <th><?php echo ucfirst($dateName);?></th>
          <th><?php echo ucfirst($statusName);?></th>
          <th><?php echo ucfirst($referralName);?></th>
      </tr>
    </thead>
    <tbody>
        <?php


    // output data of each row
        while($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>'.$row["id"].'</td>';
              echo '<td>'.'<a href="users_info?token='. $row["uname"] .'" target="_blank">'.$row["uname"].'</a></td>';
              echo '<td><b>'.number_format($row["amount"], $site_info_row['truncate_currency']).' '.strtoupper($selectedCoin).'</b></td>';
              
              //select link
              $li = $row["link"];
              $lsql = "SELECT * FROM shortlinks WHERE link = '$li'";
              $lresult = $conn->query($lsql);
              if($lresult->num_rows>0){
                  $lrow = $lresult->fetch_assoc();
                  echo '<td><a href="'.$lrow["shortlinks"].'" targrt="_blank">'.$lrow['site_name'].'</a></td>';
              } else {
                  echo '<td><a href="" targrt="_blank"></a></td>';
              }
              
              echo '<td>'.$row["date"].'</td>';
                  if ($row["status"]){
                    echo '<td class="text-success fw-bold">'. ucfirst($paidName).'</td>';
                } else {
                    echo '<td class="text-secondary fw-bold">'. ucfirst($unpaidName).'</td>';
                }

                echo '<td class="fw-bold text-primary"><a href="users_info?token='.urlencode($row["ref_uname"]).'" target="_blank">'.$row["ref_uname"].'</a></td>';
                echo '</tr>';
     }
} else {
    echo '<div class="alert alert-secondary">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}
echo '</tbody>';
echo '</table> ';

//create pages
require 'interface/pager.php';