// (function() {

//加载编辑器
if(!($(".post-detail-word").text().trim()) == '' || !($(".post-detail-word")).text().trim() == null)
    {
       textares = $(".textarea , .submit-detail").remove();
    }else {
        // CKEDITOR.replace('postDetail'); 
        var pue = UE.getEditor('post-edit-container');
    }
    $(".change-detail").click(function(){
       $(".post-detail-word").after(textares);
       $(this).remove();
       $(".edit-button-icon").remove();
       $(".post-detail-word").remove();
       var pue = UE.getEditor('post-edit-container');
});
/*
$("button").click(function(){
    console.log("test");
    var url = base_url + 'assets/uploads/images/avatar/ddd.jpg';
    $(".user-msg-basic img").attr('src',url);
});*/
// })();