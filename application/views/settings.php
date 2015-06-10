
<!-- wrap -->
<div class="wrap container">


    <div class="content">
        <div class="setting-nav">
            <ul>
                <li>基本资料</li>
                <li>修改密码</li>
                <li>其他</li>
            </ul>
        </div>
        <div class="setting-content">
            <h2 class="title">基本资料</h2>
            <form class="setting-content-form" action="<?php echo base_url();?>index.php/settings/profile" method="POST">
                <label for="userName">用户名
                <input type="text" id="userName" name="userName" ></label>
                <label for="motto">签&nbsp;&nbsp;名&nbsp;&nbsp;
                <input type="text" id="motto" name="motto"></label>
                <label for="role1">默认角色
                <input type="text" id="role1" name="role1"></label>
                <label for="role2">第二角色
                <input type="text" id="role2" name="role2"></label>
                <input type="submit" id="settings-submit">
            </form>
        </div>
    </div>
</div>
    <a href="javascript:;" class="go-top center"><span></span></a> 
</body>
</html> 







