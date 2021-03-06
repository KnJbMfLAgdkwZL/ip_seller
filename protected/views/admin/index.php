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

    <div id="ipimportexport">
        <h3>Импорт/ экспорт базы</h3>

        <div style="margin-top: 20px">
            <h4>Импорт: </h4>

            <form action="?r=Admin/Import" style="float: left; margin-right: 15px" enctype="multipart/form-data"
                  method="POST">
                <input style="display: none" name="userfile" id="exporig" type="file" accept="text/plain"/> <input
                    id="submit" value="Загрузить" type="submit" class="btn btn-primary btn-sm disabled"/> <input
                    type="hidden" name="MAX_FILE_SIZE" value="3000000000000000"/>
            </form>
            <span>
                <button class="btn btn-info btn-sm" id="explore">
                    Обзор
                </button> <strong id="filename">Файл не выбран.</strong>
            </span>
        </div>

        <div style="margin-top: 20px">
            <h4>Экспорт: </h4>
            <span>

                 <select class="form-control" id="ExportSelect"
                         style="margin-top:-4px; margin-right: 20px; width: 12.123456789%; float: left">
                     <option value="-1">Все IP</option>
                     <option value="0">Живые IP</option>
                     <option value="2">Проданые IP</option>
                     <option value="3">Черные IP</option>
                     <option value="4">Мертвые</option>
                 </select>

                <button id="Export" class="btn btn-success btn-sm">
                    Скачать
                </button>
            </span>
        </div>
    </div>
</div>


<script>
    $('#Export').click(function ()
    {
        var value = $('#ExportSelect').val();
        $(location).attr("href", "./index.php?r=admin/Export&Select=" + value);
    });
    $('#exporig').change(function ()
    {
        var str = $(this).val();
        $('#filename').html(str);

        if (str != 'Файл не выбран.' && str != '')
        {
            $('#submit').removeClass('disabled');
        }
        else
        {
            $('#submit').addClass('disabled');
        }
    });
    $('#explore').click(function ()
    {
        $('#exporig').click();
    });
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