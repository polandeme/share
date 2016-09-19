$(function() {

    function check_brower() {
        if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6){//Firefox
            window.location.href= base_url + "index.php/brower";

        }else if (navigator.userAgent.indexOf('Chrome') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15){//Chrome
            // window.location.href="sorry.html";
        }else if(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Version') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Version') + 8).split(' ')[0]) >= 5){//Safari
            window.location.href= base_url + "index.php/brower";
        }else{
            window.location.href= base_url + "index.php/brower";

        }
    }
    check_brower();


    /* 验证用户注册数据是否正确
     * 密码长度至少为六
     * @date    Mar 09 2014
     */

    var noteArr = new Array(
            '用户名应该在3到12个字符且只能是下划线和数字或字母',
            '该用户名已被注册',
            '密码长度至少六位',
            '密码不匹配',
            '正确'
            );
    $("#userName").change(function(){
        if($(this).val().length >= 3)
    {
        var userName = $(this).val();
        var patrn =  /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/; 
        if(patrn.test(userName))
    {
        $.ajax({
            type:   "GET",
            url:    "check_register",
            data:   { 'name' : userName },
            success: function(flag){
                if(flag){
                    $(".pwd-note").html(noteArr[1]).show();
                }
                else{
                    $(".pwd-note").html(noteArr[4]).show();
                }
            }
        });
    }
        else{
            $(".pwd-note").html(noteArr[0]).show();
        }
    } else{
        $(".pwd-note").html(noteArr[0]).show();
    }
    });

    function fetch_progress(){
        $.get( base_url + 'index.php/user/up_process',
                function(data){
                    var progress = parseInt(data);
                    $('#progress .label').html(progress + '%');
                    $('#progress .bar').css('width', progress + '%');
                    if(progress <= 100){
                        setTimeout('fetch_progress()', 1000);
                    } else{

                        $('#progress .label').html('完成!');
                        setTimeout(function get_rel(){ 
                            $('#progress .label').html('完成!');
                            var relSrc = $(window.frames[0].document).find("input").attr('rel');
                            var img = base_url + 'assets/uploads/images/avatar/'+ relSrc;
                            $('.user-msg-basic img').attr('src', img);
                        },
                        300);
                    }
                }, 'html');
    }

    // user center page

    $('.user-avatar-img').click(function(){
        $(".upload-avatar-btn").css("display", "inline-block");
    });

    // keycode 
    $("body").on('keydown','.input-name',function(e) {
        if(e.keyCode == 8) {
            var is_null = ($('.input-name').val()).length;
            if(is_null <= 0){
                $('.share-input').focus();
                e.preventDefault();
            }
        }
    });



    //导航active效果，判断当前url
    $(".post-nav-item").each(function(){
        $name = $(this).attr('name');
        if(document.location.href.search($name) > 0)
    {
        $(".link-link").removeClass("actived");
        $(this).addClass("actived");
    } 
    });



    $(".sub-ava").click(function() {

        $(".sub-form").submit();
    });
    $("#select-file").change(function() {

        change();
    });
    function get_position(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
        console.log(c.x);
        console.log(c.y);
        console.log(c.w);
        console.log(c.h);
    }
    function Jcrop_api() {
        $('#preview').Jcrop({
            onSelect: get_position,
            aspectRatio: 1
        });
    }

    function change() {

        var pic = document.getElementById("preview");
        var file = document.getElementById("select-file");
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
            pic.src= this.result;
        }
    }

    $('#preview').load(function() {
        console.log(this.width);
        console.log(this)
        console.log($('#preview').width)
        $("#r").val(this.width);
    // $("#r").val('300');

    $('.crop-img-wrap, .fixed-opacity, crop-img-content').show();

    var imgThumbHeight = $('#preview').height();
    $('.crop-img-content').css({
        'height': 50 + imgThumbHeight,
        'margin-top': -50 + (- (50 + imgThumbHeight /2))
    });

    Jcrop_api();
    })


    /**
     * 2016-09-11
     */

    /**
     * 注册验证&发送数据
     * 注册条件参考文档
     */
    $('.register-btn-sd').click(function() {

        // $('.reg-content form').submit();
    })


});// /END

