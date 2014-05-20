<script language="JavaScript" src="js/gen_validatorv4.js"
type="text/javascript" xml:space="preserve"></script>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'examcode'
        ));
?>



<div class="form">
    <div class="row">
        <?php
//echo $form->errorSummary($model);
//        echo $form->labelEx($model, 'Exam Code:', array('style'=>'font-size:14px;'));
//        echo $form->textField($model, 'examId', array('size' => 1, 'style'=>'width:100px; height: 25px; text-align:center;'));
//        if ($error == 1) {
//            echo '<br><span style="color:red">Exam code not exist!x</span>';
//        }
//        echo $form->error($model, 'examId');
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name' => 'examId',
            'source' => $ids,
            // additional javascript options for the autocomplete plugin
            'options' => array(
                'minLength' => '1',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;',
            ),
        ));
        ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Next', array('class'=>'button', 'style'=>'opacity: 0')); ?>
        <!--<button type="submit">Next</button>-->
        <!--<button onclick="myFunction()">Next</button>-->
    </div>
</div>

<?php $this->endWidget(); ?>
