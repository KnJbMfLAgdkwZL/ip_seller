<?php
$this->menu = array(
    array('label' => Yii::t('main-ui', 'Create News'), 'url' => array('create')),
    array('label' => Yii::t('main-ui', 'Update News'), 'url' => array('update', 'id' => $model->Id)),
    array('label' => Yii::t('main-ui', 'Delete News'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->Id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => Yii::t('main-ui', 'Manage News'), 'url' => array('admin')),
);
$str = Yii::t('main-ui', 'View News');
echo "<h1>$str</h1>";
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'label' => Yii::t('main-ui', 'Header'),
            'type' => 'raw',
            'value' => function ($data)
            {
                return CHtml::encode($data->Header);
            },),
        array(
            'label' => Yii::t('main-ui', 'Body'),
            'type' => 'raw',
            'value' => function ($data)
            {
                return CHtml::encode($data->Body);
            },),
        array(
            'label' => Yii::t('main-ui', 'Date'),
            'type' => 'raw',
            'value' => function ($data)
            {
                return CHtml::encode($data->Date);
            },),
    ),
)); ?>