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
        $sql = "SELECT * FROM taxonomy WHERE id = '$id' ";
        $result = $conn->query($sql);
        if ($result->num_rows>0){
            $row = $result->fetch_assoc();
                ?>

                <input type="hidden" name="action" value="<?php echo $row['id'];?>" required="">

                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text col-lg-4"><?php echo ucfirst($nameName);?> : </span>
                    <span class="form-control fw-bold"><?php echo $row['name'];?></span>
                </div>

                <!-- status -->
                <div class="input-group mb-3">
                    <span class="input-group-text col-lg-4"><?php echo ucfirst($statusName);?> : </span>
                    <div class="input-group-text">
                        <input type="radio" name="status" value="1" checked="">
                        <label class="text-primary fw-bold"><?php echo ucfirst($enabledName);?></label>
                        <input class="" type="radio" name="status" value="0" 
                            <?php if ($row['status'] == 0){echo 'checked=""';}?>>
                        <label class="text-danger fw-bold"><?php echo ucfirst($disabledName);?></label>
                    </div>
                </div>

        <?php
        }
    }
}