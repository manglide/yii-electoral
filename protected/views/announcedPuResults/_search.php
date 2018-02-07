<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'result_id'); ?>
		<?php echo $form->textField($model,'result_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'polling_unit_uniqueid'); ?>
		<?php echo $form->textField($model,'polling_unit_uniqueid',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'party_abbreviation'); ?>
		<?php echo $form->textField($model,'party_abbreviation',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'party_score'); ?>
		<?php echo $form->textField($model,'party_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entered_by_user'); ?>
		<?php echo $form->textField($model,'entered_by_user',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_entered'); ?>
		<?php echo $form->textField($model,'date_entered'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_ip_address'); ?>
		<?php echo $form->textField($model,'user_ip_address',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->