<?php
/* @var $this CommentsController */
/* @var $model Comments */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comments-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журанл комментариев</h1>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'           => 'comments-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => array(
        'id' => array(
            'name' => 'id',
            'headerHtmlOptions' => array(
                'width' => 30
            )
        ),
        'status' => array(
            'name'=>'status',
            'value' => '($data->status == 1)?"Доступно":"Скрыто"',
            'filter' => array(0=>"Скрыто", 1=>"Доступно"),
        ),
        'content',
        'page_id' => array(
            'name'   => 'page_id',
            'value'  => '$data->pages->title',
            'filter' => Pages::all(),
        ),
        'created' => array(
            'name'   => 'created',
            'value'  => 'date("j.m.Y H:i:s", $data->created)',
            'filter' => false,
        ),
        'user_id' => array(
            'name'   => 'user_id',
            'value'  => '$data->users->username',
            'filter' => Users::all(),
        ),
        'guest',
        array(
            'class' => 'CButtonColumn',
            'updateButtonOptions' => array(
                'style' => 'display:none'
            ),
        ),
    ),
)); ?>
