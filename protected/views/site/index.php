<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $model,
    'htmlOptions' => array('class' => 'newscontainer'),
    'itemView' => '_view',
));
Yii::app()->clientScript->registerScript('sel_Hide', "
	$('.Hide').click(function()
	{
		var idnews = this.id;
		var str = '.news' + idnews;
		$(str).hide();
		$.ajax({
            url: '?r=News/HideNews',
            data: {Id: idnews},
            type: 'POST',
            success: function(msg)
			{
            }
        });
	});
");
?>
    <style>
        .empty
        {
            display: none;
        }
    </style>


<?php
if (!Yii::app()->user->isGuest)
{
    $role = Yii::app()->user->getRole();
    if ($role == 'User')
    {
        $this->renderPartial('/client/index');
    }
}
?>