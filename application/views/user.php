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
<script type="text/javascript">
    $(".sub-ava").click(function() {
        $(".sub-form").submit();
    })
        $("#f").change(function() {
            $('.crop-img-wrap').show();
            change();
        });
        function get_position(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        }
        function Jcrop_api() {
            $('#preview').Jcrop({
                onSelect: get_position,
                aspectRatio: 1
            });
        }

        function change() {
             var pic = document.getElementById("preview");
             var file = document.getElementById("f");
             var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();
             // gif在IE浏览器暂时无法显示
             if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
                 alert("文件必须为图片！"); return;
             }
             // IE浏览器
             if (document.all) {
         
                 file.select();
                 var reallocalpath = document.selection.createRange().text;
                 var ie6 = /msie 6/i.test(navigator.userAgent);
                 // IE6浏览器设置img的src为本地路径可以直接显示图片
                 if (ie6) pic.src = reallocalpath;
                 else {
                     // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                     pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                     // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                     pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                 }
             }else{
                 html5Reader(file);
             }
         }
 
         function html5Reader(file){
             var file = file.files[0];
             var reader = new FileReader();
             reader.readAsDataURL(file);
             reader.onload = function(e){
                 var pic = document.getElementById("preview");
                 pic.src=this.result;
             }
         }

         $('#preview').load(function() {
            Jcrop_api();
         })
        
    
</script>
</body>
</html>
