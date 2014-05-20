<?php
/* @var $this ExamController */
/* @var $data Exam */
?>
-----------------------------------------------------------------------------------------------
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjectId')); ?>:</b>
	<?php echo CHtml::encode(Subject::getSubject($data->subjectId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoEasy')); ?>:</b>
	<?php echo CHtml::encode($data->NoEasy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoMedium')); ?>:</b>
	<?php echo CHtml::encode($data->NoMedium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoDifficult')); ?>:</b>
	<?php echo CHtml::encode($data->NoDifficult); ?>
	<br />


</div>