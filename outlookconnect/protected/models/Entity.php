<?php

/**
 * This is the model class for table "entity".
 *
 * The followings are the available columns in table 'entity':
 * @property string $id
 * @property string $name
 * @property string $title
 * @property string $createdDate
 * @property string $icon
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Assoc[] $assocs
 * @property Assocmembership[] $assocmemberships
 * @property Digest[] $digests
 * @property Entitytype $type0
 * @property Entitycred[] $entitycreds
 * @property Entitypost[] $entityposts
 */
class Entity extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Entity the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'entity';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, title, createdDate, type', 'required'),
			array('name', 'length', 'max'=>100),
			array('title', 'length', 'max'=>1000),
			array('icon', 'length', 'max'=>200),
			array('type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, title, createdDate, icon, type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'assocs' => array(self::HAS_MANY, 'Assoc', 'fromEntityId'),
			'assocmemberships' => array(self::HAS_MANY, 'Assocmembership', 'memberOfEntityId'),
			'digests' => array(self::HAS_MANY, 'Digest', 'entityId'),
			'type0' => array(self::BELONGS_TO, 'Entitytype', 'type'),
			'entitycreds' => array(self::HAS_MANY, 'Entitycred', 'entityId'),
			'entityposts' => array(self::HAS_MANY, 'Entitypost', 'entityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'title' => 'Title',
			'createdDate' => 'Created Date',
			'icon' => 'Icon',
			'type' => 'Type',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('createdDate',$this->createdDate,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('type',$this->type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}