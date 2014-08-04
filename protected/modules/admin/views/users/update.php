<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Создание пользователя', 'url'=>array('create')),
	array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Изменить пароль', 'url'=>array('password', 'id'=>$model->id)),
);
?>

<h1>Изменение пользователя <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>