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
                <button id="butonsend" class="btn btn-primary">Отправить</button>
            </div>
        </div>
    </fieldset>
</form>
<script>
    $('#butonsend').click(function ()
    {
        var str = $('#textArea').val();
        var cur = $('#chatbody').val()
        $('#chatbody').val(cur + str);

    });

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