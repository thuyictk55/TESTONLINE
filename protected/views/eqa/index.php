<?php
/* @var $this EqaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Eqas',
);

$this->menu=array(
	array('label'=>'Create Eqa', 'url'=>array('create')),
	array('label'=>'Manage Eqa', 'url'=>array('admin')),
);
?>

<h1>Eqas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
