<form method="post" action="users_info?token=<?php echo urlencode($user_email);?>" onsubmit="return confirm('Are you sure you want to submit?')">
    <input type="hidden" name="user" value="<?php echo $user_email;?>" required="">
    <input type="hidden" name="userdelete" value="d" required="">

    <input type="submit" class="btn btn-outline-danger btn-sm fw-bold" value="<?php echo ucfirst($deleteName).' '. ucfirst($userName);?>">

</form>

