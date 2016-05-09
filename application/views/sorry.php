<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>Sorry</title>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/sorryFile/style.css">

<link href="<?php echo base_url(); ?>assets/sorryFile/css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/sorryFile/jquery.min.js"></script>
<style type="text/css">
    #detect{
        position: absolute;
        top: 0px;
        width: 100%;
        height: 100%;
        background: #fff;
        color: #fff;
        font-size: 12px;
        z-index: 99;
        display: none;
    }
    #detect p{
        color: #333;
        margin-top:15%;
        font-size: 20px;
        line-height: 1.5;
        padding:0 20px;
    }
    #detect p img{
        margin-bottom: 30px;
    }
    #detect p strong{
        font-weight: bold;
        border-bottom: 2px solid #333;
    }
    a#goon{
        padding: 10px;
        font-size: 14px;
        background: #16a085;
        color: #fff;
        border-radius: 4px;
    }
    a#goon:hover{
        background: #1abc9c;
        text-decoration: none;
    }
    a.unclick{cursor: default;}
</style>
<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style></head>
<!--
-->
<body>
    <div id="detect" style="display: block; opacity: 0.8;">
        <p>
        <img src="<?php echo base_url(); ?>assets/sorryFile/died.png"><br>
            <strong>最近比较懒(没做兼容), 只能在<a href="http://down.tech.sina.com.cn/content/40975.html">谷歌浏览器</a>中(chrome)查看. o(╯□╰)o</strong>
        <!-- </strong> 中这个网页会是什么样子。<br><br> -->
        <!-- <a href="javascript:void(0)" id="goon"></a> -->
        </p>
    </div>
<script type="text/javascript">
    window.onload = function() { 
        $('#loadingWraper').fadeOut(200);
    }; 
    $(function(){

        // detect browser
        if(jQuery.browser.msie){//if ie
            $('#detect').show().css('opacity', 0.8)
            $('#avatar-w, #main, footer').hide()
        }

        // detect OS
     

        // detectOS();

        //toggle new & old screenshot
        $('#portfolio_inset li > a').hover(
            function(){
                $(this).find('.vision_n').css({
                    'z-index': 1
                });
                $(this).find('.vision_o').css({
                    'z-index': 2
                });
            },function(){
                $(this).find('.vision_n').css({
                    'z-index': 2
                });
                $(this).find('.vision_o').css({
                    'z-index': 1
                });
            }
        )

        $('#goon').click(function(){
            $('#detect').animate({
                'opacity': 0
            },200,function(){
                $('#detect').hide();
            })

            $('#avatar-w, #main, footer').fadeIn()
        })
    })
</script>
</body></html>