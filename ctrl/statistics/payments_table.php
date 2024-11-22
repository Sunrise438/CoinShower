<?php
      
if (empty($_GET['page'])){
        $page = 0;

    }elseif ($_GET['page'] == 1) {
        $page = 0;

    } else {
        $page = $_GET['page']*20-20;

    }
    
//create page 
$nsql = "SELECT COUNT(id) FROM withdraw_history LIMIT 10000";

//gage name
$pagename = 'payments';

//pages
require 'interface/pager.php';
      
        //withdrawal
        $sql = "SELECT * FROM withdraw_history ORDER BY date DESC LIMIT $page,20";
        $result = $conn->query($sql);
        
        if($result->num_rows >0){
            //usd ads view table
           echo '<table class="table table-dark table-striped table-hover text-primary">';
            echo '<thead>';
            echo '<tr>';         
            echo '<th>'. ucfirst($idName).'</th>';
            echo '<th>'. ucfirst($dateName).'</th>';
            echo '<th>'. ucfirst($infoName).'</th>';
            echo '<th>'. ucfirst($amountName).'</th>';        
            echo '<th>'. ucfirst($statusName).'</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            
            echo '<tr>';
            echo '<td class="text-secondary fw-bold">#'. $row["id"] .'</td>';
            echo '<td class="fw-bold">'. $row["date"] .'</td>';
            echo '<td class="text-primary fw-bold">'.substr($row["email"],0,4).'....'.'</td>';
            echo '<td class="fw-bold">'. number_format($row["amount"],8).' '. strtoupper($selectedCoin).'</td>';
            
            if ($row["status"] == 0){
                echo '<td class="text-info fw-bold">'. ucfirst($pendingName) .'</td>';
            } elseif($row["status"] == 1){
                    echo '<td class="text-primary fw-bold">'. ucfirst($paidName) .'</td>';
            }elseif ($row["status"] == 3) {
                echo '<td class="text-muted fw-bold">'. ucfirst($cancelledName) .'</td>';
            }elseif ($row["status"] == 4) {
                echo '<td class="text-danger fw-bold">'. ucfirst($rejectedName) .'</td>';
            } else {
                echo '<td></td>';
            }
                
            
            echo '</tr>';
             
        }  echo '</tbody>';
            echo '</table>';
        }else {
            echo '<div class="alert alert-secondary">';
            echo '<strong>'.ucfirst($noRecordsFoundName).'!</strong>';
            echo '</div>';
        }
       
        //pages
        require 'interface/pager.php';
