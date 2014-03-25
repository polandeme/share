<!-- wrap -->
<div class="wrap container">
    <div class ="show-select"> <span class="glyphicon glyphicon-align-justify"></span> </div>
    <hr>
    <div class="content">
        <!-- index post list -->
        <div class="col-md-9">
            <?php foreach ($title as $row) { ?>
                <div class="per-content">
                    <div class = "vote" rel ="<?php echo $row ->pt_id ;?>"  id = "post-<?php echo $row ->pt_id; ?>" > 
                         <div class="vote-up-num"><?php echo $row ->pt_up; ?></div>
                        <div>票</div>
                    </div>
                    <div class = "content_title">
                            <a href ="<?php echo base_url() . "index.php/share/index/". ($row->pt_id *1024 + 19940309) * 10; ?>?aaa=111" >
                            <?php if(empty($row->pt_role)){ echo $row ->u_name;  }
                                else {?> <!-- 我是 --><?php echo $row ->pt_role; ?> <?php }?> 推荐了<?php echo $row ->pt_cate; echo $row -> pt_content ?></a> 
                    </div>
                    <div class = "content-other-data">
                            <!-- <div class="content_date">  -->
                           <!-- </div> -->
                           <div class = "user-avata-msg post-author">
                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" width ='40px' height='40px' >
                                <div class="advance-hover">
                                <div class="post-author-detail" >
                                    <div class ="arrow"></div>
                                    <div class="post-author-content">
                                        <div class="post-author-wrap">
                                            <div class="author-wrap-top">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" width ='40px'  >
                                                <button type="button" data-id="<?php echo $row ->u_sec_id ;?>" data-rale="0" rel="" class="follow">关注 </button>
                                            </div>
                                            <div class ="author-wrap-bottom">
                                                <div class="vote-num">赞同 <span></span></div>
                                                <div class="author-motto"><?php echo $row ->u_motto; ?> </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                           </div>
                            <!-- /avata -->
                        <span class="post-author post-author-msg" data-id = "<?php echo $row ->u_sec_id; ?>" rel = "2" >
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
                                                <button type="button" data-id="<?php echo $row ->u_sec_id ;?>" data-rale="0" rel="" class="follow">关注 </button>
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
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /post list -->
        <!-- index sidebar -->
        <div class ="col-md-2 col-md-offset-1 g-sidebar">
            <div class="post-nav-group">
                <a class="post-nav-item actived index-link" href="<?php echo base_url(); ?>" > 综合显示</a>
                <a class="post-nav-item" name = "followposts" href="#" > 我的关注</a>
                <a class="post-nav-item" href="followposts" >按时间显示</a>
                <a class="post-nav-item" href="hotposts" > 按热度显示</a>
            </div>

            <div class="sd-hot-cate">
                <h4>本周热门类别 </h4>
                <div class="sd-hot-cate-detail">
                    <a class="per-cate" href="#"> 
                    </a>
                <div>
            </div>
        </div>
        <!-- /sidebar -->
    </div>
</div>
    <a href="javascript:;" class="go-top center"><span class="glyphicon glyphicon-arrow-up"></span></a>
    <?php echo $links ?>
</body>
</html> 
