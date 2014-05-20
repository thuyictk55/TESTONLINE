<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	$model->name,
);
//
//$this->menu=array(
//	array('label'=>'List Exam', 'url'=>array('index')),
//	array('label'=>'Create Exam', 'url'=>array('create')),
//	array('label'=>'Update Exam', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Exam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Exam', 'url'=>array('admin')),
//);
?>

<h1>View Exam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'subjectId',
		'time',
		'NoEasy',
		'NoMedium',
		'NoDifficult',
	),
)); ?>
