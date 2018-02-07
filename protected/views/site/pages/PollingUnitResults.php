<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Polling Unit Results';
?>
<h1>Polling Unit Results</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'view',
)); ?>
