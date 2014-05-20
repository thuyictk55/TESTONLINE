<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subjectId'); ?>
		<?php echo $form->textField($model,'subjectId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time'); ?>
		<?php echo $form->textField($model,'time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoEasy'); ?>
		<?php echo $form->textField($model,'NoEasy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoMedium'); ?>
		<?php echo $form->textField($model,'NoMedium'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NoDifficult'); ?>
		<?php echo $form->textField($model,'NoDifficult'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->