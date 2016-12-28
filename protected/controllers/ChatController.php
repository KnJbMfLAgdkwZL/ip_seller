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
                'actions' => array('AdminAllChat', 'Areyousure', 'DialogDelete', 'Userchat', 'AdminSendMess',
                    'AdminCheckNewMEsFromser', 'AdminGetNewMES'
                ),
                'roles' => array('Admin'),
            ),
            array('allow',
                'actions' => array('Userchat', 'AdminSendMess', 'AdminCheckNewMEsFromser', 'AdminGetNewMES'),
                'roles' => array('User'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    public function actionAdminCheckNewMEsFromser()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['id']))
            {
                $id = (int)$_POST['id'];
                $role = Yii::app()->user->getRole();
                if ($role == 'User')
                {
                    $id = Yii::app()->user->getId();
                    if (Chat::UserCheckNewMEsFromser($id))
                    {
                        echo 'yes';
                    }
                }
                else
                {
                    if (Chat::AdminCheckNewMEsFromser($id))
                    {
                        echo 'yes';
                    }
                }
            }
        }
    }
    public function actionAdminGetNewMES()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['id']))
            {
                $id = (int)$_POST['id'];
                $role = Yii::app()->user->getRole();
                if ($role == 'User')
                {
                    $id = Yii::app()->user->getId();
                    Chat::SetNewForUser($id);
                }
                else
                {
                    Chat::SetNewForAdmin($id);
                }
                $result = Chat::GetUserchat($id);
                $this->renderPartial('_chatbody', array('result' => $result));
            }
        }
    }
    public function actionAdminSendMess()
    {
        if (Check::Value($_POST))
        {
            if (Check::Value($_POST['text']))
            {
                if (Check::Value($_POST['id']))
                {
                    if (Check::Value($_POST['text']))
                    {
                        $id = (int)$_POST['id'];
                        $text = $_POST['text'];
                        $text = Check::Clear($text);
                        $role = Yii::app()->user->getRole();
                        if ($role == 'User')
                        {
                            $id = Yii::app()->user->getId();
                            Chat::UserSendMess($id, $text);
                            Chat::SetNewForUser($id);
                        }
                        else
                        {
                            Chat::AdminSendMess($id, $text);
                            Chat::SetNewForAdmin($id);
                        }
                        $result = Chat::GetUserchat($id);
                        $this->renderPartial('_chatbody', array('result' => $result));
                    }
                }
            }
        }
    }
    public function actionUserchat($id)
    {
        $role = Yii::app()->user->getRole();
        if ($role == 'User')
        {
            $id = Yii::app()->user->getId();
            Chat::SetNewForUser($id);
        }
        else
        {
            Chat::SetNewForAdmin($id);
        }
        $result = Chat::GetUserchat($id);
        $this->render('Userchat', array('result' => $result, 'id' => $id));
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