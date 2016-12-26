<?php
class AdminController extends Controller
{
    public function actionIndex()
    {
        $db = new Management();
        $curprice = $db->getPrice();
        $this->render('index', array('curprice' => $curprice,));
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