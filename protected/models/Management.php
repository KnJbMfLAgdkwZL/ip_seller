<?php
/**
 * This is the model class for table "management".
 *
 * The followings are the available columns in table 'management':
 * @property string $key
 * @property string $value
 */
class Management extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'management';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('key, value', 'required'),
            array('key, value', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('key, value', 'safe', 'on' => 'search'),
        );
    }
    static public function GetLastCheckAllUserSession()
    {
        try
        {
            $sql = "SELECT * FROM `management` WHERE `key` LIKE 'LastCheckAllUserSession'";
            $dataReader = Yii::app()->db->createCommand($sql);
            $res = $dataReader->queryAll();
            if (Check::Value($res))
            {
                if (Check::Value($res[0]))
                {
                    return (int)$res[0]['value'];
                }
            }
        }
        catch (Exception $e)
        {
            return false;
        }
        return false;
    }
    static public function SetLastCheckAllUserSession($val)
    {
        try
        {
            $sql = "UPDATE `ipseller`.`management` SET `value` = :val WHERE `management`.`key` = 'LastCheckAllUserSession'";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $dataReader->execute();
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
        return false;
    }
    public function getPrice()
    {
        try
        {
            $sql = "SELECT * FROM `management` WHERE `key` LIKE 'Price'";
            $dataReader = Yii::app()->db->createCommand($sql);
            $res = $dataReader->queryAll();
            if (Check::Value($res))
            {
                if (Check::Value($res[0]))
                {
                    return $res[0]['value'];
                }
            }
        }
        catch (Exception $e)
        {
            return false;
        }
        return false;
    }
    public function ChangePrice($val)
    {
        try
        {
            $sql = "UPDATE `ipseller`.`management` SET `value` = :val WHERE `management`.`key` = 'Price'";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $dataReader->execute();
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
        return false;
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
            'key' => 'Key',
            'value' => 'Value',
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
        $criteria->compare('key', $this->key, true);
        $criteria->compare('value', $this->value, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Management the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
