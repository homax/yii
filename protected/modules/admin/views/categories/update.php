<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->menu=array(
	array('label'=>'Журнал категорий', 'url'=>array('index')),
	array('label'=>'Создать категорию', 'url'=>array('create')),
	array('label'=>'ПРосмотр', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Изменение категоири <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>