<?php
$balance = Users::GetBalans();
$this->menu = array(
    array('label' => '<strong class="text-primary">Баланс: <strong class="text-danger"  style="font-size: 17px">
            ' . $balance . '
            </strong>
            <span class="text-success">USD</span></strong>'),
    array('label' => '<strong class="text-danger">Пополнить</strong>', 'url' => array('Balanse')),
    array('label' => 'Корзина', 'url' => array('Cabinet')),
    //array('label' => 'Список купленных', 'url' => array('History')),
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
?>