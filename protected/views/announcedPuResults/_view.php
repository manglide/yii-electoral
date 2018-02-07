<?php
/* @var $this AnnouncedPuResultsController */
/* @var $data AnnouncedPuResults */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('result_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->result_id), array('view', 'id'=>$data->result_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('polling_unit_uniqueid')); ?>:</b>
	<?php echo CHtml::encode($data->polling_unit_uniqueid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('party_abbreviation')); ?>:</b>
	<?php echo CHtml::encode($data->party_abbreviation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('party_score')); ?>:</b>
	<?php echo CHtml::encode($data->party_score); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entered_by_user')); ?>:</b>
	<?php echo CHtml::encode($data->entered_by_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_entered')); ?>:</b>
	<?php echo CHtml::encode($data->date_entered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_ip_address')); ?>:</b>
	<?php echo CHtml::encode($data->user_ip_address); ?>
	<br />


</div>