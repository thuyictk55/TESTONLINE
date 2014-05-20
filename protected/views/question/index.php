<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Questions',
);
//
//$this->menu=array(
//	array('label'=>'Create Question', 'url'=>array('create')),
//	array('label'=>'Manage Question', 'url'=>array('admin')),
//);
//?>

<h1>Questions</h1>
<div id="posts">
<?php echo count($posts); ?>

<?php
$this->widget('application.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
    'itemSelector' => 'div.post',
    'pages' => $pages,
));
//$this->widget('zii.widgets.CListView', array(
//       'id' => 'Question',
//       'dataProvider' => $dataProvider,
//       'itemView' => '_view',
//       'template' => '{items} {pager}',
//       'pager' => array(
//                    'class' => 'application.extensions.infiniteScroll.IasPager', 
//                    'rowSelector'=>'.row', 
//                    'listViewId' => 'Question', 
//                    'header' => '',
//                    'loaderText'=>'Loading...',
//                    'options' => array('history' => false, 'triggerPageTreshold' => 2, 'trigger'=>'Load more'),
//                  )
//            )
//       );
?>
<?php foreach($posts as $post): ?>
    <div class="post">
        ---------------------------------------------------------------------------------------------------------
        <p><b>Id:</b> <?php echo $post->id; ?></p>
        <p><b>Content:</b> <?php echo $post->content; ?></p>
        <p><b>Subject Id:</b> <?php echo $post->subjectId; ?></p>
        <p><b>Option A:</b> <?php echo $post->A; ?></p>
        <p><b>Option B:</b> <?php echo $post->B; ?></p>
        <p><b>Option C:</b> <?php echo $post->C; ?></p>
        <p><b>Option D:</b> <?php echo $post->D; ?></p>
        <p><b>Difficulty:</b> <?php echo $post->difficulty; ?></p>
<!--        <p><b>Answer:</b> <?php //echo $post->Answer; ?></p>-->
    </div>
<?php endforeach; ?>
</div>
