<?php
/* @var $this ThitructiepController */

$this->breadcrumbs=array(
	'Thitructiep'=>array('/thitructiep'),
	'Thi',
);
?>
<?php echo $this->renderPartial('_formthi',array('exammodel'=>$exammodel,'time'=>$time, 'questionArr'=>$questionArr,'listQuest'=>$listQuest ));?>
