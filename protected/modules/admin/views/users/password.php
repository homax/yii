<?php
/* @var $this UsersController */
/* @var $model Users */

$this->menu=array(
    array('label'=>'Журнал пользователей', 'url'=>array('index')),
    array('label'=>'Создание пользователя', 'url'=>array('create')),
    array('label'=>'Просмотр пользователя', 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>'Изменить пользователя', 'url'=>array('update', 'id'=>$model->id)),
);
?>
<h1>Укажите пароль</h1>
<?php
    echo CHtml::form();
    echo CHtml::textField('password');
    echo CHtml::submitButton('Изменить');
    echo CHtml::endForm();