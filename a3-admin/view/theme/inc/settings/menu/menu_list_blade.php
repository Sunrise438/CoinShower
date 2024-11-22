<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="sortable-list">
        <ul class="list-group" id="sortable">
            <?php
            $menu = getMenuItems();
                foreach ($menu AS $menu_row){
                    ?>

                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold
                    <?php 
                    if ($menu_row['relation'] == 'd'){
                        echo 'bg-dark bg-gradient bg-opacity-50';
                    }else if ($menu_row['relation'] == 'p'){
                        echo 'bg-primary bg-gradient bg-opacity-75';
                    }else if ($menu_row['relation'] == 'c'){
                        echo 'bg-primary bg-gradient bg-opacity-50';
                    }
                    ?>
                    " draggable="true">
                    
                    <input type="hidden" name="menu_order[]" value="<?php echo $menu_row['id'];?>" readonly=""/>
                    
                    <div class="d-flex">
                        <div class="me-3"><?php echo $menu_row['id'];?></div>
                        <div>
                            <?php 
                            echo $menu_row['name'];
                            if ($menu_row['type'] == 'm'){
                                echo ' (<span class="text-secondary">'.$mainName.'</span>, ';
                            }else if ($menu_row['type'] == 's'){
                                echo ' (<span class="text-secondary">'.$sideName.'</span>, ';
                            }else if ($menu_row['type'] == 'u'){
                                echo ' (<span class="text-secondary">'.$userName.'</span>, ';
                            }else if ($menu_row['type'] == 'f'){
                                echo ' (<span class="text-secondary">'.$footerName.'</span>, ';
                            } else {
                                echo ' (';
                            }
                            if ($menu_row['status']){
                                echo '<span class="text-success">'.$enabledName.')</span>';
                            } else {
                                echo '<span class="text-danger">'.$disabledName.'</span>)';
                            }
                            ?>
                        </div>
                    </div>

                    <span>
                        <?php
                        if ($menu_row['removable']){
                            ?>
                        <a onclick="javascript:confirmationDelete($(this));return false;" 
                           class="material-icons text-danger border-0" href="menu?q=delete&token=<?php echo $menu_row['id'];?>">
                               delete</a>

                        <?php }
                        ?>
                        <button class="material-icons bg-transparent text-primary border-0" onclick="change(this.value)"
                                  data-bs-toggle="modal" data-bs-target="#menuform"
                            title="<?php echo ucfirst($addName).' '.$toName.' '. ucfirst($menuName)?>"
                            value="<?php echo $menu_row['id'];?>">edit</button>
                    </span>
                    </li>

            <?php }?>

        </ul>
    </div>
    <li class="list-group-item d-flex justify-content-between align-items-center fw-bold">
                    <button class="btn btn-outline-success" type="submit"
            title="<?php echo ucfirst($changeName).' '.$orderName;?>">
                <?php echo ucfirst($changeName).' '.ucfirst($orderName);?></button>
    </li>
</form>

<li class="list-group-item d-flex justify-content-between align-items-center fw-bold">

    <span><button class="btn btn-outline-success"
                  data-bs-toggle="modal" data-bs-target="#addnew"
            title="<?php echo ucfirst($addName).' '.$newName;?>">
                <?php echo ucfirst($addName).' '.ucfirst($newName);?></button></span>
    </li>
<?php require_once __DIR__.'/new/new_form_modal.php';?>


<script>
    function confirmationDelete(anchor)
    {
       var conf = confirm('Are you sure want to do this?');
       if(conf)
          window.location=anchor.attr("href");
    }
</script>