<div id="pricecontetnt">
    <div id="priceinfo">
        <h3>Текушая цена:
        <span id="curprice" style="color: #011D37">
            <?php
            echo $curprice;
            ?>
        </span>
        </h3>
    </div>
    <div id="pricechanger" style="display: inline-block">
        <h3 style="display: inline-block; margin-right: 5px;">Изменить цену:</h3>
        <input style='margin-right: 15px;' type='text' id='Price' value='0'/>
        <button type="button" id="ChangePrice" class="btn btn-primary col-lg-offset-0 btn-sm">Изменить</button>
    </div>

    <div id='ipstatistic'>
        <?php
        $this->renderPartial('ipstat', array('countip' => $countip));
        ?>
    </div>

</div>


<script>
    function GetIPStat()
    {
        $.ajax({
            url: '?r=Admin/GetIpStat',
            data: {},
            type: 'POST',
            success: function (msg)
            {
                $('#ipstatistic').html(msg);
            }
        });
    }
    setInterval(GetIPStat, 5000);
    $('#ChangePrice').click(function ()
    {
        var val = $('#Price').val();
        if (val.length > 0)
        {
            val = parseFloat(val);
            if (val > 0)
            {
                $.ajax({
                    url: '?r=Admin/ChangePrice',
                    data: {
                        price: val
                    },
                    type: 'POST',
                    success: function (msg)
                    {
                        $('#curprice').html(msg);

                        var myscr = "<script>setTimeout(function () {$('#alertprice').remove();}, 3000);<*script>";
                        myscr = myscr.replace('*', '/');

                        var str = "$('#alertprice').remove();";
                        $("#pricecontetnt").append(
                            '<div id="alertprice" style="margin-left:20px; display: inline-block; width: 23.1234%; ">' +
                            '<div class="alert alert-dismissible alert-success">' +
                            '<button onclick="' + str + '" type="button" id="closealert" class="close" data-dismiss="alert">×</button>' +
                            '<strong>Цена</strong> успешно изменина.' +
                            '</div>' + myscr +
                            '</div>');


                    }
                });
            }
        }
    });
    $("#Price").keyup(function (key)
    {
        var val = $('#Price').val();
        var regexp = new RegExp("[^0-9.]+"/*, 'g'*/);
        val = val.replace(regexp, '');
        $('#Price').val(val);
    });
</script>



