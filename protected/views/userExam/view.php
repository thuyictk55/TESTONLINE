<?php
/* @var $this UserExamController */
/* @var $model UserExam */

$this->breadcrumbs=array(
	'User Exams'=>array('index'),
	$model->id,
);

//$this->menu=array(
//	array('label'=>'List UserExam', 'url'=>array('index')),
//	array('label'=>'Create UserExam', 'url'=>array('create')),
//	array('label'=>'Update UserExam', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete UserExam', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage UserExam', 'url'=>array('admin')),
//);
?>

<h1>View UserExam #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'userId',
		'examId',
		'score',
		'testDate',
	),
)); ?>
