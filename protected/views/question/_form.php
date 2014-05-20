<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'question-form',
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
<?php echo $form->labelEx($model, 'subjectId'); ?>
<?php echo $form->dropDownList($model, 'subjectId', $model->getList(), array('empty' => 'Select a subject')); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'content'); ?>
<?php echo $form->textArea($model, 'content', array('rows' => 6, 'cols' => 40)); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'difficulty'); ?>
<?php echo $form->dropDownList($model, 'difficulty', array('easy' => 'Easy', 'medium' => 'Medium', 'hard' => "Hard"), array('empty' => 'Choose difficulty')); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'A'); ?>
<?php echo $form->textField($model, 'A', array('size' => 50)); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'B'); ?>
<?php echo $form->textField($model, 'B', array('size' => 50)); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'C'); ?>
<?php echo $form->textField($model, 'C', array('size' => 50)); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'D'); ?>
<?php echo $form->textField($model, 'D', array('size' => 50)); ?>
    </div>

    <div class="row">
<?php echo $form->labelEx($model, 'Answer'); ?>
        <?php echo $form->textField($model, 'Answer', array('style' => 'text-transform: uppercase','size'=>1)); ?>
    </div>
    
    <div class="row buttons">
<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->