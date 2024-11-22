<button class="btn btn-outline-primary btn-sm" id="viewchangeofferwallapi"><?php echo ucfirst($changeName).' '. ucwords($apiName);?></button>
<div class="row">
<div class="col-lg-6 d-none" id="changeofferwallapiform">
    
    <h4><?php echo ucfirst($changeName).' '. ucwords($apiName);?></h4>
    
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    
    <div class="form-oating mt-3 mb-3">
        <select class="form-control" name="offerwalltype" id="offerwalltypeapi" required="">
            <?php
                //select coins
                $sql = "SELECT * FROM offerwall_action";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        if ($row['status'] == 1){
                            echo '<option class="text-primary" value="'.$row['id'].'">'.$row['offerwall_name'].'</option>';
                        } else {
                            echo '<option class="text-secondary" value="'.$row['id'].'">'.$row['offerwall_name'].'</option>';
                        }                      
                    }
                }         
            ?>
            
        </select>
        <label><?php echo ucfirst($selectName).' '. ucfirst($offerwallName);?></label>
    </div>
    
    <div id="changeapiform"></div>
    
    <div class="form-floating mb-3">
        <button type="submit" class="btn btn-outline-primary"><?php echo ucfirst($changeName);?></button>
    </div>
    
</form>
    
</div>
<div class="col-lg-6"></div>
</div>
