<?php
$str = '';
$head = '';
$btn = '';
$closescript = '$(".modal").remove();';
if ($alertmessage == 'default')
{
    $str = 'Что то пошло не так. Возможны неполадки на сервере. Повторите запрос позже.';
    $head = 'Замечание';
    $btn = 'btn-warning';
    $closescript = '$(location).attr("href", "./index.php?r=site/index");';
}
else if ($alertmessage == 'success')
{
    $str = "Успешно добавлено <strong>$count</strong> IP адресов, перейдите в ваш кабинет чтобы оплатить их.";
    $head = 'Обработано';
    $btn = 'btn-primary';
    $closescript = '$(location).attr("href", "./index.php?r=client/Cabinet");';
}
else if ($alertmessage == 'toolow')
{
    $str = 'Вы запросили слишком много IP, или их уже приобрел кто то другой. Повторите запрос поиска.';
    $head = 'Повторите запрос поиска';
    $btn = 'btn-success';
    $closescript = '$(location).attr("href", "./index.php?r=client/index");';
}
else if ($alertmessage == 'error')
{
    $str = 'Произошла критическа ошибка на сервере!';
    $head = 'Ошибка';
    $btn = 'btn-danger';
    $closescript = '$(location).attr("href", "./index.php?r=site/index");';
}
else if ($alertmessage == 'lovbalance')
{
    $alertmessage = 'toolow';
    $str = 'Недостаточно средств, пополните ваш счет.';
    $head = 'Пополните баланс';
    $btn = 'btn-success';
    $closescript = '$(location).attr("href", "./index.php?r=client/Balanse");';
}
else if ($alertmessage == 'suchespayet')
{
    $alertmessage = 'success';
    $str = 'Вы успешно преобрели IP';
    $head = 'Операция прошла успешно';
    $btn = 'btn-primary';
    $closescript = '$(location).attr("href", "./index.php?r=client/History");';
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
                <button type="button" id="close" class="btn<?php echo " $btn "; ?>btn-sm">Close</button>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function ()
        {
            <?php
            echo $closescript;
            ?>
        }, 4000);
        $('.close, #close').click(function ()
        {
            <?php
            echo $closescript;
            ?>
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