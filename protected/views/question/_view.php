<?php
/* @var $this QuestionController */
/* @var $data Question */
?>
-----------------------------------------------------------------------------------------------
<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::encode($data->id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subjectId')); ?>:</b>
	<?php foreach ($rs = $data->getList() as $r=>$name) {
                if ($r == $data->subjectId) {
                    echo $name;
                    break;
                }
        }?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('difficulty')); ?>:</b>
	<?php switch ($data->difficulty) {
            case 1:
                echo CHtml::encode ("Easy");
                break;
            case 2:
                echo CHtml::encode ('Medium');
                break;
            case 3:
               echo CHtml::encode ('Hard');
                break;
        }?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('A')); ?>:</b>
	<?php echo CHtml::encode($data->A); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('B')); ?>:</b>
	<?php echo CHtml::encode($data->B); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('C')); ?>:</b>
	<?php echo CHtml::encode($data->C); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('D')); ?>:</b>
	<?php echo CHtml::encode($data->D); ?>
	<br />

	<?php /*echo CHtml::encode($data->getAttributeLabel('Answer')); ?>:</b>
	<?php echo CHtml::encode($data->Answer); ?>
	<br />

	*/ ?>

</div>