// $.ready(function(){
    // $.ajax({
       // url:  
    // })
// })
$(function() {
    var $addNode = $("<input type='text' class='form-control input-iam' id='iam-input' name='inputRole'placeholder='I am'><span class='share-words'>我推荐 </span>");
    var $addName = $("<input type='text' class='form-control input-name' id='iam-input'name='inputContent' placeholder=''>");
$(".user-link").hover(function() {
    $(".user-items").toggle();
})

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



$("#input-search").click(function(){
        if($("#input-search").width() <= 90 ){
$(".input-iam, .input-name , .share-words").remove();
            $(this).animate({
                width: '230px'
            });
            $("#input-share").animate({
                width: '70px'
            });
            $(".share-form").animate({
                right : "50%"
            });

        } 
    })

$("#input-share").click(function() {

    $(".share-form").animate({
        right: '38%'
    });

    $(this).animate({
        width: '100px',
    });
    $(".iam").css({
        "margin-left":"10px",
        "postion": "absolute",
        "left": "90px",
        "color": "red"
    });

    $("#input-search").animate(
    {
        width: '70px'
    });
    $(".iam").after($addNode);
    $(".share-input").after($addName);
})

// go to top button
$(window).scroll(function(){
    var scrollh = document.documentElement.scrollTop + document.body.scrollTop;
    if(scrollh > 200 )
        {
            $('.go-top').fadeIn(400);
        } else {
            $('.go-top').fadeOut(400);
        }
});
$('.go-top').click(function(){
    $('html, body').animate({
        scrollTop: '0px'
    }, 200)
});

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

// 投票效果
// To Do 赞过之后写入数据库，前后台都不可再赞
//      判断登录状态
//      不能赞自己 
//      优化结构
//      @date Mar 10 2014

$(".vote").click(function(){
    var id = $(this).attr("rel");
    $.ajax({
        type: 'POST',
        url: base_url + 'index.php/rank/up_vote',
        data: {'id' :id},
        cache: false,
        success: function(msg){
            if(msg === '已赞') {

            } else if(msg) {
              $("#post-" + id).children(".vote-up-num").html(msg);  
              $("#post-" + id).children(".vote-up-num").addClass("voted-up-num").removeClass("vote-up-num");
            } else {
                alert("please login ");
            }
        }
    });
    $(this).css(
        'background-color', '#c2e6f4'
    );
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

// $('.sub-form').submit(function(){
//     $('#progress').show();
//     do{
//         setTimeout(fetch_progress(), 40);
//     }while($(window.frames[0].document).find("input").attr('rel'));

// });

//前端判断登录 
$(".share-btn, .comment-submit ,.follow").click(function(){
    if($(".logout").length == 0){
            alert("请先登录");
            window.location.href= base_url + 'index.php/user/login';
            }
    });
//用户信息显示
$(".post-author").mouseenter(function(){
    var userId = $(".link-user-name").data('userid'),
        id = $(this).data('id'),
        relation = $(".follow").attr('rel'),
        that = $(this).children('.post-author-detail').children('.post-author-content').children('.follow');
        console.log(id);
        console.log(userId);
        if(userId === id || userId == null) {
            $(this).find(".follow").hide();
            
           // that.children(".follow").hide();
        }
        $(this).children().show();
        $.ajax({
          type: 'GET',
          url: base_url + 'index.php/posts/ajax_get_post_author',
          data: {'id': id , 'userId': userId, 'relation' : relation },
          dataType: "json",
          cache: false,
          success: function(msg){
            $(".post-author-detail span").text(msg[0].u_up);
                try {
                    relation = msg[0].relation.fw_relation;
                    // console.log('relation');
                    that.attr('rel', relation);
                        if(relation  == 1) {
                        $(".follow").attr('rel',1);
                        $(".follow").text("取消关注").click(function(){
                         $(this).text("关注");
                        });
                    } else if (relation == 2){
                            $(".follow").attr('rel',2);
                            $(".follow").text("回关").click(function(){
                            $(".follow").text("each");
                        });
                    } else if(relation == 3) {
                            $(".follow").attr('rel',3);
                        $(".follow").text("each").click(function(){
                            $(this).text("回关");
                        });
                    } else  {
                        $(".follow").attr('rel',0);
                        $(".follow").text("关注").click(function() {
                                    $(this).text("取消关注").attr('rel',1); //right
                        });
                    } 
                  } catch(e)
                  {
                      console.log("fa");
                  }
              } 
          });
    });

$(".post-author ").mouseleave(function(){
    $(this).children().next().hide();

});
// follow
$(".follow").click(function(){
    var userId = $(".link-user-name").data('userid'); 
    console.log(userId);
    var friendId = $(this).data('id');
    var relation = $(this).attr('rel');
    $.ajax({
        type: 'POST',
        url: base_url + 'index.php/user/follow',
        data: { userId : userId, friendId : friendId, relation: relation  },
        cache: false,
        success: function(){
        }
    });  
}); // follow END

// user center page
    
$('.user-avatar-img').click(function(){
    alert('helo');
    $(".upload-avatar-btn").show();
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
    })
        $("#select-file").change(function() {
            $('.crop-img-wrap, .fixed-opacity').show();
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
            $("#r").val(this.width);
            Jcrop_api();
         })














});// /END

