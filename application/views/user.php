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
        <form enctype="multipart/form-data" class="sub-form" target="ifr-avat" method="POST" action = "<?php echo base_url(); ?>index.php/user/upload_avat"> 
            <input type="file" id ="select-file" name="file" value="选择" >
            <input type="hidden" name = "userName" value= "<?php echo $userName; ?>" /> 
            <input type="hidden" name="<?php echo ini_get('session.upload_progress.name'); ?>" value="test" />
            <input type="submit" name="submit" class = "btn-up-avat" value="upload" />
            </iframe>
        </form>
        <div id="progress" class="progress" style="margin-bottom:15px;display:none;">
                <div class="bar" style="width:0%;"></div>
                <div class="label">0%</div>
        </div>
        <iframe style="display: none;" id = "ifr-upload" name = "ifr-avat" action = "<?php echo base_url(); ?>index.php/user/upload_avat"  > </iframe>
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
