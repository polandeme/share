<!DOCTYPE html>
<html lang="zh-cn">
<head>
<title> Share </title>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/bootstrap.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/jquery.Jcrop.min.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery-1.10.2.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/lib/jquery.Jcrop.min.js" ></script>
    <script> var base_url = "<?php echo base_url(); ?>"; </script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js" ></script>
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
                <a class="navbar-brand" href="<?php echo base_url(); ?>"> Logo </a>
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
                        <li><a href="<?php echo base_url();?>index.php/user/login"> 登录</a> </li>
                        <li><a href="<?php echo base_url(); ?>index.php/user/register">注册</a> </li>
                    </ul> 
                    <?php } else {?> <!-- 登录 -->
                    <ul class="nav navbar-nav navbar-right">
                    <li class="user-link"><a  href="<?php echo base_url();?>index.php/user/login" class = "link-user-name" data-userId = "<?php echo $id; ?>"> <?php echo $userName; ?></a>
                        <div class="user-items" id="user-tab">
                            <div class="border"> </div> 
                                              
                            <a  class="logout" href="<?php echo base_url() ?>index.php/user/logout"> 退出登录 </a>
                            <div class="user-avatar">
                                <img src="<?php echo base_url(); ?>assets/uploads/images/avatar/<?php echo $userAvat; ?>">
                            </div>
                            <?php 
                                echo $userMotto;
                            ?>     
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
