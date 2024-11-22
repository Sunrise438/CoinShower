<!-- The Modal -->
<div class="modal" id="<?php echo 'modal'.$row["id"];?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title"><?php echo $row["title"];?></h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($idName);?></div>
                        <?php echo $row["id"];?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($urlName);?></div>
                        <?php echo $row["url"];?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($descriptionName);?></div>
                        <?php echo $row["description"];?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($balanceName);?></div>
                        <?php echo number_format($row["balance"],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($priceName);?></div>
                        <?php echo number_format($row["price"],$site_info_row['truncate_currency']).' '. strtoupper($selectedCoin);?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($durationName);?></div>
                        <?php echo $row["duration"].' '.$secondsName;?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucwords($todayName.' '.$viewedName);?></div>
                        <?php echo hrfFormat($totay_views);?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucwords($viewedName);?></div>
                        <?php echo hrfFormat($row["view"]);?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($countriesName);?></div>
                        <?php echo $row["country_code"];?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($dateName);?></div>
                        <?php echo $row["date"];?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($statusName);?></div>
                        <?php 
                        if ($row['status'] == 0){
                            echo '<span class="badge text-secondary">'. ucwords($pendingName.' '.$approvalName).'</span>';
                        }elseif ($row['status'] == 1) {
                            echo '<span class="badge text-success">'. ucfirst($approvedName).'</span>';
                        }elseif ($row['status'] == 2) {
                            echo '<span class="badge text-danger">'. ucfirst($rejectedName).'</span>';
                        }elseif ($row['status'] == 3) {
                            echo '<span class="badge text-warning">'. ucfirst($cancelledName).'</span>';
                        }
                        ?>
                    </div>
                    </li>
                </ol>
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold"><?php echo ucfirst($actionName);?></div>
                        <?php
                        if ($row['active'] == 1){
                            echo '<span class="badge text-success">'. ucfirst($playName).'</span>';
                        } else {
                            echo '<span class="badge text-warning">'. ucfirst($pauseName).'</span>';
                        }
                        ?>
                    </div>
                    </li>
                </ol>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>