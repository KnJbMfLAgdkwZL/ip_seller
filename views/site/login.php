<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="site-login">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="col-lg-offset-1 modal-header">
                <h2 class="modal-title"><?= Html::encode($this->title) ?></h2>
                <?php
                $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "<div class=\"col-lg-11\">{input}</div>",
                    ],
                ]);
                echo $form->field($model, 'username')->textInput(array('placeholder' => 'Username'));
                echo $form->field($model, 'password')->passwordInput(array('placeholder' => 'Password'));
                ?>
                <div class="form-group">
                    <div class="col-lg-offset-0 col-lg-10">
                        <?= Html::submitButton('Sign in', ['class' => 'btn btn-primary btn-sm', 'name' => 'login-button']) ?>
                        <a class='btn btn-default btn-sm' href="http://ssndob.so/login">Sign up</a>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

    <!--
    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
    -->

</div>



<style>
    .modal-dialog
    {
        width: 300px;
    }
    .modal-content
    {
        box-shadow: 0px 3px 9px rgba(0, 0, 0, 0.5);
    }
    .btn-default
    {

        background-color: #e1e1e1;
        border-color: rgba(0, 0, 0, 0.1);
    }
</style>