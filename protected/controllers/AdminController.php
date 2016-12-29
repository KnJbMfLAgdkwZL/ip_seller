<?php
class AdminController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
            'postOnly + delete',
        );
    }
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('Index', 'ChangePrice', 'GetIpStat', 'Export', 'Import'),
                'roles' => array('Admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public function actionImport()
    {
        $alert = 'Warning';
        $added = 0;
        $matches = 0;
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $role = Yii::app()->user->getRole();
                if ($role == 'Admin')
                {
                    if (Check::Value($_FILES))
                    {
                        if (Check::Value($_FILES['userfile']))
                        {
                            if (!$_FILES['userfile']['error'])
                            {
                                if ($_FILES['userfile']['type'] == 'text/plain')
                                {
                                    if (Check::Value($_FILES['userfile']['tmp_name']))
                                    {
                                        $Allip = array();
                                        $str = file_get_contents($_FILES['userfile']['tmp_name']);
                                        $rows = mb_split('\r\n', $str);
                                        foreach ($rows as $k => $v)
                                        {
                                            $columns = explode('|', $v);
                                            foreach ($columns as $key => &$value)
                                            {
                                                $value = trim($value);
                                            }
                                            list($ip, $login, $pass, $country, $state, $city, $zip) = $columns;
                                            if (Check::Value($ip))
                                            {
                                                if (!array_key_exists($ip, $Allip))
                                                {
                                                    $Allip[$ip] = array(
                                                        'ip' => $ip,
                                                        'login' => $login,
                                                        'pass' => $pass,
                                                        'country' => $country,
                                                        'state' => $state,
                                                        'city' => $city,
                                                        'zip' => $zip);
                                                }
                                            }
                                        }
                                        if (Ipall::Import($Allip, $added, $matches))
                                        {
                                            $this->actionIndex();
                                            $alert = 'Success';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        catch (Exception $e)
        {
            $alert = 'Error';
        }
        $this->renderPartial('ImportAlert', array('alert' => $alert, 'added' => $added, 'matches' => $matches));
    }
    public function actionExport($Select)//Потом доделать
    {
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $role = Yii::app()->user->getRole();
                if ($role == 'Admin')
                {
                    $Select = Check::Clear($Select);
                    $str = '';
                    $result = array();
                    if ($Select == -1)
                    {
                        $str = 'All';
                        $result = Ipall::GetAllIP();
                    }
                    else if ($Select == 0)
                    {
                        $str = 'Live';
                        $result = Ipall::GetLiveIP();
                    }
                    else if ($Select == 2)
                    {
                        $str = 'Sold';
                        $result = Ipall::GetSoldIP();
                    }
                    else if ($Select == 3)
                    {
                        $str = 'Black';
                        $result = Ipall::GetBlackIP();
                    }
                    else if ($Select == 4)
                    {
                        $str = 'Dead';
                        $result = Ipall::GetDeadIP();
                    }
                    header('Content-type: text/plain; charset=UTF-8');
                    $str = "Export_{$str}_IP " . date('d.m.y H_i_s', time()) . '.txt';
                    header('Content-Disposition: attachment; filename="' . $str . '"');
                    $size = count($result) - 1;
                    foreach ($result as $k => $v)
                    {
                        extract($v);
                        echo "$ip | $login | $pass | $country | $state | $city | $zip";
                        if ($k != $size)
                        {
                            echo "\r\n";
                        }
                    }
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
    public function actionGetIpStat()
    {
        $countip = array();
        $countip['ipl'] = Ipall::GetCountLiveIP();
        $countip['ipb'] = Ipall::GetCountBlackIP();
        $countip['ipd'] = Ipall::GetCountDeadIP();
        $countip['ipr'] = Ipall::GetCountReservedIP();
        $countip['ipbu'] = Ipall::GetCountBuyedIP();
        $this->renderPartial('ipstat', array('countip' => $countip));
    }
    public function actionIndex()
    {
        $db = new Management();
        $curprice = $db->getPrice();
        $countip = array();
        $countip['ipl'] = Ipall::GetCountLiveIP();
        $countip['ipb'] = Ipall::GetCountBlackIP();
        $countip['ipd'] = Ipall::GetCountDeadIP();
        $countip['ipr'] = Ipall::GetCountReservedIP();
        $countip['ipbu'] = Ipall::GetCountBuyedIP();
        $this->render('index', array('curprice' => $curprice, 'countip' => $countip));
    }
    public function actionChangePrice()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['price']))
            {
                $db = new Management();
                if ($db->ChangePrice($_POST['price']))
                {
                    $res = $db->getPrice();
                    if (Check::Value($res))
                    {
                        echo $res;
                    }
                }
            }
        }
    }
}