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
 <!--  author name -->
                        <span class="post-author post-author-msg" data-id = "<?php echo $post['u_sec_id']; ?>" rel = "2" >
                            <a href="<?php echo base_url();?>index.php/user/index/<?php echo ($post['u_id'] *1024 + 19940309)*10 ;?>" class="post-author-name">
                                <?php echo '' . $post['u_name'] ;?>
                            </a>
                            <div class="advance-hover">
                                <div class="post-author-detail" >
                                    <div class ="arrow"></div>
                                    <div class="post-author-content">
                                        <div class="post-author-wrap">
                                            <div class="author-wrap-top">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $post['u_avatar']; ?>" >
                                                <?php if((isset($id) ? $id : '0')  != $post['u_sec_id']) {  ?>
                                                <button type="button" data-id="<?php echo $post['u_sec_id'];?>" data-rale="0" rel="" class="follow">
                                                    关注 
                                                </button>
                                                <?php } ?>
                                            </div>
                                            <div class ="author-wrap-bottom">
                                                <div class="vote-num">赞同 <span></span></div>
                                                <div class="author-motto"><?php echo $post['u_motto']; ?> </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>
                        </span>
<!-- /author name -->
                        <div class = "post-author user-avata-msg ">
                            <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $post['u_avatar']; ?>" >

                            <div class="advance-hover">
                                <div class="post-author-detail" >
                                    <div class ="arrow"></div>
                                    <div class="post-author-content">
                                        <div class="post-author-wrap">
                                            <div class="author-wrap-top">
                                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $post['u_avatar']; ?>" >
                                                <?php if((isset($id) ? $id : '0')  != $post['u_sec_id']) {  ?>
                                                <button type="button" data-id="<?php echo $post['u_sec_id'];?>" data-rale="0" rel="" class="follow">
                                                    关注 
                                                </button>
                                                <?php } ?>
                                            </div>
                                            <div class ="author-wrap-bottom">
                                                <div class="vote-num">赞同 <span></span></div>
                                                <div class="author-motto"><?php echo $post['u_motto']; ?> </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div>

                       </div>

            <!-- avatar -->
                <hr />
                    <div class = "content-other-data">
            <!-- /avata -->
                    </div>
            <!--      <? //php } ?> -->
 


                    <!-- ajax 获取作者信息  -->
                    <!-- /ajax -->
                </div>
                <?php if((isset($id) ? $id : '0')  == $post['u_sec_id']) {  ?>

                    <div class="edit-button-box">
                        <i class="edit-button-icon"> </i>
                        <span class = "change-detail"> 修改</span>
                    </div>
                <?php } ?>
                <form class = "form-ckeditor" method="post" action= "<?php echo base_url();?>index.php/posts/add_post_detail">
                    <div class ="post-detail-word"><?php echo $post['pt_detail'];?></div>
                    <!-- <textarea class ="textarea" name="postDetail" rows="10" cols="80" ><?php echo $post['pt_detail']; ?></textarea> -->
                    <script id="post-edit-container" class ="textarea" name="postDetail" type="text/plain"><?php if(isset($post['pt_detail'])){echo $post['pt_detail'];} ?></script>
                    <input type="hidden" name = "postId" value = "<?php echo (($post['pt_id'] * 1024 + 19940309) * 10) ; ?>">
                    <button type="submit" class = "submit-detail btn btn-default" name= "submit-detail"> 提交 </button>
                </form>
            </div> <!-- /post-detail -->
                
            <div class="comment-title">撰写评论</div>
            <hr />
            <!-- post comment -->
            <div class ="comment">
                <?php foreach ($comment as $row){ if(!empty($row ->ct_detail)) { echo $row ->ct_detail; ?><hr /> <?php }else { }}?>
                <form method = "post" action = "<?php echo base_url(); ?>index.php/comment/insert_comment">
                    <script id="edit-container" name="comment" type="text/plain"></script>
                    <input type ="hidden" name = "postId" value = "<?php echo (($post['pt_id'] * 1024 + 19940309) * 10) ;?>" />
                    <input type ="hidden" name = "userId" value = "<?php if(empty($userId)){ echo 0; }else {echo $userId;} ?> " />
                    <button type="submit" class ="comment-submit btn btn-default"> 提交 </button>
                </form>
            </div>
            <!-- /post comment -->
        </div>
        <!-- /left label -->
        <!-- sidebar start -->
        <div class="col-md-2 g-sidebar">
            <!-- <?php echo $post['pt_detail']; ?> -->
        </div>
        <!-- /sidebar -->
    </div>
</div>
    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
<!-- /wrap -->
    <script src="<?php echo base_url(); ?>assets/js/lib/ckeditor-basic/ckeditor.js"> </script>
    <script>//CKEDITOR.replace('comment');</script> 
    <script src="<?php echo base_url(); ?>assets/edit/ueditor.config.js"> </script>
    <script src="<?php echo base_url(); ?>assets/edit/ueditor.all.min.js"> </script>
    <script type="text/javascript">
        var ue = UE.getEditor('edit-container');
    </script>
    <script src="<?php echo base_url(); ?>assets/js/edit.js"> </script>
    
</body>
</html>

