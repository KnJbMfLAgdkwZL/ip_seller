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
    public function tableName()
    {
        return 'ipall';
    }
    static public function GetNextCount($next, $prev = array())
    {
        $and = '';
        foreach($prev as $k => $v)
        {
            $and .= " AND `$k` = :{$k}";
        }
        try
        {
            $sql =
            "SELECT
                `$next` AS `name`,
                (
                  SELECT COUNT(id)
                  FROM `ipall`
                  WHERE `$next` = `name`
                  $and
                  AND (
                        SELECT ipstatus.id
                        FROM ipstatus
                        WHERE idipall = ipall.id
                      ) IS NULL
                ) AS `count`
            FROM `ipall`
            WHERE (SELECT ipstatus.id FROM ipstatus WHERE idipall = ipall.id) IS NULL
            $and
            GROUP BY `$next` ORDER BY `$next`";
            $dataReader = Yii::app()->db->createCommand($sql);
            foreach($prev as $k => $v)
            {
                if (array_key_exists($k, $prev))
                {
                    $dataReader->bindParam(":$k", $prev[$k], PDO::PARAM_STR);
                }
            }
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetAllIP()
    {
        try
        {
            $sql = "SELECT * FROM `ipall`";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetLiveIP()
    {
        try
        {
            $sql = "
                  SELECT * FROM ipall
                    WHERE (SELECT ipstatus.idipall FROM ipstatus WHERE ipstatus.idipall = ipall.id) IS NULL";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetSoldIP()
    {
        try
        {
            $sql = "SELECT ipall.* FROM ipall, ipstatus WHERE ipstatus.idipall = ipall.id AND ipstatus.status = 2";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetSoldClientIP_ByDate($id, $date)
    {
        try
        {
            $sql = "SELECT ipall.* FROM ipall, ipstatus WHERE ipstatus.idipall = ipall.id AND ipstatus.status = 2
                      AND ipstatus.userid = :id AND ipstatus.time = :date ORDER BY ipstatus.time";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $dataReader->bindParam(":date", $date, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetSoldClientIP($id)
    {
        try
        {
            $sql = "SELECT ipall.* FROM ipall, ipstatus WHERE ipstatus.idipall = ipall.id AND ipstatus.status = 2
                      AND ipstatus.userid = :id ORDER BY ipstatus.time";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":id", $id, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetBlackIP()
    {
        try
        {
            $sql = "SELECT ipall.* FROM ipall, ipstatus WHERE ipstatus.idipall = ipall.id AND ipstatus.status = 3";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function GetDeadIP()
    {
        try
        {
            $sql = "SELECT ipall.* FROM ipall, ipstatus WHERE ipstatus.idipall = ipall.id AND ipstatus.status = 4";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                if (count($result))
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
    static public function CheckIP($ip)
    {
        try
        {
            $sql = "SELECT COUNT(*) AS Cnt FROM `ipall` WHERE `ip` LIKE :ip";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":ip", $ip, PDO::PARAM_STR);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function Import($Allip, &$added, &$matches)
    {
        $added = 0;
        $matches = 0;
        try
        {
            $sql = 'INSERT INTO ipall(id, ip, login, pass, country, state, city, zip)
                           VALUES (NULL, :ip, :login, :pass, :country, :state, :city, :zip)';
            $dataReader = Yii::app()->db->createCommand($sql);
            foreach ($Allip as $k => $v)
            {
                if (self::CheckIP($k) <= 0)
                {
                    extract($v);
                    $dataReader->bindParam(":ip", $ip, PDO::PARAM_STR);
                    $dataReader->bindParam(":login", $login, PDO::PARAM_STR);
                    $dataReader->bindParam(":pass", $pass, PDO::PARAM_STR);
                    $dataReader->bindParam(":country", $country, PDO::PARAM_STR);
                    $dataReader->bindParam(":state", $state, PDO::PARAM_STR);
                    $dataReader->bindParam(":city", $city, PDO::PARAM_STR);
                    $dataReader->bindParam(":zip", $zip, PDO::PARAM_STR);
                    $dataReader->execute();
                    $added++;
                }
                else
                {
                    $matches++;
                }
            }
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
        return false;
    }
    static public function GetCountLiveIP()
    {
        try
        {
            $sql = "
                  SELECT COUNT(ipall.id) AS Cnt FROM ipall
                    WHERE (SELECT ipstatus.idipall FROM ipstatus WHERE ipstatus.idipall = ipall.id) IS NULL";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function GetCountReservedIP()
    {
        try
        {
            $sql = "SELECT COUNT(id) AS Cnt FROM ipstatus WHERE status = 1";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function GetCountBuyedIP()
    {
        try
        {
            $sql = "SELECT COUNT(id) AS Cnt FROM ipstatus WHERE status = 2";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function GetCountBlackIP()
    {
        try
        {
            $sql = "SELECT COUNT(id) AS Cnt FROM ipstatus WHERE status = 3";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function GetCountDeadIP()
    {
        try
        {
            $sql = "SELECT COUNT(id) AS Cnt FROM ipstatus WHERE status = 4";
            $dataReader = Yii::app()->db->createCommand($sql);
            $result = $dataReader->queryRow();
            if (Check::Value($result))
            {
                if (Check::Value($result['Cnt']))
                {
                    return $result['Cnt'];
                }
            }
        }
        catch (Exception $e)
        {
        }
        return 0;
    }
    static public function UserPayForIp($id)
    {
        try
        {
            $id = (int)$id;
            $sql = 'UPDATE ipstatus SET status = 2, time = :time WHERE userid = :id AND status = 1';
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
    public function ByiIp2($user, $count, $sel, $val, $prev = array())
    {
        try
        {
            $ip_s = $this->GetIPid2($count, $sel, $val, $prev);
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
    public function GetIPid2($count, $sel, $val, $prev = array())
    {
        try
        {
            $and = '';
            foreach($prev as $k => $v)
            {
                $and .= " AND `$k` = :{$k}";
            }
            $sql = "SELECT ipall.id FROM ipall WHERE $sel LIKE :val $and
              AND  (SELECT ipstatus.id FROM ipstatus WHERE idipall = ipall.id) IS NULL
                LIMIT :needcount";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);

            foreach($prev as $k => $v)
            {
                if (array_key_exists($k, $prev))
                {
                    $dataReader->bindParam(":$k", $prev[$k], PDO::PARAM_STR);
                }
            }

            $count = (int)$count;
            $dataReader->bindParam(":needcount", $count, PDO::PARAM_INT);
            $result = $dataReader->queryAll();
            return $result;
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
    static public function GetUsserDateHistoryIP($id)
    {
        try
        {
            $id = (int)$id;
            $sql = "SELECT s.time FROM ipall i, ipstatus s
                      WHERE i.id = s.idipall AND s.status = 2 AND s.userid = :id
                      GROUP BY s.time
                      ORDER BY s.time DESC, i.country, i.state, i.city, i.zip";
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
                    'pagination' => array('pageSize' => 15,),)
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
    static public function getAllCountry()
    {
        try
        {
            $sql = "SELECT ipall.country FROM ipall WHERE (SELECT ipstatus.id FROM ipstatus WHERE idipall = ipall.id) IS NULL
                GROUP BY ipall.country";
            $dataReader = Yii::app()->db->createCommand($sql);
            $dataReader->bindParam(":val", $val, PDO::PARAM_STR);
            $result = $dataReader->queryAll();
            if (Check::Value($result))
            {
                return $result;
            }
            return 0;
        }
        catch (Exception $e)
        {
            return 0;
        }
    }
    static public function getCountBy($sel, $val)
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
    public function relations()
    {
        return array();
    }
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
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
