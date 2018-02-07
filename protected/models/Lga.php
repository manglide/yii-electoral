<?php

/**
 * This is the model class for table "lga".
 *
 * The followings are the available columns in table 'lga':
 * @property integer $uniqueid
 * @property integer $lga_id
 * @property string $lga_name
 * @property integer $state_id
 * @property string $lga_description
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class Lga extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'lga';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lga_id, lga_name, state_id, entered_by_user, date_entered, user_ip_address', 'required'),
			array('lga_id, state_id', 'numerical', 'integerOnly'=>true),
			array('lga_name, entered_by_user, user_ip_address', 'length', 'max'=>50),
			array('lga_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uniqueid, lga_id, lga_name, state_id, lga_description, entered_by_user, date_entered, user_ip_address', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uniqueid' => 'Uniqueid',
			'lga_id' => 'Lga',
			'lga_name' => 'Lga Name',
			'state_id' => 'State',
			'lga_description' => 'Lga Description',
			'entered_by_user' => 'Entered By User',
			'date_entered' => 'Date Entered',
			'user_ip_address' => 'User Ip Address',
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

		$criteria=new CDbCriteria;

		$criteria->compare('uniqueid',$this->uniqueid);
		$criteria->compare('lga_id',$this->lga_id);
		$criteria->compare('lga_name',$this->lga_name,true);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('lga_description',$this->lga_description,true);
		$criteria->compare('entered_by_user',$this->entered_by_user,true);
		$criteria->compare('date_entered',$this->date_entered,true);
		$criteria->compare('user_ip_address',$this->user_ip_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lga the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
