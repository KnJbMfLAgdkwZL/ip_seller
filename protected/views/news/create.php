<?php
$this->menu = array(
    array('label' => Yii::t('main-ui', 'Manage News'), 'url' => array('admin')),
);
$str = Yii::t('main-ui', 'Create News');
echo "<h1>$str</h1>";
$this->renderPartial('_form', array('model' => $model)); ?>