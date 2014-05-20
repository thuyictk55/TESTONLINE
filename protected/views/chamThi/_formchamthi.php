<?php $form= $this->beginWidget('CActiveForm');?>
<div class="form">
    <?php
    $i = 1;
//    print_r($list);
    foreach ($list as $item) {
        $id = $item['questionId'];
        echo '<div class="row">';
        echo "Question " . $i . ": ";
        echo $form->textField($model, 'Option['.$id.']',array('style' => 'text-transform: uppercase','size'=>1));
        $i++;
        echo '</div>';
    }
    ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Next'); ?>
    </div>
</div>


<?php $this->endWidget();?>
