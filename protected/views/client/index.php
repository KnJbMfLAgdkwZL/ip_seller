<form class="form-horizontal" onsubmit="return false">
    <fieldset>
        <legend>Критерии поиска:</legend>
        <div class="form-group" style="float: left; width: 25%">
            <label for="select" class="col-lg-4 control-label">Поиск по</label>

            <div class="col-lg-8">
                <select class="form-control" id="select">
                    <option>Country</option>
                    <option>State</option>
                    <option>City</option>
                    <option>Zip</option>
                </select>
            </div>
        </div>
        <div class="form-group" id="alert1">
            <div class="col-lg-4">
                <input style="width: 50%; float: left; margin-right: 10px" class="form-control" id="Searchtext"
                       placeholder="Введите название" type="text"/>
                <button type="button" id="Search" class="btn btn-primary">Поиск</button>
                <p id="alert2" style="margin-top: 1.123456%" class="text-danger hideme">Необходимо больше букв для
                    поиска!</p>
            </div>
        </div>
    </fieldset>
</form>

<div id="SearchResult"></div>

<script>
    $('#Search').click(function ()
    {
        var sel = $('#select option:selected').text();
        var val = $('#Searchtext').val();
        if (val.length >= 2)
        {
            $.ajax({
                url: '?r=client/GetCount',
                data: {
                    sel: sel,
                    val: val
                },
                type: 'POST',
                success: function (msg)
                {
                    $('#SearchResult').html(msg);
                }
            });
        }
        else
        {
            $('#alert1').addClass("has-error");
            $('#alert2').removeClass("hideme");
        }
    });
    $("#Searchtext").change(function ()
    {
        $('#alert1').removeClass("has-error");
        $('#alert2').addClass("hideme");
    });
    $("#Searchtext").focus(function ()
    {
        $('#alert1').removeClass("has-error");
        $('#alert2').addClass("hideme");
    });
</script>
<style>
    .hideme
    {
        display: none;
    }
</style>


<h4>Все страны:</h4>
<?php

$AllCountry = Ipall::getAllCountry();
foreach ($AllCountry as $k => &$v)
{
    $v['count'] = Ipall::getCountBy('country', $v['country']);
}
if (count($AllCountry) > 0)
{
    echo '<table class="table table-striped table-hover" style="width: 45.123456789%">
    <tbody>';
    foreach ($AllCountry as $k => &$v)
    {
        $str = 'country' . $k;
        ?>

        <tr>
            <td>
                <strong><?= $v['country']; ?></strong>
            </td>
            <td>
                <span style='color: #317EAC; font-weight: bolder; margin-left: 1.123456%'>
                    <?= $v['count']; ?>
                </span>
            </td>
            <td>
                <input style='border: 1px solid lightsteelblue; width: 55px' type='number' class='counters<?= $str; ?>'
                       min='0' max='<?= $v['count']; ?>' step='1' value='0'/>
            </td>
            <td>
                <button style="margin-left: 20px; margin-top: -2px" type="button" id="Buy<?= $str; ?>"
                        class="btn btn-sm btn-primary col-lg-offset-0 disabled">Купить
                </button>
                <div id="BuyResult<?= $str; ?>"></div>
            </td>
        </tr>
        <script>
            $('#Buy<?= $str; ?>').click(function ()
            {
                /*$('#Searchtext').val('');
                 $('#SearchResult').html('');*/

                var obj = $('.counters<?= $str; ?>');
                var field = 'country';
                var count = obj.val();
                var seartext = '<?= $v['country']; ?>';
                $.ajax({
                    url: '?r=client/ShoppingCart',
                    data: {
                        field: field,
                        seartext: seartext,
                        count: count
                    },
                    type: 'POST',
                    success: function (msg)
                    {
                        $('#BuyResult<?= $str; ?>').html(msg);
                    }
                });
            });
            $('.counters<?= $str; ?>').click(function ()
            {
                var val = $('.counters<?= $str; ?>').val();
                if (val == '' || val == '0')
                {
                    $('#Buy<?= $str; ?>').addClass("disabled");
                }
                else
                {
                    $('#Buy<?= $str; ?>').removeClass("disabled");
                }
            });
            $('.counters<?= $str; ?>').focus(function ()
            {
                var val = $('.counters<?= $str; ?>').val();
                if (val == '' || val == '0')
                {
                    $('#Buy<?= $str; ?>').addClass("disabled");

                }
                else
                {
                    $('#Buy<?= $str; ?>').removeClass("disabled");
                }
                $(".counters<?= $str; ?>").keyup(function (key)
                {
                    var cur = parseInt($('.counters<?= $str; ?>').val());
                    var max = parseInt($('.counters<?= $str; ?>').attr('max'));
                    if (cur >= max)
                    {
                        $('.counters<?= $str; ?>').val(max);
                    }
                    if ($('.counters<?= $str; ?>').val() == '')
                    {
                        $('.counters<?= $str; ?>').val(0);
                    }
                    var val = $('.counters<?= $str; ?>').val();
                    if (val == '' || val == '0')
                    {
                        $('#Buy<?= $str; ?>').addClass("disabled");
                    }
                    else
                    {
                        $('#Buy<?= $str; ?>').removeClass("disabled");
                    }
                });
                $(".counters<?= $str; ?>").keydown(function (key)
                {
                    if (48 <= key.which && key.which <= 57 || 96 <= key.which && key.which <= 105 || key.which == 8)
                    {
                        var ent = key.key;
                        var cur = $('.counters<?= $str; ?>').val();
                        var max = parseInt($('.counters<?= $str; ?>').attr('max'));
                        var sum = cur + ent;
                        sum = parseInt(sum);
                        if (cur == '0')
                        {
                            $('.counters<?= $str; ?>').val('');
                        }
                    }
                    else
                    {
                        return false;
                    }
                });
            });
        </script>
    <?php
    }
    echo '</tbody>
</table>';
}
?>


