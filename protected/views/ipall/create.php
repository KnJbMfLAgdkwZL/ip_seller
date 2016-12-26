<?php
/* @var $this IpallController */
/* @var $model Ipall */
$this->breadcrumbs = array(
    'Ipalls' => array('index'),
    'Create',
);
$this->menu = array(
    array('label' => 'List Ipall', 'url' => array('index')),
    array('label' => 'Manage Ipall', 'url' => array('admin')),
);
?>

    <h1>Create Ipall</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>