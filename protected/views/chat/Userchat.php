<form class="form-horizontal" onsubmit="return false">
    <fieldset>
        <div id='chatcontainer' class="form-group">
            <div class="col-lg-8 col-lg-offset-1">
                <div id="chatbody" class="form-control" rows="3" id="textArea">
                    <?php
                    $this->renderPartial('_chatbody', array('result' => $result));
                    ?>
                </div>
            </div>
        </div>
        <br/>

        <div class="form-group">
            <div class="col-lg-6 col-lg-offset-2">
                <textarea class="form-control" rows="3" id="textArea"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-1 col-lg-offset-3">
                <button id="butonsend" vid="<?= $id; ?>" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </fieldset>
</form>
<script>
    var height = $("#chatbody").height() + 999999999;
    $("#chatbody").animate({"scrollTop": height}, 1);

    $('#butonsend').click(function ()
    {
        var str = $('#textArea').val();
        var id = $(this).attr('vid');
        //alert(str)
        if (str.length > 0)
        {
            $.ajax({
                url: '?r=chat/AdminSendMess',
                data: {
                    id: id,
                    text: str
                },
                type: 'POST',
                success: function (msg)
                {
                    $('#textArea').val('');
                    $('#chatbody').html(msg);

                    var height = $("#chatbody").height() + 999999999;
                    $("#chatbody").animate({"scrollTop": height}, 1);

                }
            });
        }
    });
    setInterval(function ()
    {
        var id = $('#butonsend').attr('vid');
        $.ajax({
            url: '?r=chat/AdminCheckNewMEsFromser',
            data: {
                id: id
            },
            type: 'POST',
            success: function (msg)
            {
                if (msg == 'yes')
                {
                    var id = $('#butonsend').attr('vid');
                    $.ajax({
                        url: '?r=chat/AdminGetNewMES',
                        data: {
                            id: id
                        },
                        type: 'POST',
                        success: function (msg)
                        {
                            $('#chatbody').html(msg);

                            var height = $("#chatbody").height() + 999999999;
                            $("#chatbody").animate({"scrollTop": height}, 1);
                        }
                    });
                }
            }
        });


    }, 1000);
</script>
<style>
    #chatcontainer
    {

    }
    #chatbody
    {
        padding: 20px;
        cursor: default;
        height: 300px;
        overflow: auto;
        border: solid 1px black;
    }
</style>