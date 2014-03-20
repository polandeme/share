$(function() {
    var $addNode = $("<input type='text' class='form-control input-iam' id='iam-input' name='inputRole'placeholder='I am'><span class='share-words'>我推荐 </span>");
    var $addName = $("<input type='text' class='form-control input-name' id='iam-input'name='inputContent' placeholder=''>");
$(".user-link").hover(function() {
    $(".user-items").toggle();
})


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
//      不能赞自己 
//      优化结构
//      @date Mar 10 2014

$(".vote-up").click(function(){
    var id = $(this).attr("rel");
    $(this).text("已赞");
    $.ajax({
        type: 'POST',
        url: base_url + 'index.php/rank/up_vote',
        data: {'id' :id},
        cache: false,
        success: function(msg){
          $("#post-" + id).next(".vote-up-num").html(msg);  
          $("#post-" + id).next(".vote-up-num").addClass("voted-up-num").removeClass("vote-up-num");
        }
    });
});


function fetch_progress(){
    $.get( base_url + 'index.php/user/up_process',
          function(data){
                var progress = parseInt(data);
                        $('#progress .label').html(progress + '%');
                        $('#progress .bar').css('width', progress + '%');
                        if(progress <= 100){
                            setTimeout('fetch_progress()', 1000);
                        }else{
                            // var relSrc = $(window.frames[0].document).find("input").attr('rel');
                            var relSrc = $(window.frames[0].document).find("#ifr-rel");
                            $('.btn-up-avat').on('',function(){
                                var relSrc = $(window.frames[0].document).find("input").attr('rel');
                                console.log(relSrc);
                            });
                            $('#progress .label').html('完成!');
                        }
    }, 'html');
}

$('.sub-form').submit(function(){
    $('#progress').show();
        setTimeout(fetch_progress(), 1000);
});
/*
//ajax 显示图片
// $(".btn-up-avat").click(function(){
function fetch_process(){
    $.ajax({
        type: 'GET',
        url: base_url + 'index.php/user/up_process',
        // data: {},
        sucess: function(msg){
            var process = pareInt(msg);
            $("#progress .label").html(progress+ '%');
            if(progress < 100)
                {
                    setTimeout('fetch_process', 100);
                }
                else{
                    var relSrc = $(window.frames[0].document).find("input").attr('rel');
                    console.log(relSrc);
                }
        }
    });
}
    var userName = $(".msg-name").attr('rel');
    $(".sub-form").submit(function(){
        $('#progress').show();
         setTimeout('fetch_process', 1000);
    });
    // var relSrc = $(window.frames[0].document).find("input").attr('rel');
    // console.log(relSrc);
    /*$.ajax({
        type: 'POST',
        url: base_url + 'index.php/user/ajax_user_avat',
        data: {'name': userName},
        cache: false,
        success: function(msg){
            var img = base_url + 'assets/uploads/images/avatar/'+ msg;
            $('.user-msg-basic img').attr('src', img);
            console.log(img);
        }
    });*/
// });

/*上传进度 */





//前端判断登录 
$(".share-btn, .comment-submit ,.follow").click(function(){
    if($(".logout").length == 0){
            alert("请先登录");
            window.location.href= base_url + 'index.php/user/login';
            }
    });
//用户信息显示
$(".post-author").mouseover(function(){
    var userId = $(".link-user-name").data('userid'),
        id = $(this).data('id'),
        relation = $(".follow").attr('rel'),
        that = $(this).children('.post-author-detail').children('.post-author-content').children('.follow');
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
                    that.attr('rel', relation);
                        if(relation  == 1) {
                        $(".follow").text("取消关注").click(function(){
                         $(this).text("关注").attr('rel', 0);
                        });
                    } else if (relation == 2){
                        $(".follow").text("回关").click(function(){
                         $(".follow").text("each");
                        });
                    } else if(relation == 3) {
                        $(".follow").text("each").click(function(){
                            $(this).text("回关");
                        });
                    } else if(relation == 0) {
                        $(".follow").text("关注").click(function() {
                                    $(this).text("取消");
                        });
                    } 
                  } catch(e)
                  {
                      console.log("fa");
                  }
              } 
          });
    });

$(".post-author ").mouseout(function(){
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
            console.log("su");
        }
    });  
}); // follow END

if(!($(".post-detail-word").text().trim()) == '' || !($(".post-detail-word")).text().trim() == null)
    {
       textares = $(".textarea , .submit-detail").remove();
    }else {
        CKEDITOR.replace('postDetail'); 
        console.log('无内容');
    }
    $(".change-detail").click(function(){
       $(".post-detail-word").after(textares);
       $(this).remove();
       $(".post-detail-word").remove();
        CKEDITOR.replace('postDetail'); 
        ("textares")
    });
$("button").click(function(){
    console.log("test");
    var url = base_url + 'assets/uploads/images/avatar/ddd.jpg';
    $(".user-msg-basic img").attr('src',url);
});
});// /END

