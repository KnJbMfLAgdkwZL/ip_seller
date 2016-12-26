<?php
/* @var $this IpallController */
/* @var $model Ipall */

$this->breadcrumbs = array(
    'Ipalls' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Ipall', 'url' => array('index')),
    array('label' => 'Create Ipall', 'url' => array('create')),
    array('label' => 'Update Ipall', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Ipall', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Ipall', 'url' => array('admin')),
);
?>

<h1>View Ipall #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'ip',
        'login',
        'pass',
        'country',
        'state',
        'city',
        'zip',
    ),
)); ?>
