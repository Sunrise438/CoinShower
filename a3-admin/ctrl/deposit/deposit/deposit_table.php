<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            require 'deposit_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td><a href="withdraw?t=user&token='.$row['uname'].'" target="_blank">'.$row['id'].'</a></td>';
            echo '<td>'. $row["date"] .'</td>';
            echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
            echo '<td>'.number_format($row["amount"],8) .'</td>';
            
            if (is_file('../plugins/'.$row['method'].'/logo.png')){
                echo '<td><img src="../plugins/'.$row['method'].'/logo.png" height="20px;" title="'.$faucetPayName.'"></td>';
            } else {
                echo '<td>'. $row["method"] .'</td>';
            }
            
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
            
            echo '<td>'. $row["tx_id"] .'</td>';
           
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