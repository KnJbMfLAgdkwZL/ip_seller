<div class="form">
    <?php
    $role = Yii::app()->user->getRole();
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'users-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal'),
    )); ?>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-0">
			<span class="help-block">
				<?= Yii::t('main-ui', 'Fields with'); ?>
                <span class="required">*</span>
                <?= Yii::t('main-ui', 'are required.'); ?>
			</span>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Login', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Login'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model, 'Login', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Login'); ?>
        </div>

    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Password', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Password'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model, 'Password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Password'); ?>
        </div>
        <div class="col-lg-10 col-lg-offset-2">
				<span id='GetNewPass' class='btn btn-info btn-sm'>
					<?= Yii::t('main-ui', 'Generate Password'); ?>
				</span>
        </div>
        <script>
            $(document).ready(function ()
            {
                $('#GetNewPass').click(function ()
                {
                    $("input[name='Users[Password]']").val(RandomPassword());
                });
            });
            function RandomPassword()
            {
                var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
                var string_length = 12;
                var randomstring = '';
                for (var i = 0; i < string_length; i++)
                {
                    var rnum = Math.floor(Math.random() * chars.length);
                    randomstring += chars.substring(rnum, rnum + 1);
                }
                return randomstring;
            }
        </script>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Email', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Email'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textField($model, 'Email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'Email'); ?>
        </div>
    </div>

    <?php
    if ($role != 'Admin')
    {
        $error = '';
        if (isset($captchaalert) && !empty($captchaalert))
        {
            $error = 'error';
        }
        echo '<div class="form-group">';
        echo CHtml::label('Captcha <span class="required">*</span>', 'Captcha', array('class' => "col-lg-2 control-label required $error"));
        echo '<div class="col-lg-10">';
        echo CHtml::textField('Captcha', '', array('class' => "form-control $error"));
        $captcha = YandexCW::get_captcha();
        $captcha_id = (string)$captcha['captcha_id'];
        $captcha_url = (string)$captcha['captcha_url'];
        echo "<img class='body_image' src='$captcha_url' />
                <input type='hidden' value='{$captcha_id}' name='captcha_id'/>";
        if (isset($captchaalert) && !empty($captchaalert))
        {
            echo '<div class="errorMessage">Wrong Captcha.</div>';
        }
        echo '</div>';
        echo '</div>';
    }
    ?>

    <?php
    if ($role == 'Admin')
    {
        $list = UsersRoles::model()->getAssocList();
        echo '<div class="form-group">',
        $form->labelEx($model, 'Role', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Role'))),
        '<div class="col-lg-10">',
        CHtml::dropDownList('Users[Role]', $model['Role'], $list, array('class' => 'form-control',)),
        '</div>',
        $form->error($model, 'Role'),
        '</div>';
    }
    ?>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <?php
            echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui', 'Create') : Yii::t('main-ui', 'Save'), array('class' => 'btn btn-primary'));
            if ($role != 'Admin')
            {
                echo ' ', CHtml::Button(Yii::t('main-ui', 'Home'), array('class' => 'Home btn btn-primary'));
            }
            ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<script>
    $(document).ready(function ()
    {
        $('.Home').click(function ()
        {
            var url = './index.php';
            $(location).attr('href', url);
        });
    });
</script>