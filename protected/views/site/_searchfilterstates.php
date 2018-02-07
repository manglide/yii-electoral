<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'results'
)); ?>

	
		
		<?php
                        $cMod = new Lga;
                        $criteria = new CDbCriteria;
                        $criteria->select='*';
                        $cstates = Lga::model()->findAll($criteria);
                        $sel = "<select name='lga' id='lga' class='lga'><option selected='selected' value=''>Filter By LGA</option>";
                        foreach($cstates as $p){
                        	$sel .= "<option value='".$p->lga_id."'>".$p->lga_name."</option>";
                        }
                        $sel .= "</select>";
                        echo $sel;
                ?>
                
                
	

<?php $this->endWidget(); ?>

</div>