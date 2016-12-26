<h2>Результат поиска:</h2>
<div>
    <?php
    $str = '';
    foreach ($result as $k => $v)
    {
        $v['field'] = UCFirst($v['field']);
        echo
        "<div style='margin-left: 2.1234% '>
        <div>
            <span style='font-size: 15px; font-weight: bolder; color: #505050'>
                {$v['field']}:
            </span>
            <span style='color: dimgray; font-weight: bold; margin-left: 1.123456%'>
                {$v['value']}
            </span>
            <div style='margin-top: 3px;'>
                <span style='font-size: 14px; font-weight: bolder; color: #505050'>
                    Count:
                </span>
                <span style='color: #317EAC; font-weight: bolder; margin-left: 1.123456%'>
                    {$v['count']}";
        if ($k == 0)
        {
            $seartext = $v['value'];
            $seartext = str_ireplace("<span style='color:#0099FF'>", "", $seartext);
            $seartext = str_ireplace("</span>", "", $seartext);
            echo " / <input style='border: 1px solid lightsteelblue; width: 55px' type='number' class='counters' id='{$v['field']}' min='0' max='{$v['count']}' step='1' value='0'/>";
            echo "<input type='hidden' id='seartext' value='$seartext' />";
        }
        echo "</span></div>
        </div>
        <br/>";
        $str .= "</div>";
    }
    echo $str;
    ?>
    <br/>
    <button type="button" id="Buy" class="btn btn-primary col-lg-offset-0 disabled">Купить</button>
</div>

<div id="BuyResult"></div>

<script>
    $('#Buy').click(function ()
    {
        /*$('#Searchtext').val('');
         $('#SearchResult').html('');*/

        var obj = $('.counters');
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
    $('.counters').click(function ()
    {
        var val = $('.counters').val();
        if (val == '' || val == '0')
        {
            $('#Buy').addClass("disabled");
        }
        else
        {
            $('#Buy').removeClass("disabled");
        }
    });
    $('.counters').focus(function ()
    {
        var val = $('.counters').val();
        if (val == '' || val == '0')
        {
            $('#Buy').addClass("disabled");

        }
        else
        {
            $('#Buy').removeClass("disabled");
        }
        $(".counters").keyup(function (key)
        {
            var cur = parseInt($('.counters').val());
            var max = parseInt($('.counters').attr('max'));
            if (cur >= max)
            {
                $('.counters').val(max);
            }
            if ($('.counters').val() == '')
            {
                $('.counters').val(0);
            }
            var val = $('.counters').val();
            if (val == '' || val == '0')
            {
                $('#Buy').addClass("disabled");
            }
            else
            {
                $('#Buy').removeClass("disabled");
            }
        });
        $(".counters").keydown(function (key)
        {
            if (48 <= key.which && key.which <= 57 || 96 <= key.which && key.which <= 105 || key.which == 8)
            {
                var ent = key.key;
                var cur = $('.counters').val();
                var max = parseInt($('.counters').attr('max'));
                var sum = cur + ent;
                sum = parseInt(sum);
                if (cur == '0')
                {
                    $('.counters').val('');
                }
            }
            else
            {
                return false;
            }
        });
    });
</script>