<?php
$str = '';
$head = '';
$btn = '';
$closescript = '$(".modal").remove();';
if ($alertmessage == 'Areyousure')
{
    $str = 'Что хотите удалить весь диалог с этим пользователем?';
    $head = 'Вы уверены?';
    $btn = 'btn-success';
    $alertmessage = 'toolow';
}
?>
<div class="modal<?php echo " $alertmessage"; ?>" style="display: inline">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <?php
                    echo $head;
                    ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                echo $str;
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" id="yes" class="btn btn-warning btn-sm">Да</button>
                <button type="button" id="close" class="btn<?php echo " $btn "; ?>btn-sm">Нет</button>
            </div>
        </div>
    </div>
    <script>
        $('.close, #close').click(function ()
        {
            $(".modal").remove();
        });
        $('#yes').click(function ()
        {
            var userid = <?php echo $userid ?>;
            $.ajax({
                url: '?r=chat/DialogDelete',
                data: {
                    userid: userid
                },
                type: 'POST',
                success: function (msg)
                {
                    $('#AdminAllChatContent').html(msg);
                    $(".modal").remove();
                }
            });
        });
    </script>
    <style>
        .success
        {
        }
        .toolow
        {
        }
        .error
        {
        }
        .default
        {
        }
        .success > .modal-dialog > .modal-content > .modal-footer > #close
        {
            background-color: #D9EDF7;
        }
        .success > .modal-dialog > .modal-content
        {
            color: #3A87AD;
            background-color: #D9EDF7;
            border-color: #BCE8F1;
        }
        .success > .modal-dialog > .modal-content > .modal-header > h4
        {
            color: #2D6987;
        }
        .toolow > .modal-dialog > .modal-content > .modal-footer > #close
        {
            background-color: #DFF0D8;
        }
        .toolow > .modal-dialog > .modal-content
        {
            background-color: #DFF0D8;
            border-color: #D6E9C6;
            color: #468847;
        }
        .toolow > .modal-dialog > .modal-content > .modal-header > h4
        {
            color: #356635;
        }
        .error > .modal-dialog > .modal-content > .modal-footer > #close
        {
            background-color: #F2DEDE;
        }
        .error > .modal-dialog > .modal-content
        {
            background-color: #F2DEDE;
            border-color: #EED3D7;
            color: #B94A48;
        }
        .error > .modal-dialog > .modal-content > .modal-header > h4
        {
            color: #953B39;
        }
        .default > .modal-dialog > .modal-content > .modal-footer > #close
        {
            background-color: #FCF8E3;
        }
        .default > .modal-dialog > .modal-content
        {
            background-color: #FCF8E3;
            border-color: #FBEED5;
            color: #C09853;
        }
        .default > .modal-dialog > .modal-content > .modal-header > h4
        {
            color: #A47E3C;
        }
        .modal-dialog
        {
            width: 30.123456789%;
        }
    </style>
</div>