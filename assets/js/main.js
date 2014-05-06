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
                            console.log(relSrc);
                            var img = base_url + 'assets/uploads/images/avatar/'+ relSrc;
                            $('.user-msg-basic img').attr('src', img);
                            },
300);
                        }
    }, 'html');
                           }

$('.sub-form').submit(function(){
    $('#progress').show();
    do{
        setTimeout(fetch_progress(), 40);
    }while($(window.frames[0].document).find("input").attr('rel'));

});

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
                        $(".follow").text("取消").click(function(){
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
                                    $(this).text("取消").attr('rel',1); //right
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
            // console.log("su");
        }
    });  
}); // follow END

//导航active效果，判断当前url
$(".post-nav-item").each(function(){
    $name = $(this).attr('name');
    if(document.location.href.search($name) > 0)
        {
            $(".link-link").removeClass("actived");
            $(this).addClass("actived");
        } 
    });
//加载编辑器
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

