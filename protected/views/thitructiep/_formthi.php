<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'thi-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="form">
    <span id="countdown" class="timer"></span>
    <script src="//js/jquery-1.11.1.min.js"></script>
    <script>
        var seconds = <?php echo $time ?>;
        function secondPassed() {
            var minutes = Math.round((seconds - 30) / 60);
            var remainingSeconds = seconds % 60;
            if (remainingSeconds < 10) {
                remainingSeconds = "0" + remainingSeconds;
            }
            document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = "Time out";
                alert("Time out");
//                    setInterval("submitform();", 1000);
                document.forms["thi-form"].submit();
            } else {
                seconds--;
            }
        }
        var countdownTimer = setInterval('secondPassed()', 1000);

        function submitform() { //document.getElementById('thi-form').submit();
            document.forms["thi-form"].submit();
        }
//        function pause(){
//            
//        }
    </script>
    <br>
    <?php // print_r($questionArr); ?>
    <?php // print_r($listQuest);  ?>

    <?php
    $i = 1;
    foreach ($questionArr as $k => $value) {

        echo '<div class="row">';
        foreach ($listQuest as $k => $value1) {
            if ($k == $value['id']) {
                echo 'Question ' . $i++ . ': ' . $value['content'] . '<br><br>';
                echo '</div>';
                echo '<div class="row">';
                echo 'Option A: ' . $value[$value1[0]] . '<br>';
                echo 'Option B: ' . $value[$value1[1]] . '<br>';
                echo 'Option C: ' . $value[$value1[2]] . '<br>';
                echo 'Option D: ' . $value[$value1[3]] . '<br><br>';
                echo $form->labelEx($exammodel, 'Answer: ');
                echo $form->textField($exammodel, 'Option[' . $k . ']', array('style' => 'text-transform: uppercase', 'size' => 1));
            }
        }
//           
        echo '</div>';
        ?>
        <?php
    }
    ?>
    <div class="row buttons">
<?php echo CHtml::submitButton('Submit'); ?>
        <!--<button id="button">Pause</button>-->
    </div>

</div>
<?php $this->endWidget(); ?>
