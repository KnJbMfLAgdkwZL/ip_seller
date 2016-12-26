<?php
class NewsController extends Controller
{
    public $layout = '//layouts/column2';
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('HideNews'),
                'roles' => array('User'),
            ),
            array('allow',
                'actions' => array('view', 'create', 'update', 'delete', 'admin'),
                'roles' => array('Admin'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionHideNews()
    {
        if (isset($_POST['Id']))
        {
            $IdNews = $_POST['Id'];
            $IdUsers = Yii::app()->user->getId();
            $model = new Newsshown;
            $model->attributes = array('IdNews' => $IdNews, 'IdUsers' => $IdUsers);
            $model->save();
        }
    }
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    public function actionCreate()
    {
        $model = new News;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['News']))
        {
            $_POST['News']['Date'] = date('Y-m-d', time());
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['News']))
        {
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    public function actionAdmin()
    {
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function loadModel($id)
    {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}