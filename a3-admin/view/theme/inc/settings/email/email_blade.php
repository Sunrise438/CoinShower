<div class="container mt-3 mb-3">

    <h4 class=" fw-bold"><?php echo ucwords($mailName.' '. $settingsName).' ';?>
    <button type="button" class="btn btn-outline-primary border border-0" data-bs-toggle="modal" data-bs-target="#email">
        <i class="bi bi-pencil-square" title="<?php echo ucfirst($editName);?>"></i>
    </button>
    </h4>
    <?php $mrow = getEmailSettings();?>

    <div class="row">
        <div class="col-xl-12">
            <?php 
                //usd ads view table
               echo '<table class="table table-striped">';
                echo '<thead>';
                echo '<tr>';           
                echo '<th>'. ucfirst($emailName).'</th>';
                echo '<th>'. ucfirst($hostName).'</th>';
                echo '<th>'. ucfirst($fromName).'</th>';
                echo '<th>'. ucfirst($fromName).' '. ucfirst($nameName).'</th>';
                echo '<th>'. ucfirst($passwordName).'</th>';
                echo '<th>'. ucfirst($portName).'</th>';
                echo '<th>'. ucfirst($secretName).'</th>';
                echo '<th>'. strtoupper('smtp').'</th>';
                echo '<th>'. ucfirst($statusName).'</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                echo '<tr>';
                echo '<td>'. $mrow["uname"] .'</td>';
                echo '<td>'. $mrow["host"] .'</td>';
                echo '<td>'. $mrow["sender"] .'</td>';
                echo '<td>'. $mrow["sender_name"] .'</td>';
                echo '<td>'. '********' .'</td>';
                echo '<td>'. $mrow["port"] .'</td>';
                echo '<td>'. $mrow["secure"] .'</td>';
                if ($mrow["is_smtp"] == 1){
                    echo '<td class="text-primary">'. ucfirst($enabledName) .'</td>';
                } else {
                    echo '<td class="text-secondary">'. ucfirst($disabledName) .'</td>';
                }
                if ($mrow["status"] == 1){
                    echo '<td class="text-primary">'. ucfirst($enabledName) .'</td>';
                } else {
                    echo '<td class="text-secondary">'. ucfirst($disabledName) .'</td>';
                }
                echo '</tr>';

                echo '</tbody>';
                echo '</table>';
            ?>
        </div>
    </div>
    
</div>