    <!-- wrap -->
    <div class="wrap container">
    <span class="glyphicon glyphicon-align-justify"></span>
    <hr>
    <div class="content">
        <?php foreach ($title as $row) { ?>
            <div class="per-content">
                <a class="content_title" href ="#">     <?php echo $row ->ct_title; ?></a> 
                    <div class="content_date"> 
                        <?php echo $row ->ct_date; ?> 
                    </div>
                <?php //echo $row ->ct_up,
                           //$row ->ct_down; ?> 
            </div>
        <?php } ?>
    </div>
</body>
</html> 
