<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required" style="color: red">*</span> are required.</p>

    <?php // echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password', array('size' => 20, 'maxlength' => 20)); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row">  
        <?php echo $form->label($model, 'password_repeat'); ?>    
        <?php echo $form->passwordField($model, 'password_repeat', array('size' => 20, 'maxlength' => 20)); ?>    
        <?php echo $form->error($model, 'password_repeat'); ?> 
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'fullName'); ?>
        <?php echo $form->textField($model, 'fullName'); ?>
        <?php echo $form->error($model, 'fullName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'birthday'); ?>
        <?php echo CHtml::activeDateField($model, 'birthday'); ?>
        <?php echo $form->error($model, 'birthday'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'major'); ?>
        <?php echo $form->textField($model, 'major'); ?>
        <?php echo $form->error($model, 'major'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->