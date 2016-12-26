<?php
/**
 * This is the model class for table "ipall".
 *
 * The followings are the available columns in table 'ipall':
 * @property integer $id
 * @property string $ip
 * @property string $login
 * @property string $pass
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $zip
 */
class Ipall extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'ipall';
    }
    static public function UserPayForIp($id)
    {
        try
        {
            $id = (int)$id;
            $sql = 'UPDATE ipstatus SET status = 2, time = :time WHERE userid = :id';
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $time = time();
            $dataReader->bindParam(":time", $time, PDO::PARAM_INT);
            $dataReader->execute();
        }
        catch (Exception $e)
        {
        }
    }
    public function getName($sel, $val)
    {
        try
        {
            $sql = "SELECT DISTINCT $sel FROM ipall WHERE $sel LIKE :val LIMIT 1";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                $result = $result[0][$sel];
                return $result;
            }
            return 0;
        }
        catch (Exception $e)
        {
            return 0;
        }
    }
    static public function Cartclear($id)
    {
        try
        {
            $sql = 'DELETE FROM ipstatus WHERE status = 1  AND userid = :id';
            $dataReader = Yii::app()->db->createCommand($sql);
            $id = (int)$id;
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $dataReader->execute();
        }
        catch (Exception $e)
        {
        }
    }
    public function ByiIp($user, $count, $sel, $val)
    {
        try
        {
            $ip_s = $this->GetIPid($count, $sel, $val);
            $sql = "INSERT INTO `ipseller`.`ipstatus` (`id`, `idipall`, `status`, `userid`) VALUES (NULL, :idip, 1, :user)";
            $dataReader = Yii::app()->db->createCommand($sql);
            foreach ($ip_s as $k => $v)
            {
                $idip = (int)$v['id'];
                $dataReader->bindParam(":idip", $idip, PDO::PARAM_INT);
                $dataReader->bindParam(":user", $user, PDO::PARAM_INT);
                $dataReader->execute();
            }
        }
        catch (Exception $e)
        {
        }
    }
    static public function GetUsserBuyedIP($id)
    {
        try
        {
            $id = (int)$id;
            $sql = "SELECT COUNT(i.country) AS Cnt FROM ipall i, ipstatus s
                      WHERE i.id = s.idipall AND s.status = 2 AND s.userid = :id
                      ORDER BY i.country, i.state, i.city, i.zip";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
            return 0;
        }
        catch (Exception $e)
        {
        }
    }
    static public function GetUsserCartCount($id)
    {
        try
        {
            $id = (int)$id;
            $sql = "SELECT COUNT(i.country) AS Cnt FROM ipall i, ipstatus s
                      WHERE i.id = s.idipall AND s.status = 1 AND s.userid = :id
                      ORDER BY i.country, i.state, i.city, i.zip";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
            return 0;
        }
        catch (Exception $e)
        {
        }
    }
    public function GetUsserHistory($id)
    {
        try
        {
            $id = (int)$id;
            $sql = "SELECT i.*, s.time FROM ipall i, ipstatus s
                      WHERE i.id = s.idipall AND s.status = 2 AND s.userid = :id
                      ORDER BY i.country, i.state, i.city, i.zip";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            $model = new CArrayDataProvider($result, array(
                    'keyField' => 'id',
                    'sort' => array(
                        'attributes' => array('id', 'ip', 'login', 'pass', 'country', 'state', 'city', 'zip', 'time'),),
                    'pagination' => array('pageSize' => 20,),)
            );
            return $model;
        }
        catch (Exception $e)
        {
        }
    }
    public function GetUsserCart($id)
    {
        try
        {
            $id = (int)$id;
            $sql = "SELECT i.country, i.state, i.city, i.zip FROM ipall i, ipstatus s
                      WHERE i.id = s.idipall AND s.status = 1 AND s.userid = :id
                      ORDER BY i.country, i.state, i.city, i.zip";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            return $result;
        }
        catch (Exception $e)
        {
        }
    }
    public function GetIPid($count, $sel, $val)
    {
        try
        {
            $sql = "SELECT ipall.id FROM ipall WHERE $sel LIKE :val
              AND  (SELECT ipstatus.id FROM ipstatus WHERE idipall = ipall.id) IS NULL
                LIMIT :needcount";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $count = (int)$count;
            $dataReader->bindParam(":needcount", $count, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            return $result;
        }
        catch (Exception $e)
        {
        }
    }
    public function getCountBy($sel, $val)
    {
        try
        {
            //$sql = "SELECT COUNT(id) AS Count FROM ipall WHERE $sel LIKE :val";
            $sql = "SELECT COUNT(ipall.id) AS Count FROM ipall WHERE $sel LIKE :val
            AND  (SELECT ipstatus.id FROM ipstatus WHERE idipall = ipall.id) IS NULL";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                $result = $result[0]['Count'];
                return $result;
            }
            return 0;
        }
        catch (Exception $e)
        {
            return 0;
        }
    }
    public function getRows()
    {
        $sql = "SHOW FIELDS FROM ipall";
        $dataReader = Yii::app()->db->createCommand($sql);
        $result = $dataReader->queryAll();
        return $result;
    }
    public function getNextDis($fied, $sel, $val)
    {
        try
        {
            $sql = "SELECT DISTINCT $fied FROM ipall WHERE $sel LIKE :val LIMIT 1";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                $result = $result[0][$fied];
                return $result;
            }
            return 0;
        }
        catch (Exception $e)
        {
            return 0;
        }
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ip, login, pass, country, state, city, zip', 'required'),
            array('ip, login, pass, country, state, city, zip', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ip, login, pass, country, state, city, zip', 'safe', 'on' => 'search'),
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
            'ip' => 'Ip',
            'login' => 'Login',
            'pass' => 'Pass',
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'zip' => 'Zip',
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
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('pass', $this->pass, true);
        $criteria->compare('country', $this->country, true);
        $criteria->compare('state', $this->state, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('zip', $this->zip, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ipall the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
