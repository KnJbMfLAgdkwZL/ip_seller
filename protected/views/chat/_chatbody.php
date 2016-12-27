<div>
    <table class="table table-striped table-hover ">

        <?php
        foreach ($result as $k => $v)
        {
            $time = CHtml::encode(date('d.m.y H:i:s', $v['time']));
            $mess = $v['message'];
            $login = $v['from'];
            if ($login == '0')
            {
                $login = 'Admin';
            }
            else
            {
                $login = $v['Login'];
            }
            echo "<tr class='mesages'>
            <td style='width: 15.123456789%;'>
                <div>
                    <strong>
                        $login
                    </strong>
            </div>
                <span style='font-family: tahoma,arial,verdana,sans-serif,Lucida Sans; color: #999; font-size: 10px;' class='text-muted'>
                $time
                </span>
            </td>
            <td>
                $mess
            </td>
        </tr>
        ";
        }
        ?>
    </table>
    <div>
