/**
 * Date: 2016/7/14
 * Time: 16:51
 */
$(function(){

    $(".jqupload-input-img").on("click",function(){
        jqupload_img($(this))
    });

})
function jqupload_img(file_input){
    var obj=file_input.parent().parent().parent();
    var url=obj.attr('data-url');
    var path=obj.find('.jqupload-img-path').val();
    var title=obj.find('.jqupload_img_title').val();
    var link=obj.find('.jqupload_img_link').val();
    var width=obj.find('.jqupload_img_width').val();
    var height=obj.find('.jqupload_img_height').val();
    var mid=obj.find('.jqupload-img-mid').val();
    var cid=obj.find('.jqupload-img-cid').val();
    var imgid=obj.find('.jqupload_img_images_id').val();

    file_input.fileupload({
        url: url,
        formData:{
            'path':path,
            'title':title,
            'link':link,
            'width':width,
            'height':height,
            'imgid':imgid,
            'mid':mid,
            'cid':cid,
        },
        dataType: 'json',
        dropZone:'',
        autoUpload:true,
    }).on('fileuploadadd', function (e, data) {

        data.submit();

    }).on('fileuploadprogressall', function (e, data) {

        var progress = parseInt(data.loaded / data.total * 100, 10);
        $(".jqupload-links").attr('placeholder','上传中'+progress+'%');

    }).on('fileuploaddone', function (e, data) {
        var result=data.result;
        if(result.success){
            obj.find('.jqupload-img-path').val(result.path);
            obj.find('.jqupload_img_size').val(result.size);
            obj.find('.jqupload_img_images_id').val(result.imgid);
            obj.find('.jqupload_img').attr('src',result.path);
            obj.find('.jqupload_img_info').val(JSON.stringify(result.info));
        }else{
            alert(re.msg);
        }
        return;
    });
}