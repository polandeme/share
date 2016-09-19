<!-- wrap -->
<div class="wrap container">
<!--     <div class ="show-select"> 
        <span class="glyphicon glyphicon-align-justify">
        </span> 
    </div> -->
    <hr>
    <div class="content">
        <!-- index post list -->
        <div class="col-md-9">
            <?php foreach ($title as $row) { ?>

                <div class="per-content">
                    <div class="<?php echo $row->is_up ? $row->is_up : 'vote ' ; ?>" rel="<?php echo $row ->pt_id;?>" id="post-<?php echo $row ->pt_id; ?>" > 
                         <div class="vote-up-num"><?php echo $row ->pt_up ? $row ->pt_up : 0; ?></div>
                         <div>票</div>
                    </div>
                    <div class = "content_title">
                            <a href ="<?php echo base_url() . "index.php/share/index/". ($row->pt_id *1024 + 19940309) * 10; ?>?aaa=111" >
<?php 
if(empty($row->pt_role)){ 
    echo $row ->u_role1 ? ($row -> u_role1) : (($row -> u_role2) ?($row -> u_role2) : ($row -> u_name) );  
}else {?> 
                                <!-- 我是 --><?php echo $row ->pt_role; ?><?php }?>
                                    推荐了
                                <?php echo $row ->pt_cate; echo $row -> pt_content ?>
                            </a> 
                    </div>

                    <div class = "content-other-data">

                           <div class = "user-avata-msg post-author" data-id = "<?php echo $row ->u_sec_id; ?>" rel = "2" >
                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" >
                                <div class="advance-hover">
                                <div class="post-author-detail" >
                                    <div class ="arrow"></div>
                                    <div class="post-author-content">
                                        <div class="post-author-wrap">
                                            <div class="author-wrap-top">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" >
                                                <button type="button" data-id="<?php echo $row ->u_sec_id;?>" data-rale="0" rel="" class="follow btn btn-default">
                                                    关注 
                                                </button>
                                            </div>
                                            <div class ="author-wrap-bottom">
                                                <div class="vote-num">赞同 <span></span></div>
                                                <div class="fans-num">粉丝<span><?php echo $fans; ?></span></div>
                                                <div class="author-motto"><?php echo $row ->u_motto; ?> </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                           </div>
                            <!-- /avata -->
                            <div class="content_date"> 
<?php 
    $date = $row ->pt_date;
    echo substr($date,0,10); ?>
                           </div>

                            <span class="post-author post-author-msg " data-id = "<?php echo $row ->u_sec_id; ?>" rel = "2" >
                            <a href="<?php echo base_url();?>index.php/user/index/<?php echo ($row->u_id *1024 + 19940309)*10 ;?>" class="post-author-name">
                                <?php echo '' . $row ->u_name ;?>
                            </a>
                            <div class="advance-hover">
                                <div class="post-author-detail" >
                                    <div class ="arrow"></div>
                                    <div class="post-author-content">
                                        <div class="post-author-wrap">
                                            <div class="author-wrap-top">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $row ->u_avatar; ?>" >
                                                <button type="button " data-id="<?php echo $row ->u_sec_id ;?>" data-rale="0" rel="" class="follow btn btn-default">
                                                    关注 
                                                </button>
                                            </div>
                                            <div class ="author-wrap-bottom">
                                                <div class="vote-num">赞同 <span></span></div>
                                                <div class="fans-num">粉丝<span><?php echo $fans; ?></span></div>
                                                <div class="author-motto"><?php echo $row ->u_motto; ?> </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </span>
                            <div class="post-com-num">
                                <!-- 评论(<span><?php echo $row ->pt_com_num; ?><span>) -->
                           </div>

                    </div>
                </div>
            <?php } ?>

            <div class="paginatin-wrap">
                <?php echo $links ?>
            </div>

        </div>
        <!-- /post list -->
        <!-- index sidebar -->
        <div class ="col-md-2 col-md-offset-1 g-sidebar">
            <div class="post-nav-group">
                <a class="post-nav-item actived index-link" href="<?php echo base_url(); ?>" > 综合显示</a>
                <a class="post-nav-item" name = "followposts" href="<?php echo base_url(); ?>index.php/following" > 我的关注</a>
                <a class="post-nav-item" href="<?php echo base_url(); ?>index.php/ptime" >按时间显示</a>
            </div>

            <div class="sd-hot-cate">
                <h4>本周热门类别 </h4>
                <div class="sd-hot-cate-detail">
                    <?php foreach($cate as $hotCate) { ?>
                        <li>
                        <a class="per-cate" 
                           href="<?php echo base_url(); ?>index.php/search/search_cate?search=<?php echo $hotCate ->pt_cate; ?>">
                            <?php  echo $hotCate ->pt_cate; ?> 
                        </a>
                        </li>
                    <?php } ?>
                </div>
            </div>
            <div class="sd-hot-role">
                <h4>本周热门角色 </h4>
                <div class="sd-hot-role-detail">
                    <?php foreach($role as $hotRole) { ?>
                    <li><a class="per-role" href="#">
                    <?php   if($hotRole != '') { echo $hotRole ->  pt_role;} ?> 
                    </a></li>
                    <?php } ?>
                </div>
            </div>
            <div class="sd-hot-user">
                <h4>本周热门用户 </h4>
                <div class="sd-hot-user-detail">
                    <?php foreach($user  as $hotUser) { ?>
                    <li>
                        <a class="per-user" href="#">
<?php  
    if($hotUser != '') { echo $hotUser['u_name'] ;} 
?> 
                        </a>
<?php if(!empty($hotUser['u_role1']))
echo '(' . $hotUser['u_role1'] . ')' ; ?>
                        <div class="hot-user-motto">
<?php  
if($hotUser != '') { echo $hotUser['u_motto'];} 
?> 
                        </div>
                    </li>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /sidebar -->

    </div>
</div>
    <a href="javascript:;" class="go-top center"><span></span></a>

<script src="<?php echo base_url(); ?>assets/js/lib/require.js" 
data-main="<?php echo base_url(); ?>assets/js/index">
    </script>

    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js" ></script> -->
</body>
</html> 
