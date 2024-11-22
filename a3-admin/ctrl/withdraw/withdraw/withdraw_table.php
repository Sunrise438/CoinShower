<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-striped">';
            
            require 'withdraw_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td><a href="withdraw?t=user&token='.$row['uname'].'" target="_blank">'.$row['id'].'</a></td>';
            echo '<td>'. $row["date"] .'</td>';
            echo '<td><a href="users_info?token='.$row['uname'].'" target="_blank">'.$row['uname'].'</a></td>';
            echo '<td class="text-primary fw-bold">'.$row["address"].'</td>';
            echo '<td>'. number_format($row["amount"],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin).'</td>';
            echo '<td>'. strtoupper($row["coin"]) .'</td>';
            
            if (is_file("../ctrl/withdraw/withdraw/".$row['method']."/logo.png")){
                echo '<td><img src="../ctrl/withdraw/withdraw/'.$row['method'].'/logo.png" style="height:24px" title="'.$row['method'].'"></td>';
            } else {
                if (is_file("../plugins/".$row['method']."/logo.png")){
                    echo '<td><img src="../plugins/'.$row["method"].'/logo.png" style="height:24px" data-bs-toggle="tooltip" title="'.$row['method'].'"></td>';
                } else {
                    echo '<td></td>';
                }
            }
            
            if ($row['status'] == 0){
                echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
            }elseif ($row['status'] == 1) {
                echo '<td><span class="text-primary">'. $paidName.'</span></td>';
            }elseif ($row['status'] == 2) {
                echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
            }elseif ($row['status'] == 3) {
                echo '<td><span class="text-danger">'. $rejectedName.'</span></td>';
            }elseif ($row['status'] == 4) {
                echo '<td><span class="text-warning">'. $cancelledName.'</span></td>';
            }elseif ($row['status'] == 5) {
                echo '<td><span class="text-danger">'. $pendingName.' '. $deleteName.'</span></td>';
            }
            
            if (!isset($_GET['token'])){
                $redt = '?t='.$_GET['t'];
                
            } else {
                $redt = '?t='.$_GET['t'].'&token='.$_GET['token'];
            }
            $redt = '&redt='.base64_encode($redt);
            
            echo '<td>';
            if ($row['status'] == 0){
                echo '<button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown">';
                echo ucfirst($optionalName);
                echo '</button>';
                
            } else {
                echo '<td></td>';
            }
                
                echo '<ul class="dropdown-menu">';
                if ($row['status'] != 3){
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-primary" '
                    . 'href="withdraw?a=approve&token='. base64_encode($row['id']).$redt.'">'. ucfirst($approveName).'</a></li>';
                }
                
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-warning" '
                . 'href="withdraw?a=cancel&token='. base64_encode($row['id']).$redt.'">'. ucfirst($cancelName).'</a></li>';
                
                echo '<li><a onclick="javascript:confirmationDelete($(this));return false;" class="dropdown-item text-danger" '
                    . 'href="withdraw?a=reject&token='. base64_encode($row['id']).$redt.'">'. ucfirst($rejectName).'</a></li>';
                
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