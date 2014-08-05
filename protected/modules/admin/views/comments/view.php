<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->menu=array(
	array('label'=>'Журнал комментариев', 'url'=>array('index')),
	array('label'=>'Удалить комментарий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы точно хотите удалить комментарий?')),
);
?>

<h1>Просмотр комментария #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'page_id' => array(
            'name' => 'page_id',
            'value' => $model->pages->title
        ),
		'created' => array(
            'name' => 'Дата',
            'value' => date('d.m.Y H:i:s', $model->created)
        ),
		'user_id' => array(
            'name' => 'Пользователь',
            'value' => $model->users->username
        ),
		'guest',
	),
)); ?>
