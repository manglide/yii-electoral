<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */

$this->breadcrumbs=array(
	'Announced Pu Results'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AnnouncedPuResults', 'url'=>array('index')),
	array('label'=>'Create AnnouncedPuResults', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#announced-pu-results-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Announced Pu Results</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'announced-pu-results-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'result_id',
		'polling_unit_uniqueid',
		'party_abbreviation',
		'party_score',
		'entered_by_user',
		'date_entered',
		/*
		'user_ip_address',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
