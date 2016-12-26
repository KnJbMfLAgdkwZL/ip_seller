<?php
class News extends CActiveRecord
{
    public function tableName()
    {
        return 'news';
    }
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Header, Body, Date', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Header, Body, Date', 'safe', 'on' => 'search'),
        );
    }
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }
    public function attributeLabels()
    {
        return array(
            'Id' => 'ID',
            'Header' => 'Header',
            'Body' => 'Body',
            'Date' => 'Date',
        );
    }
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('Id', $this->Id);
        $criteria->compare('Header', $this->Header, true);
        $criteria->compare('Body', $this->Body, true);
        $criteria->compare('Date', $this->Date, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}