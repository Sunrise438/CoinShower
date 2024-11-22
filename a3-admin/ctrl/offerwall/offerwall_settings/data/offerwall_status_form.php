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
            if ($row['status'] == 1){
                echo '<input type="submit" class="btn btn-outline-danger btn-sm fw-bold" id="submitbtnofferwallstatus" value="'.ucfirst($disableName).'">';
                echo '<input type="hidden" name="offerwallstatus" id="offerwallstatus" value="0" required="">';
                
            } else {
                echo '<input type="submit" class="btn btn-outline-primary btn-sm fw-bold" id="submitbtnofferwallstatus" value="'.ucfirst($enableName).'">';
                echo '<input type="hidden" name="offerwallstatus" id="offerwallstatus" value="1" required="">';
            }
    }
}