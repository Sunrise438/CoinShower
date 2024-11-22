<?php
//banned list 
require 'interface/page_limit.php';

    $nsql = "SELECT COUNT(id) FROM banned_email";
    //gage name
    $pagename = 'users';

    //pages
    require 'interface/pager.php';

// claim info
$sql = "SELECT * FROM banned_email ORDER BY id DESC LIMIT $page,$page_limit";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
?>

<table  class="table table-striped table-hover">
    <thead>
        <tr class="h5">
          <th><?php echo ucfirst($idName);?></th>
          <th><?php echo ucfirst($emailName);?></th>
          <th><?php echo ucfirst($statusName);?></th>
          <th><?php echo ucfirst($optionalName);?></th>
      </tr>
    </thead>
    <tbody>
        <?php


    // output data of each row
        while($row = $result->fetch_assoc()) {
     
            echo '<tr>';
            
            echo '<td>'.$row["id"].'</td>';  
            echo '<td class="fw-bold text-primary"><a href="users_info?token='.urlencode($row["email"]).'" target="_blank">'.$row["email"].'</a></td>';
            if ($row['status'] == 1){
                echo '<td class="text-danger">'. ucfirst($bannedName).'</td>';
            } else {
                echo '<td class="text-primary">'. ucfirst($activeName).'</td>';
            }            
            
            echo '<td>';
                echo '<button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
                echo '<ul class="dropdown-menu">';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                . 'href="banned_domain?q=active&token='.$row['id'].'">'. ucfirst($activeName).'</a></li>';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-danger" '
                . 'href="banned_domain?q=ban&token='.$row['id'].'">'. ucfirst($banName).'</a></li>';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-secondary" '
                . 'href="banned_domain?q=delete&token='.$row['id'].'">'. ucfirst($deleteName).'</a></li>';
                echo '</ul>';
            echo '</td>';
            
            echo '</tr>';
    }
    echo '</tbody>';
    echo '</table> ';
} else {
    echo '<div class="alert alert-warning ">';
    echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
    echo '</div>';
}
//pages
require 'interface/pager.php';
?>

    <script src="ctrl/earn/earn/earn_data/js/latest_transaction.js"></script>