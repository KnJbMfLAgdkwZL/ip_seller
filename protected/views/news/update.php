<?php
$this->menu = array(
    array('label' => Yii::t('main-ui', 'Create News'), 'url' => array('create')),
    array('label' => Yii::t('main-ui', 'View News'), 'url' => array('view', 'id' => $model->Id)),
    array('label' => Yii::t('main-ui', 'Manage News'), 'url' => array('admin')),
);
$str = Yii::t('main-ui', 'Update News');
echo "<h1>$str</h1>";
$this->renderPartial('_form', array('model' => $model));
?>