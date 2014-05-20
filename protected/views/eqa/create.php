<?php
/* @var $this EqaController */
/* @var $model Eqa */

$this->breadcrumbs=array(
	'Eqas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Eqa', 'url'=>array('index')),
	array('label'=>'Manage Eqa', 'url'=>array('admin')),
);
?>

<h1>Create Exam</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>