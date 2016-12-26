<?php
/* @var $this IpallController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ipalls',
);

$this->menu = array(
    array('label' => 'Create Ipall', 'url' => array('create')),
    array('label' => 'Manage Ipall', 'url' => array('admin')),
);
?>

<h1>Ipalls</h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
