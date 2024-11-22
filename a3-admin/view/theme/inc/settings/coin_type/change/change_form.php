<?php
session_start();

if (isset($_SESSION['aemail'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require '../../../../../../config/config.php';
    require '../../../../../../libs/fun/fun.php';
    require '../../../../../../lng/en.php';
    
    //select Membership Permission
    $id = test_input($_POST['id']);
    
        //menu list
        $sql = "SELECT * FROM payments_currency WHERE id = '$id' ";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            $row = $result->fetch_assoc();
                ?>

                <input type="hidden" name="action" value="<?php echo $row['id'];?>" required="">

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text col-lg-4"><?php echo ucfirst($valueName);?> : </span>
                    <input type="number" class="form-control fw-bold" name="value" value="<?php echo $row['rate'];?>" 
                           step="any" min="0.00000001" required="">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text col-lg-4"><?php echo ucwords($depositName.' '.$statusName);?> : </span>
                    <div class="input-group-text">
                        <input type="radio" name="dep_status" value="1" checked="">
                        <label class="text-primary fw-bold"><?php echo ucfirst($enabledName);?></label>
                        <input class="" type="radio" name="dep_status" value="0" 
                            <?php if ($row['dep_status'] == 0){echo 'checked=""';}?>>
                        <label class="text-danger fw-bold"><?php echo ucfirst($disabledName);?></label>
                    </div>
                </div>
                
                <div class="input-group mb-3">
                    <span class="input-group-text col-lg-4"><?php echo ucwords($withdrawName.' '.$statusName);?> : </span>
                    <div class="input-group-text">
                        <input type="radio" name="wid_status" value="1" checked="">
                        <label class="text-primary fw-bold"><?php echo ucfirst($enabledName);?></label>
                        <input class="" type="radio" name="wid_status" value="0" 
                            <?php if ($row['wid_status'] == 0){echo 'checked=""';}?>>
                        <label class="text-danger fw-bold"><?php echo ucfirst($disabledName);?></label>
                    </div>
                </div>

        <?php
        }
    }
}