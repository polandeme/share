    <!-- wrap -->
    <div class="wrap container">
    <div class ="show-select"> <span class="glyphicon glyphicon-align-justify"></span> </div>
    <hr>
    <div class="content">
        <?php foreach ($title as $row) { ?>
            <div class="per-content">
            <a class="content_title"  href ="#" >  <?php if(empty($row->pt_role)){ echo $row ->u_name;  }
                else {?> <!-- 我是 --><?php echo $row ->pt_role; ?> <?php }?> 推荐了 <?php echo $row ->pt_cate; echo '      '. $row -> pt_content ?></a> 
                    <div class="content_date"> 
                    <?php echo $row ->pt_date; ?>
               </div>
                            <a class="post-author" data-id = "<?php echo $row ->id; ?>" href="#" ><?php echo '   ' . $row ->u_name ;?>
                <div class="post-author-detail" >
                    <div class ="arrow"></div>
                    <div class="post-author-content">
                    <span> </span> 
                    <button type="button" data-id="<?php echo $row ->id ;?>" rel="2" class="follow">关注 </button>
                </div>
            </div>
            </a>
                        <div class="vote">
                            <span class="vote-up" rel ="<?php echo $row ->pt_id?>"  id = "post-<?php echo $row ->pt_id; ?>" > 赞同 </span>
                            <span class="vote-up-num"><?php echo $row ->pt_up; ?> </span>
                        </div>
            </div>
        <?php } ?>
    </div>
    <a href="javascript:;" class="go-top center"><span class="glyphicon glyphicon-arrow-up"></span></a>
<?php echo $links ?>
</body>
</html> 
