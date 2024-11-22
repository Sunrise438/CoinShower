<?php 
    if ($row['status'] == 1){
?>
    <form method="post" action="users_info?token=<?php echo urlencode($row['uname']);?>" onsubmit="return confirm('Are you sure you want to submit?')">
        <input type="hidden" name="user" value="<?php echo $row['uname'];?>" required="">
        <input type="hidden" name="useracton" value="0" required="">

        <input type="submit" class="btn btn-outline-danger btn-sm fw-bold" value="<?php echo ucfirst($banName);?>">

    </form>
<?php
    } else {
?>
        <form method="post" action="users_info?token=<?php echo urlencode($row['uname']);?>" onsubmit="return confirm('Are you sure you want to submit?')">
            <input type="hidden" name="user" value="<?php echo $row['uname'];?>" required="">
            <input type="hidden" name="useracton" value="1" required="">

            <input type="submit" class="btn btn-outline-primary btn-sm fw-bold" value="<?php echo ucfirst($activeName);?>">

        </form>
<?php
    }
?>
