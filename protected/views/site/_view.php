<?php
$id = CHtml::encode($data['Id']);
$head = CHtml::encode($data['Header']);
$body = CHtml::encode($data['Body']);
$date = CHtml::encode($data['Date']);
$str = Yii::t('main-ui', 'Hide');
/*echo "<div class='view news$id'>";
echo	"<h3>$head</h3>";
echo	"<div>$date</div>", '<br/>';
echo	"<div>$head</div>", '<br/>';
$str = Yii::t('main-ui','Hide');
echo "<span style='border:1px solid black' id='$id' class='Hide'><b>$str</b></span>";
echo "</div>";*/
echo "
<div class='panel panel-primary news view news$id'>
	<div class='panel-heading newshead' style='background-color: rgb(130, 157, 184);'>
		<h3 class='panel-title'>
			$head
		</h3>
	</div>
	<div class='panel-body'>
		$body
	</div>
	<div class='panel-body'>
		<span class='newsdate'>
			$date
		</span>
		<span id='$id' class='Hide btn btn-primary btn-xs'>
			<b>$str</b>
		</span>
	</div>
</div>";

?>