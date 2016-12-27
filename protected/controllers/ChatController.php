<?php
class ChatController extends Controller
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
                'actions' => array('AdminAllChat', 'Areyousure', 'DialogDelete', 'Userchat'),
                'roles' => array('Admin'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public function actionUserchat($id)
    {
        $result = Chat::GetUserchat($id);
        $this->render('Userchat', array('result' => $result));
    }
    public function actionDialogDelete()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['userid']))
            {
                $userid = $_POST['userid'];
                Chat::DialogDelete($userid);
                $result = Chat::GetAdminChats();
                $this->renderPartial('_AdminAllChat', array('result' => $result));
            }
        }
    }
    public function actionAdminAllChat()
    {
        $result = Chat::GetAdminChats();
        $this->render('AdminAllChat', array('result' => $result));
    }
    public function actionAreyousure()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['userid']))
            {
                $this->renderPartial('AlertMessage', array('alertmessage' => 'Areyousure', 'userid' => $_POST['userid']));
            }
        }
    }
}