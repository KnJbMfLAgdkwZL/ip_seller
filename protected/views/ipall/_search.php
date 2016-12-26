<?php
/* @var $this IpallController */
/* @var $model Ipall */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'ip'); ?>
        <?php echo $form->textField($model, 'ip', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'login'); ?>
        <?php echo $form->textField($model, 'login', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'pass'); ?>
        <?php echo $form->passwordField($model, 'pass', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'country'); ?>
        <?php echo $form->textField($model, 'country', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'state'); ?>
        <?php echo $form->textField($model, 'state', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'city'); ?>
        <?php echo $form->textField($model, 'city', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'zip'); ?>
        <?php echo $form->textField($model, 'zip', array('size' => 50, 'maxlength' => 50)); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->