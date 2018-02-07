<?php
/* @var $this AnnouncedPuResultsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Announced Pu Results',
);

$this->menu=array(
	array('label'=>'Create AnnouncedPuResults', 'url'=>array('create')),
	array('label'=>'Manage AnnouncedPuResults', 'url'=>array('admin')),
);
?>

<h1>Announced Pu Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
