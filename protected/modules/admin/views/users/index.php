<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
	array('label'=>'Создание пользователя', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал пользователей</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
        'email',
        'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y H:i:s", $data->created)',
            'filter' => false,
        ),
        'ban' => array(
            'name'=>'ban',
            'value' => '($data->ban == 1)?"Бан":""',
            'filter' => array(0=>"Нет", 1=>"Да"),
        ),
        'role' => array(
            'name'=>'role',
            'value' => '($data->role == 1)?"Пользователь":"Админ"',
            'filter' => array(2=>"Admin", 1=>"User"),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
