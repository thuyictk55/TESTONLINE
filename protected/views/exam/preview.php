<?php
/* @var $this ThitructiepController */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	'preview',
);
?>
<?php echo $this->renderPartial('_formpreview',array('exammodel'=>$exammodel,'time'=>$time, 'questionArr'=>$questionArr,'listQuest'=>$listQuest , 'examId'=>$examId));?>
