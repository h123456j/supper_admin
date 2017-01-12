
<?php
use \yii\bootstrap\ActiveForm;
?>
<div class="top">
    <div class="form-inline left" style="height: 50px;overflow: hidden;">
        <?php
        $form=ActiveForm::begin([
            'method'=>'get',
            'action'=>'common/index/index',
            'options'=>[
                'calss'=>'',
                'style'=>'margin-left:20px;height:50px;line-height:50px;'
            ]
        ]);
         echo $form->field($param,'system')->dropDownList($system,['style'=>'min-width:200px;max-width:300px;'])->label("系统列表:&nbsp;");
         $form::end();
        ?>
    </div>
    <div class="center"></div>
    <div class="right">
        <li>
            <span>管理员：<?php echo \app\filter\SessionFilter::getUserName();?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <button class="btn btn-xs btn-danger">
                <a href="/common/user/logout" style="color: #ffffff;">退出登录</a>
            </button>
        </li>
    </div>
</div>