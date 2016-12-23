/**
 * @file 首页相关js操作 
 * @author polandeme
 * @date Step. 12 2016
 * require重构版
 */

require(['./common/config'], function(config) {
    require(['./common/common'], function(common) {
        console.log(common);
        /**
         * 投票效果
         * @TODO 赞过之后写入数据库，前后台都不可再赞
         *     判断登录状态
         *     不能赞自己 
         *     优化结构
         * @date Mar 10 2014
         */
        $(".vote").click(function(){
            common.loginAuth();
            return ;
            var id = $(this).attr("rel");
            var that = $(this);
            $.ajax({
                type: 'POST',
                url: base_url + 'index.php/rank/up_vote',
                data: {'id' :id},
                cache: false,
                success: function(msg){
                    console.log(JSON.parse(msg));
                    var data = JSON.parse(msg);
                    if(data.status == 'success') {
                        var curVote = that.find('.vote-up-num').text();
                        that.find('.vote-up-num').text(++curVote);
                    } else if(msg) {
                        //$("#post-" + id).children(".vote-up-num").html(msg);  
                        //$("#post-" + id).children(".vote-up-num")
                                        //.addClass("voted-up-num")
                                        //.removeClass("vote-up-num");
                    } else {
                        alert("please login ");
                    }
                }
            });

            $(this).removeClass('vote').addClass('voted')
        });

        // 嫌弃
        /*$('body').on('click', '.voted', function() {
            var id = $(this).attr('rel');
            var self = $(this);
            $.ajax({
                type: 'POST',
                url: base_url + 'index.php/rank/down_vote',
                data: {'id': id},
                cache: false,
                success: function(data) {
                    console.log(data);
                    $("#post-" + id).children(".vote-up-num").html(data);
                    self.removeClass('voted').addClass('vote');
                }
            })

        })*/

        //前端判断登录 
        $(".share-btn, .comment-submit, .follow").click(function(){
            if($(".logout").length == 0) {
                alert("请先登录");
                window.location.href= base_url + 'index.php/user/login';
            }
        });

        //用户信息显示
        $(".post-author").mouseenter(function() {
            var userId = $(".link-user-name").data('userid'),
            id = $(this).data('id'),
            relation = $(".follow").attr('rel'),
            that = $(this).children('.post-author-detail').children('.post-author-content').children('.follow');
            if(userId === id || userId == null) {
                $(this).find(".follow").hide();
            }
            $(this).children().show();
            $.ajax({
                type: 'GET',
                url: base_url + 'index.php/posts/ajax_get_post_author',
                data: {'id': id , 'userId': userId, 'relation' : relation },
                dataType: "json",
                cache: false,
                success: function(msg){
                    $(".post-author-detail .vote-num span").text(msg[0].u_up);
                    try {
                        relation = msg[0].relation.fw_relation;
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




    })

})
