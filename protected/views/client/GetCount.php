<h2>Результат поиска:</h2>
<div>
    <?php
    $str = '';
    foreach ($result as $k => $v)
    {
        if ($k == 0)
        {
            $v['field'] = UCFirst($v['field']);
            echo
            "<div style='margin-left: 2.1234%'>
        <div>
            <span style='font-size: 15px; font-weight: bolder; color: #505050'>
                {$v['field']}:
            </span>
            <span style='color: dimgray; font-weight: bold; margin-left: 1.123456%'>
                {$v['value']}
            </span>
            <span style='margin-top: 0px;'>
                <!--
                <span style='font-size: 14px; font-weight: bolder; color: #505050'>
                    Count:
                </span>
                -->
                <span style='color: #317EAC; font-weight: bolder; margin-left: 1.123456%'>
                    {$v['count']}";
            $seartext = $v['value'];
            $seartext = str_ireplace("<span style='color:#0099FF'>", "", $seartext);
            $seartext = str_ireplace("</span>", "", $seartext);
            echo " / <input style='border: 1px solid lightsteelblue; width: 55px' type='number' class='counters11' id='{$v['field']}' min='0' max='{$v['count']}' step='1' value='0'/>";
            echo "<input type='hidden' id='seartext' value='$seartext' />";
            echo '<button style="margin-left: 20px; margin-top: -2px" type="button" id="Buy" class="btn btn-sm btn-primary col-lg-offset-0 disabled">Купить</button>
            ';
            echo "</span></span>
        </div>
        <br/>";
            $str .= "</div>";
        }
        else
        {
            $v['field'] = UCFirst($v['field']);
            echo
            "<div style='margin-left: 0.1234%'>
        <div>
            <span style='font-size: 11px; font-weight: bolder; color: #505050'>
                {$v['field']}:
            </span>
            <span style='font-size: 13px; color: dimgray; font-weight: bold; margin-left: 1.123456%'>
                {$v['value']} ( <span style='color: #317EAC; font-weight: bolder;'>{$v['count']}</span> )
            </span>
        </div>
        <br/>";
            $str .= "</div>";
        }
    }
    echo $str;
    ?>
    <br/>
    <!--
    <button type="button" id="Buy" class="btn btn-primary col-lg-offset-0 disabled">Купить</button>
    -->
</div>

<div id="BuyResult"></div>

<script>
    $('#Buy').click(function ()
    {

        var obj = $('.counters11');
        var field = obj.attr('id');
        var count = obj.val();
        var seartext = $('#seartext').val();

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
                $('#BuyResult').html(msg);
            }
        });
    });
    $('.counters11').click(function ()
    {
        var val = $('.counters11').val();
        if (val == '' || val == '0')
        {
            $('#Buy').addClass("disabled");
        }
        else
        {
            $('#Buy').removeClass("disabled");
        }
    });
    $('.counters11').focus(function ()
    {
        var val = $('.counters11').val();
        if (val == '' || val == '0')
        {
            $('#Buy').addClass("disabled");

        }
        else
        {
            $('#Buy').removeClass("disabled");
        }
        $(".counters11").keyup(function (key)
        {
            var cur = parseInt($('.counters11').val());
            var max = parseInt($('.counters11').attr('max'));
            if (cur >= max)
            {
                $('.counters11').val(max);
            }
            if ($('.counters11').val() == '')
            {
                $('.counters11').val(0);
            }
            var val = $('.counters11').val();
            if (val == '' || val == '0')
            {
                $('#Buy').addClass("disabled");
            }
            else
            {
                $('#Buy').removeClass("disabled");
            }
        });
        $(".counters11").keydown(function (key)
        {
            if (48 <= key.which && key.which <= 57 || 96 <= key.which && key.which <= 105 || key.which == 8)
            {
                var ent = key.key;
                var cur = $('.counters11').val();
                var max = parseInt($('.counters11').attr('max'));
                var sum = cur + ent;
                sum = parseInt(sum);
                if (cur == '0')
                {
                    $('.counters11').val('');
                }
            }
            else
            {
                return false;
            }
        });
    });
</script>