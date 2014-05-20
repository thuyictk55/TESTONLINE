<?php $html = ''; ?>
<?php $html .= '<h1 text-align=center>Exam ' . $exammodel->getName($examId) . '</h1>'; ?>
<?php $html .= '<h2>Subject: ' . Subject::getSubject($exammodel->getSubjectId($examId)) . '</h2>'; ?>
<?php $html .= '<h2>Exam Code: ' . $examId . '</h2>'; ?>
<?php $html .= '<h2>Time: ' . $time / 60 . ' minutes</h2>'; ?>
<?php $html .= '<h2>************************************************************</h2>'; ?>
<?php $html .= '<h2>Student Name: </h2>'; ?>
<?php $html .= '<h2>Student Id: </h2>'; ?>
<?php $html .= '<h2>Class: </h2>'; ?>
<?php $html .= '<h2>************************************************************</h2>'; ?>

<?php // print_r($listQuest); ?>

<?php
$i = 1;
foreach ($questionArr as $k => $value) {

    $html .= '';
    foreach ($listQuest as $k => $value1) {
        if ($k == $value['id']) {
            $html .= '<b>Question ' . $i++ . '</b>: ' . $value['content'] . '<br>';
            $html .= '';
            $html .= '';
            $html .= 'A. ' . $value[$value1[0]] . '<br>';
            $html .= 'B. ' . $value[$value1[1]] . '<br>';
            $html .= 'C. ' . $value[$value1[2]] . '<br>';
            $html .= 'D. ' . $value[$value1[3]] . '<br><br>';
        }
    }
//           
    $html .= '';
    ?>
    <?php
}
$html .= '';

echo $html;
?>
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
<div class="form">
    <div class="row">
        <input type ="hidden" name ="html" value ="<?php echo htmlspecialchars($html); ?>"/>
    </div>
    <div class="row buttons">
        <input type ="checkbox" name ="generate" checked="checked" value ="Save" style="opacity: 0"/>
        <!--Generate:<input type ="checkbox" name ="generate" value ="Save"/>-->
        <?php echo CHtml::submitButton("Finish");?>
    </div>
</div>

<?php $this->endWidget(); ?>