<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - LGA Results';
?>
<h1>Local Government Results</h1>

<?php
	$this->renderPartial('_searchfilterstates',array(
		'model'=>$model,
	));
?>

<p><code><?php echo __FILE__; ?></code>.</p>
