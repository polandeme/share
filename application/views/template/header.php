<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title> Share </title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/jquery.Jcrop.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/page/user.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/page/user.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/page/home.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery-1.10.2.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery.Jcrop.min.js" ></script>
    <script> var base_url = "<?php echo base_url(); ?>"; </script>

    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js" ></script> -->

</head>
<body>
    <!-- head -->
    <header class="navbar navbar-default nav-menu" role="navigation">
        <div class ="container header-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"> navigation </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                    <span class="icon-bar"> </span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"> LoGo </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="navbar-form navbar-left form-input" action = "<?php echo base_url(); ?>index.php/search"role="serch">
                    <div class="form-group">
                        <input type="text" name ="search" class="form-control search-input" id="input-search" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default btn-search"> 搜索 </button>
                </form>
                    <?php if(empty($userName)){ ?> <!-- 未登录 -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url();?>user/login"> 登录</a> </li>
                        <li><a href="<?php echo base_url(); ?>user/register">注册</a> </li>
                    </ul> 
                    <?php } else {?> <!-- 登录 -->
                    <ul class="nav navbar-nav navbar-right">
                    <li class="user-link">
                        <div class="user-s-avatar">
                            <img src="<?php echo base_url('assets/uploads/images/avatar\/') . $userAvat; ?>">
                        </div> 
                        <div class="top-arrow"></div>
                        <div class="user-items" id="user-tab">
                            <a  class="logout" href="<?php echo base_url() ?>index.php/user/logout"> 退出登录 </a>
                            <div class="user-m-avatar">
                                <img src="<?php echo base_url('assets/uploads/images/avatar\/') . $userAvat; ?>">
                            </div>
                            <div class="nav-profile">
                                <div class="nav-name" id="navName">
                                    <?php echo $userName; ?>
                                </div>
                                <div class="nav-motto">
                                    <?php echo $userMotto; ?>     
                                </div>
                            </div>
                            <div class="user-center-link">
                                <button class="btn btn-default">个人中心</button>
                            </div>
                            <div class="navcard-footer">
                                <button class="btn navcar-setting">设置</button>
                                <button class="btn navcar-quit">退出</button>
                            </div>
        
                        </div>     
                    </li>
                    </ul> 
                <?php }?> <!-- /END -->
                <div class="separate"></div>
                <form class="navbar-form navbar-right share-form" method="post" action="<?php echo base_url(); ?>index.php/posts/submit_posts"role="share">
                    <div class="form-group">
                            <span class="iam"> 我是</span>
                            <input type="text" class="form-control share-input" id="input-share" name="inputCate" placeholder="Share">
                            <button type="submit" class="btn btn-default share-btn"> Share</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
    <!-- /head -->
