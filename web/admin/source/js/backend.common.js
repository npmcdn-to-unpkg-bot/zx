/**
 * Date: 2016/7/16
 * Time: 10:53
 * 后台公共js
 */
$(function(){
    /*start-FileInputWidget选择文件时显示*/
    $(".beyond_file_input").on("change",function(){
        $(this).parent().parent().find(".file_input_path").val($(this).val());
    })
    /*end-FileInputWidget选择文件时显示*/


    $(".file_input_delete_one").on("click",function(){
        if(confirm('确认删除吗？')){
            var obj=$(this).parent().parent().parent();
            obj.find(".file_input_path").val('删除');
            obj.find(".file_input_delete").val(1);
        }
    });
})

/*
* 加载显示
* */
function loadingshow(){
    $(".loading-container").removeClass('loading-inactive');
}
/*
* 加载隐藏
* */
function loadinghide(){
    $(".loading-container").addClass('loading-inactive');
}