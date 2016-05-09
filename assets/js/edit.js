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
