    <!-- wrap -->
    <div class="wrap container">
    <div class ="show-select"> <span class="glyphicon glyphicon-align-justify"></span> </div>
    <hr>
    <div class="content">
        <?php foreach ($title as $row) { ?>
            <div class="per-content">
            <a class="content_title" href ="#">   我是<?php echo $row ->pt_role; ?> 推荐了 <?php echo $row ->pt_cate; echo '      '. $row -> pt_content ?></a> 
                <div class="content_date"> 
                    <?php echo $row ->pt_date;
                          echo '   ' . $row ->u_name; ?> 
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="javascript:;" class="go-top center"><span class="glyphicon glyphicon-arrow-up"></span></a>
<?php echo $links ?>
</body>
</html> 
