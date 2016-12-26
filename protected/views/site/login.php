<?php
$this->pageTitle = Yii::app()->name . ' Login';
?>
<br/><br/><br/><br/><br/>
<div class="form mainloginform">
    <?php
    $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'login-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            'enableClientValidation' => true,
            'clientOptions' => array('validateOnSubmit' => true,
            ),
        ));
    ?>
    <div class="form-group">
        <div class="col-lg-10">
            <h2>Login</h2>
            <?php
            echo $form->textField($model, 'username', array('class' => 'mainlogin form-control', 'placeholder' => Yii::t('main-ui', 'Username')));
            echo $form->error($model, 'username');
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10">
            <?php
            echo $form->passwordField($model, 'password', array('class' => 'mainlogin form-control', 'placeholder' => Yii::t('main-ui', 'Password')));
            echo $form->error($model, 'password');
            ?>
        </div>
    </div>
    <div class="form-group rememberMe">
        <div class="col-lg-10">
            <div class="checkbox">
                <label>
                    <?php
                    echo $form->checkBox($model, 'rememberMe');
                    echo Yii::t('main-ui', 'Remember me next time');
                    echo $form->error($model, 'rememberMe');
                    ?>
                </label>
            </div>
        </div>
    </div>
    <div class="form-group buttons">
        <div class="col-lg-10 buttonlogin">
            <?php
            echo CHtml::submitButton(Yii::t('main-ui', 'Sign in'), array('class' => 'Signin btn btn-primary btn-sm'));
            echo ' ';
            echo CHtml::Button(Yii::t('main-ui', 'Sign up'), array('class' => 'Signup btn btn-primary btn-sm'));
            echo ' ';
            echo CHtml::Button(Yii::t('main-ui', 'Restore'), array('class' => 'Restore btn btn-primary btn-sm'));
            ?>
        </div>

    </div>

    <?php
    $this->endWidget();
    ?>
</div>
<script>
    $(document).ready(function ()
    {
        $('.Signup').click(function ()
        {
            var url = './index.php?r=users/create';
            $(location).attr('href', url);
        });
        $('.Restore').click(function ()
        {
            var url = './index.php?r=users/restore';
            $(location).attr('href', url);
        });
    });
</script>