<?php

/**
 * This is the model class for table "ward".
 *
 * The followings are the available columns in table 'ward':
 * @property integer $uniqueid
 * @property integer $ward_id
 * @property string $ward_name
 * @property integer $lga_id
 * @property string $ward_description
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class Ward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ward_id, ward_name, lga_id, entered_by_user, date_entered, user_ip_address', 'required'),
			array('ward_id, lga_id', 'numerical', 'integerOnly'=>true),
			array('ward_name, entered_by_user, user_ip_address', 'length', 'max'=>50),
			array('ward_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uniqueid, ward_id, ward_name, lga_id, ward_description, entered_by_user, date_entered, user_ip_address', 'safe', 'on'=>'search'),
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
			'ward_id' => 'Ward',
			'ward_name' => 'Ward Name',
			'lga_id' => 'Lga',
			'ward_description' => 'Ward Description',
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
		$criteria->compare('ward_id',$this->ward_id);
		$criteria->compare('ward_name',$this->ward_name,true);
		$criteria->compare('lga_id',$this->lga_id);
		$criteria->compare('ward_description',$this->ward_description,true);
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
	 * @return Ward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
