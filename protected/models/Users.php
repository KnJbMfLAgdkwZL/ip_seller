<?php
class Users extends CActiveRecord
{
    public function tableName()
    {
        return 'users';
    }
    public function rules()
    {
        return array(
            array('Login, Password, Role, Email', 'required'),
            array('Login', 'unique', 'message' => 'Login already exists.'),
            array('Email', 'unique', 'message' => 'Email already taken.'),
            array('Role', 'numerical', 'integerOnly' => true),
            array('Login, Password, Email', 'length', 'max' => 255),
            array('Id, Login, Password, Role, Email', 'safe', 'on' => 'search'),
            array('Email', 'match', 'pattern' => '#[a-zA-Z_]+[a-zA-Z0-9_]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9_]+#', 'message' => 'Wrong address Email'),
        );
    }
    public function relations()
    {
        return array(
            'users_roles' => array(self::BELONGS_TO, 'UsersRoles', 'Role'),
        );
    }
    static public function GetBalans()
    {
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $id = Yii::app()->user->getId();
                if (Check::Value($id))
                {
                    $id = (int)$id;
                    $sql = "SELECT Balans FROM users WHERE Id = :id";
                    $dataReader = Yii::app()->db->createCommand($sql);
                    $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
                    $result = $dataReader->queryRow();
                    if (Check::Value($result))
                    {
                        if (Check::Value($result['Balans']))
                        {
                            return (double)$result['Balans'];
                        }
                    }
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function SetBalans($balans)
    {
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $id = Yii::app()->user->getId();
                if (Check::Value($id))
                {
                    if (Check::Value($balans))
                    {
                        $id = (int)$id;
                        $sql = 'UPDATE users SET Balans = :balans WHERE Id = :id';
                        $dataReader = Yii::app()->db->createCommand($sql);
                        $dataReader->bindParam(":balans", $balans, PDO::PARAM_INT);
                        $dataReader->bindParam(":id", $id, PDO::PARAM_STR);
                        $dataReader->execute();
                    }
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'Login' => 'Login',
            'Password' => 'Password',
            'Role' => 'Role',
            'Email' => 'Email',
        );
    }
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('Id', $this->Id);
        $criteria->compare('Login', $this->Login, true);
        $criteria->compare('Password', $this->Password, true);
        $criteria->compare('Role', $this->Role);
        $criteria->compare('Email', $this->Email);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function getAssocList($Role)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("Role = :Role");
        $criteria->order = 'Id ASC';
        $criteria->params = array(':Role' => $Role);
        $models = $this->findAll($criteria);
        return CHtml::listData($models, 'Id', 'Login');
    }
}