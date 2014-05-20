<?php
/* @var $this ExamController */
/* @var $model Exam */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'exam-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 25, 'maxlength' => 25)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'subjectId'); ?>
        <?php // echo $form->textField($model,'subjectId'); ?>
        <?php echo $form->dropDownList($model, 'subjectId', $model->getListName(), array('empty' => 'Select a subject')); ?>
        <?php echo $form->error($model, 'subjectId'); ?>
        <?php // print_r($model->getList()); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model, 'time'); ?>
        <?php echo $form->textField($model, 'time'); ?>
        <?php echo $form->error($model, 'time'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'NoEasy'); ?>
        <?php echo $form->textField($model, 'NoEasy'); ?>
        <?php echo $form->error($model, 'NoEasy'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'NoMedium'); ?>
        <?php echo $form->textField($model, 'NoMedium'); ?>
        <?php echo $form->error($model, 'NoMedium'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'NoDifficult'); ?>
        <?php echo $form->textField($model, 'NoDifficult'); ?>
        <?php echo $form->error($model, 'NoDifficult'); ?>
    </div>
    <div class="row">
        <input type ="checkbox" name ="save" value ="Save">  Save to word
    </div>
    


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->