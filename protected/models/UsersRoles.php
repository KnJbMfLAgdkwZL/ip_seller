<?php
class UsersRoles extends CActiveRecord
{
    public function tableName()
    {
        return 'users_roles';
    }
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Name', 'required'),
            array('Name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Id, Name', 'safe', 'on' => 'search'),
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
            'Name' => 'Name',
        );
    }
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;
        $criteria->compare('Id', $this->Id);
        $criteria->compare('Name', $this->Name, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    public function getAssocList()
    {
        $models = $this->findAll(array('order' => 'Id ASC'));
        return CHtml::listData($models, 'Id', 'Name');
    }
}