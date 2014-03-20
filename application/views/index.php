    <!-- wrap -->
<div class="wrap container">
    <div class ="show-select"> <span class="glyphicon glyphicon-align-justify"></span> </div>
    <hr>
    <div class="content">
        <?php foreach ($title as $row) { ?>
            <div class="per-content">
            <a class="content_title"  href ="<?php echo base_url() . "index.php/share/index/". ($row->pt_id *1024 + 19940309) * 10; ?>" >
                <?php if(empty($row->pt_role)){ echo $row ->u_name;  }
                    else {?> <!-- 我是 --><?php echo $row ->pt_role; ?> <?php }?> 推荐了<?php echo $row ->pt_cate; echo $row -> pt_content ?></a> 
                        <div class="content_date"> 
                            <?php echo $row ->pt_date; ?>
                       </div>
                <span class="post-author" data-id = "<?php echo $row ->u_sec_id; ?>" rel = "2" >
                    <a href="<?php echo base_url();?>index.php/user/index/<?php echo $row->u_name;?>" class = "post-author-name">
                        <?php echo '   ' . $row ->u_name ;?>
                    </a>
                    <div class="advance-hover">
                        <div class="post-author-detail" >
                            <div class ="arrow"></div>
                            <div class="post-author-content">
                                <div class="post-author-wrap">
                                    <div class="author-wrap-top">
                                        <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" width ='40px'  >
                                        <button type="button" data-id="<?php echo $row ->u_sec_id ;?>" data-rela="0" rel=0 class="follow">关注 </button>
                                    </div>
                                    <div class ="author-wrap-bottom">
                                        <div class="vote-num">赞同 <span></span></div>
                                        <div class="author-motto"><?php echo $row ->u_motto; ?> </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </span>
                <div class="vote">
                    <span class="vote-up" rel ="<?php echo $row ->pt_id ;?>"  id = "post-<?php echo $row ->pt_id; ?>" > 赞同 </span>
                    <span class="vote-up-num"><?php echo $row ->pt_up; ?> </span>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
    <a href="javascript:;" class="go-top center"><span class="glyphicon glyphicon-arrow-up"></span></a>
    <?php echo $links ?>
</body>
</html> 
