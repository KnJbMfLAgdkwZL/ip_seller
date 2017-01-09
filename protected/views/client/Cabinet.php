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
$cnt = count($result);
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

    <h3>Неоплаченны <strong style="margin-left: 5px"> <?= $cnt; ?></strong> штук IP, на сумму <strong
            style="margin-left: 5px"> <?= $cnt * $price; ?></strong> USD</h3>
    <div style="margin-bottom: 10px" class="col-lg-5 col-lg-offset-8">

        <button class="btn btn-default btn-sm" id="cartclear">
            <strong> Очистить корзину </strong>
        </button>

        <strong style="margin: 5px"> </strong>

        <button class="btn btn-primary btn-sm" id="buycart">Подтвердить</button>

    </div>
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>№</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Zip</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $k => $v)
        {
            echo "<tr class='active'>
                    <td>{$k}</td>
                    <td>{$v['country']}</td>
                    <td>{$v['state']}</td>
                    <td>{$v['city']}</td>
                    <td>{$v['zip']}</td>
                </tr>";
        }
        ?>
        </tbody>
    </table>
    <style>
        table > thead > tr > th
        {
            background-color: #79B4DC;
        }
    </style>

    <div id="BuyResult"></div>

    <script>
        $('#cartclear').click(function ()
        {
            $.ajax({
                url: '?r=client/cartclear',
                data: {},
                type: 'POST',
                success: function (msg)
                {
                    $(location).attr("href", "./index.php?r=client/Cabinet")
                }
            });
        });
        $('#buycart').click(function ()
        {
            $.ajax({
                url: '?r=client/buycart',
                data: {},
                type: 'POST',
                success: function (msg)
                {
                    $('#BuyResult').html(msg);


                }
            });
        });
    </script>
<?php
}
else
{
    ?>

    <h3>Ваша корзина пуста</h3>
<?php
}

extract($History);
$cnt = 0;
$this->renderPartial('History',
    array('result' => $result,
        'cnt' => $cnt,
        'cntbuy' => $cntbuy,
        'dates' => $dates,
    ));

?>