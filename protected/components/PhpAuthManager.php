<?php
class PhpAuthManager extends CPhpAuthManager
{
    public function init()
    {
        // �������� ����� ���������� � ����� auth.php � ���������� config ����������
        if ($this->authFile === null)
        {
            $this->authFile = Yii::getPathOfAlias('application.config.auth') . '.php';
        }
        parent::init();
        if (!Yii::app()->user->isGuest)
        {
            // ��������� ����, �������� � �� � ��������������� ������������,
            // ������������ UserIdentity.getId().
            $this->assign(Yii::app()->user->role, Yii::app()->user->id);
        }
    }
}