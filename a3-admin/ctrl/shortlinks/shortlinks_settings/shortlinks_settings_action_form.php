<div class="row">
    <div class="col-xl-6">
        <ul class="list-group">
        <!-- surf status -->
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold"><?php echo ucwords($shortlinksName.' '.$statusName);?></div>
                    <?php 
                        if ($site_info_row['shortlinks_action']){
                            echo '<h5><span class="badge bg-primary">'. ucfirst($enabledName).'</span></h5>';
                        } else {
                            echo '<h5><span class="badge bg-secondary">'. ucfirst($disabledName).'</span></h5>';
                        }
                    ?>
                </div>
                    <?php 
                        if ($site_info_row['shortlinks_action']){
                    ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                            <input type="hidden" name="shortlinks_action" value="0" required="">

                            <input type="submit" class="btn btn-outline-secondary btn-sm fw-bold" value="<?php echo ucfirst($disableName);?>">

                        </form>
                    <?php
                        } else {
                    ?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

                                <input type="hidden" name="shortlinks_action" value="1" required="">

                                <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($enableName);?>">

                            </form>
                    <?php
                        }
                    ?>
            </li>
        </ul>
    </div>
</div>