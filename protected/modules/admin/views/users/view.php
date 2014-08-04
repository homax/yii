<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Журнал пользователей', 'url'=>array('index')),
	array('label'=>'Изменение пользователя', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удаление пользователя', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить пользователя?')),
);
?>

<h1>Просмотр пользователя #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'password',
		'created',
		'ban',
		'role',
		'email',
	),
)); ?>
