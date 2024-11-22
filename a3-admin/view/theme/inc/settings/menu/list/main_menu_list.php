<ul class="list1 list-group">
    <?php
    $menu = listMenu('m');
    if ($menu != 0){
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
        ">
        <div class="d-flex">
            <div class="me-3"><?php echo $menu_row['id'];?></div>
            <div><?php echo $menu_row['name'];?></div>
        </div>
        </li>
        <?php
        if ($menu_row['relation'] == 'p'){
            require __DIR__.'/chlid_menu_list.php';
        }
        }
    }
    ?>
</ul>