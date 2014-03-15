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
                </div>
                <form class = "form-ckeditor" method="post" action= "<?php echo base_url();?>index.php/posts/add_post_detail">
<div class ="psot-detail-word">
<?php echo $post['pt_detail']; ?>
</div>
                    <textarea class ="textarea" name="postDetail" rows="10" cols="80" > 
                    </textarea>
                    <input type="hidden" name = "postId" value = "<?php echo (($post['pt_id'] * 1024 + 19940309) * 10) ; ?>">
                    <button type="submit" class = "submit-detail" name= "submit-detail"> 提交 </button>
                </form>
            </div> <!-- /post-detail -->
            <hr />
            <div class ="comment">
                <textarea class ="comment-text" name="comment" rows="10" cols="80" > 
                </textarea>
                <button type="submit"> 提交 </button>
            </div>
        </div>
        <!-- sidebar start -->
        <div class="col-md-2 share-sidebar">
            <?php print_r($post);
            echo $post['pt_detail'];
?>
        </div>
        <!-- /sidebar -->
    </div>
</div>
    <script src="<?php echo base_url(); ?>assets/js/lib/ckeditor-basic/ckeditor.js"> </script>
</body>
</html>

