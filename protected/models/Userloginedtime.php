<?php
/**
 * This is the model class for table "userloginedtime".
 *
 * The followings are the available columns in table 'userloginedtime':
 * @property integer $id
 * @property integer $user
 * @property integer $time
 */
class Userloginedtime extends CActiveRecord
{
    static public function DeleteUserEndSesions()
    {
        try
        {
            $sql = 'SELECT * FROM userloginedtime WHERE time < :time ';
            $dataReader = Yii::app()->db->createCommand($sql);
            $time = (int)time();
            $time -= 60;
            $dataReader->bindParam(":time", $time, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result) > 0)
                {
                    foreach ($result as $k => $v)
                    {
                        $id = $v['user'];
                        Ipall::Cartclear($id);
                        self::DeleteUser($id);
                    }
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
    static public function DeleteUser($id = null)
    {
        try
        {
            if (!Check::Value($id))
            {
                if (!Yii::app()->user->isGuest)
                {
                    $id = Yii::app()->user->getId();
                }
            }
            if (Check::Value($id))
            {
                $id = (int)$id;
                if (self::LoginedCheck($id))
                {
                    $sql = 'DELETE FROM userloginedtime WHERE user = :id';
                    $dataReader = Yii::app()->db->createCommand($sql);
                    $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
                    $dataReader->execute();
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
    static public function LoginedCheck($id = null)
    {
        try
        {
            if (!Check::Value($id))
            {
                if (!Yii::app()->user->isGuest)
                {
                    $id = Yii::app()->user->getId();
                }
            }
            if (Check::Value($id))
            {
                $id = (int)$id;
                $sql = 'SELECT * FROM `userloginedtime` WHERE user = :id';
                $dataReader = Yii::app()->db->createCommand($sql);
                $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
                $row = $dataReader->queryRow();
                if (Check::Value($row))
                {
                    if (Check::Value($row['time']))
                    {
                        return true;
                    }
                }
            }
        }
        catch (Exception $e)
        {
        }
        return false;
    }
    static public function InserOrUpdate()
    {
        try
        {
            if (!Yii::app()->user->isGuest)
            {
                $id = (int)Yii::app()->user->getId();
                if (Check::Value($id))
                {
                    $sql = '';
                    if (self::LoginedCheck($id))
                    {
                        $sql = 'UPDATE userloginedtime SET time = :time WHERE user = :id';
                    }
                    else
                    {
                        $sql = 'INSERT INTO userloginedtime(id, user, time)
                                  VALUES (NULL, :id, :time)';
                    }
                    $dataReader = Yii::app()->db->createCommand($sql);
                    $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
                    $time = (int)time();
                    $dataReader->bindParam(":time", $time, PDO::PARAM_INT);
                    $dataReader->execute();
                }
            }
        }
        catch (Exception $e)
        {
        }
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'userloginedtime';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user, time', 'required'),
            array('user, time', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user, time', 'safe', 'on' => 'search'),
        );
    }
    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }
    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user' => 'User',
            'time' => 'Time',
        );
    }
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('user', $this->user);
        $criteria->compare('time', $this->time);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Userloginedtime the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
