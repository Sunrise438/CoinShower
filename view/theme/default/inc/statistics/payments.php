 <div class="row">
    <div class="col-xl-12">
        <div class="col-xl-12"><h2><?php echo ucfirst($paymentsName);?></h2></div>
        <div class="col-xl-12">
            <?php 
            require requireStatistics();
            require __DIR__.'/payments/payments.php';
            ?>
        </div>
    </div>
</div>