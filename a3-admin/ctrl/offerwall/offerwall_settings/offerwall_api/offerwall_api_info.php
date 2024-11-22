<?php

$sql = "SELECT * FROM offerwall_action";
$result = $conn->query($sql);
if ($result->num_rows>0){
    while ($row = $result->fetch_assoc()){
        $today_offerwall_earned = todayOfferwallEarning($row['offerwall_name']);
        ?>
            
            <div class="row">
                <div class="col-lg-12 <?php if($row['status'] == 1){ echo 'bg-primary';}else{ echo 'bg-secondary';}?>  
                     bg-gradient bg-opacity-75 border border-2 rounded mt-3 mb-3 p-3">
                    <h4><a href="<?php echo $row['link'];?>" target="_blank"><?php echo $row['offerwall_name'];?></a></h4>
                    
                    <div class="row">
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($tasksName).' '.hrfFormat($row['total_tasks']);?></div>
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($paidName).' '.hrfFormat(number_format($row['total_earned'])).' '. strtoupper($selectedCoin);?></div>
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($refName.' '.$paidName).' '.hrfFormat(number_format($row['total_earned_ref'])).' '. strtoupper($selectedCoin);?></div>
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($todayName.' '.$tasksName).' '.hrfFormat($today_offerwall_earned['COUNT(id)']);?></div>
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($todayName.' '.$paidName).' '.hrfFormat(number_format($today_offerwall_earned['SUM(reward)'])).' '. strtoupper($selectedCoin);?></div>
                        <div class="col-lg-2 text-dark fw-bold"><?php echo ucfirst($userName).' '.hrfFormat($today_offerwall_earned['COUNT(DISTINCT uname)']);?></div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?php echo strtoupper($apiName).' '. ucfirst($keyName);?></div>
                                        <span class="badge bg-primary bg-gradient bg-opacity-50 text-dark"><?php echo $row['api_key'];?></span>
                                    </div>   
                                </li>
                            </ol>
                        </div>
                    
                        <div class="col-lg-6">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?php echo ucwords($secretName).' '. ucfirst($keyName);?></div>
                                        <span class="badge bg-primary bg-gradient bg-opacity-50 text-dark"><?php echo $row['secret_key'];?></span>
                                    </div>   
                                </li>
                            </ol>
                        </div>
                    </div>
                    
                    <div class="row">
                        <?php if (strlen($row['pub_id']) > 0){ ?>
                        <div class="col-lg-6">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?php echo strtoupper($pubName).' '. ucfirst($idName);?></div>
                                        <span class="badge bg-primary bg-gradient bg-opacity-50 text-dark"><?php echo $row['pub_id'];?></span>
                                    </div>   
                                </li>
                            </ol>
                        </div>
                        <?php } 
                        if (strlen($row['app_id']) >0 ){ ?>
                    
                        <div class="col-lg-6">
                            <ol class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start mt-3 mb-3">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold"><?php echo ucwords($appName).' '. ucfirst($idName);?></div>
                                        <span class="badge bg-primary bg-gradient bg-opacity-50 text-dark"><?php echo $row['app_id'];?></span>
                                    </div>   
                                </li>
                            </ol>
                        </div>
                        <?php }?>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                    
                    <?php
                    if (file_exists('../ctrl/offerwall/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'.php')){
                        ?>
                        <input type="text" value="<?php echo $site_info_row['site_url'].'/'.$row['offerwall_name'].'-postback.php';?>" id="<?php echo $row['offerwall_name'];?>input" style="visibility: hidden;">
                        <?php
                    } else if (file_exists('../plugins/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'.php')){
                        ?>
                        <input type="text" value="<?php echo $site_info_row['site_url'].'/plugins/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'-postback.php';?>" id="<?php echo $row['offerwall_name'];?>input" style="visibility: hidden;">
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">  
                                <h5>
                                    <?php
                                    echo ucwords($postbackUrlName).' : ';
                                    echo '<span class="text-primary">';
                                    if (file_exists('../ctrl/offerwall/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'.php')){
                                        echo $site_info_row['site_url'].'/'.$row['offerwall_name'].'-postback.php';
                                    } else if (file_exists('../plugins/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'.php')){
                                         echo $site_info_row['site_url'].'/plugins/'.$row['offerwall_name'].'/'.$row['offerwall_name'].'-postback.php';
                                    }
                                    echo '</span>';
                                    ?>
                                    <button class="btn btn-outline-primary btn-sm" onclick="copy('<?php echo $row['offerwall_name'];?>input', '<?php echo $row['offerwall_name'];?>tooltip')" onmouseout="outCopy('<?php echo $row['offerwall_name'];?>tooltip')">
                                        <span id="<?php echo $row['offerwall_name'];?>tooltip"><?php echo ucfirst($copyName);?></span></button>
                                </h5>
                            </div>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-lg-12">
                            <?php require 'ctrl/offerwall/offerwall_settings/whitelist/whitelist_form.php';?>
                        </div>
                    </div>
                </div>
            </div>

            
            <?php
    }
}