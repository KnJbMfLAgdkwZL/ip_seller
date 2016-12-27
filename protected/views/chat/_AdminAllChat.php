<?php

/*echo '<pre>';
print_r($result);
echo '</pre>';*/
foreach ($result as $k => $v)
{
    $time = CHtml::encode(date('d.m.y H:i:s', $v['time']));
    $mess = $v['message'];
    $notnew = ' notnew';
    if ($v['new'] == '1')
    {
        $notnew = '';
    }
    if (strlen($mess) > 750)
    {
        $mess = substr($mess, 0, 72) . '...';
    }
    if ($v['from'] == 0)
    {
        $mess = "<strong>Admin:</strong><br/>$mess";
    }
    echo "<div class='users alert alert-dismissible alert-info$notnew'>
            <button type='button' class='close' id='uid_{$v['id']}' data-dismiss='alert'>×</button>

            <div class='maitext'>
                <div class='dateandlogin' style='display: inline-block'>
                    <a href='?r=users/view&id={$v['id']}' class='alert-link'>{$v['Login']}</a>
                    <br/>
                    <span style='font-family: tahoma,arial,verdana,sans-serif,Lucida Sans; color: #999; font-size: 10px;' class='text-muted'>$time</span>
                </div>

                <div class='textmess' id='tmid_{$v['id']}' style='margin-left: 25px; display: inline-block'>
                    $mess
                </div>


            </div>

        </div>";
}
?>
<style>
    .notnew
    {
        background-color: #E0EAEF;
        border-color: #E3EBED;
        color: #686C6E;
    }
    .users
    {
        margin: 10px;
        padding-top: 7px;
        padding-bottom: 0px;
    }
    .textmess
    {
        cursor: pointer;
        width: 80.1235%;
        height: 39px;
        position: relative;
        top: -13px;
        margin-bottom: -24px;
        padding-top: 8px;
    }
    .dateandlogin
    {
    }
    #AdminAllChatContent
    {
        width: 70.123456789%;
        margin-left: 10.123456789%;
    }
</style>
<div id="alertinfo"></div>
<script>
    $('.close').click(function ()
    {
        var userid = $(this).attr('id');
        userid = userid.split('_');
        userid = userid[1];
        $.ajax({
            url: '?r=chat/Areyousure',
            data: {
                userid: userid
            },
            type: 'POST',
            success: function (msg)
            {
                $('#alertinfo').html(msg);
            }
        });
    });
    $('.textmess').click(function ()
    {
        var userid = $(this).attr('id');
        userid = userid.split('_');
        userid = userid[1];
        var url = "./index.php?r=chat/Userchat&id=" + userid;
        $(location).attr("href", url);
    });
</script>