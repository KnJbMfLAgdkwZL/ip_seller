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

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<style>
    .body
    {
        background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png);
    }
</style>
<div class="container" id="page">
    <?php
    $arr = array();
    $role = Yii::app()->user->getRole();
    if (!Yii::app()->user->isGuest)
    {
        echo '
				<div class="bs-component1">
					<div class="navbar navbar-default active">
						<div class="navbar-collapse collapse navbar-responsive-collapse">';
        $logoimg = Yii::app()->request->baseUrl . '/images/logo.png';
        echo "<ul class='nav navbar-nav navbar-left'>
                <li>
                    <span>
                        <a href='/index.php?r=site/index'>
                            <img class='navbar-left' style='height: 50px' src='$logoimg'>
                        </a>
                    </span>
                </li>
            </ul>";
        //$logoimg = Yii::app()->request->baseUrl.'/images/logo.png';
        //$arr[] = array('label' => "<img class='navbar-left' style='height: 50px' src='$logoimg'></img>");
        $arr[] = array('label' => Yii::t('main-ui', 'Главная'), 'url' => array('/site/index'),);
        if ($role == 'Admin')
        {
            $arr[] = array('label' => Yii::t('main-ui', 'Пользователи'), 'url' => array('/Users/admin'));
            $arr[] = array('label' => Yii::t('main-ui', 'Новости'), 'url' => array('/News/admin'));
            $arr[] = array('label' => Yii::t('main-ui', 'Все IP'), 'url' => array('/ipall/admin'));
            $arr[] = array('label' => Yii::t('main-ui', 'Админ'), 'url' => array('/Admin/index'));
            //$arr[] = array('label' => Yii::t('main-ui', 'Chat'), 'url' => array('/Chat/AdminAllChat'));
            $newmes = Chat::AdminGetNewMesCnt();
            $str = '';
            if (Check::Value($newmes))
            {
                $str = " <span class='badge'>$newmes</span>";
            }
            $arr[] = array('label' => "Чат$str", 'url' => array('/Chat/AdminAllChat'));
        }
        if ($role == 'User')
        {
            //$arr[] = array('label' => Yii::t('main-ui', 'Search IP'), 'url' => array('/client/index'));
            $arr[] = array('label' => Yii::t('main-ui', 'Кабинет'), 'url' => array('/client/Cabinet'));
            $id = Yii::app()->user->getId();
            $newmes = Chat::UserGetNewMesCnt($id);
            $str = '';
            if (Check::Value($newmes))
            {
                $str = " <span class='badge'>$newmes</span>";
            }
            $id = Yii::app()->user->getId();
            $arr[] = array('label' => "Чат$str", 'url' => array('/Chat/Userchat&id=' . $id));
            $balance = Users::GetBalans();
            $arr[] =
                array('label' =>
                    "<strong class='text-danger'  style='font-size: 18px'>$balance</strong> <span style='color: darkgreen; font-size: 16px;'>USD</span>", 'url' => array('/client/Balanse'));
        }
        $arr[] = array('label' => Yii::t('main-ui', 'Выход') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest);
        $this->widget('zii.widgets.CMenu',
            array(
                'items' => $arr,
                'htmlOptions' => array('class' => 'nav navbar-nav navbar-right'),
                'encodeLabel' => false,
            ));
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