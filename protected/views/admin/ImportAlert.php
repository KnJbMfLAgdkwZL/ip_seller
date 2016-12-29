<?php
$str = '';
$head = '';
$btn = '';
$style = '';
$str2 = " Добавлено $added. Проигнорировано $matches совпадений.";
$matches = 0;
if ($alert == 'Success')
{
    $str = "Вы успешно импортировали ip адреса.";
    $head = 'Операция прошла успешно';
    $btn = 'btn-primary';
    $style = 'success';
}
else if ($alert == 'Warning')
{
    $str = "Скрипт выполнился с ошибками.";
    $head = 'Предупреждение';
    $btn = 'btn-warning';
    $style = 'default';
}
else if ($alert == 'Error')
{
    $str = "Критическая ошибка веб приложения.";
    $head = 'Критическая ошибка';
    $btn = 'btn-danger';
    $style = 'error';
}
?>
<div class="modal<?php echo " $style"; ?>" style="display: inline">
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
                echo $str, '<br/>', $str2;
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
            $(".modal").remove();
        }, 4000);
        $('.close, #close').click(function ()
        {
            $(".modal").remove();
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