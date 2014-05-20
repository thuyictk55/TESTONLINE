<?php
/* @var $this ChamThiController */

$this->breadcrumbs=array(
	'Cham Thi'=>array('/chamThi'),
	'Chamthi',
);
?>
<h2>Exam code: <?php echo $id;?></h2>
<?php echo $this->renderPartial('_formchamthi',array('model'=>$model, 'list' => $list));
?>