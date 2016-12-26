<?php
$this->menu = array(
    array('label' => Yii::t('main-ui', 'Create Users'), 'url' => array('create')),
    array('label' => Yii::t('main-ui', 'View Users'), 'url' => array('view', 'id' => $model->Id)),
    array('label' => Yii::t('main-ui', 'Manage Users'), 'url' => array('admin')),
);
$str = Yii::t('main-ui', 'Update Users');
echo "<h1>$str {$model->Login}</h1>";
$this->renderPartial('_form', array('model' => $model));
?>