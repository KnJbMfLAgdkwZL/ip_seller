<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
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
        <?php echo $form->labelEx($model, 'Header', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Header'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textArea($model, 'Header', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        </div>
        <?php echo $form->error($model, 'Header'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Body', array('class' => 'col-lg-2 control-label', 'label' => Yii::t('main-ui', 'Body'))); ?>
        <div class="col-lg-10">
            <?php echo $form->textArea($model, 'Body', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
        </div>
        <?php echo $form->error($model, 'Body'); ?>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('main-ui', 'Create') : Yii::t('main-ui', 'Save'), array('class' => 'btn btn-primary')); ?>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->