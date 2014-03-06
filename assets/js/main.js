$(function() {
    var $addNode = $("<input type='text' class='form-control input-iam' id='iam-input' placeholder='I am'><span class='share-words'>我推荐 </span>");
    var $addName = $("<input type='text' class='form-control input-name' id='iam-input' placeholder=''>");
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
                right : "52%"
            });

        } 
    })

$("#input-share").click(function() {

    $(".share-form").animate({
        right: '40%'
    });

    $(this).animate({
        width: '100px',
    }).css(
    'position', 'relative'
    );
    $(".iam").css({
        "margin-left":"10px",
        "postion": "absolute",
        "left": "90px",
        "color": "red"
    });
    // $(".share-btn").css(
        // 'margin-left', '-80px'
    // );

    $("#input-search").animate(
        {
        width: '70px'
    });
    $(".iam").after($addNode);
    $(".share-input").after($addName);
    $(".user-role").toggle();
})
});
