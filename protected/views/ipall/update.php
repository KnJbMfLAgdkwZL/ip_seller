<?php
/* @var $this IpallController */
/* @var $model Ipall */

$this->menu = array(
    array('label' => 'List Ipall', 'url' => array('index')),
    array('label' => 'Create Ipall', 'url' => array('create')),
    array('label' => 'View Ipall', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Ipall', 'url' => array('admin')),
);

?>
<h1>Update Ipall <?php echo $model->id; ?></h1>
<?php $this->renderPartial('_form', array('model' => $model)); ?>
