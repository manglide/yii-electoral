<?php

/**
 * This is the model class for table "announced_pu_results".
 *
 * The followings are the available columns in table 'announced_pu_results':
 * @property integer $result_id
 * @property string $polling_unit_uniqueid
 * @property string $party_abbreviation
 * @property integer $party_score
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class AnnouncedPuResults extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'announced_pu_results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('polling_unit_uniqueid, party_abbreviation, party_score, entered_by_user, date_entered, user_ip_address', 'required'),
			array('party_score', 'numerical', 'integerOnly'=>true),
			array('polling_unit_uniqueid, entered_by_user, user_ip_address', 'length', 'max'=>50),
			array('party_abbreviation', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('result_id, polling_unit_uniqueid, party_abbreviation, party_score, entered_by_user, date_entered, user_ip_address', 'safe', 'on'=>'search'),
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
			'result_id' => 'Result',
			'polling_unit_uniqueid' => 'Polling Unit Uniqueid',
			'party_abbreviation' => 'Party Abbreviation',
			'party_score' => 'Party Score',
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

		$criteria->compare('result_id',$this->result_id);
		$criteria->compare('polling_unit_uniqueid',$this->polling_unit_uniqueid,true);
		$criteria->compare('party_abbreviation',$this->party_abbreviation,true);
		$criteria->compare('party_score',$this->party_score);
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
	 * @return AnnouncedPuResults the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
