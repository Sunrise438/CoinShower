<button type="button" class="btn btn-outline-primary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#changeuserpbal">
    <?php echo ucfirst($changeName);?>
</button>

<!-- The Modal -->
<div class="modal" id="changeuserpbal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo ucfirst($changeName).' '. ucfirst($balanceName);?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="users_info?token=<?php echo urlencode($row['uname']);?>" onsubmit="return confirm('Are you sure you want to submit?')">
                    <input type="hidden" name="user" value="<?php echo $row['uname'];?>" required="">
                    <input type="hidden" name="userpbal" value="p" required="">
                    <div class="form-floating">
                        <input type="number" class="form-control fw-bold" name="p_bal" value="0" min="0" step="0.00000001" required="">
                        <label><?php echo ucfirst($enterName).' '. ucfirst($valueName);?></label>
                    </div>
                    
                    <div class="form-floating">
                        <select class="form-control fw-bold" name="type" required="">
                            <option value="i"><?php echo ucfirst($increaseName);?></option>
                            <option value="r"><?php echo ucfirst($reduceName);?></option>
                        </select>
                        <label><?php echo ucfirst($typeName);?></label>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-outline-primary fw-bold" value="<?php echo ucfirst($changeName);?>">

                </form>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
