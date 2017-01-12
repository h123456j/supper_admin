$(document).ready(function () {

    var w_height = window.screen.height,
        w_width = window.screen.width;

    //if ($("#login-module").length>0){
    //    $("#login-module").css({"height":w_height});
    //}
    //主页模块处理
    if ($("#index-module").length > 0) {
           var div_item = $("#div-item"),//导航标签
            div_iframe = $("#div-iframe");
        $("body").css({"width": w_width});
        $("#div-body").css({"height": w_height - 145});
        $("#div-right").css({"width": w_width - 220});
        //导航栏事件
        $(".li-nav").click(function () {
            var url = $(this).attr("data-url"),
                mark = $(this).attr("data-mark"),
                title = $(this).attr("data-title");
            $(this).addClass("li-nav-click");
            $(this).siblings("li").removeClass("li-nav-click");
            if (url) {
                var item_html = '',
                    iframe_html = '';
                item_html += '<li  data-mark="' + mark + '" class="item_' + mark + '"><span onclick="show(this,false)">' + title + '</span><span onclick="cancel(this)">x</span>';
                item_html += '<span onclick="show(this,true)" class="glyphicon glyphicon-repeat"></span></li>';
                iframe_html += '<iframe class="iframe_' + mark + '" src="' + url + '"></iframe>';
                if (div_item.find(".item_" + mark).length <= 0) {
                    div_item.append(item_html);
                    div_iframe.append(iframe_html);
                }
                div_item.find(".item_" + mark).addClass("item-focus").siblings("li").removeClass("item-focus");
                div_iframe.find(".iframe_" + mark).show().siblings("iframe").hide();
            } else {
                var key = $(this).attr("data-key"),
                    first_child = $(this).children("span:eq(0)"),
                    second_child = $(this).children("span:eq(1)"),
                    second_level = $("li[data-parent='" + key + "']");
                if (first_child.hasClass("glyphicon-plus-sign")) {
                    first_child.removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
                    second_child.removeClass("glyphicon-folder-close").addClass("glyphicon-folder-open");
                    second_level.slideDown(300);
                } else {
                    first_child.removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
                    second_child.removeClass("glyphicon-folder-open").addClass("glyphicon-folder-close");
                    second_level.slideUp(300);
                }

            }
        });
    }
});
/**
 * 子窗口显示操作
 * @param mark
 */
function show(el, refresh) {
    var mark = $(el).parent("li").attr("data-mark"),
        div_iframe = $("#div-iframe").find(".iframe_" + mark);
    $("#div-item").find(".item_" + mark).addClass("item-focus").siblings("li").removeClass("item-focus");
    div_iframe.show().siblings("iframe").hide();
    if (refresh)
        div_iframe.attr("src", div_iframe.attr("src"));
}
/**
 * 子窗口关闭处理
 * @param el
 */
function cancel(el) {
    var mark = $(el).parent("li").attr("data-mark"),
        div_item = $("#div-item"),
        div_iframe = $("#div-iframe"),
        new_mark = null;
    if (div_item.find("li").length - 1 > 0) {
        if ($(el).parent("li").prev().attr("data-mark")) {
            new_mark = $(el).parent("li").prev().attr("data-mark")
        } else if ($(el).parent("li").next().attr("data-mark")) {
            new_mark = $(el).parent("li").next().attr("data-mark");
        }
    }
    div_item.find(".item_" + mark).remove();
    div_iframe.find(".iframe_" + mark).remove();
    if (new_mark != null) {
        div_item.find(".item_" + new_mark).addClass("item-focus").siblings("li").removeClass("item-focus");
        div_iframe.find(".iframe_" + new_mark).show().siblings("iframe").hide();
    }
}