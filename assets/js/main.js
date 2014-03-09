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
$(".vote-up").click(function(){
    var id = $(this).attr("rel");
    // alert(id);
    $.ajax({
        type: 'POST',
        url: 'rank/up_vote',
        data: {'id' :id},
        cache: false,
        success: function(msg){
          $("#post-" + id ).next(".vote-up-num").html(msg);  
        }
    });
});

});
