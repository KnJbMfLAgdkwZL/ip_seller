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
                'actions' => array('Index', 'ChangePrice', 'GetIpStat', 'Export'),
                'roles' => array('Admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public function actionExport()//Потом доделать
    {
        header('Content-type: text/plain; charset=UTF-8');
        $str = 'Export_IP ' . date('d.m.y H_i_s', time()) . '.txt';
        header('Content-Disposition: attachment; filename="' . $str . '"');
        echo 'Hello World';
        echo 'Привет Мир';
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