<div class="row text-center rounded mt-3 mb-3">
    
    <div class="col-xl-4 mt-2 mb-2 p-2">
        <div class="col-xl-12 border border border-2 rounded p-2">
            <h2 class="text-success"><span class="material-icons">people_alt</span><?php echo ucfirst($usersName);?></h2>
            <h3 class="fw-bold"><?php echo hrfFormat(totalUserByLastId());?></h3>
        </div>
    </div>
    
    <div class="col-xl-4 mt-2 mb-2 p-2">
        <div class="col-xl-12 border border border-2 rounded p-2">
            <h2 class="text-success"><span class="material-icons">account_balance</span><?php echo ucfirst($paidName);?></h2>
            <h3 class="fw-bold"><?php echo hrfFormat(totalEarned());?></h3>
        </div>
    </div>
    
    <div class="col-xl-4 mt-2 mb-2 p-2">
        <div class="col-xl-12 border border border-2 rounded p-2">
            <h2 class="text-success"><span class="material-icons">task_alt</span><?php echo ucfirst($tasksName);?></h3>
            <h3 class="fw-bold"><?php echo hrfFormat(totalTasks());?></h3>
        </div>
    </div>
    
</div>