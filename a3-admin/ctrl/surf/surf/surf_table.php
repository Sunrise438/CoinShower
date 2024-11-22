<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            require 'surf_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td><a href="surf?t=user&token='.$row['uname'].'" target="_blank">'. $row["id"] .'</a></td>';
            echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
            echo '<td class="text-break">'. $row["url"] .'</td>';
            echo '<td>'.number_format($row["balance"],$site_info_row['truncate_currency']) .'</td>';
            echo '<td>'. number_format($row["price"],$site_info_row['truncate_currency']) .'</td>';
            echo '<td>'. $row["duration"] .'</td>';
            echo '<td>'. $row["view"] .'</td>';
            require 'target_country.php';
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
            
            echo '<td>';
            if ($row['active'] == 1){
                echo '<button type="button" class="btn btn-outline-warning dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
            } else {
                echo '<button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
            }
                
                echo '<ul class="dropdown-menu">';
                if ($row['status'] != 3){
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                    . 'href="surf?a=approve&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($approveName).'</a></li>';
                }
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-danger" '
                    . 'href="surf?a=reject&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($rejectName).'</a></li>';
                if ($row['active'] == 1){
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-warning" '
                . 'href="surf?a=pause&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($pauseName).'</a></li>';
                } else {
                    echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-success" '
                . 'href="surf?a=play&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($playName).'</a></li>';
                }
                
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                . 'href="surf?q=edit&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($editName).'</a></li>';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-secondary" '
                . 'href="surf?a=delete&r=1&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($deleteName).' '.$andName.' '. ucfirst($returnName).'</a></li>';
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-secondary" '
                . 'href="surf?a=delete&token='. base64_encode($row['id']).'&redt='.$_GET['t'].'">'. ucfirst($deleteName).'</a></li>';
                echo '</ul>';
            echo '</td>';
           
        }  echo '</tbody>';
            echo '</table>';
        }else {
            echo '<div class="alert alert-warning ">';
            echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
            echo '</div>';
        }
        


?>

<script>
    function confirmationDelete(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
          window.location=anchor.attr("href");
    }
</script>