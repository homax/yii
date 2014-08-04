<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->menu=array(
	array('label'=>'Создание страницы', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал страниц</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
            'name' => 'id',
            'headerHtmlOptions' => array(
                'width' => 30
            )
        ),
		'title',
		'created' => array(
            'name' => 'created',
            'value' => 'date("j.m.Y H:i:s", $data->created)',
            'filter' => false,
        ),
		'status' => array(
            'name'=>'status',
            'value' => '($data->status == 1)?"Доступно":"Скрыто"',
            'filter' => array(0=>"Скрыто", 1=>"Доступно"),
        ),
		'category_id' => array(
            'name'=>'category_id',
            'value' => '$data->categories->title',
            'filter' => Categories::all(),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
