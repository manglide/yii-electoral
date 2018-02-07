<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	/*
	 * View Local Government Results
	*/
	public function actionLGAResults() {
		$lga = $_GET['lga'];
		$sql = "SELECT lga.lga_name AS LGA, SUM(announced_pu_results.party_score) AS Total from lga 
				join polling_unit ON lga.lga_id = polling_unit.lga_id
				join announced_pu_results ON polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid
				where lga.lga_id = '".$lga."'
				group by lga.lga_id";
			$connection = Yii::app()->db; 
			$command = $connection->createCommand($sql);
			$fr = $command->queryAll();
			$dataProvider=new CArrayDataProvider($fr, array(
			    'id'=>'lgaresults',
			    'sort'=>array(
			        'attributes'=>array(
			             'LGA',
			        ),
			    ),
			    'pagination'=>array(
			        'pageSize'=>10,
			    ),
			));
		$this->render('lgaresults',array(
			'dataProvider'=>$dataProvider,
			));
	}
	
	/*
	 * View Polling Unit Results
	*/
	public function actionPollingUnit() {
		$sql = "SELECT polling_unit.polling_unit_name AS `Polling Unit`,
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'PDP' THEN announced_pu_results.party_score END) AS 'PDP',
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'DPP' THEN announced_pu_results.party_score END) AS 'DPP',
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'ACN' THEN announced_pu_results.party_score END) AS 'ACN',
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'PPA' THEN announced_pu_results.party_score END) AS 'PPA',
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'CDC' THEN announced_pu_results.party_score END) AS 'CDC',
			SUM(CASE WHEN announced_pu_results.party_abbreviation = 'JP' THEN announced_pu_results.party_score END) AS 'JP',
			ward.ward_name AS `Ward`, lga.lga_name AS `LGA`
			FROM polling_unit 
			INNER JOIN announced_pu_results ON polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid 
			INNER JOIN ward ON polling_unit.uniquewardid = ward.uniqueid
			INNER JOIN lga ON polling_unit.lga_id = lga.lga_id
			GROUP BY polling_unit.uniqueid, announced_pu_results.polling_unit_uniqueid, polling_unit.polling_unit_number";
			$connection = Yii::app()->db; 
			$command = $connection->createCommand($sql);
			$fr = $command->queryAll();
			$dataProvider=new CArrayDataProvider($fr, array(
			    'id'=>'pollingunitresults',
			    'sort'=>array(
			        'attributes'=>array(
			             'Polling Unit', 'Ward', 'LGA',
			        ),
			    ),
			    'pagination'=>array(
			        'pageSize'=>10,
			    ),
			));
		$this->render('pollingunitresults',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}