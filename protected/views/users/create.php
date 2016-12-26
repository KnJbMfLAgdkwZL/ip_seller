<?php
$str = Yii::t('main-ui', 'Sign up');
$role = Yii::app()->user->getRole();
if ($role == 'Admin')
{
    $this->menu = array(
        array('label' => Yii::t('main-ui', 'Manage Users'), 'url' => array('admin')),
    );
    $str = Yii::t('main-ui', 'Create Users');
}
echo "<h1>$str</h1>";
if (isset($captchaalert) && !empty($captchaalert))
    $this->renderPartial('_form', array('model' => $model, 'captchaalert' => $captchaalert));
else
    $this->renderPartial('_form', array('model' => $model));

?>