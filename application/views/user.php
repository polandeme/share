<!-- wrap -->
<div class = "wrap container">
    <div class="row">
        <div class="msg-name" rel = "<?php echo $user['u_name']; ?>" > <?php echo $user['u_name']; ?> </div>
        <div class = "col-md-12 user-msg">
            <div class ="user-msg-content">
                <div class ="user-msg-left">
                    <div class = "user-msg-basic">
                        <img src="<?php echo base_url() . "assets/uploads/images/avatar/". $user['u_avatar'];?>" class="user-avatar-img" />
                        <span class="upload-avatar-btn po-hide">上传头像</span>
                        <div class ="user-reg-time">加入时间:<?php echo date("Y-m-d",$user['u_reg_time']); ?> </div>
                    </div>
                    <div class="msg-up-num">被赞 <span><?php echo $user['u_up'];?> </span></div>
                    <div class="user-msg-bottom">
                        <span class="msg-motto"> <?php echo $user['u_motto']; ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($userName)) { ?>
    <div class="upload-avat">
        <form enctype="multipart/form-data" class="sub-form"  method="POST" action = "<?php echo base_url(); ?>index.php/user/upload_avat"> 
            <input type="file" id ="select-file" name="file" value="选择" >
            <input type="hidden" id="x" name='x'>
            <input type="hidden" id="y" name='y'>
            <input type="hidden" id="w" name='w'>
            <input type="hidden" id="h" name="h">
            <input type="hidden" id="r" name="r">
            <input type="hidden" name = "userName" value= "<?php echo $userName; ?>" /> 
        </form>
        <div class="crop-img-wrap">
            <div class="crop-img-content">
                预览：<img id="preview" alt="" name="pic" />
                <button  class="sub-ava" >确认</button>
            </div>
        </div>
    </div>

    <?php }?>

</div>

<?php foreach($posts as $row) {
    echo $row ->pt_cate;
    echo $row ->pt_content;
}
?>

<!-- /wrap  -->

</body>
</html>
