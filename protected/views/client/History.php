<?php
$balance = Users::GetBalans();
$this->menu = array(
    array('label' => '<strong class="text-primary">Баланс: <strong class="text-danger"  style="font-size: 17px">
            ' . $balance . '
            </strong>
            <span class="text-success">USD</span></strong>'),
    array('label' => 'Корзина', 'url' => array('Cabinet')),
    array('label' => 'Пополнить Баланс', 'url' => array('Balanse')),
    array('label' => 'Список купленных', 'url' => array('History')),
);
if ($cnt > 0)
{
    ?>
    <div class="alert alert-dismissible alert-info" id="newipalert">
        <button type="button" id="alertclose" class="close" data-dismiss="alert">×</button>
        <strong>В вашей корзине находятся неоплаченные IP.</strong> <br/> Подтвердите оплату, иначе они будут
        автоматически убраны из корзины, после завершения сессии.
        <script>
            $('#alertclose').click(function ()
            {
                $('#newipalert').remove();
            });
        </script>
    </div>
<?php
}
if ($cntbuy > 0)
{
    ?>
    <style>
        .span-19
        {
            width: 80.123456789%;
        }
        #newipalert
        {
            width: 750px
        }
    </style>
    <h3>История покупок </h3>
    <?php

    $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'history-ip',
            'dataProvider' => $result,
            'columns' =>
                array(
                    array(
                        'name' => 'id',
                        'header' => Yii::t('main-ui', 'id'),
                        'value' => 'CHtml::encode($data["id"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'ip',
                        'header' => Yii::t('main-ui', 'ip'),
                        'value' => 'CHtml::encode($data["ip"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'login',
                        'header' => Yii::t('main-ui', 'login'),
                        'value' => 'CHtml::encode($data["login"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'pass',
                        'header' => Yii::t('main-ui', 'pass'),
                        'value' => 'CHtml::encode($data["pass"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'country',
                        'header' => Yii::t('main-ui', 'country'),
                        'value' => 'CHtml::encode($data["country"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'state',
                        'header' => Yii::t('main-ui', 'state'),
                        'value' => 'CHtml::encode($data["state"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'city',
                        'header' => Yii::t('main-ui', 'city'),
                        'value' => 'CHtml::encode($data["city"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'zip',
                        'header' => Yii::t('main-ui', 'zip'),
                        'value' => 'CHtml::encode($data["zip"])',
                        'type' => 'html',
                        'filter' => false,
                    ),
                    array(
                        'name' => 'time',
                        'header' => Yii::t('main-ui', 'time'),
                        'type' => 'raw',
                        'filter' => false,
                        //'value' =>'CHtml::encode($data["time"])',
                        'value' => function ($data)
                        {
                            return CHtml::encode(date('d.m.Y H:i:s', $data["time"]));
                        },),
                ),
        )
    );
}
else
{
    ?>
    <h3>Вы еще не купили ни одного IP </h3>
<?php
}
?>