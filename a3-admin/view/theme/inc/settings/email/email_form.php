<!-- The email settings Modal -->
<div class="modal" id="email">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo ucfirst($editName.' '. $emailName.' '. $settingsName);?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <!-- Modal body -->
                <div class="modal-body">
                    
                    <input type="hidden" name="emailsettings" required="">
    
                    
                     <div class="input-group mt-3 mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($emailName);?> : </b></label>
                            <input type="email" name="email" class="form-control" value="<?php echo $mrow['uname'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($emailName);?>" required="">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($emailName).' '. ucfirst($hostName);?> : </b></label>
                            <input type="text" name="emailhost" class="form-control" value="<?php echo $mrow['host'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '. ucfirst($emailName).' '.ucfirst($hostName);?>" required="">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($fromName);?> : </b></label>
                            <input type="text" name="from" class="form-control" value="<?php echo $mrow['sender'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($fromName);?>" required="">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($fromName).' '. ucfirst($nameName);?> : </b></label>
                        <input type="text" name="fromname" class="form-control" value="<?php echo $mrow['sender_name'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($fromName).' '. ucfirst($nameName);?>" required="">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($passwordName);?> : </b></label>
                            <input type="password" name="pass" class="form-control" value="<?php echo $mrow['pass'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($passwordName);?>" required="">
                    </div>

                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($portName);?> : </b></label>
                            <input type="number" name="port" class="form-control" value="<?php echo $mrow['port'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($portName);?>" required="">
                    </div>
                    
                    <div class="input-group mb-3">
                        <label class="input-group-text col-xl-3"><b><?php echo ucfirst($secureName);?> : </b></label>
                            <input type="text" name="secure" class="form-control" value="<?php echo $mrow['secure'];?>" 
                                   placeholder="<?php echo ucfirst($enterName).' '.ucfirst($secureName);?>" required="">
                    </div>
                    
                    <!-- smtp status -->
                    <div class="input-group mb-3">
                        <span class="input-group-text col-xl-3"><?php echo strtoupper('SMTP');?> : </span>
                        <div class="input-group-text">
                            <input type="radio" name="is_smtp" value="1" checked="">
                            <label class="text-primary fw-bold"><?php echo ucfirst($enabledName);?></label>
                            <input class="" type="radio" name="is_smtp" value="0" 
                                <?php if ($mrow['is_smtp'] == 0){echo 'checked=""';}?>>
                            <label class="text-danger fw-bold"><?php echo ucfirst($disabledName);?></label>
                        </div>
                    </div>
                    
                    <!-- status -->
                    <div class="input-group mb-3">
                        <span class="input-group-text col-xl-3"><?php echo ucfirst($statusName);?> : </span>
                        <div class="input-group-text">
                            <input type="radio" name="status" value="1" checked="">
                            <label class="text-primary fw-bold"><?php echo ucfirst($enabledName);?></label>
                            <input class="" type="radio" name="status" value="0" 
                                <?php if ($mrow['status'] == 0){echo 'checked=""';}?>>
                            <label class="text-danger fw-bold"><?php echo ucfirst($disabledName);?></label>
                        </div>
                    </div>
                    
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button  class="btn btn-outline-primary" type="submit"><?php echo ucfirst($saveName)?></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo ucfirst($closeName)?></button>
                </div>
                    </form>

        </div>
    </div>
</div>
</div>