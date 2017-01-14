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
    echo '<div id="BuyResult"></div>';
    echo '<table class="table table-striped table-hover" style="width: 45.123456789%">
    <tbody>';
    $str = 'country';
    foreach ($AllCountry as $k => &$v)
    {
        $rand = md5($v['country']);
        echo "
        <tr>
            <td>
                <span class='openmore $str' field='$str' kill='$rand'>+</span>
                <strong>{$v['country']}</strong>
            </td>
            <td>
                <span class='count'>{$v['count']}</span>
            </td>
            <td>
                <input class='counters' type='number' min='0' max='{$v['count']}' step='1' value='0'/>
            </td>
            <td>
                <button class='btn btn-sm btn-primary col-lg-offset-0 disabled buybtn'>Купить</button>
            </td>";
        ?>
        </tr>
    <?php
    }
    echo '</tbody>
</table>';
}
?>
<script>

    $('.buybtn').live("click", function ()
    {
        var parent = $(this).parent();
        parent = parent.parent();
        var counters = parent.children().eq(2).children();
        var obj = counters;
        var count = obj.val();
        var seartext = parent.children().eq(0).children().eq(1).html();
        var field = parent.children().eq(0).children().eq(0).attr('field');

        var prev = $(this).attr('prev');
        var url = '?r=client/ShoppingCart2';
        if (prev == undefined)
        {
            url = '?r=client/ShoppingCart';
            prev = '';
        }
        $.ajax({
            url: url,
            data: {
                field: field,
                seartext: seartext,
                count: count,
                prev: prev
            },
            type: 'POST',
            success: function (msg)
            {
                $('#BuyResult').html(msg);
            }
        });
    });

    $('input[type=number]').live("click", function ()
    {
        var parent = $(this).parent();
        parent = parent.parent();
        var buy = parent.children().eq(3).children(0)

        var val = $(this).val();
        if (val == '' || val == '0')
        {
            buy.addClass("disabled");
        }
        else
        {
            buy.removeClass("disabled");
        }
    });

    $('.counters').live("focus", function ()
    {
        var parent = $(this).parent();
        parent = parent.parent();
        var buy = parent.children().eq(3).children(0)

        var val = $(this).val();
        if (val == '' || val == '0')
        {
            buy.addClass("disabled");
        }
        else
        {
            buy.removeClass("disabled");
        }
        $(".counters").live("keyup", function (key)
        {
            var cur = parseInt($(this).val());
            var max = parseInt($(this).attr('max'));
            if (cur >= max)
            {
                $(this).val(max);
            }
            if ($(this).val() == '')
            {
                $(this).val(0);
            }
            var val = $(this).val();
            if (val == '' || val == '0')
            {
                var parent = $(this).parent();
                parent = parent.parent();
                var buy = parent.children().eq(3).children(0)
                buy.addClass("disabled");
            }
            else
            {
                var parent = $(this).parent();
                parent = parent.parent();
                var buy = parent.children().eq(3).children(0)
                buy.removeClass("disabled");
            }
        });
        $(".counters").live("keydown", function (key)
        {
            if (48 <= key.which && key.which <= 57 || 96 <= key.which && key.which <= 105 || key.which == 8)
            {
                var ent = key.key;
                var cur = $(this).val();
                var max = parseInt($(this).attr('max'));
                var sum = cur + ent;
                sum = parseInt(sum);
                if (cur == '0')
                {
                    $(this).val('');
                }
            }
            else
            {
                return false;
            }
        });
    });

    $('.openmore').live("click", function ()
    {
        var cur = $(this);
        var text = cur.parent().children().eq(1).html();
        var field = cur.attr('field');
        var kill = cur.attr('kill');
        var parent = cur.parent().parent();
        var prev = parent.children().eq(3).children().eq(0).attr('prev');
        if(prev == undefined)
        {
            prev = '';
        }
        if (cur.html() == '+')
        {
            $.ajax({
                url: '?r=client/GetNextCount',
                data: {
                    text: text,
                    field: field,
                    kill: kill,
                    prev: prev
                },
                type: 'POST',
                success: function (msg)
                {
                    cur.html('-');
                    cur.parent().parent().after(msg);
                }
            });
        }
        else
        {
            cur.html('+');
            var arr = kill.split(' ');
            kill = '.' + arr[arr.length - 1];
            $(kill).remove();
        }
    });
</script>
<style>
    .openmore
    {
        cursor: pointer;
        padding: 0px 4px;
        color: #428BCA;
        font-weight: bold;
        border: 1px solid #428BCA;
        margin-right: 5px;
    }
    .buybtn
    {
        margin-left: 20px;
        margin-top: -2px;
    }
    .count
    {
        color: #317EAC;
        font-weight: bolder;
        margin-left: 1.123456%;
    }
    .counters
    {
        border: 1px solid lightsteelblue;
        width: 55px;
    }
    .country
    {
        margin-left: 0px;
    }
    .state
    {
        margin-left: 20px;
    }
    .city
    {
        margin-left: 40px;
    }
    .zip
    {
        margin-left: 60px;
    }
</style>










































