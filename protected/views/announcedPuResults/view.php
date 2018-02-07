<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */

$this->menu=array(
	array('label'=>'Create Polling Unit Result', 'url'=>array('create')),
);
?>

<h1>View AnnouncedPuResults #<?php echo $model->result_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'result_id',
		'polling_unit_uniqueid',
		'party_abbreviation',
		'party_score',
		'entered_by_user',
		'date_entered',
		'user_ip_address',
	),
)); ?>
