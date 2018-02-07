<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */


$this->menu=array(
	//array('label'=>'List AnnouncedPuResults', 'url'=>array('index')),
	//array('label'=>'Manage AnnouncedPuResults', 'url'=>array('admin')),
);
?>

<h1>Enter A New Polling Unit Results</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>