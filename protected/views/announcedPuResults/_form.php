<?php
/* @var $this AnnouncedPuResultsController */
/* @var $model AnnouncedPuResults */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'announced-pu-results-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Lga'); ?>
		<?php			
						$md = new Lga;
						$criteria=new CDbCriteria;
						$criteria->select='*';
						$schools=Lga::model()->findAll($criteria);
						$comp = array();
						$ids = array();
						foreach($schools as $p){
							$comp[] = $p->lga_name;
							$ids[] = $p->lga_id;
						}
						echo CHtml::activeDropDownList( $md, 'lga_name', $comp,
													   array(
															 'id'=>'lga', 'class'=>'lga',
															 'prompt'=>'Select Local Government Areas',
															 'ajax' => array(
																'type'=>'POST',
																'url'=>CController::createUrl('announcedPuResults/Wardata'), 
																'update'=>'#ward',
																)
															 ) );
		?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Wards'); ?>
		<?php
			$ward = new Ward;
			echo CHtml::activeDropDownList($ward,'ward_name', array(),
										   array(
												 'id'=>'ward', 'class'=>'ward','prompt'=>'Select Wards',
												'ajax' => array(
													'type'=>'POST', 
													'url'=>CController::createUrl('announcedPuResults/Pollunits'),
													'update'=>'#AnnouncedPuResults_polling_unit_uniqueid', 
													)
												)
			);
		?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Polling Units'); ?>
		<select id="AnnouncedPuResults_polling_unit_uniqueid"
				class="AnnouncedPuResults_polling_unit_uniqueid"
				name="AnnouncedPuResults[polling_unit_uniqueid]"></select>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'party_abbreviation'); ?>
		<?php
						$md = new Party;
						$criteria=new CDbCriteria;
						$criteria->select='partyname';
						$schools=Party::model()->findAll($criteria);
						$comp = array();
						foreach($schools as $p){
							$comp[] = $p->partyname;
						}
						$comp = array_combine(range(1, count($comp)), array_values($comp));
						echo CHtml::activeDropDownList( $md, 'partyname', $comp, array(
																					   'id'=>'AnnouncedPuResults_party_abbreviation',
																					   'name'=>'AnnouncedPuResults[party_abbreviation]',
																					   'prompt'=>'Select Party',
																					   'class'=>'AnnouncedPuResults_party_abbreviation') );
		?>
		<?php echo $form->error($model,'party_abbreviation'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'party_score'); ?>
		<?php echo $form->textField($model,'party_score'); ?>
		<?php echo $form->error($model,'party_score'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entered_by_user'); ?>
		<?php echo $form->textField($model,'entered_by_user',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'entered_by_user'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'date_entered'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'AnnouncedPuResults[date_entered]',
                                'id'=>'AnnouncedPuResults_date_entered',
								'value'=>Yii::app()->dateFormatter->format("yyyy-mm-dd hh:mm:ss",strtotime($model->date_entered)),
                                'options'=>array(
									'showAnim'=>'fold',
									'dateFormat' => 'yy-mm-dd',
                                ),
                                'htmlOptions'=>array(
									'style'=>'height:20px;',
                                ),
                        ));
		?>
		<?php echo $form->error($model,'date_entered'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->