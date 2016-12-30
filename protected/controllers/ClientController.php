<?php
class ClientController extends Controller
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
                'actions' => array('GetCount', /*'Index',*/
                    'ShoppingCart', 'Cabinet',
                    'Cartclear', 'Buycart', 'StillAlive', 'Balanse', 'History'
                ),
                'roles' => array('User'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public function actionBalanse()
    {
        $this->layout = '//layouts/column3';
        if (!Yii::app()->user->isGuest)
        {
            $id = Yii::app()->user->getId();
            if (Check::Value($id))
            {
                $cnt = Ipall::GetUsserCartCount($id);
                $this->render('Balanse', array('cnt' => $cnt));
            }
        }
    }
    public function actionHistory()
    {
        $this->layout = '//layouts/column3';
        if (!Yii::app()->user->isGuest)
        {
            $id = Yii::app()->user->getId();
            if (Check::Value($id))
            {
                $cnt = Ipall::GetUsserCartCount($id);
                $cntbuy = Ipall::GetUsserBuyedIP($id);
                $db = new Ipall();
                $result = $db->GetUsserHistory($id);
                $dates = Ipall::GetUsserDateHistoryIP($id);
                $this->render('History',
                    array('result' => $result,
                        'cnt' => $cnt,
                        'cntbuy' => $cntbuy,
                        'dates' => $dates,
                    ));
            }
        }
    }
    public function actionCabinet()
    {
        $this->layout = '//layouts/column3';
        if (!Yii::app()->user->isGuest)
        {
            $id = Yii::app()->user->getId();
            if (Check::Value($id))
            {
                $db = new Ipall();
                $result = $db->GetUsserCart($id);
                $db = new Management();
                $price = $db->getPrice();
                $this->render('Cabinet', array('result' => $result, 'price' => $price));
            }
        }
    }
    public function actionCartclear()
    {
        if (!Yii::app()->user->isGuest)
        {
            $id = Yii::app()->user->getId();
            if (Check::Value($id))
            {
                $db = new Ipall();
                $db->Cartclear($id);
            }
        }
    }
    public function actionBuycart()
    {
        if (!Yii::app()->user->isGuest)
        {
            $id = Yii::app()->user->getId();
            if (Check::Value($id))
            {
                $db = new Management();
                $price = $db->getPrice();
                $cnt = Ipall::GetUsserCartCount($id);
                $cost = $price * $cnt;
                $balance = Users::GetBalans();
                if ($balance < $cost)
                {
                    $this->renderPartial('AlertMessage', array('alertmessage' => 'lovbalance'));
                }
                else
                {
                    $newbal = $balance - $cost;
                    Ipall::UserPayForIp($id);
                    Users::SetBalans($newbal);
                    $this->renderPartial('AlertMessage', array('alertmessage' => 'suchespayet'));
                }
            }
        }
    }
    /*public function actionIndex()
    {
        $this->render('index');
    }*/
    public function actionShoppingCart()
    {
        $alertmessage = 'default';
        try
        {
            if (Check::Value($_POST))
            {
                if (Check::Value($_POST['field']))
                {
                    if (Check::Value($_POST['seartext']))
                    {
                        if (Check::Value($_POST['count']))
                        {
                            $field = $_POST['field'];
                            $seartext = $_POST['seartext'];
                            $count = $_POST['count'];
                            $sel = $field;
                            $sel = mb_strtolower($sel, 'UTF-8');
                            $val = $seartext;
                            $arr = array('country', 'state', 'city', 'zip');
                            if (in_array($sel, $arr))
                            {
                                $res = $this->GoNext($sel, $val);
                                if (Check::Value($res))
                                {
                                    if ($res['count'] < $count)
                                    {
                                        $alertmessage = 'toolow';
                                    }
                                    else
                                    {
                                        if (!Yii::app()->user->isGuest)
                                        {
                                            $id = Yii::app()->user->getId();
                                            $sel = $field;
                                            $sel = mb_strtolower($sel, 'UTF-8');
                                            $val = $seartext;
                                            $db = new Ipall();
                                            $db->ByiIp($id, $count, $sel, $val);
                                            $alertmessage = 'success';
                                        }
                                    }
                                }
                                else
                                {
                                    $alertmessage = 'toolow';
                                }
                            }
                        }
                    }
                }
            }
        }
        catch (Exception $e)
        {
            $alertmessage = 'error';
        }
        $this->renderPartial('AlertMessage', array('alertmessage' => $alertmessage, 'count' => $count));
    }
    public function GoNext(&$sel, &$val)
    {
        $db = new Ipall();
        $tmp = array();
        $tmp['field'] = $sel;
        $tmp['value'] = $db->getName($sel, $val);
        $tmp['count'] = $db->getCountBy($sel, $tmp['value']);
        try
        {
            if (strstr($val, '%'))
            {
                $str = str_ireplace('%', '', $val);
                $orig = $tmp['value'];
                $f = mb_stripos($orig, $str, 0, 'UTF-8');
                $l = mb_strlen($str, 'UTF-8');
                $str = mb_substr($orig, $f, $f + $l, 'UTF-8');
                $tmp['value'] = str_ireplace($str, "<span style='color:#0099FF'>$str</span>", $orig);
            }
        }
        catch (Exception $e)
        {
        }
        if ($tmp['count'] > 0)
        {
            $prew = 0;
            $rows = $db->getRows();
            foreach ($rows as $k => $v)
            {
                if ($v['Field'] == $sel)
                {
                    $prew = $k - 1;
                }
            }
            $prewF = $rows[$prew]['Field'];
            $arr = array('country', 'state', 'city', 'zip');
            if (in_array($prewF, $arr))
            {
                $val = $db->getNextDis($prewF, $sel, $val);
                $sel = $prewF;
            }
            else
            {
                $sel = '123456';
            }
        }
        if (Check::Value($tmp['count']))
        {
            return $tmp;
        }
        return null;
    }
    public function actionGetCount()
    {
        try
        {
            if (Check::Value($_POST))
            {
                if (Check::Value($_POST['sel']) && Check::Value($_POST['val']))
                {
                    $sel = $_POST['sel'];
                    $val = $_POST['val'];
                    $sel = Check::Clear($sel);
                    $sel = mb_strtolower($sel, 'UTF-8');
                    $val = Check::Clear($val);
                    $val = "%$val%";
                    $result = array();
                    $arr = array('country', 'state', 'city', 'zip');
                    if (in_array($sel, $arr))
                    {
                        if ($sel == 'zip')
                        {
                            $res = $this->GoNext($sel, $val);
                            if (Check::Value($res))
                            {
                                $result[] = $res;
                            }
                        }
                        if ($sel == 'city')
                        {
                            $res = $this->GoNext($sel, $val);
                            if (Check::Value($res))
                            {
                                $result[] = $res;
                            }
                        }
                        if ($sel == 'state')
                        {
                            $res = $this->GoNext($sel, $val);
                            if (Check::Value($res))
                            {
                                $result[] = $res;
                            }
                        }
                        if ($sel == 'country')
                        {
                            $res = $this->GoNext($sel, $val);
                            if (Check::Value($res))
                            {
                                $result[] = $res;
                            }
                        }
                        if (count($result) > 0)
                        {
                            $this->renderPartial('GetCount', array('result' => $result,));
                        }
                        else
                        {
                            $sel = ucfirst($sel);
                            echo "<h3>Совпадений по <span style='color: #2C3E50;'>$sel</span> не найдено</h3>";
                        }
                    }
                }
            }
        }
        catch (Exception $e)
        {
            echo 'Error';
        }
    }
}