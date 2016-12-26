<?php
/* @var $this IpallController */
/* @var $model Ipall */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ipall-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'ip'); ?>
        <?php echo $form->textField($model, 'ip', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'ip'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'login'); ?>
        <?php echo $form->textField($model, 'login', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'login'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'pass'); ?>
        <?php echo $form->textField($model, 'pass', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'pass'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'country'); ?>
        <?php echo $form->textField($model, 'country', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'country'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'state'); ?>
        <?php echo $form->textField($model, 'state', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'state'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'city'); ?>
        <?php echo $form->textField($model, 'city', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'zip'); ?>
        <?php echo $form->textField($model, 'zip', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'zip'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->