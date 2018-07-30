<?php
$str = file_get_contents('http://ip-score.com/checkip/158.100.215.31');
$str = preg_replace('#\r#', '', $str);
$str = preg_replace('#\n#', '', $str);
//preg_match_all('#id="MaxMind">.*id="IP2Location"#', $str, $matches);
preg_match('#id="MaxMind">.*id="IP2Location"#', $str, $matches);
$str = $matches[0];
$str = preg_replace('#id="MaxMind">#', '', $str);
$str = preg_replace('#id="IP2Location#', '', $str);
echo $str; 


?>


