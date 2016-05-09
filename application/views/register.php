<!-- content -->
<div class="container wrap">
    <div class="reg-content center">
    <?php if(empty($userName)){?>
        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/user/add_user" method="post"  role="form">
            <div class="form-group">
                <label for="userName" class="col-sm-2 control-label"> UserName </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="请输入用户名">
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label"> Email </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="userEm" name="userEmail" placeholder="请输入邮箱">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"> Password </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="userPwd" name="userPwd" placeholder="请输入密码">
                </div>
            </div>
            <div class="form-group">
                <label for="rePassword" class="col-sm-2 control-label"> Password </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="userPwd" name="userPwdConfirm" placeholder="请确认密码">
                </div>
                    <span class ="pwd-note"></span>
            </div>
            <div class ="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"> 注册 </button>
                </div>
            </div>
        </form>
    <?php } else {echo redirect('/');}?>
    </div>
</div>
<!-- /content -->
</body>
</html>
