<?php
$str = $next;
foreach ($result as $k => &$v)
{
    $rand = md5($v['name']);
    echo "
    <tr class='$kill'>
        <td>";

    if($str != 'zip')
    {
        echo "<span class='openmore $str' field='$str' kill='$kill $rand'>+</span>";
    }
    else
    {
        echo "<span class='$str' field='$str' kill='$kill $rand'></span>";
    }

        echo
        "    <strong>{$v['name']}</strong>
        </td>
        <td>
            <span class='count'>{$v['count']}</span>
        </td>
        <td>
            <input class='counters' type='number' min='0' max='{$v['count']}' step='1' value='0'/>
        </td>
        <td>
            <button class='btn btn-sm btn-primary col-lg-offset-0 disabled buybtn' prevf='$prevf' prevv='$prevv'>Купить</button>
        </td>
    </tr >";
}
?>