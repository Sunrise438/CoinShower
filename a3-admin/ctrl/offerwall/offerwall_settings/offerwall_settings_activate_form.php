<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group float-end" id="offerwalltypeinputgroup">
        <select class="form-control" name="offerwalltype" id="offerwalltype" required="">
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
    </div>
</form>