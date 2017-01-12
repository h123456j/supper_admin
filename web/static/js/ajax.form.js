
$(document).ready(function(){
    var div_pannel_body=$("#div-pannel-body");
    //ajax提交表单
    div_pannel_body.on("submit",'.ajax-form',function(el){
        var _this = this;
        el.preventDefault();
        $(this).ajaxSubmit({
            'success':function(data){
                $("#div-loading").hide();
                if (data['code']==1){
                    showMessage(_this,'success',data['message']);
                }else {
                    showMessage(_this,'error',data['message']);
                }
            },
            'error':function(){
                $("#div-loading").hide();
            },
            'beforeSubmit':function(){
                $("#div-loading").show();
            }
        });
    });

});