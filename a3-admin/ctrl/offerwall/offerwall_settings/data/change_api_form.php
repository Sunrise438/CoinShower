<?php
    require '../../../../lng/en.php';
    require '../../../../config/config.php';
    require '../../../../libs/fun/fun.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $offerwall_id = test_input($_POST['txt']);
    
    $sql = "SELECT * FROM offerwall_action WHERE id = $offerwall_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        ?>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="apikey" 
                   value="<?php echo $row['api_key'];?>" required="">
            <label><?php echo ucfirst($enterName).' '. ucwords($apiName).' '. ucfirst($keyName);?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="secretkey" 
                   value="<?php echo $row['secret_key'];?>" required="">
            <label><?php echo ucfirst($enterName).' '. ucfirst($secretName).' '. ucfirst($keyName);?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="pubid" 
                   value="<?php echo $row['pub_id'];?>">
            <label><?php echo ucwords($enterName.' '. $pubName.' '. $idName.' ('.$optionalName.')');?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="appid" 
                   value="<?php echo $row['app_id'];?>">
            <label><?php echo ucwords($enterName.' '. $appName.' '. $idName.' ('.$optionalName.')');?></label>
        </div>
        <?php
            
    }
}