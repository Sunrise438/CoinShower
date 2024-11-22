<?php
        
        if($result->num_rows >0){
            
            echo '<table class="table table-dark table-striped table-hover text-primary">';
            
            require 'deposit_th.php';
            
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td>#'. $row["FLid"] .'</td>';
            echo '<td>'. $row["FLdate"] .'</td>';
            echo '<td>'.number_format($row["FLamount"],8) .'</td>';
            
            if ($row['FLstatus'] == 0){
                echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
            }elseif ($row['FLstatus'] == 1) {
                echo '<td><span class="text-primary">'. $approvedName.'</span></td>';
            }elseif ($row['FLstatus'] == 2) {
                echo '<td><span class="text-secondary">'. $pendingName.' '.$approvalName.'</span></td>';
            }elseif ($row['FLstatus'] == 3) {
                echo '<td><span class="text-danger">'. $rejectedName.'</span></td>';
            }elseif ($row['FLstatus'] == 4) {
                echo '<td><span class="text-warning">'. $cancelledName.'</span></td>';
            }elseif ($row['FLstatus'] == 5) {
                echo '<td><span class="text-danger">'. $pendingName.' '. $deleteName.'</span></td>';
            }
           
        }  echo '</tbody>';
            echo '</table>';
        }else {
            echo '<div class="alert alert-warning ">';
            echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
            echo '</div>';
        }