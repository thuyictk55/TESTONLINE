<?php //
/* @var $this ChamthiController */

$this->breadcrumbs = array(
    'Chamthi' => array('/examcode'),
    'Chamthi',
);
?>
<span style="font-size:20px"><b>Please enter exam code: </b></span>
<?php echo $this->renderPartial('_formexamcode',array('model'=>$model, 'ids'=>$ids,'error'=>$error));
?>