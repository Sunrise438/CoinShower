<?php

$offerwall_row = getOfferwallList();

if ($offerwall_row != 0) {
  // output data of each row
  echo '<div class="row">';
  foreach ($offerwall_row AS $row) {
        $today_offerwall_earned = todayOfferwallEarning($row['offerwall_name']);
        $today_offerwall_earned_user = todayOfferwallEarningByUser($row['offerwall_name']);
        $today_offerwall_earned_ref = todayOfferwallEarningRef($row['offerwall_name']);
        $user_info = userInfoByUsername(test_input($_SESSION['uname']));
      ?>
<div class="offerwall-blade col-lg-6 p3 mt-3 mb-1">
    <div class="col-lg-12 p4 bg-dark text-dark rounded">
        <h2 class="ms-2">
            <a href="<?php echo ucfirst($row['link']);?>" target="_blank"><?php echo ucfirst($row['offerwall_name']);?></a>
        </h2>
        
        <ul class="list-group text-dark fw-bold">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo ucfirst($totalName).' '. ucfirst($tasksName).' '.$byName.' '. ucfirst($usersName);?>
                <span class="badge bg-primary rounded-pill"><?php echo hrfFormat($row['total_tasks']);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo ucfirst($totalName).' '. ucfirst($earnedName).' '.$byName.' '. ucfirst($usersName);?>
                <span class="badge bg-primary rounded-pill"><?php echo number_format($row['total_earned'],8);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">
                <?php echo ucfirst($todayName).' '. ucfirst($tasksName).' '.$byName.' '. ucfirst($usersName);?>
                <span class="badge bg-primary rounded-pill"><?php echo hrfFormat($today_offerwall_earned_user['COUNT(id)']);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-secondary">
                <?php echo ucfirst($todayName).' '. ucfirst($earnedName).' '.$byName.' '. ucfirst($usersName);?>
                <span class="badge bg-primary rounded-pill"><?php echo number_format($today_offerwall_earned_user['SUM(reward)'],8);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-info">
                <?php echo ucfirst($todayName).' '. ucfirst($tasksName).' '.$byName.' '. ucfirst($youName);?>
                <span class="badge bg-primary rounded-pill"><?php echo hrfFormat($today_offerwall_earned['COUNT(id)']);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-info">
                <?php echo ucfirst($todayName).' '. ucfirst($earnedName).' '.$byName.' '. ucfirst($youName);?>
                <span class="badge bg-primary rounded-pill"><?php echo number_format($today_offerwall_earned['SUM(reward)'],8);?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center text-success">
                <?php echo ucfirst($todayName).' '. ucfirst($earnedName).' '.$byName.' '. ucfirst($referralsName);?>
                <span class="badge bg-primary rounded-pill"><?php echo number_format($today_offerwall_earned_ref['SUM(reward)'],8);?></span>
            </li>
        </ul>
        <div class="d-grid">
    <a href="?offer=<?php echo $row['offerwall_name'];?>" class="btn btn-outline-success btn-lg btn-block">
            <?php echo ucfirst($row['offerwall_name']);?> <i class="bi bi-box-arrow-up-right"></i></a>
        </div>
    </div>
</div>


    <?php
  }
  echo '</div>';
} else {
    echo '<div class="alert alert-secondary">';
    echo '<strong>'.ucfirst($notAvilableOferwallThisTimeName).'!</strong>';
    echo '</div>';
}