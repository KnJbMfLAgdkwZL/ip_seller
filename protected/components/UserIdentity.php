<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function getId()
    {
        return $this->_id;
    }
    public function authenticate()
    {
        $record = Users::model()->findByAttributes(array('Login' => $this->username));
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!CPasswordHelper::verifyPassword($this->password, $record->Password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id = $record->Id;
            $this->setState('title', $record->Login);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}