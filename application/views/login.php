<!-- content -->
<div class="container wrap">
    <div class="reg-content center">
<?php if(empty($userName)){ ?>
    <span class="login-tip"><?php if(isset($tip)) echo $tip; ?></span>
        <form class="form-horizontal" action="<?php echo base_url(); ?>/index.php/user/check_login" method="post" role="form">
            <div class="form-group">
                <label for="userName" class="col-sm-2 control-label"> userName </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="用户名">
                </div>
            </div>
            <div class="form-group">
                <label for="userPwd" class="col-sm-2 control-label"> Password </label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="userPwd" name="userPwd" placeholder="请输入密码">
                </div>
            </div>
           <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> 记住密码
                        </label>
                    </div>
                <div>
            </div> 
            <div class ="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default"> 登录</button>
                </div>
            </div>
        </form>
<?php }else {
    echo "你已经登录";
}?>
    </div>
</div>
</body>
</html>
