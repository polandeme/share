<!-- wrap container -->
<div class="wrap container">
    <div class="row">
        <div class="col-md-9">
            <!-- post-detail start -->
            <div class="post-detail">
                <div class="post-detail-title">
                    <h4>
                    <span><?php if(!empty($post['pt_role'])){ echo $post['pt_role']; } else {echo $post['u_name']; } ?></span>
                        <span> 推荐 </span><?php echo $post['pt_cate']; ?> <span> <?php echo $post['pt_content']; ?>
                    </h4>
                <div class="vote">
                    <span class="vote-up" rel ="<?php echo $post['pt_id'] ;?>"  id = "post-<?php echo $post['pt_id']; ?>" > 赞同 </span>
                    <span class="vote-up-num"><?php echo $post['pt_up']; ?> </span>
                </div>

                    <!-- ajax 获取作者信息  -->
                   <span class="post-author" data-id = "<?php echo $post['u_sec_id']; ?>" rel = "2" href="#" ><?php echo '   ' . $post['u_name'] ;?> 
                        <div class="post-author-detail" >
                            <div class ="arrow"></div>
                            <div class="post-author-content">
                                <span> </span> 
                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $post['u_avatar']; ?>" width ='40px'  >
                                <button type="button" data-id="<?php echo $post['u_sec_id'] ;?>" data-rela="0" rel=0 class="follow">关注 </button>
                            </div> 
                        </div> 
                    </span>
                    <!-- /ajax -->
                </div>
                <form class = "form-ckeditor" method="post" action= "<?php echo base_url();?>index.php/posts/add_post_detail">
                    <div class ="post-detail-word"><?php echo $post['pt_detail'];?></div>
                    <textarea class ="textarea" name="postDetail" rows="10" cols="80" ><?php echo $post['pt_detail']; ?></textarea>
                    <input type="hidden" name = "postId" value = "<?php echo (($post['pt_id'] * 1024 + 19940309) * 10) ; ?>">
                    <button type="submit" class = "submit-detail" name= "submit-detail"> 提交 </button>
                </form>
                <div class = "change-detail"> 修改</div>
            </div> <!-- /post-detail -->
            <hr />
            <!-- post comment -->
            <div class ="comment">
                <form method = "post" action = "<?php echo base_url(); ?>index.php/comment/insert_comment">
                    <textarea class ="comment-text" name="comment" style ="display:none" rows="0" cols="0" > 
                    </textarea>
                    <input type ="hidden" name = "postId" value = "<?php echo (($post['pt_id'] * 1024 + 19940309) * 10) ;?>" />
                    <input type ="hidden" name = "userId" value = "<?php if(empty($userId)){ echo 0; }else {echo $userId;} ?> " />
                    <button type="submit" class ="comment-submit"> 提交 </button>
                </form>
                <?php foreach ($comment as $row){ if(!empty($row ->ct_detail)) { echo $row ->ct_detail; ?><hr /> <?php }else { }}?>
            </div>
            <!-- /post comment -->
        </div>
        <!-- /left label -->
        <!-- sidebar start -->
        <div class="col-md-2 share-sidebar">
            <?php echo $post['pt_detail']; ?>
        </div>
        <!-- /sidebar -->
    </div>
</div>
<!-- /wrap -->
    <script src="<?php echo base_url(); ?>assets/js/lib/ckeditor-basic/ckeditor.js"> </script>
    <script>CKEDITOR.replace('comment');</script> 
</body>
</html>

