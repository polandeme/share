<!-- content -->
<div class="container wrap">
    <div class="reg-content">
    <?php if(empty($userName)){?>
        <form class="form-horizontal row" action="<?php echo base_url(); ?>index.php/user/add_user" method="post"  role="form">
            <div class="form-group">
                <label for="userName" class="col-sm-2 control-label"> 用户名 </label>
                <div class="col-sm-10">
                    <input type="text" 
                           class="form-control" 
                           id="userName" 
                           name="userName" 
                           placeholder="请输入用户名">

                    <span class="reg-tips tips">
                        <span class="glyphicon glyphicon-ok"></span>
                        <span class="glyphicon glyphicon-remove"></span>
                        <span class="reg-tips-text">用户名已被占用</span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="Email" class="col-sm-2 control-label"> 邮箱 </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="userEm" name="userEmail" placeholder="请输入邮箱">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label"> 密码 </label>
                <div class="col-sm-10">
                    <input type="password" 
                           class="form-control" 
                           id="userPwd" 
                           name="userPwd" 
                           placeholder="请输入密码">
                </div>
            </div>
            <div class="form-group">
                <label for="rePassword" class="col-sm-2 control-label"> 重复密码 </label>
                <div class="col-sm-10">
                    <input type="password" 
                           class="form-control" 
                           id="userPwd" 
                           name="userPwdConfirm" 
                           placeholder="请确认密码">
                </div>
                <span class ="pwd-note"></span>
            </div>
            <div class ="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-default register-btn-sd"> 
                        注册 
                    </button>
                </div>
            </div>
        </form>
    <?php } else {echo redirect('/');}?>
    </div>
</div>
<!-- /content -->
</body>
</html>
