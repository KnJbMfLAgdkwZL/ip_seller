<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        if(!Yii::$app->user->isGuest)
        {


            NavBar::begin([
                //'brandLabel' => 'My Company',
                //'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            /*$items = [];
            $items[] = ['label' => 'Home', 'url' => './index.php'];
            $items[] = ['label' => 'TEst', 'url' => './index-test.php'];
            /*$items[] = ['label' => 'Home', 'url' => ['/site/index']];
            $s_type = \app\models\SType::find()->all();
            foreach ($s_type as $v)
            {
                $items[] = ['label' => $v->name, 'url' => ['/s_type/'.$v->id]];
            }*/

            /*$items[] = ['label' => 'Submenu 1', 'active'=>false, 'items' => [
                ['label' => 'Action', 'url' => '#'],
                ['label' => 'Another action', 'url' => '#'],
                ['label' => 'Something else here', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => 'Submenu 2', 'items' => [
                    ['label' => 'Action', 'url' => '#'],
                    ['label' => 'Another action', 'url' => '#'],
                    ['label' => 'Something else here', 'url' => '#'],
                    '<li class="divider"></li>',
                    ['label' => 'Separated link', 'url' => '#'],
                ]],
            ]
            ];*/

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left mymenustyle'],
                'items' => //$items,

                    [
                        ['label' => 'Home', 'url' => ['/site/']],
                        Yii::$app->user->isGuest ?
                            ['label' => 'Login', 'url' => ['/site/login']] :
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                'url' => ['/site/logout'],
                                'linkOptions' => ['data-method' => 'post']],
                    ],

            ]);
            NavBar::end();
        }
        ?>

        <div class="container">

            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <!--
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
            -->
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>