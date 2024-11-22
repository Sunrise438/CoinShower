<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

    <div class="input-group float-end">
        <select class="form-control" name="coin" required="">
            <?php
                //select coins
                $sql = "SELECT * FROM coin_type ORDER BY coin ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        if ($row['coin'] != $selectedCoin){
                            echo '<option value="'.$row['coin'].'">'.$row['coin'].'</option>';
                        } else {
                            echo '<option value="'.$row['coin'].'" selected="">'.$row['coin'].'</option>';
                        }                      
                    }
                }         
            ?>
            
        </select>
        <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($changeName);?>">
    </div>

</form>


        
