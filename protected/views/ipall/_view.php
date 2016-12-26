<?php
/* @var $this IpallController */
/* @var $data Ipall */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('ip')); ?>:</b>
    <?php echo CHtml::encode($data->ip); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
    <?php echo CHtml::encode($data->login); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('pass')); ?>:</b>
    <?php echo CHtml::encode($data->pass); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
    <?php echo CHtml::encode($data->country); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
    <?php echo CHtml::encode($data->state); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
    <?php echo CHtml::encode($data->city); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	*/
    ?>

</div>