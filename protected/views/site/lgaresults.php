<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - LGA Results';
Yii::app()->clientScript->registerScript('search', "
										 
$('#lga').change(function(){
	$( '#results' ).submit();
});
");
?>
<h1>Local Government Results</h1>

<?php
	$this->renderPartial('_searchfilterstates',array(
		'model'=>$model,
	));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
			'name' => 'LGA',
			'type'=>'raw',
		),
		array(
			'name' => 'Total',
			'type'=>'raw',
		)
	)
)); ?>
