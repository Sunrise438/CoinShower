<?php

// claim info
$sql = "SELECT * FROM flsurf_history WHERE FLemail = '$FLuname' OR FLref_email='$FLuname' "
        . "ORDER BY FLdate DESC LIMIT 20";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
?>

<table  class="table table-dark table-striped table-hover text-primary" id="temhis">
    <thead>
        <tr class="h5">
          <th><?php echo ucfirst($idName);?></th>
          <th><?php echo ucfirst($amountName);?></th>
          <th><?php echo ucfirst($typeName);?></th>
          <th><?php echo ucfirst($dateName);?></th>
      </tr>
    </thead>
    <tbody>
        <?php


    // output data of each row
        while($row = $result->fetch_assoc()) {
                if($row["FLemail"] == $FLuname){
                    echo '<tr class="table-dark">';
                } else {
                    echo '<tr class="table-secondary text-dark">';
                }
              
              echo '<td>#'.$row["FLid"].'</td>';
              if($row["FLemail"] == $FLuname){
                echo '<td><b>'.number_format($row["FLamount"], 8).' '.strtoupper($selectedCoin).'</b></td>';
                echo '<td>'. ucfirst($surfName).'</td>';
                
              } else if($row["FLref_email"] == $FLuname){
                echo '<td><b>'.number_format($row["FLamount"]/100*$earn_ref_commission, 8).' '.strtoupper($selectedCoin).'</b></td>';
                echo '<td>'. ucfirst($referralName).'</td>';
                
              }
              
              echo '<td>'.$row["FLdate"].'</td>';
              echo '</tr>';
    }
    echo '</tbody>';
    echo '</table> ';
} else {
    echo '<div class="alert alert-warning ">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}?>

    <script src="ctrl/surf/surf/surf_history/js/js.js"></script>