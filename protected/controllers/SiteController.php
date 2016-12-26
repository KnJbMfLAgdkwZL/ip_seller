<?php
class SiteController extends Controller
{
    public function actions()
    {
        /*return array(
            'page'=>array(
                'class'=>'CViewAction',
            ),
        );*/
    }
    public function actionStillAlive()
    {
        $str = 'TimeToDie';
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $id = Yii::app()->user->getId();
                if (Check::Value($id))
                {
                    Userloginedtime::InserOrUpdate();
                    $str = 'StillAlive';
                }
            }
        }
        catch (Exception $e)
        {
            $str = 'Error';
        }
        echo $str;
        $ltime = Management::GetLastCheckAllUserSession();
        $ltime += 60;
        $ctime = time();
        if ($ltime < $ctime)
        {
            Userloginedtime::DeleteUserEndSesions();
            Management::SetLastCheckAllUserSession($ctime);
        }
    }
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error)
        {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    public function actionChangeLanguage($Lang)
    {
        Yii::app()->session['language'] = $Lang;
        //$this->redirect(Yii::app()->homeUrl);
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
    public function actionIndex()
    {
        $model = new LoginForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['LoginForm']))
        {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login())
            {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        if (Yii::app()->user->isGuest)
        {
            $this->render('login', array('model' => $model));
        }
        else
        {
            $id = Yii::app()->user->getId();
            $sql = "SELECT * FROM `news` WHERE not exists
					(SELECT * FROM `newsshown` 
					WHERE newsshown.IdNews = news.Id
					AND newsshown.IdUsers = :id)
                ORDER BY news.Id DESC
                LIMIT 10";
            $role = Yii::app()->user->getRole();
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_STR);
            $news = $dataReader->queryAll();
            $model = new CArrayDataProvider($news, array(
                    'keyField' => 'Id',
                    'sort' => array('attributes' => array('Id', 'Header', 'Body', 'Date')),
                    'pagination' => array('pageSize' => 10)
                )
            );
            $this->render('index', array('model' => $model));
            /*if ($role == 'Admin')//1
            {
                $this->render('index');
            }
            elseif ($role == 'User')//2
            {
                $this->render('index');
            }*/
        }
    }
    public function actionLogout()
    {
        $id = Yii::app()->user->getId();
        Ipall::Cartclear($id);
        Userloginedtime::DeleteUser();
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}