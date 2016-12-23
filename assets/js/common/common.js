define([
    './config'
], function (config) {
    var $addNode = $("<input type='text' \
                      class='form-control input-iam' \
                      id='iam-input' \
                      name='inputRole' \
                      placeholder='I am'> \
                          <span class='share-words'> \
                              我推荐 \
                          </span> \
                    ");
    var $addName = $("<input type='text' class='form-control input-name' id='iam-input'name='inputContent' placeholder=''>");
    $(".user-link").click(function() {
        console.log('click');
        $(".user-items").toggle();
        $(".top-arrow").toggle();
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

        $("#input-search").animate({
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
    
    var common = {

        /**
         * 用户登录验证，
         * 前端简单通过显示状态进行判断，避免发送过多无用请求
         * 但是后端必须做相对应校验才可以。
         * @date 2016-10-30
         */
        loginAuth: function () {
            if(!this.isLogin()) {
                location.href = "user/login";
            } else {

            }
        },
        isLogin: function () {
            var $nameEL = $('#navName');
            if($nameEL && $nameEL.text().length < 3) {
                return false;
            }
            return true;
        }
    };
    return common;
})
