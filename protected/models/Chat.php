<?php
/**
 * This is the model class for table "chat".
 *
 * The followings are the available columns in table 'chat':
 * @property integer $id
 * @property integer $from
 * @property integer $to
 * @property string $message
 * @property integer $time
 * @property integer $new
 */
class Chat extends CActiveRecord
{
    public function tableName()
    {
        return 'chat';
    }
    static public function DialogDelete($id)
    {
        try
        {
            $id = (int)$id;
            $sql = 'DELETE FROM `chat` WHERE `from` = :id OR `to` = :id';
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $dataReader->execute();
        }
        catch (Exception $e)
        {
        }
    }
    static public function GetUserchat($id)
    {
        try
        {
            $id = (int)$id;
            $sql = 'SELECT c.from, c.to, c.time, c.new, u.Login, c.message
                      FROM chat c, users u
                    WHERE
                        c.from = u.ID AND u.id = :id AND u.Role != 1
                        OR c.to = u.ID AND u.id = :id AND u.Role != 1
                        ORDER BY c.time ASC
                        ';
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            return $result;
        }
        catch (Exception $e)
        {
        }
        return array();
    }
    static public function GetAdminChats()
    {
        try
        {
            $sql = "SELECT t.*
                        FROM
                        (
                            SELECT u.id, u.Login, c.from, c.to, c.time, c.new, c.message
                            FROM users u
                            INNER JOIN chat c
                                ON c.from = u.ID AND u.Role != 1
                                OR c.to = u.ID AND u.Role != 1
                            ORDER BY c.new DESC, c.time DESC
                        ) t
                        GROUP BY t.Login ORDER BY t.new DESC, t.time DESC";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result) > 0)
                {
                    return $result;
                }
            }
        }
        catch (Exception $e)
        {
        }
        return array();
    }
    public function rules()
    {
        return array(
            array('from, to, message, time, new', 'required'),
            array('from, to, time, new', 'numerical', 'integerOnly' => true),
            array('id, from, to, message, time, new', 'safe', 'on' => 'search'),
        );
    }
    public function relations()
    {
        return array();
    }
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'message' => 'Message',
            'time' => 'Time',
            'new' => 'New',
        );
    }
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('from', $this->from);
        $criteria->compare('to', $this->to);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('time', $this->time);
        $criteria->compare('new', $this->new);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}