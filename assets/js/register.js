/**
 * @file 注册相关操作 
 * @date 2016-09-19
 * @author huangguorui 
 * @TODO 加入validate验证
 * requireJs重构版
 */

require(['./common/config'], function(config) {
    require([
        'validate',
        './common/common',
        ], function(validate, common) {

            /** 验证用户注册数据是否正确
             * 密码长度至少为六
             * @date Mar 09 2014
             */
            var noteArr = new Array(
                '用户名应该在3到12个字符且只能是下划线和数字或字母',
                '该用户名已被注册',
                '密码长度至少六位',
                '密码不匹配',
                '正确'
                );
            $("#userName").change(function(){
                var $tipText = $('.reg-user .reg-tips-text');
                $('.reg-user .glyphicon').hide(); 
                
                if($(this).val().length >= 3) {
                    var userName = $(this).val();
                    var pattern =  /^[a-zA-Z0-9_\u4e00-\u9fa5]+$/; 
                    if(pattern.test(userName)) {
                        $.ajax({
                            type:   "POST",
                            url:    "check_register",
                            data:   { 'name' : userName },
                            success: function (flag) {
                                if(flag) {
                                   // $('.reg-tips .glyphicon-remove').show(); 
                                    $tipText.html(noteArr[1]).show();
                                } else {
                                    $('.reg-user .glyphicon-ok').show(); 
                                    $tipText.html('');
                                }
                            }
                        });
                    } else {
                        $tipText.html(noteArr[0]).show();
                    }
                } else {
                    $tipText.html(noteArr[0]).show();
                }
            });

            /**
             * 验证邮箱
             * 1. 不可重复
             * 2. 符合邮箱规则
             * @date Step. 19 2016
             */
            $('#userEm').change(function() {

                $('.reg-email .glyphicon').hide(); 

                var $tipText = $('.reg-email .reg-tips-text');
                var userEmail = $('#userEm').val().trim();
                var pattren = /^[0-9a-zA-Z\.\_-]+@([0-9a-zA-Z-]+\.)+[a-zA-Z]{2,4}$/;

                if(pattren.test(userEmail)) {
                    $.ajax({
                        method: 'POST',
                        data: {email: userEmail},
                        url: "check_email",
                        success: function(data) {
                            console.log(data);
                            if(data) {
                                $tipText.html('邮箱已存在');
                            } else {
                                $tipText.html('');
                                $('.reg-email .glyphicon-ok').show();
                            }
                        }
                    })
                } else {
                    $tipText.html('请输入正确的邮箱格式');
                }
            })

            $('.register-btn-sd').click(function() {
                $('.reg-content form').submit();
            })
        }) // end require common


})
