<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал категорий', 'url'=>array('index'))
);
?>

<h1>Создание категории</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>