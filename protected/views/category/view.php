<?php
/* @var $this CategoryController */

$this->breadcrumbs=array(
	'Категория',
    $model->categories->title => array('index', 'id'=>$model->category_id),
    $model->title
);
?>
<h1><?= $model->title; ?></h1>
<time datetime="<?= date('j.m.Y H:i:s', $model->created)?>"><?= date('j.m.Y H:i:s', $model->created)?></time>
<?= $model->content; ?>

<hr>
<?php if(Yii::app()->user->hasFlash('comment')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('comment'); ?>
    </div>

<?php endif; ?>
<?php
echo $this->renderPartial('newComment', array('model'=>$newComment));

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>Comments::all($model->id),
    'itemView'=>'_viewComment',
));