<?php
use app\assets\CommonAsset;
CommonAsset::register($this);

echo \app\extension\widget\LoadingWidget::widget([]);
?>
<div id="login-module" class="shade">
    <div id="div-login">
        <?php
        $form = \yii\bootstrap\ActiveForm::begin([
            'options' => [
                'class' => 'login-form ajax-form'
            ]
        ]);
        echo '<div style="height: 90px;"></div>';
        echo $form->field($userInfo, 'uName')->input("text", ['class' => 'login-input'])->label("用&nbsp;&nbsp;户&nbsp;&nbsp;名:", ['class' => 'login-label']);
        echo $form->field($userInfo, 'pwd')->input("password", ['class' => 'login-input'])->label("用户密码:", ['class' => 'login-label']);
        echo \yii\helpers\Html::submitButton("登&nbsp;&nbsp;&nbsp;录", ['class' => 'btn btn-primary btn-login']);
        $form::end();
        ?>
    </div>
</div>