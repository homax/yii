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