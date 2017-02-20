<?php
use app\assets\CommonAsset;
CommonAsset::register($this);
?>
<div style="height: 50px;overflow: hidden;">
    <?php
    echo \app\extension\widget\TopWidget::widget(['param' => $param, 'system' => ['111', '2222']]);
    ?>
</div>
<div id="index-module"></div>
<div id="div-body" class="shade">
    <div id="div-left">
        <li>《&nbsp;导&nbsp;航&nbsp;栏&nbsp;》</li>
        <li class="li-nav nav-first-level" data-key="key_0">
            <span class="glyphicon glyphicon-plus-sign"></span>
            <span class="glyphicon glyphicon-folder-close"></span>
            <span>导航类站点模块</span>
        </li>
        <li class="li-nav nav-second-level" data-title="百度主页" data-parent="key_0" data-mark="<?php echo md5("http://baidu.com")?>" data-url="http://baidu.com">
            <span class="glyphicon glyphicon-file"></span>
            <span>百度主页</span>
        </li>
        <li class="li-nav nav-second-level" data-title="hao123主页" data-parent="key_0" data-mark="<?php echo md5("https://www.hao123.com");?>" data-url="https://www.hao123.com">
            <span class="glyphicon glyphicon-file"></span>
            <span>hao123主页</span>
        </li>
        <li class="li-nav nav-second-level" data-title="百度主页" data-parent="key_0" data-mark="<?php echo md5("https://baidu.com");?>" data-url="http://baidu.com">
            <span class="glyphicon glyphicon-file"></span>
            <span>百度主页</span>
        </li>
        <li class="li-nav nav-first-level" data-key="key_5">
            <span class="glyphicon glyphicon-plus-sign"></span>
            <span class="glyphicon glyphicon-folder-close"></span>
            <span>技术类站点模块</span>
        </li>
        <li class="li-nav nav-second-level" data-title="bootstrap中文" data-parent="key_5" data-mark="<?php echo md5("http://www.bootcss.com/")?>" data-url="http://www.bootcss.com/">
            <span class="glyphicon glyphicon-file"></span>
            <span>bootstrap中文网</span>
        </li>
        <li class="li-nav nav-second-level" data-title="w3school" data-parent="key_5" data-mark="<?php echo md5("http://www.w3school.com.cn/");?>" data-url="http://www.w3school.com.cn/">
            <span class="glyphicon glyphicon-file"></span>
            <span>w3school官网</span>
        </li>
        <li class="li-nav nav-second-level" data-title="jquery文档" data-parent="key_5" data-mark="<?php echo md5("http://jquery.cuishifeng.cn/");?>" data-url="http://jquery.cuishifeng.cn/">
            <span class="glyphicon glyphicon-file"></span>
            <span>jquery参考文档</span>
        </li>
    </div>
    <div id="div-right">
        <div id="div-item"></div>
        <div id="div-iframe"></div>
    </div>
</div>


