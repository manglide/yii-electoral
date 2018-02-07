<?php

class AnnouncedPuResultsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				//'actions'=>array('create','update'),
				//'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				//'actions'=>array('admin','delete'),
				//'users'=>array('admin'),
			),
			array('deny',  // deny all users
				//'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AnnouncedPuResults;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['AnnouncedPuResults']))
		{
			$party = Party::model()->findByPk($_POST['AnnouncedPuResults']["party_abbreviation"])->partyname;
			$data = $_POST['AnnouncedPuResults'];
			$data["party_abbreviation"] = $party;
			$data["user_ip_address"] = Yii::app()->request->getUserHostAddress();
			$model->attributes = $data;
			if($model->save())
				$this->redirect(array('view','id'=>$model->result_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AnnouncedPuResults']))
		{
			$model->attributes=$_POST['AnnouncedPuResults'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->result_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AnnouncedPuResults');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AnnouncedPuResults('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AnnouncedPuResults']))
			$model->attributes=$_GET['AnnouncedPuResults'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AnnouncedPuResults the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AnnouncedPuResults::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AnnouncedPuResults $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='announced-pu-results-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	/*
	 * Fecth Ward Data
	*/
	public function actionWardata() {
		$lga = $_POST['Lga']['lga_name'];
		$sql = "SELECT ward.ward_id AS ID, ward.ward_name AS Wards from ward
			join lga ON ward.lga_id = lga.lga_id
			where lga.lga_id = '".$lga."'
			group by ward.ward_name
			order by ward.ward_id";
			$connection = Yii::app()->db; 
			$command = $connection->createCommand($sql);
			$fr = $command->queryAll();
			
			$data=CHtml::listData($fr,'ID','Wards');

			foreach($data as $value=>$name)
			{
		    echo CHtml::tag('option',
		               array('value'=>$value),CHtml::encode($name),true);
			};
	}
	/*
	 * Fecth Poll Units Data
	*/
	public function actionPollunits() {
		$pollunit = $_POST['Ward']['ward_name'];
		$sql = "SELECT polling_unit.uniqueid AS ID, polling_unit.polling_unit_name AS Units from polling_unit
			where polling_unit.ward_id = '".$pollunit."'
			order by polling_unit.polling_unit_name";
			$connection = Yii::app()->db; 
			$command = $connection->createCommand($sql);
			$fr = $command->queryAll();
			
			$data=CHtml::listData($fr,'ID','Units');

			foreach($data as $value=>$name)
			{
		    echo CHtml::tag('option',
		               array('value'=>$value),CHtml::encode($name),true);
			};
	}
}
