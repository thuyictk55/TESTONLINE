<?php $form= $this->beginWidget('CActiveForm');?>
<div class="form">
    <div class="row">
        <?php echo $form->labelEx($model, 'subjectId'); ?>
        <?php // echo $form->textField($model,'subjectId'); ?>
        <?php echo $form->dropDownList($model, 'subjectId', $model->getListName(), array('0' => 'Select a subject')); ?>
        <?php echo $form->error($model, 'subjectId'); ?>
        <?php // print_r($model->getList()); ?>
    </div>
    
    <div class="row">
<?php
//echo $form->errorSummary($model);
//    echo $form->labelEx($exammodel,'Exam Code:');
//    echo $form->textField($exammodel,'examId', array('size'=>1));
//    echo $form->error($exammodel,'examId');
?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Next'); ?>
    </div>
</div>


<?php $this->endWidget();?>