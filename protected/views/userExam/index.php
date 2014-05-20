<?php
/* @var $this UserExamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Exams',
);

//$this->menu=array(
//	array('label'=>'Create UserExam', 'url'=>array('create')),
//	array('label'=>'Manage UserExam', 'url'=>array('admin')),
//);
?>
<h1>History of <b> <?php echo $userName;  ?> </b></h1>
<table border="0">
    <?php for($i = 0; $i < count($listId); $i++) {
     echo '---------------------------------------------<br>';
     echo '<b>Exam code:</b> '.$listId[$i].'<br>';
     echo '<b>Subject Name: </b>'.$listSubject[$i].'<br>';
     echo '<b>Score: </b>'.$listScore[$i].'<br>';
     echo '<b>Date: </b>'.$listDate[$i].'<br>';
}    echo '---------------------------------------------<br>';?>
</table>
<?php // $this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); ?>
