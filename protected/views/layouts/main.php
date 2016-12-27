<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
          media="screen, projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
          media="print"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/MyStyle.css"/>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/JavaScript/jquery-2.1.1.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div class="container" id="page">
    <?php
    $arr = array();
    $role = Yii::app()->user->getRole();
    if (!Yii::app()->user->isGuest)
    {
        echo '
				<div class="bs-component">
					<div class="navbar navbar-default active">
						<div class="navbar-collapse collapse navbar-responsive-collapse">';
        $arr[] = array('label' => Yii::t('main-ui', 'Home'), 'url' => array('/site/index'),);
        if ($role == 'Admin')
        {
            $arr[] = array('label' => Yii::t('main-ui', 'Users'), 'url' => array('/Users/admin'));
            $arr[] = array('label' => Yii::t('main-ui', 'News'), 'url' => array('/News/admin'));
            $arr[] = array('label' => Yii::t('main-ui', 'All IP'), 'url' => array('/ipall/index'));
            $arr[] = array('label' => Yii::t('main-ui', 'Admin'), 'url' => array('/Admin/index'));
            $arr[] = array('label' => Yii::t('main-ui', 'Chat'), 'url' => array('/Chat/AdminAllChat'));
        }
        if ($role == 'User')
        {
            $arr[] = array('label' => Yii::t('main-ui', 'Search IP'), 'url' => array('/client/index'));
            $arr[] = array('label' => Yii::t('main-ui', 'Cabinet'), 'url' => array('/client/Cabinet'));
        }
        $arr[] = array('label' => Yii::t('main-ui', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest);
        $this->widget('zii.widgets.CMenu', array('items' => $arr, 'htmlOptions' => array('class' => 'nav navbar-nav'),));
        echo '	</div>
					</div>
				</div>';
        ?>
        <script>
            setInterval(function ()
            {
                $.ajax({
                    url: '?r=site/StillAlive',
                    data: {},
                    type: 'POST',
                    success: function (msg)
                    {
                        if (msg != 'StillAlive')
                        {
                            $(location).attr("href", "./index.php?r=site/logout")
                        }
                    }
                });
            }, 3000);
        </script>
    <?php
    }
    ?>
    <?= $content; ?>
    <div class="clear"></div>
    <div id="footer"></div>
</div>
</body>
</html>