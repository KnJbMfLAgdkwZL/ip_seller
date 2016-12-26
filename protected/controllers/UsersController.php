<?php
class UsersController extends Controller
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
                'actions' => array('view', 'create', 'update', 'admin', 'delete'),
                'roles' => array('Admin'),
            ),
            array('allow',
                'actions' => array('create', 'restore'),
                'users' => array('*'),
            ),
            array('deny',   // deny all users
                'users' => array('*'),
            ),
        );
    }
    public function actionView($id)
    {
        $info = $this->loadModel($id);
        //$role = $info->Role;
        $this->render('view', array('model' => $info));
    }
    public function actionRestore()
    {
        $this->render('restore');
    }
    public function actionCreate()
    {
        $model = new Users;
        if (isset($_POST['Users']))
        {
            $role = Yii::app()->user->getRole();
            if ($role != 'Admin')
            {
                $_POST['Users']['Role'] = 2;
                // Проверка CAPTCHA
                $captcha_id = $_POST['captcha_id'];
                $captcha_value = $_POST['Captcha'];
                $result = YandexCW::check_captcha($captcha_id, $captcha_value);
                if ($result)
                {
                }
                else
                {
                    $this->render('create', array('model' => $model, 'captchaalert' => 'Wrong'));
                    return;
                }
            }
            $model->attributes = $_POST['Users'];
            $model->attributes = $this->SafePassword($model->attributes);
            if ($model->save())
            {
                if ($role != 'Admin')
                {
                    $this->redirect(array('site/index'));
                }
                else
                {
                    $this->redirect(array('admin'));
                }
            }
            else
            {
                $arr = $model->attributes;
                $arr['Password'] = '';
                $model->attributes = $arr;
            }
        }
        $this->render('create', array('model' => $model));
    }
    public function SafePassword($attributes)
    {
        if ($attributes['Password'] != '')
        {
            $attributes['Password'] = CPasswordHelper::hashPassword($attributes['Password']);
        }
        else if ($attributes['Id'] != null)
        {
            $old = Users::model()->findByPk($attributes['Id']);
            $attributes['Password'] = $old->attributes['Password'];
        }
        return $attributes;
    }
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $arr = $model->attributes;
        $arr['Password'] = '';
        $model->attributes = $arr;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Users']))
        {
            $model->attributes = $_POST['Users'];
            $model->attributes = $this->SafePassword($model->attributes);
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->Id));
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
        $model = new Users('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    public function loadModel($id)
    {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'users-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}