<?php
//$Id
//$IdNews
//$IdUsers
class Newsshown extends CActiveRecord
{
    public function tableName()
    {
        return 'newsshown';
    }
    public function rules()
    {
        return array(
            array('IdNews, IdUsers', 'required'),
            array('IdNews, IdUsers', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, IdNews, IdUsers', 'safe', 'on' => 'search'),
        );
    }
    public function relations()
    {
        return array();
    }
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'IdNews' => 'Id News',
            'IdUsers' => 'Id Users',
        );
    }
    public function search()
    {
        $criteria = new CDbCriteria;
        $criteria->compare('Id', $this->Id);
        $criteria->compare('IdNews', $this->IdNews);
        $criteria->compare('IdUsers', $this->IdUsers);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}