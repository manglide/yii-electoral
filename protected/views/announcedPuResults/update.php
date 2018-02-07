<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */

$this->breadcrumbs=array(
	'Announced Pu Results'=>array('index'),
	$model->result_id=>array('view','id'=>$model->result_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnnouncedPuResults', 'url'=>array('index')),
	array('label'=>'Create AnnouncedPuResults', 'url'=>array('create')),
	array('label'=>'View AnnouncedPuResults', 'url'=>array('view', 'id'=>$model->result_id)),
	array('label'=>'Manage AnnouncedPuResults', 'url'=>array('admin')),
);
?>

<h1>Update AnnouncedPuResults <?php echo $model->result_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>