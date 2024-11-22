<?php
require 'shortlinks_info_form.php';

if (isset($_GET['u'])){
    $v_uname = htmlspecialchars(strip_tags(trim($_GET['u'])));

if (empty($_GET['page'])){
        $page = 0;

    }elseif ($_GET['page'] == 1) {
        $page = 0;

    } else {
        $page = $_GET['page']*20-20;

    }
    
    //create page 
$nsql = "SELECT COUNT(Fid) FROM shortlinks_history WHERE Funame = '$v_uname'";

//gage name
$pagename = 'shortlinks';

//pages
require 'interface/pager_username.php';


// claim info
$sql = "SELECT * FROM shortlinks_history WHERE Funame = '$v_uname' ORDER BY Fdate DESC LIMIT $page,20";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
?>

<table  class="table table-striped">
    <thead>
      <tr>
          <th><?php echo ucfirst($idName);?></th>
          <th><?php echo ucfirst($userNameName);?></th>
          <th><?php echo ucfirst($amountName);?></th>
          <th><?php echo ucfirst($linkName);?></th>
          <th><?php echo ucfirst($dateName);?></th>
      </tr>
    </thead>
    <tbody>
        <?php


    // output data of each row
        while($row = $result->fetch_assoc()) {
              echo '<tr>';
              echo '<td>'.$row["id"].'</td>';
              echo '<td>'.'<a href="users?u=edit&un='. $row["uname"] .'" target="_blank">'.$row["uname"].'</a></td>';
              echo '<td><b>'.number_format($row["Famount"], $site_info_row['truncate_currency']).' '.strtoupper($selectedCoin).'</b></td>';
              
              //select link
              $li = $row["ink"];
              $lsql = "SELECT * FROM shortlinks WHERE link = '$li'";
              $lresult = $conn->query($lsql);
              if($lresult->num_rows>0){
                  $lrow = $lresult->fetch_assoc();
                  echo '<td><a href="'.$lrow["shortlinks"].'" targrt="_blank">'.$lrow['site_name'].'</a></td>';
              } else {
                  echo '<td><a href="" targrt="_blank"></a></td>';
              }
              
              echo '<td>'.$row["Fdate"].'</td>';
              echo '</tr>';
     }
} else {
    echo '<div class="alert alert-secondary">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}?>
        </tbody>
  </table> 

  
<?php

//pages
require 'interface/pager_username.php';
}