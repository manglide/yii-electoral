<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Polling Unit Results';
?>
<h1>Polling Unit Results</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'Polling Unit',
			'type'=>'raw',
		),
		array(
			'name' => 'PDP',
			'type'=>'raw',
		),
		array(
			'name' => 'DPP',
			'type'=>'raw',
		),
		array(
			'name' => 'ACN',
			'type'=>'raw',
		),
		array(
			'name' => 'PPA',
			'type'=>'raw',
		),
		array(
			'name' => 'CDC',
			'type'=>'raw',
		),
		array(
			'name' => 'JP',
			'type'=>'raw',
		),
		array(
			'name' => 'Ward',
			'type'=>'raw',
		),
		array(
			'name' => 'LGA',
			'type'=>'raw',
		),
	)
)); ?>
