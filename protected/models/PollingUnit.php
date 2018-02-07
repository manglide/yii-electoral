<?php

/**
 * This is the model class for table "polling_unit".
 *
 * The followings are the available columns in table 'polling_unit':
 * @property integer $uniqueid
 * @property integer $polling_unit_id
 * @property integer $ward_id
 * @property integer $lga_id
 * @property integer $uniquewardid
 * @property string $polling_unit_number
 * @property string $polling_unit_name
 * @property string $polling_unit_description
 * @property string $lat
 * @property string $long
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class PollingUnit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'polling_unit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('polling_unit_id, ward_id, lga_id', 'required'),
			array('polling_unit_id, ward_id, lga_id, uniquewardid', 'numerical', 'integerOnly'=>true),
			array('polling_unit_number, polling_unit_name, entered_by_user, user_ip_address', 'length', 'max'=>50),
			array('lat, long', 'length', 'max'=>255),
			array('polling_unit_description, date_entered', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uniqueid, polling_unit_id, ward_id, lga_id, uniquewardid, polling_unit_number, polling_unit_name, polling_unit_description, lat, long, entered_by_user, date_entered, user_ip_address', 'safe', 'on'=>'search'),
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
			'polling_unit_id' => 'Polling Unit',
			'ward_id' => 'Ward',
			'lga_id' => 'Lga',
			'uniquewardid' => 'Uniquewardid',
			'polling_unit_number' => 'Polling Unit Number',
			'polling_unit_name' => 'Polling Unit Name',
			'polling_unit_description' => 'Polling Unit Description',
			'lat' => 'Lat',
			'long' => 'Long',
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
		$criteria->compare('polling_unit_id',$this->polling_unit_id);
		$criteria->compare('ward_id',$this->ward_id);
		$criteria->compare('lga_id',$this->lga_id);
		$criteria->compare('uniquewardid',$this->uniquewardid);
		$criteria->compare('polling_unit_number',$this->polling_unit_number,true);
		$criteria->compare('polling_unit_name',$this->polling_unit_name,true);
		$criteria->compare('polling_unit_description',$this->polling_unit_description,true);
		$criteria->compare('lat',$this->lat,true);
		$criteria->compare('long',$this->long,true);
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
	 * @return PollingUnit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
