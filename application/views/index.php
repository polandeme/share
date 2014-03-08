    <!-- wrap -->
    <div class="wrap container">
    <span class="glyphicon glyphicon-align-justify"></span>
    <hr>
    <div class="content">
        <?php foreach ($title as $row) { ?>
            <div class="per-content">
            <a class="content_title" href ="#">   我是<?php echo $row ->pt_role; ?> 推荐了 <?php echo $row ->pt_cate; $row -> pt_content ?></a> 
                <div class="content_date"> 
                    <?php echo $row ->pt_date;
                          echo '   ' . $row ->u_name; ?> 
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="<?php echo ($this ->uri ->segment(3) - 1) < 0 ? $this ->uri ->segment(3) : ($this ->uri ->segment(3) -1); ?>" > 上一页 <?php //echo $this ->uri ->segment(3) + 1 ;?></a>
    <a href="<?php echo ($this ->uri ->segment(3) + 1); ?>" > 下一页 <?php //echo $this ->uri ->segment(3) + 1 ;?></a>
</body>
</html> 
